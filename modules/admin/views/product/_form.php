<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;
use mihaildev\elfinder\ElFinder;
mihaildev\elfinder\Assets::noConflict($this);

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Product */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <div class="form-group field-product-category_id">
        <label class="control-label" for="product-category_id">Батьківська категорія</label>
        <select id="product-category_id" class="form-control" name="Product[category_id]">
            <?= \app\components\MenuWidget::widget(['tpl' => 'select_product', 'model' => $model])?>
        </select>
    </div>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?php
    echo $form->field($model, 'content')->widget(CKEditor::className(), [
        'editorOptions' => ElFinder::ckeditorOptions('elfinder',[]),
    ]);
    ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <?= $form->field($model, 'keywords')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?php $img = $model->getImage(); ?>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'attribute' => 'image',
                'value' => "<img src='{$img->getUrl()}'>",
                'format' => 'html',
            ],
        ],
    ]) ?>

    <?= $form->field($model, 'image')->fileInput(['maxlength' => true]) ?>

    <p><?= Html::a('Видалити фото', ['deleteimg', 'id' => $model->id], [
        'class' => 'btn btn-danger',
        'data' => [
            'confirm' => 'Ви впевнені, що хочете видалити фото?',
            'method' => 'post',
        ],
    ]) ?></p>

    <?= $form->field($model, 'hit')->checkbox([ '0', '1']) ?>

    <?= $form->field($model, 'new')->checkbox([ '0', '1' ]) ?>

    <?= $form->field($model, 'sale')->checkbox([ '0', '1' ]) ?>

    <?= $form->field($model, 'stock')->checkbox([ '0', '1' ]) ?>

    <div class="form-group">
        <?= Html::submitButton('Зберегти ', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
