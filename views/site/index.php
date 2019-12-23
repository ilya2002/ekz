<?php

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\widgets\Pjax;
?> <img style=" margin-top:30px; margin-right: 200px;margin-left:50px; width:300px; float:left"; src="../../web/img/site.png">
<div class="site-index" >

    <div class="jumbotron">
        <h3>Добро пожаловать!</h3>
    </div>
     
     <?php \yii\widgets\Pjax::begin(); ?>
<?php if(Yii::$app->session['id'] != $model->id) { 
	echo " <h3 style='text-align: center;'>Chat</h3>
	<div class='slimScrollDiv' style=' border: 2px outset black; position: relative; overflow: auto; width: 40%; height: 230px; border-radius:5px'>
        <div id='chat-box' class='box-body ' style='margin: 0px 3px 0px 3.5px; width: auto; height: 350px'>
    </div> </div>";      
}
	?>
	
	 
<?php 
	if(Yii::$app->session['status'])
	{
		$form = ActiveForm::begin([
			'action' => 'index',
			'method' => 'post',
		]);
			 echo '<div class="chat">'; 
			 echo $form->field($chat_model, 'message')->textarea(['rows' => '3']);
			 echo Html::submitButton('Отправить', ['class' => 'btn']); 
			 echo '</div>'; 
		 ActiveForm::end();
	}
	?>
 <?php \yii\widgets\Pjax::end(); ?>

</div>

