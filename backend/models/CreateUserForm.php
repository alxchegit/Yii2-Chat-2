<?php
namespace backend\models;

use Yii;
use yii\base\Model;
use common\models\User;

/**
 * Create User form
 */
class CreateUserForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $status;
    public $role;

    public $new_user_id;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'Такой логин уже используется.'],
            ['username', 'string', 'min' => 3, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],

            ['password', 'required'],
            ['password', 'string', 'min' => Yii::$app->params['user.passwordMinLength']],
           
            ['status', 'in', 'range' => User::rangeStatus()],
            
            ['role', 'in', 'range' => User::rangeRole()],
        ];
    }

    /**
     * Creating user in db.
     *
     * @return bool whether the creating new account was successful and email was sent
     */
    public function create()
    {        
        if (!$this->validate()) {
            return null;
        }
        
        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->status = $this->status;
        $user->role = $this->role;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        $user->generateEmailVerificationToken();
//        $user->role = $user->setRoleUser();
//        return $user->save() && $this->sendEmail($user);  //отключаем верификацию по почте
        if($user->save()){
            $this->new_user_id = $user->id;
            return true; 
        }

        return null;
    }
 
}
