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
			<div class="logo">
				<a href="/">2051</a>
			</div>
			<div class="right">
				<div class="menu">
					<a href="/" class="menuItem">Головна</a>
					<a href="/" class="menuItem">Коктейльна карта</a>
					<a href="/payment-and-delivery" class="menuItem">Доставка і оплата</a>
					<a href="/contacts" class="menuItem">Контакти</a>
				</div>
				<a href="/" class="cart">2</a>
			</div>
		</div>
	</div>
</header>

<?= Alert::widget() ?>
<?= $content ?>

<footer>
	<div class="container">
		<div class="footer">
			<div class="socials">Ми у соцмережах</div>
			<div class="feedback">Напишіть нам</div>
			<div class="contacts">
				Київська обл. с. Софіївська Борщагівка
				<br/>вул. Боголюбова, д. 44
				<br/>+380966218621
			</div>
		</div>
	</div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
