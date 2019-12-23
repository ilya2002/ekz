<?php 
namespace app\models;

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
?>

<div class="content_container">
	<h2>Редактирование расписания</h2>
	<?php $form = ActiveForm::begin([
		'action' => 'updatetimetable?id='.$model->id,
		'method' => 'post',
	]) ?>
		<?= $form->field($model, 'id_train')->dropDownList(
				ArrayHelper::map(Train::find()->all(), 'id', 'name')
			) ?>
		<?= $form->field($model, 'id_from')->dropDownList(
				ArrayHelper::map(Station::find()->all(), 'id', 'name')
			) ?>
		<?= $form->field($model, 'id_to')->dropDownList(
				ArrayHelper::map(Station::find()->all(), 'id', 'name')
			) ?>
		<?= $form->field($model, 'date_start')->input('datetime-local') ?>
		<?= $form->field($model, 'date_end')->input('datetime-local') ?>
		<?= Html::submitButton('Сохранить', ['class' => 'btn']) ?>
	<?php ActiveForm::end() ?>
</div>