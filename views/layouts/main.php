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
				Домашний бармен
			</div>
			<div class="right">
				<div class="menu">
					<div class="muneItem">Главная</div>
					<div class="muneItem">Коктейльная карта</div>
					<div class="muneItem">Доставка и оплата</div>
					<div class="muneItem">О нас</div>
				</div>
				<div class="cart">Корзина</div>
			</div>
		</div>
	</div>
</header>

<div class="wrap">
    <div class="container">
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer>
	<div class="container">
		<div class="footer">
			<div class="socials">Мы в соцсетях</div>
			<div class="feedback">Напишите нам</div>
			<div class="contacts">+380966218621</div>
		</div>
	</div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
