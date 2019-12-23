<?php 
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
?>

<div class="content_container">
	<h2>Авторизация</h2>
	<?php $form = ActiveForm::begin([
		'action' => 'authorization',
		'method' => 'post',
	]) ?>
		<?= $form->field($model, 'login') ?>
		<?= $form->field($model, 'password')->passwordInput() ?>
		<?= Html::submitButton('Войти', ['class' => 'btn']) ?>
		<?php 
		if(isset($error))
		{
			echo '<br><p class="error">'.$error.'</p>';
		}
		?>
	<?php ActiveForm::end() ?>	
</div>