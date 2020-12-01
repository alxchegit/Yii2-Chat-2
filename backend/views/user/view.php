<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->title = $model->username;
$this->params['breadcrumbs'][] = ['label' => 'Пользователь', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="user-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены что хотите удалить этого пользователя?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'username',
            'auth_key',
            'password_hash',
            'password_reset_token',
            'email:email',
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
            ['attribute' => 'created_at' , 'label'=>'Создание', 'format' => ['date', 'php:Y-m-d H:i:s']],
            ['attribute' => 'updated_at' , 'label'=>'Изменение', 'format' => ['date', 'php:Y-m-d H:i:s']],
            'verification_token',
            ['attribute' => 'role', 'label'=> 'Роль', 
            'value' => function($data){
                if($data->role === 1){
                    $res = "1 (Админ)";
                }
                if($data->role === 0){
                    $res = "0 (Пользователь)";
                }
                return $res;
            }    
        ],
        ],
    ]) ?>

</div>
