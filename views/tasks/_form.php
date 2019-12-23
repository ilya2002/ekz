<?php
namespace app\models;

use yii\helpers\Html;
use Yii;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model app\models\Tasks */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tasks-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>


   <div id="id" > <?= $form->field($model1, 'id_hirer[]')->dropDownList(
    \yii\helpers\ArrayHelper::map(User::find()->leftJoin('post','`post`.`id`=`user`.`id_post`')->where(['<','post.authority',Yii::$app->session['authority']])->all(), 'id', 'username')
) ?></div> 
<div class='knopki'; onclick="addHirer();"> Добавить сотрудника
</div>
    <?= $form->field($model, 'start')->Input(date) ?>

    <?= $form->field($model, 'end')->Input(date) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
