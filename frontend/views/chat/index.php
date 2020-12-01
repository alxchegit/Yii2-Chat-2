<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ChatForm */
/* @var $list  \yii\db\ActiveRecord */


use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

    $this->title = 'Чат на Yii2-фреймворк';
    $isAdmin = Yii::$app->user->identity->username === 'admin';
    
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

            <?php

                if(!$isAdmin && $message['status'] != 10) {
                    continue;
                }
                $class ='';
                If($isAdmin && $message['status']<10) {
                    $class .= ' admin_hidden ';
                }
                if(Yii::$app->user->identity->username === $message['author']) {
                    $class .= "right";
                } else {
                    $class .= 'left';
                }

            ?>

                <li class="message <?= $class ?> appeared">
                    <div class="message-id" hidden><?= $message['id']; ?></div>
                    <div class="avatar"></div>
                    <div class="text_wrapper">
                        <div class="text">
                            <p><strong><?= $message['author'] ?><?= ( $message['isAdmin'] ) ? " (АДМИН) ":"" ?></strong></p>
                            <p><?= $message['text']; ?></p>
                            <div class="message-timestamp"><?= date("Y-m-d H:i:s", $message['created_at']); ?></div>
                            <?php if($isAdmin){ ?>
                                <div class="message-admin_toolbar">
                                    <?php if($message['status']<10) :?>
                                        <span class='tool-hide on'>Восстановить</span>
                                    <?php endif; ?>
                                    <?php if($message['status']==10) :?>
                                        <span class='tool-hide off'>Скрыть</span>
                                    <?php endif; ?>
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
            'placeholder' => 'Пиши сюда скорее...'
            ])
        ->label(false) ?>  
 
 
     
        <?= Html::submitButton('Отправить', ['class' => 'send_message text', 'name' => 'send-message']) ?>
     
    <?php ActiveForm::end(); ?>
    
    </div>
</div>
</div>