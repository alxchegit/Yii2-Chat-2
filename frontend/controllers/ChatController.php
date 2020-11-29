<?php


namespace frontend\controllers;


use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\Messages;

class ChatController extends Controller
{


    public function actionIndex ()
    {
        $messages = new Messages();
        $list = $messages::findAll(['status' => '10']);
        return $this->render('index',[
            'list' => $list,
        ]);
    }
}