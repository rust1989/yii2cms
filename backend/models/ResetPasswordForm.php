<?php
namespace backend\models;
use Yii;
use yii\base\Model;
use yii\base\InvalidParamException;
use common\models\User;
/**
 * Password reset form
 */
class ResetPasswordForm extends Model
{
	const STATUS_DELETED = 0;
	const STATUS_ACTIVE = 1;
	
    public $password;
    public $id;
    public $status;
    public $username;

    /**
     * @var \common\models\User
     */
    private $_user;


    /**
     * Creates a form model given a token.
     *
     * @param string $token
     * @param array $config name-value pairs that will be used to initialize the object properties
     * @throws \yii\base\InvalidParamException if token is empty or not valid
     */
    public function __construct($id, $config = [])
    {
        parent::__construct($config);
        if (empty($id) || !is_string($id)) {
            throw new InvalidParamException('用户id不能为空');
        }
        $this->_user = User::findOne($id);
        $this->id=$this->_user->id;
        $this->status=$this->_user->status;
        $this->username=$this->_user->username;
        return $this->_user;
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['password', 'string', 'min' => 6],
            ['status', 'default', 'value' => self::STATUS_ACTIVE],
            ['status', 'in', 'range' => [self::STATUS_ACTIVE, self::STATUS_DELETED]],
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
     * Resets password.
     *
     * @return bool if password was reset.
     */
    public function resetPassword()
    {
        $user = $this->_user;
        if($this->password)$user->setPassword($this->password);
        $user->status=$this->status;
        return $user->save(false);
    }
}
