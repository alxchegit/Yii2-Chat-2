<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\MessagesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Messages';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="messages-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Messages', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            ['attribute' => 'text', 'label'=> 'Сообщение', 'format' =>'ntext'],
            ['attribute' => 'author', 'label'=>'Автор'],
            ['attribute' => 'created_at' , 'label'=>'Создание', 'format' => ['date', 'php:Y-m-d H:i:s']],
            ['attribute' => 'updated_at' , 'label'=>'Изменение', 'format' => ['date', 'php:Y-m-d H:i:s']],
            //'updated_at:datetime', // короткий вид записи формата по умолчанию 
            // 'status',
            ['attribute' => 'status', 'label'=> 'Статус', 
                'value' => function($data){
                    if($data->status == 10){
                        $res = "10 (Отображать)";
                    }
                    if($data->status == 9){
                        $res = "9 (Скрыто)";
                    }
                    if($data->status == 0){
                        $res = "0 (Скрыть от всех)";
                    }
                    return $res;
                }    
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
