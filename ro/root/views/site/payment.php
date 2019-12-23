<?php
namespace app\models;

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
?>
                   
<div class="content_container">
	<?php
	$form = Activeform::begin([
		'action' => 'payment?id_to='.$ticket_data['id_to'].
					'&id_from='.$ticket_data['id_from'].
					'&date_start='.$ticket_data['date_start'].
					'&date_end='.$ticket_data['date_end'].
					'&id_traintype='.$ticket_data['id_traintype'].
					'&fio='.$ticket_data['fio'].
					'&birthday='.$ticket_data['birthday'].
					'&passport='.$ticket_data['passport'].
					'&id_tickettype='.$ticket_data['id_tickettype'].
					'&phone='.$ticket_data['phone'].
					'&price='.$ticket_data['price'],
		'method' => 'post',
	]);
	?>
		<?= $form->field($model, 'card') ?>
		<?= $form->field($model, 'cvc') ?>
		<?= Html::submitButton('Подтвердить', ['class' => 'btn']) ?>
	<?php Activeform::end() ?>
</div>