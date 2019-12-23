<?php
namespace app\models;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password')->textarea(['rows' => 3]) ?>

    <?= $form->field($model, 'fio')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textarea(['rows' => 3]) ?>
    
    <?= $form->field($model, 'id_post')->dropDownList(
    \yii\helpers\ArrayHelper::map(Post::find()->where($id_group=>'id_group')->all(), 'id', 'name')
) ?>

     <?= $form->field($model, 'id_roles')->dropDownList(
    \yii\helpers\ArrayHelper::map(Roles::find()->all(), 'id', 'name')
) ?>


    <div class="form-group">
        <?= Html::submitButton('Добавить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
