<?php

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE HTML>
<html>
<head>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Курортный сервис</title>

<!-- Behavioral Meta Data -->
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    
   <?php $this->head() ?>
</head>

<body>
<?php $this->beginBody() ?>
<a name="ancre"></a>

<!-- CACHE -->
<div style="height:50px; width: 100%;  background-color: #4682B4; position: fixed;
position: relative;"> <div style="width: 200px;"><a href="../site/index"><div class='logo'><img style="width:40px"; src="../../web/img/galochka.png"></div> <div style="font-size: 18px; text-decoration: none; color: black; position: absolute; margin-left: 70px">Курортный </br>    сервис</div></a></div><div class="right-menu">

    <?php
    
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            !Yii::$app->session['status'] ? (

            ['label' => 'Войти', 'url' => ['../site/signup']])
            : ['label' => 'Выйти', 'url' => ['../site/logout']]],
    ]);
    ?></div><ul id="nnavv">
   
    <li>
        <a href="../site/about" title="Здесь информация о компании">О нас</a>
        
    </li>
   
    <li>
        <a href="../site/sotrudniki" title="Здесь напишите свои контакты">Сотрудники</a>
    </li>
</ul>

<div style="min-height:800px; height:100%; width: 113px; background-color: #4682B4; margin-top: 50px; position: absolute;">
   <?php
    echo Nav::widget([
        'options' => ['class' => ''],
        'items' => [
            Yii::$app->session['status'] ? (
            ['label' => 'Личный кабинет', 'linkOptions' =>['class' =>'knopki'], 'url' => ['../site/cabinet?id='.Yii::$app->session['id']]]) : ['label' => 'Для посетителей', 'linkOptions' =>['class' =>'knopki'], 'url' => ['/site/contact']],
        
    ]]);
    ?>
</div> 
  
</div> <div class="container" style="margin-left: 110px; margin-top: 30px; position: relative;">
        
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
