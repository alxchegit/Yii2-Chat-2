<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ChatForm */

$this->title = 'Чат на Yii2-фреймворк';

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

?>


<div class="chat_window">
    <div class="top_menu">
        <div class="buttons">
            <div class="button close"></div>
            <div class="button minimize"></div>
            <div class="button maximize"></div>
        </div>
        <div class="title">Chat</div>
    </div>
    <ul class="messages">
        <?php foreach ($list as $message):?>
            <?php if(Yii::$app->user->identity->username === $message['author']) {?>
                <li class="message right appeared">
                    <div class="avatar"></div>
                    <div class="text_wrapper">
                        <div class="text">
                            <p><strong><?= $message['author'] ?></strong></p>
                            <?= $message['text']; ?>
                        </div>
                    </div>
                </li>
            <?php } else { ?>
                <li class="message left appeared">
                    <div class="avatar"></div>
                    <div class="text_wrapper">
                        <div class="text">
                            <p><strong><?= $message['author'] ?></strong></p>
                            <?= $message['text'] ?>
                        </div>
                    </div>
                </li>
            <?php } ?>


        <?php endforeach;?>
    </ul>
    <div class="bottom_wrapper clearfix">
    <?php $form = ActiveForm::begin([
        'id' => 'form-signup',
        
        ]); ?>
 
    <?= $form->field($model, 'text')
        ->textinput([
            'autofocus' => true, 
            'class'=>'message_input',
            'placeholder' => 'Type your message here...'
            ])
        ->label(false) ?>  
 
 
     
        <?= Html::submitButton('Send', ['class' => 'send_message text', 'name' => 'send-message']) ?>
     
    <?php ActiveForm::end(); ?>
    
    </div>
</div>