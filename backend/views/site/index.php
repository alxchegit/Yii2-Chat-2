<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
use yii\helpers\Html;
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Добро пожаловать Админ!</h1>

        <p class="lead">Тут такое случилось в твоё отсутствие... Срочно приступай к своей админской работе</p>

    </div>

    <div class="body-content">

        <div class="row">
        	<div class="col-md-4 col-lg-4">
        		<p style="height: 100px;">Вернутся в чат </p>
        		<p> <?= HTML::a('Перейти в Чат', '/chat/index', ['class'=>'btn btn-lg btn-success']) ?> </p>
        	</div>
        	<div class="col-md-4 col-lg-4">
        		<p style="height: 100px;">Перейти в раздел для управления пользователями. В нем вы может удалять, добавлять и редактировать юзеров. </p>
        		<p> <?= HTML::a('Пользователи', '/user/index', ['class'=>'btn btn-lg btn-success']) ?> </p>
        	
        	</div>
        	<div class="col-md-4 col-lg-4">
        		<p style="height: 100px;">Перейти в раздел по управлению сообщениями. </p>
        		<p> <?= HTML::a('Сообщения', '/messages/index', ['class'=>'btn btn-lg btn-success']) ?> </p>
        	
        	</div>
        </div>

    </div>
</div>
