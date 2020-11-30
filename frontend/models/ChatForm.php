<?php 

namespace frontend\models;

use Yii;
use yii\base\Model;
use common\models\Messages;



class ChatForm extends Model 
{
    public $text;


    public function rules()
    {
        return [
           ['text', 'trim'],
           ['text', 'required'],
           ['text', 'string'],
        ];
    }

    public function sendMessage() {

        if(!Yii::$app->user->isGuest) {
            if (!$this->validate()) {
                return null;
            }   

            $message = new Messages;
            $message->text = $this->text;
            $message->author = Yii::$app->user->identity->username;
            
            return $message->save();
        } else {
            return Yii::$app->session->setFlash('error', 'Необходимо зарегаться чтобы отправлять сообщения!');
        }
    }
}