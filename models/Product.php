<?php


namespace app\models;

use Yii;
use yii\data\Pagination;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "product".
 *
 * @property integer $id
 * @property integer $user_id
 *
 * @property Comment[] $comments
 */

class Product extends ActiveRecord {

    public function behaviors()
    {
        return [
            'image' =>[
                'class' => 'rico\yii2images\behaviors\ImageBehave',
            ]
        ];
    }

    public static function tableName(){
        return 'product';
    }



    public static function getAll($pageSize = 5)
    {
        $query = Product::find();
        $count = $query->count();
        $pagination = new Pagination(['totalCount' => $count, 'pageSize'=>$pageSize]);

        $products = $query->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        $data['products'] = $products;
        $data['pagination'] = $pagination;

        return $data;
    }

    public function getCategory(){
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    public function getComments()
    {
        return $this->hasMany(Comment::className(), ['product_id'=>'id']);
    }

    public function getProductComments()
    {
        return $this->getComments()->all();
    }

    public function getAuthor()
    {
        return $this->hasOne(User::className(), ['id'=>'user_id']);
    }

}