<?php 
namespace app\models;

use Yii;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
?>
<div class="content_container">
	<?php
	$form = Activeform::begin([
		'action' => 'passengers?id_to='.$ticket_data['id_to'].
					'&id_from='.$ticket_data['id_from'].
					'&date_start='.$ticket_data['date_start'].
					'&date_end='.$ticket_data['date_end'].
					'&id_traintype='.$ticket_data['id_traintype'].
					'&count='.$ticket_data['count'].
					'&status='.$ticket_data['status'].
					'&price='.$ticket_data['price'],
		'method' => 'post',
	]);

	for($i = 0; $i < $ticket_data['count']; $i++)
	{
		echo 
		'<div class="ticket">
			'.$form->field($model, 'fio[]').'	
			'.$form->field($model, 'passport[]').'
			'.$form->field($model, 'id_tickettype[]')->dropDownList(
				ArrayHelper::map(Tickettype::find()->all(), 'id', 'name')
			).'		
			'.$form->field($model, 'birthday[]')->input("date").'	
			
		</div>';
	}
	?>
		<?= $form->field($model, 'phone') ?>
		<?= '<p class="price">Цена: '.$ticket_data['full_price'].'</p>' ?>

		<?php 
		if($ticket_data['status'] != 'Бронь')
			{
				echo $form->field($model, 'card');
				echo $form->field($model, 'cvc');
			}
		?>
		<?= Html::submitButton('Подтвердить', ['class' => 'btn']) ?>
	<?php Activeform::end() ?>
</div>