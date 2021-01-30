<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Product */
if($model->id){
	$this->title = 'Изменение товара: ' . $model->title;
	$this->params['breadcrumbs'][] = ['label' => 'Товары', 'url' => ['index']];
	$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
	$this->params['breadcrumbs'][] = 'Изменение';
}else{
	$this->title = 'Добавление товара';
	$this->params['breadcrumbs'][] = ['label' => 'Товары', 'url' => ['index']];
	$this->params['breadcrumbs'][] = $this->title;
}

?>
<div class="product-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
