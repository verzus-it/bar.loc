<?php

namespace app\models;

use mdm\admin\components\UserStatus;
use mdm\admin\models\User as mdmUser;
use Yii;
use yii\helpers\ArrayHelper;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string|null $name Имя
 * @property string|null $surname Фамилия
 * @property string|null $birthdate Дата рождения
 * @property string|null $gender Пол
 * @property string $email Почта
 * @property string|null $phone Телефон в международном формате
 * @property string $createdDate Дата создания
 * @property string $updatedDate Дата изменения
 * @property string $password Пароль
 * @property string $authKey Ключ
 * @property string $accessToken Токен доступа
 * @property int $active
 * @property int $status
 */
class User  extends mdmUser{
    /**
     * {@inheritdoc}
     */
    
    public $status = 10;
    
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['birthdate', 'createdDate', 'updatedDate'], 'safe'],
            [['email', 'password', 'active'], 'required'],
            [['active'], 'integer'],
            [['name', 'surname'], 'string', 'max' => 50],
            [['gender'], 'string', 'max' => 20],
            [['email', 'phone'], 'string', 'max' => 100],
            [['password', 'authKey', 'accessToken'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'surname' => 'Surname',
            'birthdate' => 'Birthdate',
            'gender' => 'Gender',
            'email' => 'Email',
            'phone' => 'Phone',
            'createdDate' => 'Created Date',
            'updatedDate' => 'Updated Date',
            'password' => 'Password',
            'authKey' => 'Auth Key',
            'accessToken' => 'Access Token',
            'active' => 'Active',
        ];
    }
	
	public static function findByEmail($email){
		return static::findOne(['email' => $email]);
	}
	
	public function validatePassword($password)
	{
		return md5($password) == $this->password;
	}
	
	public function getFullname() {
		return ArrayHelper::getValue($this, function ($user) {
			return $user->name . ' ' . $user->surname;
		});
	}
	
	public function getUsername() {
		return ArrayHelper::getValue($this, function ($user) {
			return $user->name . ' ' . $user->surname;
		});
	}
	
	public function getStatus(){
    	return 10;
	}
	
	public static function findIdentity($id)
	{
		return static::findOne($id);
	}
	
	/**
	 * Finds an identity by the given token.
	 *
	 * @param string $token the token to be looked for
	 * @return IdentityInterface|null the identity object that matches the given token.
	 */
	public static function findIdentityByAccessToken($token, $type = null)
	{
		return static::findOne(['accessToken' => $token]);
	}
	
	/**
	 * @return int|string current user ID
	 */
	public function getId()
	{
		return $this->id;
	}
	
	/**
	 * @return string|null current user auth key
	 */
	public function getAuthKey()
	{
		return $this->authKey;
	}
	
	/**
	 * @param string $authKey
	 * @return bool|null if auth key is valid for current user
	 */
	public function validateAuthKey($authKey)
	{
		return $this->getAuthKey() === $authKey;
	}
}
