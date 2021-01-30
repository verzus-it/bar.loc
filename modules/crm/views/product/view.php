<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Product */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Товары', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="product-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary btn-sm']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger btn-sm',
            'data' => [
                'confirm' => 'Вы хотите удалить товар?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
	<div class="row">
		<div class="col-lg-6">
			<table class="table table-responsive  table-striped table-bordered">
				<tr>
					<td style="width: 30%"><b>ID</b></td>
					<td><?= $model->id ?></td>
				</tr>
				<tr>
					<td><b>Название</b></td>
					<td><?= $model->title ?></td>
				</tr>
				<tr>
					<td><b>Тип</b></td>
					<td><?= $model->productCategory ?></td>
				</tr>
			</table>

			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title"><b>Описание:</b></h3>
				</div>
				<div class="panel-body">
					<?= $model->getDescription() ?>
				</div>
			</div>
			
		</div>
		<div class="col-lg-6">
			<h4>Цены</h4>
			<table class="table table-responsive  table-striped table-bordered">
				<thead>
					<tr>
						<th style="width: 30%"><b>Опция</b></th>
						<th style="width: 30%">Цена</th>
						<th>Действие</th>
					</tr>
				</thead>
				
			</table>
		</div>
	</div>
	
	

</div>
