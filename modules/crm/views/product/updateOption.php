<?
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
?>
<form class="form-horizontal">
	<div class="form-group">
		<label for="title" class="col-lg-4 control-label">Название опции:</label>
		<div class="col-lg-8">
			<input type="text" class="form-control input-sm" id="title" name="title" placeholder="100 мл." value="<?=$model->title?>">
		</div>
	</div>
	<div class="form-group">
		<label for="price" class="col-lg-4 control-label">Цена:</label>
		<div class="col-lg-8">
			<input type="text" class="form-control input-sm" id="price" name="price" placeholder="100" value="<?=$model->price?>">
		</div>
	</div>
	<div class="form-group">
		<label for="active" class="col-lg-4 control-label">Активна:</label>
		<div class="col-lg-8" style="padding-top: 6px;">
			<?=Html::checkbox('active', $model->active || !$model->id)?>
		</div>
	</div>
	<input type="hidden" name="id" value="<?=(int)$model->id?>">
</form>
<script>
    $('.selectpicker').selectpicker({
        liveSearch: true
    });
</script>