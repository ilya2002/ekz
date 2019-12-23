<?php 
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
?>
<div class='content_container'>
	<h2>Регистрация</h2>
	<?php $form = ActiveForm::begin([
		'action' => 'registration',
		'method' => 'post',
	]) ?>
		<?= $form->field($model, 'fio') ?>
		<?= $form->field($model, 'login') ?>
		<?= $form->field($model, 'password')->passwordInput() ?>
		<?= $form->field($model, 'mail') ?>
		<?= Html::submitButton('Зарегистрироваться', ['class' => 'btn']) ?>
	<?php ActiveForm::end() ?>
</div>
