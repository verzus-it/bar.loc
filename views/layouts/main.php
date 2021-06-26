<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Url;
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
	<link rel="apple-touch-icon" sizes="57x57" href="images/favicons/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="images/favicons/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="images/favicons/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="images/favicons/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="images/favicons/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="images/favicons/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="images/favicons/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="images/favicons/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="images/favicons/apple-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192"  href="images/favicons/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="images/favicons/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="images/favicons/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="images/favicons/favicon-16x16.png">
	<link rel="manifest" href="images/favicons/manifest.json">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="images/favicons/ms-icon-144x144.png">
	<meta name="theme-color" content="#ffffff">
	
	<meta property="og:url" content="<?= Yii::$app->homeUrl ?>" />
	<meta property="og:type" content="website" />
	<meta property="og:title" content="2051. Виготоалення та доставка алкогольних коктейлів по Софіївській Борщагівці та Вишневому" />
	<meta property="og:description" content="Змішуємо, охолоджуємо та доставляємо алкогольні коктейлі" />
	<meta property="og:image" content="images/share.png" />
</head>
<body>
<?php $this->beginBody() ?>
<header>
	<div class="container">
		<div class="header">
			<a href="/" class="logo">2051</a>
			<div class="phoneWrapper">
				<a class="icon" href="viber://chat?number=74951285638">
					<img src="images/icons/viber.svg">
				</a>
				<a class="icon" href="tg://chat?number=74951285638">
					<img src="images/icons/telegram.svg">
				</a>
				<a class="icon" href="https://wa.me/74951285638" target="_blank">
					<img src="images/icons/whatsapp.svg">
				</a>
				<a class="number" href="tel:84951285638">+38 (096) 621-86-21</a>
			</div>
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
					<a href="https://www.instagram.com/2051.kyiv.ua/" target="_blank"><img src="images/icons/instagram.svg" alt="Instagram"></a>
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