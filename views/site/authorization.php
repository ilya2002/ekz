<?php 
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
?>

<div class="content_container">
	<?php $form = ActiveForm::begin([
		'action' => 'author',
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