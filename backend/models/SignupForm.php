<?php
namespace backend\models;
use yii;
use yii\base\Model;
use common\models\User;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            [['username','password'], 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => '此用户名已经使用过.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => '邮箱已经使用过.'],
            ['password', 'string', 'min' => 6],
        ];
    }
    public function attributeLabels(){
    	return [
    	'id' => 'ID',
    	'username' =>Yii::t('app','Username'),
    	'password' =>Yii::t('app','Password'),
    	'email' =>Yii::t('app','Email'),
    	'status'=>Yii::t('app','Status'),
    	'created_at'=>\Yii::t('app','Create Date'),
    	'updated_at'=>Yii::t('app','Update Date')
    	];
    }
    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        
        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        
        return $user->save() ? $user : null;
    }
}
