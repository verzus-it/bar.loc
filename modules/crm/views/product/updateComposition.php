<?
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
?>
<form class="form-horizontal">
	<div class="form-group">
		<label for="ingridientID" class="col-lg-6 control-label">Ингридиент</label>
		<div class="col-lg-6">
			<?=Html::dropDownList('ingridientID', $model->ingridientID, ArrayHelper::map($ingridients, 'id', 'title'), ['class' => 'form-control btn-group-sm selectpicker'])?>
		</div>
	</div>
	<div class="form-group">
		<label for="amountInProduct" class="col-lg-6 control-label">Количество в продукте, мл.(г.):</label>
		<div class="col-lg-6">
			<input type="number" class="form-control input-sm" id="amountInProduct" name="amountInProduct" placeholder="100" value="<?=$model->amountInProduct?>">
		</div>
	</div>
	<div class="form-group">
		<label for="active" class="col-lg-6 control-label">Входит в состав:</label>
		<div class="col-lg-6" style="padding-top: 6px;">
			<?=Html::checkbox('active', $model->active || !$model->id)?>
		</div>
	</div>
	<div class="form-group">
		<label for="displayed" class="col-lg-6 control-label">Видимый клиенту:</label>
		<div class="col-lg-6" style="padding-top: 6px;">
			<?=Html::checkbox('displayed', $model->displayed || !$model->id)?>
		</div>
	</div>
	<input type="hidden" name="id" value="<?=(int)$model->id?>">
</form>
<script>
    $('.selectpicker').selectpicker({
        liveSearch: true
    });
</script>