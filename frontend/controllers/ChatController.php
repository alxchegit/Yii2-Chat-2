<?php


namespace frontend\controllers;


use Yii;
use yii\web\Controller;
use common\models\Messages;
use frontend\models\ChatForm;

class ChatController extends Controller
{


    public function actionIndex ()
    {

        $messages = new Messages();
        $model = new ChatForm();
        $list = $messages::findAll(['status' => [0,9,10]]);

        if($model->load(Yii::$app->request->post()) && $model->sendMessage()) {
             
            return $this->refresh();
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

    public function actionShow() {
        $id = Yii::$app->request->post('id');
        $model = new Messages;
        return $model->show($id);
    }

}