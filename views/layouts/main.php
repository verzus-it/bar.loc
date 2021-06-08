<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);

$cartProductQty = is_array($_SESSION['cart']) ? array_sum($_SESSION['cart']) : 0;
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
<header>
	<div class="container">
		<div class="header">
			<div class="left">
				<a href="/" class="logo">2051</a>
			</div>
			<div class="right">
				<div class="menu">
					<a href="/" class="menuItem">Головна</a>
					<a href="#cocktailMenu" class="menuItem">Коктейльна карта</a>
					<a href="#paymentAndDelivery" class="menuItem">Доставка і оплата</a>
					<a href="#contacts" class="menuItem">Контакти</a>
				</div>
				<a href="javascript:$('.modalWindow').addClass('opened')" class="cart"><?=$cartProductQty?></a>
				<img src="images/burger.png" class="burger" alt="">
			</div>
		</div>
	</div>
</header>

<div class="mobileMenu">
	<div class="top">
		<a href="/" class="logo">2051</a>
		<img src="images/close.png" class="closeMobileMenu" alt="">
	</div>
	<a href="/" class="menuItem">Головна</a>
	<a href="#cocktailMenu" class="menuItem">Коктейльна карта</a>
	<a href="#paymentAndDelivery" class="menuItem">Доставка і оплата</a>
	<a href="#contacts" class="menuItem">Контакти</a>
</div>

<?= Alert::widget() ?>
<?= $content ?>

<footer>
	<div class="container" id="contacts">
		<div class="footer">
			<div class="socials">
				<div class="title">
					Ми у соцмережах:
				</div>
				<div>
					скоро...
<!--					<a href="https://www.instagram.com/2051.kyiv.ua/" target="_blank"><img src="../images/icons/instagram.svg" alt="Instagram"></a>-->
				</div>
			</div>
			<div class="contacts">
				Київська обл. с. Софіївська Борщагівка
				<br/>+380966218621
			</div>
		</div>
	</div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
<script>
	$('.burger').click(function () {
		$('.mobileMenu').addClass('opened');

        $(document).mouseup(function (e){ // событие клика по веб-документу
            $(".mobileMenu").removeClass('opened'); // скрываем его
        });
    })
    $('.closeMobileMenu').click(function () {
        $('.mobileMenu').removeClass('opened');
	});
</script>