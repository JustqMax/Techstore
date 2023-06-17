<?php


namespace app\controllers;

use app\models\Category;
use app\models\Comment;
use app\models\CommentForm;
use app\models\Product;
use Yii;
use yii\data\Pagination;



class ProductController extends AppController
{

    public function actionView($id){

        $product = Product::findOne($id);
        $comments = $product->getProductComments();
        $commentForm = new CommentForm();
        $query= Comment::find()->where(['product_id'=> $id]);
        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize'=>3, 'forcePageParam'=> false, 'pageSizeParam'=>false]);
        $comments = $query->offset($pages->offset)->limit($pages->limit)->all();
        if(empty($product))
            throw new \yii\web\HttpException(404, 'Такого товару нема.');
        $hits = Product::find()->where(['hit'=> '1']) ->limit(6)-> all();
        $this->setMeta('Techstore | ' . $product->name, $product->keywords, $product->description);
        return $this->render('view', compact('product', 'hits','comments','pages','commentForm'));
    }

    public function actionComment($id)
    {
        $model = new CommentForm();

        if(Yii::$app->request->isPost)
        {
            $model->load(Yii::$app->request->post());
            if($model->saveComment($id))
            {
                Yii::$app->getSession()->setFlash('comment', 'Дякуємо за відгук!');
                return $this->redirect(['product/view','id'=>$id]);
            }
        }

    }

}