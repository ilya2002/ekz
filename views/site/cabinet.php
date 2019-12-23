<?php

use yii\helpers\Html;
use yii\bootstrap\Nav;
?>
<div style='width: 105px; height: 105px; border: 3px double black; float: left;'><img style="width: 100px" src="../../web/img/h.png"></div><div style="width: 800px">
<div style="margin-left: 130px; "><h4> Никнейм: <?= $model->username ?></h4></div><br>
<div style="margin-left: 130px; "><h4> ФИО: <?= $model->fio ?></h4></div><br>
<div style="margin-left: 130px; "><h4> Почта: <?= $model->email ?></h4></div>

<div class="menu-cabinet">
<?php if(!Yii::$app->session['id'] != $model->id) {
    echo Nav::widget([
        'options' => ['class' => 'panel'],
        'items' => [
            Yii::$app->session['id_roles']== '1' ? (['label' => 'Пользователи', 'linkOptions' =>['class' =>'knopki'], 'url' => ['../user']]
            ) : ['label' => 'Исходящие задачи','linkOptions' =>['class' =>'knopki'], 'url' => ['/site/ishzadachi?id='.$model->id]],
             Yii::$app->session['id_roles']== '1' ? (
            ['label' => 'Задачи', 'linkOptions' =>['class' =>'knopki'], 'url' => ['../tasks']]) : ['label' => ' Входящие задачи', 'linkOptions' =>['class' =>'knopki'], 'url' => ['../site/zadachi?id='.$model->id]],
              Yii::$app->session['id_roles']== '1' ? (
            ['label' => 'Должности', 'linkOptions' =>['class' =>'knopki'], 'url' => ['../post']]) :['label' => 'Задачи', 'linkOptions' =>['class' =>'knopki'], 'url' => ['../tasks/create']],  

    ]]); 

    if(Yii::$app->session['id'] != $model->id) { echo "
            <a  href='../tasks/create'> <div style='padding: 4px; margin-top: -4px'class='knopki panel'> Дать задачу </div> </a> ";}

            }

    ?> 
</div>