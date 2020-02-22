<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\bootstrap\Modal;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<section class="body">
    <header>
        <div class="container">
            <div class="header">
<!--                <button onclick="cartQty()">Кнопка</button>-->
                <a href="/">На главную</a>
                <a href="#">Вход в админку</a>
                <a href="#" onclick="openCart(event)" >Корзина:<span><?= Html::img('/img/cart.png', ['style' => 'width:70px;height: 70px;margin-left:0px']);?></span> </a>
<!--                <span>--><?//= Html::img('/img/cart.png', ['style' => 'width:50px;height: 50px;margin-left:-130px']);?><!--</span>-->
                <span style="margin-left: -130px" id="cart-qty"><?=$_SESSION['cart.totalQuantity']?></span>


                <form action="<?= yii\helpers\Url::to(['category/search']) ?>">
                <input type="text" style="padding: 5px" placeholder="Поиск..." name="search">
                </form>

            </div>
        </div>
    </header>

    <div class="container">
        <?= $content ?>
    </div>

<footer>
    <div class="container">
        <div class="footer">
            &copy; Все права защищены или типа того
        </div>
    </div>
</footer>
</section>

<div id="cart" class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content" style="padding: 20px">
            Hello WORLD
        </div>
    </div>
</div>
<?php
//Modal::begin([
//    'header' => '<h2>Ваша корзина</h2>',
//    'id' => 'cart',
//    'size' => 'modal-lg',
//    'footer' => '<button type="button" class="btn btn-secondary" data-dismiss="modal">Продолжить покупки</button>
//             <a href = "' . Url::to(['cart/view']) . '" class="btn btn-success"> Оформить заказ </a>
//             <button type="button" class="btn btn-danger" onclick="clearCart()">Очистить корзину</button>'
//]);
//Modal::end();
//?>


<?php $this->endBody() ?>
</body>
</html>

?>
<?php $this->endPage() ?>
