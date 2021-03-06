<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Ingridient */

if($model->id){
	$this->title = 'Изменение: ' . $model->title;
	$this->params['breadcrumbs'][] = ['label' => 'Ингридиенты', 'url' => ['index']];
	$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
	$this->params['breadcrumbs'][] = 'Изменение';
}else{
	$this->title = 'Добавление ингридиента';
	$this->params['breadcrumbs'][] = ['label' => 'Ингридиенты', 'url' => ['index']];
	$this->params['breadcrumbs'][] = $this->title;
}
?>
<div class="ingridient-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
