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
	<base href="<?= Yii::$app->homeUrl ?>">
	<!-- Обязательный (и достаточный) тег для браузеров -->
	<link type="image/x-icon" rel="shortcut icon" href="images/favicons/favicon.ico">

	<!-- Дополнительные иконки для десктопных браузеров -->
	<link type="image/png" sizes="16x16" rel="icon" href="images/favicons/favicon-16x16.png">
	<link type="image/png" sizes="32x32" rel="icon" href="images/favicons/favicon-32x32.png">
	<link type="image/png" sizes="96x96" rel="icon" href="images/favicons/favicon-96x96.png">
	<link type="image/png" sizes="120x120" rel="icon" href="images/favicons/favicon-120x120.png">

	<!-- Иконки для Android -->
	<link type="image/png" sizes="72x72" rel="icon" href="images/favicons/android-icon-72x72.png">
	<link type="image/png" sizes="96x96" rel="icon" href="images/favicons/android-icon-96x96.png">
	<link type="image/png" sizes="144x144" rel="icon" href="images/favicons/android-icon-144x144.png">
	<link type="image/png" sizes="192x192" rel="icon" href="images/favicons/android-icon-192x192.png">
	<link type="image/png" sizes="512x512" rel="icon" href="images/favicons/android-icon-512x512.png">
	<link rel="manifest" href="images/favicons/manifest.json">

	<!-- Иконки для iOS (Apple) -->
	<link sizes="57x57" rel="apple-touch-icon" href="images/favicons/apple-touch-icon-57x57.png">
	<link sizes="60x60" rel="apple-touch-icon" href="images/favicons/apple-touch-icon-60x60.png">
	<link sizes="72x72" rel="apple-touch-icon" href="images/favicons/apple-touch-icon-72x72.png">
	<link sizes="76x76" rel="apple-touch-icon" href="images/favicons/apple-touch-icon-76x76.png">
	<link sizes="114x114" rel="apple-touch-icon" href="images/favicons/apple-touch-icon-114x114.png">
	<link sizes="120x120" rel="apple-touch-icon" href="images/favicons/apple-touch-icon-120x120.png">
	<link sizes="144x144" rel="apple-touch-icon" href="images/favicons/apple-touch-icon-144x144.png">
	<link sizes="152x152" rel="apple-touch-icon" href="images/favicons/apple-touch-icon-152x152.png">
	<link sizes="180x180" rel="apple-touch-icon" href="images/favicons/apple-touch-icon-180x180.png">

	<!-- Иконки для MacOS (Apple) -->
	<link color="#e52037" rel="mask-icon" href="images/favicons/safari-pinned-tab.svg">

	<!-- Иконки и цвета для плиток Windows -->
	<meta name="msapplication-TileColor" content="#2b5797">
	<meta name="msapplication-TileImage" content="images/favicons/mstile-144x144.png">
	<meta name="msapplication-square70x70logo" content="images/favicons/mstile-70x70.png">
	<meta name="msapplication-square150x150logo" content="images/favicons/mstile-150x150.png">
	<meta name="msapplication-wide310x150logo" content="images/favicons/mstile-310x310.png">
	<meta name="msapplication-square310x310logo" content="images/favicons/mstile-310x150.png">
	<meta name="application-name" content="My Application">
	<meta name="msapplication-config" content="images/favicons/browserconfig.xml">
	
	<meta property="og:url" content="<?= Yii::$app->homeUrl ?>" />
	<meta property="og:type" content="website" />
	<meta property="og:title" content="2051. Виготовлення та доставка алкогольних коктейлів по Софіївській Борщагівці та Вишневому" />
	<meta property="og:description" content="Змішуємо, охолоджуємо та доставляємо алкогольні коктейлі" />
	<meta property="og:image" content="images/share.png" />

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=G-LTK9F8Z0WG"></script>
	<script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-LTK9F8Z0WG');
	</script>
	
</head>
<body>
<?php $this->beginBody() ?>
<header>
	<div class="container">
		<div class="header">
			<a href="/" class="logo">2051</a>
			<div class="phoneWrapper">
				<a class="icon" href="viber://chat?number=%2B380974920743">
					<img src="images/icons/viber.svg">
				</a>
				<a class="icon" href="https://t.me/coctails_delivery_2051">
					<img src="images/icons/telegram.svg">
				</a>
				<a class="icon" href="https://wa.me/380974920743" target="_blank">
					<img src="images/icons/whatsapp.svg">
				</a>
				<a class="number" href="tel:380974920743">+38 (097) 492-07-43</a>
			</div>
			<div class="menu">
				<a href="/" class="menuItem">Головна</a>
				<a href="#cocktailMenu" class="menuItem">Коктейльна карта</a>
				<a href="#paymentAndDelivery" class="menuItem">Інформація</a>
				<a href="#contacts" class="menuItem">Контакти</a>
			</div>
			<div class="cartWrapper">
				<a href="javascript:$('.modalWindow').addClass('opened')" class="cart"><?=$cartProductQty?></a>
			</div>
			
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
	<a href="#paymentAndDelivery" class="menuItem">Інформація</a>
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
				<br/>+38 (097) 492 07 43
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