<?php
 
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>
 
<?php $form = ActiveForm::begin([
		'action' => 'author',
		'method' => 'post',
	]) ?>
	<h3>Введите Логин и пароль для входа:</h3>
<?= $form->field($model, 'username') ?>
<?= $form->field($model, 'password')->passwordInput() ?>
<div class="form-group">
    <div>
        <?= Html::submitButton('вход', ['class' => 'btn btn-success']) ?>
    </div>
</div>
<?php ActiveForm::end() ?>