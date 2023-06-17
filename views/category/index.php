<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>Категорії </h2>
                    <ul class="catalog category-products">
                        <?= \app\components\MenuWidget::widget(['tpl' => 'menu'])?>
                    </ul>
                </div>
            </div>


            <div class="col-sm-9 padding-right">
                <?php if (!empty($products)):?>
                <div class="features_items">
                    <h2 class="title text-center">Популярні товари</h2>
                    <?php $i=0; foreach($products as $product):?>
                    <?php $image = $product->getImage();?>
                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <a href="<?= \yii\helpers\Url::to(['product/view', 'id'=> $product->id])?>"><?= Html::img($image->getUrl(), ['alt' => $hit->name])?></a>
                                    <h2>₴<?= $product->price?></h2>
                                    <p><a href="<?= \yii\helpers\Url::to(['product/view', 'id'=> $product->id])?>"><?= $product->name?></a></p>

                                    <?php if ($product->stock): ?>
                                        <a href="<?= \yii\helpers\Url::to(['cart/add', 'id' => $product->id])?>" data-id="<?= $product-> id?>" class="btn btn-default add-to-cart"><i class=" fa fa-shopping-cart"></i>Додати в кошик</a>
                                    <?php else: ?> Товару поки не має
                                    <?php endif;?>
                                </div>

                                <?php   if($product->new): ?>
                                    <?= Html::img("@web/images/home/new.png", ['alt' => 'Новинка', 'class' =>'new','height'=>90, 'width'=>90])?>
                                <?php endif?>

                                <?php   if($product->sale): ?>
                                    <?= Html::img("@web/images/home/sale.png", ['alt' => 'Распродажа', 'class' =>'newarrival','height'=>90, 'width'=>90])?>
                                <?php endif?>
                            </div>

                        </div>
                    </div>
                        <?php $i++?>
                        <?php if($i % 3 == 0):?>
                            <div class="clearfix"></div>
                        <?php endif;?>
                    <?php endforeach;?>
                    <div class="clearfix"></div>
                    <?php
                    echo \yii\widgets\LinkPager::widget([
                        'pagination'=> $pages,
                    ]);
                    ?>
                </div>
                <?php endif;?>

                </div>

            </div>
        </div>
    </div>
</section>
