<?php

/* @var $this yii\web\View */
use yii\helpers\Html;

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Добро пожаловать!</h1>

        <p class="lead">Вы зашли на сайт созданный на Yii2.</p>

        <p></p>

        <p> <?= HTML::a('Перейти в чат', '/chat/index', ['class' => 'btn btn-lg btn-success']) ?> </p>
    </div>

    <div class="body-content">

        <div class="row">
            
        </div>

    </div>
</div>
