<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Товар';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Додати  новий товар', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
//            'category_id',
            [
                'attribute' => 'category_id',
                'value' => function($data){
                    return $data->category->name;
                },
            ],
            'name',
            //'content:ntext',
            'price',
            [
                'attribute' => 'hit',
                'value' => function($data){
                    return !$data->hit ? '<span class="text-danger">Ні</span>' : '<span class="text-success">Так</span>';
                },
                'format' => 'html',
            ],
            [
                'attribute' => 'new',
                'value' => function($data){
                    return !$data->new ? '<span class="text-danger">Ні</span>' : '<span class="text-success">Так</span>';
                },
                'format' => 'html',
            ],
            [
                'attribute' => 'sale',
                'value' => function($data){
                    return !$data->sale ? '<span class="text-danger">Ні</span>' : '<span class="text-success">Так</span>';
                },
                'format' => 'html',
            ],
            [
                'attribute' => 'stock',
                'value' => function($data){
                    return !$data->sale ? '<span class="text-danger">Ні</span>' : '<span class="text-success">Так</span>';
                },
                'format' => 'html',
            ],
            //'keywords',
            //'description',
            //'img',
//            'hit',
//            'new',
//            'sale',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
