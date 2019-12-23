<?php

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
?>

<div class="content_container">
	<h2>Добавление станции</h2>
	<?php $form = ActiveForm::begin([
		'action' => 'addstation',
		'method' => 'post',
	]) ?>
		<?= $form->field($model, 'name') ?>
		<?= Html::submitButton('Добавить', ['class' => 'btn']) ?>
	<?php ActiveForm::end() ?>
</div>