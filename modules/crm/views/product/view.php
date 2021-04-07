<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Product */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Товары', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
$this->registerJsFile('@web/js/product.js', ['depends' => 'yii\web\JqueryAsset', 'position' => $this::POS_END]);
$this->registerJsFile('@web/js/libs/bootstrap-select.min.js', ['depends' => 'yii\web\JqueryAsset', 'position' => $this::POS_END]);
$this->registerCssFile('@web/css/libs/bootstrap-select.min.css');
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
			
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title"><b>Рецепт:</b></h3>
				</div>
				<div class="panel-body">
					<?= $model->getRecipe() ?>
				</div>
			</div>
			
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title"><b>Фото:</b></h3>
				</div>
				<div class="panel-body">
					<?= $model->image ? Html::img('@web/'.$model->image, ['style' => ['max-width' => '350px', 'max-height' => '350px'], 'class' => 'center-block']) : ''?>
				</div>
			</div>
			
		</div>
		<div class="col-lg-6">

			<div class="panel panel-default">
				<div class="panel-heading flex justify-content-space-between align-items-center">
					<h3 class="panel-title"><b>Цены:</b></h3>
					<button class="btn btn-success btn-xs updateProductOptionButton" data-toggle="modal" data-target="#updateProductOption" data-url="<?= Url::toRoute(['product/update-option', 'id' => 0])?>">
						<span class="glyphicon glyphicon-plus"></span>
					</button>
				</div>
				<table class="table table-responsive table-bordered">
					<?if($model->options){
						foreach($model->options as $option){?>
							<tr>
								<td style="width: 35%">
									<?=$option->title?>
								</td>
								<td style="width: 35%" class="text-center">
									<?=$option->price?> грн.
								</td>
								<td style="width: 15%" class="text-center">
									<?= $option->active ? '<span class="glyphicon glyphicon-ok text-success"></span>' : '<span class="glyphicon glyphicon-off text-danger"></span>'?>
								</td>
								<td style="width: 15%" class="text-center">
									<button class="btn btn-warning btn-xs updateProductOptionButton" data-toggle="modal" data-target="#updateProductOption" data-url="<?= Url::toRoute(['product/update-option', 'id' => $option->id])?>"><span class="glyphicon glyphicon-pencil"></span></button>
									<?= Html::a('<span class="glyphicon glyphicon-remove"></span>', ['product-option/delete', 'id' => $option->id], [
										'class' => 'btn btn-danger btn-xs',
										'data' => [
											'confirm' => 'Вы хотите удалить опцию?',
											'method' => 'post',
										],
									]) ?>
								</td>
							</tr>
						<?}
					}else{?>
						<tr><td colspan="10"> - </td></tr>
					<?}?>

				</table>
			</div>

			<div class="panel panel-default">
				<div class="panel-heading flex justify-content-space-between align-items-center">
					<h3 class="panel-title"><b>Состав минимальной порции:</b></h3>
					<button class="btn btn-success btn-xs updateProductCompositionButton" data-toggle="modal" data-target="#updateProductComposition" data-url="<?= Url::toRoute(['product/update-composition', 'id' => 0])?>">
						<span class="glyphicon glyphicon-plus"></span>
					</button>
				</div>
				<table class="table table-responsive table-bordered">
					<?if($model->composition){
						foreach($model->composition as $composition){?>
							<tr>
								<td style="width: 35%">
									<a href="<?=Url::to(['ingridient/view', 'id' => $composition->ingridient->id])?>">
										<?=$composition->ingridient->title?>
									</a>
									
								</td>
								<td style="width: 35%" class="text-center">
									<?=(int)$composition->amountInProduct?> мл(гр)
								</td>
								<td style="width: 15%" class="text-center">
									<?= $composition->active ? '<span class="glyphicon glyphicon-ok text-success"></span>' : '<span class="glyphicon glyphicon-off text-danger"></span>'?>
									&ensp;
									<?= $composition->displayed ? '<span class="glyphicon glyphicon-eye-open text-success"></span>' : '<span class="glyphicon glyphicon-eye-close text-danger"></span>'?>
								</td>
								<td style="width: 15%" class="text-center">
									<button class="btn btn-warning btn-xs updateProductCompositionButton" data-toggle="modal" data-target="#updateProductComposition" data-url="<?= Url::toRoute(['product/update-composition', 'id' => $composition->id])?>"><span class="glyphicon glyphicon-pencil"></span></button>
									<?= Html::a('<span class="glyphicon glyphicon-remove"></span>', ['product-composition/delete', 'id' => $composition->id], [
										'class' => 'btn btn-danger btn-xs',
										'data' => [
											'confirm' => 'Вы хотите удалить ингридиент из состава?',
											'method' => 'post',
										],
									]) ?>
								</td>
							</tr>
						<?}
					}?>
					
					
					<tr>
						<td colspan="3">Себестоимость товара(без учета упаковки и доставки)</td>
						<td><b><?=number_format($model->costPrice, 0, '.', ' ')?> грн</b></td>
					</tr>

				</table>
			</div>


			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title"><b>Что делать клиенту:</b></h3>
				</div>
				<div class="panel-body">
					<?= $model->getWhatToDo() ?>
				</div>
			</div>
		</div>
	</div>
	
	

</div>

<div class="modal fade" id="updateProductComposition">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Изменение ингридиента</h4>
			</div>
			<div class="modal-body">

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" id="saveProductComposition" data-url="<?= Url::toRoute(['product/save-product-composition', 'productID' => $model->id])?>">Сохранить</button>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="updateProductOption">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Изменение опции</h4>
			</div>
			<div class="modal-body">

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" id="saveProductOption" data-url="<?= Url::toRoute(['product/save-product-option', 'productID' => $model->id])?>">Сохранить</button>
			</div>
		</div>
	</div>
</div>