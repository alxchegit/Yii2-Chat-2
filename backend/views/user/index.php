<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Пользователи';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create User', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'username',
           // 'auth_key',
            //'password_reset_token',
            'email:email',
            ['attribute' => 'created_at' , 'label'=>'Создание', 'format' => ['date', 'php:Y-m-d H:i:s']],
            ['attribute' => 'updated_at' , 'label'=>'Изменение', 'format' => ['date', 'php:Y-m-d H:i:s']],
            //'verification_token',
            ['attribute' => 'role', 'label'=> 'Роль', 
                'value' => function($data){
                    if($data->role == 1){
                        $res = "1 (Админ)";
                    }
                    if($data->role == 0){
                        $res = "0 (Пользователь)";
                    }
                    return $res;
                }    
            ],
            ['attribute' => 'status', 'label'=> 'Статус', 
                'value' => function($data){
                    if($data->status == 10){
                        $res = "10 (Активный)";
                    }
                    if($data->status == 9){
                        $res = "9 (Неактивный)";
                    }
                    return $res;
                }    
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
