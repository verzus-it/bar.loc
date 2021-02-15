<form class="form-horizontal">
	<div class="form-group">
		<label for="ingridientID" class="col-lg-6 control-label">Ингридиент</label>
		<div class="col-lg-6">
			<select name="ingridientID" id="ingridientID" class="form-control input-sm selectpicker">
				<?if($ingridients){
					foreach($ingridients as $ingridient){?>
						<option value="<?=$ingridient->id?>"><?=$ingridient->title?></option>
					<?}
				}?>
			</select>
		</div>
	</div>
	<div class="form-group">
		<label for="amountInProduct" class="col-lg-6 control-label">Количество в продукте, мл.(г.):</label>
		<div class="col-lg-6">
			<input type="number" class="form-control input-sm" id="amountInProduct" name="amountInProduct" placeholder="100">
		</div>
	</div>
	<div class="form-group">
		<label for="active" class="col-lg-6 control-label">Входит в состав:</label>
		<div class="col-lg-6" style="padding-top: 6px;">
			<input type="checkbox" name="active" checked>
		</div>
	</div>
	<div class="form-group">
		<label for="displayed" class="col-lg-6 control-label">Видимый клиенту:</label>
		<div class="col-lg-6" style="padding-top: 6px;">
			<input type="checkbox" name="displayed" checked>
		</div>
	</div>
	<input type="hidden" name="id" value="<?=(int)$model->id?>">
</form>
<script>
    $('.selectpicker').selectpicker({
        liveSearch: true
    });
</script>