<?php
namespace app\models;

use Yii;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
?>

<div class="content_container main">
	<h2>Купить билеты</h2>
	<?php 
	if(Yii::$app->request->url == '/site/index')
	{
		$path = '';
	}
	else
	{
		$path = 'site/';
	}

	$form = ActiveForm::begin([
		'action' => $path.'timetable',
		'method' => 'post',
	]) ?>
		<?= $form->field($model, 'date_start')->input('date')->label('Выберете дату') ?>
		<?= $form->field($model, 'id_from')->label('Откуда')->dropDownList(
				ArrayHelper::map(Station::find()->all(), 'id', 'name')
			) ?>
		<?= $form->field($model, 'id_to')->label('Куда')->dropDownList(
				ArrayHelper::map(Station::find()->all(), 'id', 'name')
			) ?>
		<?= Html::submitButton('Найти', ['class' => 'btn']) ?>
	<?php ActiveForm::end() ?>
	<h2 style="margin-top: 50px">Оплатить забронированный билет</h2>
	<?php
	$form = ActiveForm::begin([
		'action' => $path.'findbook',
		'method' => 'post',
	]) ?>
		<?= $form->field($ticket, 'fio') ?>
		<?= $form->field($ticket, 'passport') ?>
		<?= $form->field($ticket, 'id_tickettype')->dropDownList(
				ArrayHelper::map(Tickettype::find()->all(), 'id', 'name')
			) ?>
		<?= $form->field($ticket, 'id_traintype')->dropDownList(
				ArrayHelper::map(Traintype::find()->all(), 'id', 'name')
			) ?>
		<?= $form->field($ticket, 'id_from')->label('Откуда')->dropDownList(
				ArrayHelper::map(Station::find()->all(), 'id', 'name')
			) ?>
		<?= $form->field($ticket, 'id_to')->label('Куда')->dropDownList(
				ArrayHelper::map(Station::find()->all(), 'id', 'name')
			) ?>
		<?= $form->field($ticket, 'date_start')->input('date')->label('Дата отбытия') ?>
		<?= Html::submitButton('Найти', ['class' => 'btn']) ?>
	<?php ActiveForm::end() ?>
</div>