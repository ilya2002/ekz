<?php
namespace app\models;

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
?>

<div class="content_container">
	<h2>Добавление поезда</h2>
	<?php $form = ActiveForm::begin([
		'action' => 'addtrain',
		'method' => 'post',
		'options' => ['enctype' => 'multipart/form-data'],
	]) ?>
		<?= $form->field($model, 'name') ?>
		<?= $form->field($model, 'image')->fileInput() ?>
		<?= $form->field($model, 'info')->textarea(['rows' => '10']) ?>
		<?= Html::submitButton('Добавить', ['class' => 'btn']) ?>
	<?php ActiveForm::end() ?>
</div>