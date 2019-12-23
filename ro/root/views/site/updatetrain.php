<?php 
namespace app\models;

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
?>

<div class="content_container">
	<h2>Редактирование поезда</h2>
	<?php $form = ActiveForm::begin([
		'action' => 'updatetrain?id='.$model->id,
		'method' => 'post',
	]) ?>
		<?= $form->field($model, 'name') ?>
		<?= $form->field($model, 'image')->fileInput() ?>
		<?= $form->field($model, 'info')->textarea(['rows' => '10']) ?>
		<?= Html::submitButton('Сохранить', ['class' => 'btn']) ?>
	<?php ActiveForm::end() ?>
</div>