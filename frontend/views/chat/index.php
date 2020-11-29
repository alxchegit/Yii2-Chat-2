<?php
    $this->title = 'Чат на Yii2-фреймворк';

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
        <div class="message_input_wrapper">
            <input class="message_input" placeholder="Type your message here..." /></div>
        <div class="send_message">
            <div class="icon"></div>
            <div class="text">Send</div>
        </div>
    </div>
</div>