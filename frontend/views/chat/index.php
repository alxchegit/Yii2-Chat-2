<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ChatForm */

$this->title = 'Чат на Yii2-фреймворк';

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;


    

    $isAdmin = (Yii::$app->user->identity->username === 'admin') ? true : false;
    
?>

<div class="row">
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

            <?php if(Yii::$app->user->identity->username === $message['author']) {
                $class = "right";    
            } else {
                $class = 'left';
            } ?>

                <li class="message <?= $class ?> appeared">
                    <div class="message-id" hidden><?= $message['id']; ?></div>
                    <div class="avatar"></div>
                    <div class="text_wrapper">
                        <div class="text">
                            <p><strong><?= $message['author'] ?></strong></p>
                            <p><?= $message['text']; ?></p>
                            <div class="message-timestamp"><?= date("Y-m-d H:i:s", $message['created_at']); ?></div>
                            <?php if($isAdmin){ ?>
                                <div class="message-admin_toolbar">
                                    <span class='tool-hide'>Скрыть</span>
                                </div>
                            <?php }?>
                            
                        </div>
                    </div>
                </li>


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
</div>