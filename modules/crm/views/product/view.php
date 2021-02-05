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
			<div class="panel panel-default">
				<div class="panel-heading"><h3 class="panel-title"><b>Характеристики</b></h3></div>
				<table class="table table-responsive table-bordered">
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
			</div>
			
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

			<div class="panel panel-default">
				<div class="panel-heading flex justify-content-space-between align-items-center">
					<h3 class="panel-title"><b>Цены:</b></h3>
					<button class="btn btn-success btn-xs"><span class="glyphicon glyphicon-plus"></span></button>
				</div>
				
				<table class="table table-responsive table-bordered">
					<tr>
						<td style="width: 45%">100 мл.</td>
						<td style="width: 40%">130 грн</td>
						<td style="width: 15%" class="text-center">
							<button class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-pencil"></span></button>
							<button class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span></button>
						</td>
					</tr>

				</table>
			</div>

			<div class="panel panel-default">
				<div class="panel-heading flex justify-content-space-between align-items-center">
					<h3 class="panel-title"><b>Состав минимальной порции:</b></h3>
					<button class="btn btn-success btn-xs"><span class="glyphicon glyphicon-plus"></span></button>
				</div>
				<table class="table table-responsive table-bordered">
					<tr>
						<td style="width: 35%">
							Водка
						</td>
						<td style="width: 35%" class="text-center">
							100 мл.
						</td>
						<td style="width: 15%" class="text-center">
							<span class="glyphicon glyphicon-ok text-success"></span>
							&ensp;
							<span class="glyphicon glyphicon-eye-open text-success"></span>
						</td>
						<td style="width: 15%" class="text-center">
							<button class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-pencil"></span></button>
							<button class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span></button>
						</td>
					</tr>
					
					<tr>
						<td colspan="3">Себестоимость товара(без учета упаковки и доставки)</td>
						<td><b>57 грн</b></td>
					</tr>

				</table>
			</div>
			
		</div>
	</div>
	
	

</div>



