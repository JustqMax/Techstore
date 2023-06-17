<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\assets\ltAppAsset;

AppAsset::register($this);
ltAppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <?php $this->registerCsrfMetaTags() ?>
    <title>Адміністрація |<?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>


    <link rel="shortcut icon" href="/images/home/home.ico">
</head>

<body>
<?php $this->beginBody() ?>
<header id="header">
    <div class="header_top">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="contactinfo">
                        <ul class="nav nav-pills">
                            <li><a href="#"><i class="fas fa-phone"></i> +380 982 243 352</a></li>
                            <li><a href="mailto:techstoreqqq@gmail.com"><i class="fas fa-envelope"></i> techstoreqqq@gmail.com</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="header-middle">
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="logo pull-left">
                        <a href="<?= \yii\helpers\Url::home()?>"><?= Html::img('@web/images/home/logo.jpg', ['alt'=> 'J-Home'])?></a>
                    </div>
                </div>

                <div class="col-sm-8">
                    <div class="shop-menu pull-right">
                        <ul class="nav navbar-nav">
                            <?php if (!Yii::$app->user->isGuest): ?>
                                <li><a href="<?=\yii\helpers\Url::to(['/site/logout'])?>"><i class="fas fa-user-times"></i><?= Yii::$app->user->identity['username']?> Вийти</a></li>
                            <?php endif;?>
                            <li><a href="#" onclick="return getCart()"><i class="fas fa-shopping-cart"></i> Кошик</a></li>
                            <li><a href="<?= \yii\helpers\Url::home() ?>"><i class="fas fa-home"></i> Вийти з адміністрування</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="header-bottom">
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    <div class="mainmenu pull-left">
                        <ul class="nav navbar-nav collapse navbar-collapse">
                            <li><a href="<?= \yii\helpers\Url::to(['/admin']) ?>" class="active">Замовлення</a></li>
                            <li class="dropdown"><a href="#">Категорії<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <li><a href="<?=\yii\helpers\Url::to(['category/index']) ?>">Перелік категорій</a></li>
                                    <li><a href="<?=\yii\helpers\Url::to(['category/create']) ?>">Створити категорію</a></li>
                                </ul
                            </li>
                            <li class="dropdown"><a href="#">Товар<i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <li><a href="<?=\yii\helpers\Url::to(['product/index']) ?>">Перелік товарів</a></li>
                                    <li><a href="<?=\yii\helpers\Url::to(['product/create']) ?>">Додати товар</a></li>
                                </ul>
                            </li>
                            <li><a href="<?=\yii\helpers\Url::to(['comment/index']) ?>">Відгуки</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="search_box pull-right">
                        <form method="get" action="<?= \yii\helpers\Url::to(['/category/search'])?>">
                            <input type="text" placeholder="Пошук" name="q">
                            <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="container">
    <?php if (Yii::$app->session->hasFlash('success')): ?>
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?php echo Yii::$app->session->getFlash('success'); ?>
        </div>
    <?php endif; ?>
    <?= $content ?>
</div>

<footer id="footer">
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-sm-2">
                    <div class="companyinfo">
                        <h2>Tech<span>store</span></h2>
                        <p>Магазин електротехніки</p>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="about pull-left">
                        <ul class="nav navbar-nav collapse navbar-collapse">
                            <li><a href="<?= \yii\helpers\Url::to(['/site/about'])?>"><i class="fas fa-info"></i> Про нас</a></li>
                            <li><a href="<?= \yii\helpers\Url::to(['/site/contact'])?>"><i class="fas fa-question"></i> Контакти</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="address">
                        <img src="/images/home/map.png"/>
                        <p>Україна, Херсон 73000</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <p class="pull-left">Techstore Copyright 2023</p>
            </div>
        </div>
    </div>

</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
<script>
    $( ".catalog" ).dcAccordion({
        speed: 300
    });
</script>