<?php 
namespace app\models;

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
?>

<div class="content_container">
	<h2>Редактирование станции</h2>
	<?php $form = ActiveForm::begin([
		'action' => 'updatestation?id='.$model->id,
		'method' => 'post',
	]) ?>
		<?= $form->field($model, 'name') ?>
		<?= Html::submitButton('Сохранить', ['class' => 'btn']) ?>
	<?php ActiveForm::end() ?>
</div>