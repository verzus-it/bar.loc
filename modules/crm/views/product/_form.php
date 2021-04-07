<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Product */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>
	
	<?= $form->field($model, 'recipe')->textarea(['rows' => 6]) ?>
	
	<?= $form->field($model, 'whatToDo')->textarea(['rows' => 6]) ?>
	
	<?= $form->field($model, 'image')->fileInput() ?>
	
	<?= $form->field($model, 'productCategory')->dropDownList([
		'coctail' => 'Коктейль',
		'other' => 'Другое'
	]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
