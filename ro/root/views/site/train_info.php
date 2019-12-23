<?php 
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
?>
<div class="content_container">
	<?php
	$model->info = nl2br($model->info);
	echo '<img src="/web/'.$model->image.'" width="300px">';
	echo '<p class="info"><b>Название: </b>'.$model->name.'</p>';
	echo '<p class="info">'.$model->info.'</p>';
	echo '<p class="comments_title">Комментарии:</p>';
	?>
	
	<?php 
	if(Yii::$app->session['status'])
	{
		$form = ActiveForm::begin([
			'action' => 'train_info?id='.$model->id,
			'method' => 'post',
		]);
			 echo '<div class="comment">'; 
			 echo '<p>Логин: '.Yii::$app->session['login'].'</p>'; 
			 echo $form->field($comment_model, 'text')->textarea(['rows' => '10']);
			 echo Html::submitButton('Отправить', ['class' => 'btn']); 
			 echo '</div>'; 
		 ActiveForm::end();
	}
	?>
	
	<?php
	
	foreach($comments as $comment)
	{
		echo
		"
		<div id='comments' class='comment'>
			<p>Логин: ".$comment->user->login."</p>Сообщение:<br>
			<div class='text'>".$comment->text."</div>			
		</div>
		";
	}
	?>
</div>