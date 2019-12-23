<?php 
namespace app\models;

use Yii;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
?>
<div class="content_container">
	<script>
		function func(e)
		{
			var div = document.getElementById('price');
			switch(e)
			{
				case '3':
					div.innerHTML = 'Цена за билет: 1800 руб.';
					break;
				case '4':
					div.innerHTML = 'Цена за билет: 3000 руб.';
					break;
				case '5':
					div.innerHTML = 'Цена за билет: 8000 руб.';
					break;	
			}
		}
	</script>
	<?php
	$form = Activeform::begin([
		'action' => Yii::$app->request->url,
		'method' => 'post',
	]) ?>
	<div class="form-group field-mine required">
		<label for="" class="control-label">Количество билетов
			<?php echo '<input id="timetable-count" type="number" oninput="f(this);" class="form-control" required min="1" max="'.$timetable->count.'" name="Timetable[count]">' ?>
		</label>
		<p class="help-block help-block-error"></p>
	</div>
	
		<?= $form->field($model, 'id_traintype')->dropDownList(
				ArrayHelper::map(Traintype::find()->all(), 'id', 'name'),
				['onchange' => 'func(this.value);']
			) ?>
		<?= '<div id="price" class="price">Цена за билет: 1800 руб.</div>' ?>
		<?= Html::submitButton('Дальше', ['class' => 'btn']) ?>
	<?php Activeform::end() ?>
</div>
<?php 
echo
'<script>
	function fun(e)
	{
		var el = document.getElementById("w0");

		el.action = "'.Yii::$app->request->url.'&count=" + e.value;
	}
	var t = document.getElementById("timetable-count");
	window.onload = fun(t);

	function f(e)
	{
		var el = document.getElementById("w0");

		el.action = "'.Yii::$app->request->url.'&count=" + e.value;
	}
</script>';
?>
