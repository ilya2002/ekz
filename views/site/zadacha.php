<?php

use yii\helpers\Html;
use yii\bootstrap\Modal;
use yii\widgets\ActiveForm;
?>

<div style="margin-left: 130px; "><h4> Название: <?= $model->name ?></h4></div><br>
<div style="margin-left: 130px; "><h4> Описание: <?= $model->description ?></h4></div><br>
<div style="margin-left: 130px; "><h4> Назначена: <?= $model->start ?></h4></div>
<div style="margin-left: 130px; "><h4> Нужно сдать: <?= $model->end ?></h4></div>
<?php

foreach ($file as $key) {
    if($model->id == $key->comment->tasks->id_task)
    {
      echo "<div style='margin: 50px ;width: 400px; border: 1px solid black'> Комментарий: ".$key->comment->text."</div>
      <a class='file' href='Http://localhost/web/upload/".$key->file."'download> Скачать файл </a><br>";
    };
}
  ?>

<? foreach ($model as $el) {
  if ($el->process != 'В работе'
  ){
 } 
   

     
     $form = ActiveForm::begin(); 
  echo ' 

    <div>'. 
 Html::submitButton('Доработать', ['onclick'=>'location.href="pere?id='.$model->id.'"'], ['class' => 'knopki']).'
    </div>';
 ActiveForm::end(); 
 
break;}
 echo Html::Button('Готово', ['onclick'=>'location.href="da?id='.$model->id.'"'], ['class' => 'knopki']); ?>
