<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Messages */

$this->title = "Просмотр сообщения: " . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Сообщения', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="messages-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены что хотите удалить это сообщение?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'text:ntext',
            'author',
            ['attribute' => 'created_at' , 'label'=>'Создание', 'format' => ['date', 'php:Y-m-d H:i:s']],
            ['attribute' => 'updated_at' , 'label'=>'Изменение', 'format' => ['date', 'php:Y-m-d H:i:s']],
            ['attribute' => 'status', 'label'=> 'Статус', 
                'value' => function($data){
                    if($data->status == 10){
                        $res = "10 (Отображать)";
                    }
                    if($data->status == 9){
                        $res = "9 (Скрыто)";
                    }
                    if($data->status == 0){
                        $res = "0 (Скрыто от всех)";
                    }
                    return $res;
                }    
            ],
        ],
    ]) ?>

</div>
