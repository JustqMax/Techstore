<?php

/* @var $this \yii\web\View */
/* @var $content string */


use yii\helpers\Html;
use app\assets\AppAsset;
use app\assets\ltAppAsset;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;

AppAsset::register($this);
ltAppAsset::register($this);
?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
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
                        <a href="<?= \yii\helpers\Url::home()?>"><?= Html::img('@web/images/home/logo.jpg', ['alt'=> 'Techstore'])?></a>
                    </div>
                </div>

                <div class="col-sm-8">
                    <div class="shop-menu pull-right">
                        <ul class="nav navbar-nav">
                            <?php if (!Yii::$app->user->isGuest): ?>
                                <li><a href="<?=\yii\helpers\Url::to(['/site/logout'])?>"><i class="fas fa-user-times"></i><?= Yii::$app->user->identity['username']?> Вийти</a></li>
                            <?php endif;?>

                            <?php if (Yii::$app->user->isGuest): ?>
                                <li><a href="<?= \yii\helpers\Url::to(['/user/login'])?>"><i class="fas fa-user"></i> Увійти</a></li>
                                <li><a href="<?= \yii\helpers\Url::to(['/user/register'])?>"><i class="fas fa-user-plus"></i> Зареєструватися</a></li>
                            <?php endif;?>

                            <?php if (Yii::$app->user->identity->isAdmin): ?>
                                <li><a href="<?= \yii\helpers\Url::to(['/admin'])?>"><i class="fas fa-user-cog"></i> Адмін</a></li>
                            <?php endif;?>

                            <li><a href="#" onclick="return getCart()"><i class="fas fa-shopping-cart"></i> Кошик</a></li>
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
                            <li><a href="<?= \yii\helpers\Url::home() ?>"><i class="fas fa-home"></i> Головна сторінка</a></li>
                            <li><a href="<?= \yii\helpers\Url::to(['/site/about'])?>"><i class="fas fa-info"></i> Про нас</a></li>
                            <li><a href="<?= \yii\helpers\Url::to(['/site/contact'])?>"><i class="fas fa-question"></i> Контакти</a></li>
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

<?= $content ?>

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
                    <p>Україна, Херсон 73000</p>
                        <img src="/images/home/map.png"/>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <p class="pull-left">Techstore 2023</p>
            </div>
        </div>
    </div>

</footer>

<?php
\yii\bootstrap\Modal::begin([
    'header' => '<h2>Кошик</h2>',
    'id' => 'cart',
    'size' => 'modal-lg',
    'footer' => '<button type="button" class="btn btn-default" data-dismiss="modal">Продовжити покупки</button>
        <a href="' . \yii\helpers\Url::to(['cart/view']) . '" class="btn btn-success">Оформити замовлення</a>
        <button type="button" class="btn btn-danger" onclick="clearCart()">Очистити кошик</button>'

]);
\yii\bootstrap\Modal::end();

?>


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

<script>
$( ".catalog" ).dcAccordion({
speed: 300
});
</script>