<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Відгуки';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php if(!empty($comments)):?>

        <table class="table">
            <thead>
                <tr>
                    <td>Номер відгуку
                    <td>Автор</td>
                    <td>Дата</td>
                    <td>Текст</td>
                    <td>Видалити</td>
                </tr>
            </thead>

            <tbody>
                <?php $i=0; foreach($comments as $comment):?>
                    <tr>
                        <td><?= $comment->id?></td>
                        <td><?= $comment->user->username?></td>
                        <td><?= $comment->date?></td>
                        <td><textarea disabled class="commad"><?= $comment->text?></textarea></td>
                        <td>
                            <a class="btn btn-danger" href="<?= Url::toRoute(['comment/delete', 'id' => $comment->id]); ?>">Видалити</a>
                        </td>
                    </tr>
                <?php endforeach;?>
                <?php $i++?>
                <?php if($i % 3 == 0):?>
                    <div class="clearfix"></div>
                <?php endif;?>
                <div class="clearfix"></div>
            </tbody>

        </table>
        <?php
        echo \yii\widgets\LinkPager::widget([
            'pagination'=> $pages,
        ]);
        ?>
    <?php endif;?>
</div>
