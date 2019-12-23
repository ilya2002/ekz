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

  if ($model->process=='переделать'){
   
   echo "<div style=' background: red; margin-top: 40px; width: 100px; margin-left: 200px;'>
 Переделать!
    </div>";
}
?>
<?php 
  Modal::begin([
'header' => '<h2>Добавьте текст и файл</h2>',
'toggleButton' => [
    'label'=> 'Выполнить',
'tag'=> 'button',
'class' => 'knopki'
]

  ])
    ?> 

    <?php 
     $form = ActiveForm::begin(); ?>
 <?= $form->field($model1, 'text')->textInput() ?>

    <?= $form->field($model2, 'file')->fileInput()?>

    <div> 
<?=  Html::submitButton('Добавить', ['class' => 'btn btn-success','name'=>'task-button'])    ?>
    </div>
     <?php ActiveForm::end(); ?>
<?php
Modal::end();
?>


