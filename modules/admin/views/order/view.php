<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Order */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="order-view">

    <h1>Перегляд замовлення № <?= $model->id ?></h1>

    <p>
        <?= Html::a('Оновити', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Видалити', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Ви впевнені, що хочете видалити цей елемент ?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'created_at',
            'updated_at',
            'qty',
            'sum',
            [
                'attribute' => 'status',
                'value' => !$model->status ? '<span class="text-danger">Активний</span>' : '<span class="text-success">Завершений</span>',
                'format' => 'html',
            ],
            'name',
            'surname',
            'email:email',
            'phone',
            'address',
        ],
    ]); ?>

    <?php $items = $model->orderItems;?>
    <div class="table-responsive">
        <table class="table table-hover table-striped">
            <thead>
            <tr>
                <th>Найменування </th>
                <th>Кількість </th>
                <th>Ціна</th>
                <th>Сума</th>
                <th><span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                </th>

            </tr>
            </thead>
            <tbody>
            <?php foreach ($items as $item) :?>
                <tr>
                    <td><a href="<?=\yii\helpers\Url::to(['/product/view', 'id'=>$item->product_id])?>"><?= $item['name']?></a></td>
                    <td><?= $item['qty_item']?></td>
                    <td><?= $item['price']?></td>
                    <td><?= $item['sum_item']?></td>
                    <td><span data-id="<?=$id?>" class="glyphicon glyphicon-remove text-danger del-item" aria-hidden="true"></td>
                </tr>
            <?php endforeach;?>
            </tbody>
        </table>
    </div>

</div>
