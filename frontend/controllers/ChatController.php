<?php


namespace frontend\controllers;


use Yii;
use yii\db\Query;
use yii\web\Controller;
use common\models\Messages;
use frontend\models\ChatForm;

class ChatController extends Controller
{


    public function actionIndex ()
    {

         
        $model = new ChatForm();
                
        $query = "SELECT `messages`.`id`, `messages`.`text`, `messages`.`author`, `messages`.`created_at`, `messages`.`updated_at`, `messages`.`status` AS 'status', `user`.`email` as 'email', `user`.`role` as isAdmin 
                FROM `messages` 
                JOIN `user` ON `messages`.`author` = `user`.`username` 
                WHERE `messages`.`status` >= 0";

        $list = Yii::$app->db->createCommand($query)->queryAll();

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