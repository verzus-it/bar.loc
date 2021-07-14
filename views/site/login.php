<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Авторизация';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">
	<div class="site-login col-lg-offset-3 col-lg-6">
		<h1 class="text-center"><?= Html::encode($this->title) ?></h1>
		
		<?php $form = ActiveForm::begin([
			'id' => 'login-form',
			'layout' => 'horizontal',
			'fieldConfig' => [
				'template' => "{label}\n<div class=\"col-lg-9\">{input}</div>\n<div class=\"col-lg-offset-2 col-lg-10\">{error}</div>",
				'labelOptions' => ['class' => 'col-lg-2 control-label'],
			],
		]); ?>
		
		<?= $form->field($model, 'email')->textInput(['autofocus' => true]) ?>
		
		<?= $form->field($model, 'password')->passwordInput()->label('Пароль') ?>

		<div class="form-group">
			<div class="col-lg-offset-2 col-lg-10">
				<?= Html::submitButton('Войти', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
			</div>
		</div>
		
		<?php ActiveForm::end(); ?>
	</div>
</div>