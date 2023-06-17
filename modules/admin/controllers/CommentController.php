<?php

namespace app\modules\admin\controllers;

use app\models\Comment;
use app\models\CommentForm;
use app\models\Product;
use yii\web\Controller;
use yii\data\Pagination;


use Yii;
class CommentController extends Controller
{
    public function actionIndex()
    {
        $query = Comment::find();
        $pages = new Pagination(['totalCount' => $query->count(), 'pageSize'=>4, 'forcePageParam'=> false, 'pageSizeParam'=>false]);
        $comments = $query->offset($pages->offset)->limit($pages->limit)->all();
        return $this->render('index', compact('comments','pages'));
    }

    public function actionDelete($id)
    {
        $comment = Comment::findOne($id);
        if($comment->delete())
        {
            return $this->redirect(['comment/index']);
        }
    }

}