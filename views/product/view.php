<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */


use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>

<?php
$image = $product->getImage();
?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>Категорії</h2>

                    <ul class="catalog category-products">
                        <?= \app\components\MenuWidget::widget(['tpl' => 'menu'])?>
                    </ul>

                </div>
            </div>

            <div class="col-sm-9 padding-right">
                <div class="product-details">
                    <div class="col-sm-5">
                        <div class="view-product">
                            <?= Html::img($image->getUrl(), ['alt'=> $product->name])?>
                        </div>
                    </div>
                    <div class="col-sm-7">
                        <div class="product-information"><!--/інформація продукту-->
                            <?php   if($product->new): ?>
                                <?= Html::img("@web/images/home/new.png", ['alt' => 'Новинка', 'class' =>'new','height'=>100, 'width'=>100])?>
                            <?php endif?>

                            <?php   if($product->sale): ?>
                                <?= Html::img("@web/images/home/sale.png", ['alt' => 'Распродажа', 'class' =>'newarrival','height'=>100, 'width'=>100])?>
                            <?php endif?>
                            <h2><?= $product->name?></h2>
                            <span>
                                <span>Ціна <?= $product->price?> грв.</span>
									<p style="float: left;">
                                        <label>Кількість :</label>
                                        <button id="minus1" class="minus" style=" cursor: pointer;"><i class="fas fa-minus"></i></button>
                                        <input style="cursor: pointer;" id="qty" type="text" value="1" class="qty" />
                                        <button id="add1" class="add" style=" cursor: pointer;"><i class="fas fa-plus"></i></button>
                                    </p>
                            </span>

                            <p>
                                <?php if ($product->stock): ?> <a href="<?= \yii\helpers\Url::to(['cart/add','id'=>$product->id]) ?>" data-id="<?= $product->id?>" class="btn btn-fefault add-to-cart cart"><i class="fa fa-shopping-cart"></i>
                                    Додати в кошик
                            </a><?php endif;?>

                            <p><b>Доступність:</b>
                                <?php if ($product->stock): ?> В наявності
                                <?php else: ?> Нема в наявності.
                            <p><b>Поки що Ви не можете купити цей товар, почекайте поки товар не з'явитися.</b></p>
                                <?php endif;?>

                            <p><b>Категорія:</b><a href="<?= \yii\helpers\Url::to(['category/view', 'id'=> $product->category->id])?>"> <?= $product->category->name?></a></p>

                        </div>
                    </div>
                </div><!--/інформація продукту-->

                <div class="category-tab shop-details-tab">
                    <div class="col-sm-12">
                        <ul class="nav nav-tabs">
                            <li><a href="#details" data-toggle="tab">Характеристики</a></li>
                            <li  class="active"><a href="#reviews" data-toggle="tab">Відгуки</a></li>
                        </ul>
                    </div>
                    <div class="tab-content">

                        <div class="tab-pane fade " id="details" >
                            <div class="col-sm-12">
                                <div class="description">
                                    <?= $product->content ?>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade active in" id="reviews">
                            <div class="description">
                                <div class="col-sm-12">
                                    <?php if(!empty($comments)):?>
                                        <?php  $i=0; foreach($comments as $comment):?>
                                            <ul>
                                                <li><i class="fas fa-user"> </i> <?= $comment->user->username;?></li>
                                                <li><i class="fas fa-calendar-week"> </i> <?= $comment->getDate();?></li>
                                            </ul>
                                            <p><textarea disabled><?= $comment->text; ?></textarea></p>
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
                                    <?php endif;?>
                                </div>
                                <div class="col-sm-12">
                                    <?php if(Yii::$app->user->isGuest):?>
                                        <h4> <a href="<?= \yii\helpers\Url::to(['/user/login'])?>"><i class="fas fa-user"></i> Авторизуйтесь</a>, щоб залишити відгук о товарі.</h4>
                                    <?php endif;?>

                                    <?php if(!Yii::$app->user->isGuest):?>
                                        <div>
                                            <?php if(Yii::$app->session->getFlash('comment')):?>
                                                <div class=" col-sm-8 alert alert-success" role="alert">
                                                    <?= Yii::$app->session->getFlash('comment'); ?>
                                                </div>
                                            <?php endif;?>
                                            <?php $form = \yii\widgets\ActiveForm::begin([
                                                'action'=>['product/comment', 'id'=>$product->id],
                                                'options'=>['class'=>'form-horizontal contact-form', 'role'=>'form']])?>
                                                <div class="col-md-12">
                                                    <?= $form->field($commentForm, 'comment')->textarea(['class'=>'form-control','placeholder'=>'Залишити свій відгук'])->label(false)?>
                                                    <button type="submit" class="btn send-btn">Залишити відгук</button>
                                                </div>
                                        </div>
                                            <?php \yii\widgets\ActiveForm::end();?>
                                        </div>
                                    <?php endif;?>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</section>