<?php

namespace app\models;

use Yii;

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
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
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
            [['email', 'createdDate', 'updatedDate', 'password', 'authKey', 'accessToken'], 'required'],
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
}
