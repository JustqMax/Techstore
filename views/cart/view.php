<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use app\models\Order;
?>

<div class="container">

 <?php if (Yii::$app->session->hasFlash('success')): ?>
    <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <?php echo Yii::$app->session->getFlash('success'); ?>
    </div>
 <?php endif; ?>

    <?php if (Yii::$app->session->hasFlash('error')): ?>
        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?php echo Yii::$app->session->getFlash('error'); ?>
        </div>
    <?php endif; ?>

<?php if(!empty($session['cart'])):?>
    <div class="col-sm-12">
    <div class="table-responsive">
        <table class="table table-hover table-striped">
            <thead>
            <tr>
                <th>Фото</th>
                <th>Найменування </th>
                <th>Кількість </th>
                <th>Ціна</th>
                <th>Сума</th>
<!--                <th><span class="glyphicon glyphicon-remove" aria-hidden="true"></span>-->
                </th>

            </tr>
            </thead>
            <tbody>
            <?php foreach ($session['cart'] as $id => $item) :?>
                <tr>
                    <td class="cartimg"><?= \yii\helpers\Html::img($item['img'], ['alt'=>['name'], 'height'=>50])?></td>
                    <td><a href="<?=Url::to(['product/view', 'id'=>$id])?>"><?= $item['name']?></a></td>
                    <td><?= $item['qty']?></td>
                    <td><?= $item['price']?></td>
                    <td><?= $item['qty'] * $item['price']?></td>
<!--                    <td><span data-id="--><?//=$id?><!--" class="glyphicon glyphicon-remove text-danger del-item" aria-hidden="true"></td>-->
                </tr>
            <?php endforeach;?>
            <tr>
                <td colspan="4">Разом: </td>
                <td><?= $session['cart.qty']?></td>
            </tr>
            <tr>
                <td colspan="4">На суму: </td>
                <td><?= $session['cart.sum']?> грн</td>
            </tr>

            </tbody>
        </table>
    </div>
    <hr/>
    </div>

    <div class="col-sm-12">
    <?php $form = ActiveForm::begin()?>
    <?= $form->field($order, 'name')?>
    <?= $form->field($order, 'surname')?>
    <?= $form->field($order, 'email')?>
    <?= $form->field($order, 'phone')?>
    <?= $form->field($order, 'address')?>
    </div>
    <div class="col-sm-12">
        <div class="order_block2">
            <?= Html::submitButton('Замовити', ['class' => 'btn btn_ord btn-success'])?>
            <?php ActiveForm::end()?>
        </div>
    </div>

<?php else:?>
    <h3>Кошик порожній </h3>
<?php endif;?>
</div>