<?php

namespace app\models;

use yii\db\ActiveRecord;
use yii\web\IdentityInterface;
use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string|null $email
 * @property string|null $username
 * @property int|null $gender
 * @property int|null $profile_picture
 * @property string|null $password
 * @property string|null $authKey
 * @property string|null $accessToken
 */
class User extends ActiveRecord implements IdentityInterface
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
            [['gender', 'profile_picture'], 'integer'],
            [['email', 'username', 'password', 'authKey', 'accessToken'], 'string', 'max' => 255],
            [['email'], 'unique'],
            [['username'], 'unique'],
            [['username', 'email', 'password', 'gender'], 'required']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'email' => Yii::t('app', 'Email'),
            'username' => Yii::t('app', 'Username'),
            'gender' => Yii::t('app', 'Gender'),
            'profile_picture' => Yii::t('app', 'Profile Picture'),
            'password' => Yii::t('app', 'Password'),
            'authKey' => Yii::t('app', 'Auth Key'),
            'accessToken' => Yii::t('app', 'Access Token'),
        ];
    }

    public static function findIdentity($id)
    {
        return self::findOne($id);
    }

    public static function findIdentityByAccessToken($accessToken, $type=null)
    {
        return self::findOne(['accessToken' => $accessToken]);
    }

    public static function findByUsername($username)
    {
        return self::findOne(['username' => $username]);
    }

    public static function findByEmail($email)
    {
        return self::findOne(['email' => $email]);
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAccessToken()
    {
        return $this->accessToken;
    }

    public function getAuthKey()
    {
        return $this->authKey;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    public function validatePassword($password)
    {
        return password_verify($password, $this->password);
    }
}
