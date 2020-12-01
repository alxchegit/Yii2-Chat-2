<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Messages */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="messages-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'author')->textInput() ?>
    <?= $form->field($model, 'text')->textInput() ?>
    <?= $form->field($model, 'status')->dropdownList(['10'=>'Отображать','9'=>'Скрыть','0'=>'Скрыть от всех'])->hint('Значания: 10 - показ, 9 - скрыто от пользователей, 0 - скрыто от всех и даже админа') ?>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
