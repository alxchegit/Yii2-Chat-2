<?php


namespace frontend\controllers;


use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\Messages;
use frontend\models\ChatForm;

class ChatController extends Controller
{


    public function actionIndex ()
    {
        $messages = new Messages();
        $model = new ChatForm();
        $list = $messages::findAll(['status' => '10']);

        if($model->load(Yii::$app->request->post()) && $model->sendMessage()) {
             
            return $this->refresh();
        } else {
            
        }

        return $this->render('index',[
            'list' => $list,
            'model' => $model,
        ]);
    }
    
    public function actionHide() {
        
        $id = Yii::$app->request->post('id');
        $model = new Messages;
        return $model->hide($id);

    }
}