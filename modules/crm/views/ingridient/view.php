<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Ingridient */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Ingridients', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="ingridient-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
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
						<td style="width: 35%"><b>ID</b></td>
						<td><?= $model->id ?></td>
					</tr>
					<tr>
						<td><b>Название</b></td>
						<td><?= $model->title ?></td>
					</tr>
					<tr>
						<td><b>Стоимость, грн/литр(кг)</b></td>
						<td><?= $model->price ?></td>
					</tr>
					<tr>
						<td><b>Видимый для клиента</b></td>
						<td><?= $model->visible ? 'Да' : 'Нет' ?></td>
					</tr>
					<tr>
						<td><b>Активен</b></td>
						<td><?= $model->active ? 'Да' : 'Нет' ?></td>
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
			<?= $model->image ? Html::img('@web/'.$model->image, ['style' => ['max-width' => '350px', 'max-height' => '350px'], 'class' => 'center-block']) : ''?>
		</div>
	</div>

</div>
