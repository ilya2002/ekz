<?php
/**
 * @var yiiwebView $this
 * @var appmodelsMessage $message
 * @var yiidbActiveQuery $messagesQuery
 */
?>
<?php yiiwidgetsPjax::begin([
    'id' => 'list-messages',
    'enablePushState' => false,
    'formSelector' => false,
    'linkSelector' => false
]) ?>
<?= $this->render('_list', compact('messagesQuery')) ?>
<?php yiiwidgetsPjax::end() ?>
<?php yiiwidgetsActiveForm::begin(['options' => ['class' => 'pjax-form']]) ?>
<?= yiibootstrapHtml::activeTextarea($message, 'text') ?>
<?= yiihelpersHtml::submitButton('Отправить') ?>
<?php yiiwidgetsActiveForm::end() ?>
