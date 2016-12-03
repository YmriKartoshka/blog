<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "{{%user}}".
 *
 * @property integer $id
 * @property string  $login
 * @property string  $passwordHash
 * @property integer $profileId
 * @property integer $isBan
 * @property integer $isModerator
 */
class User extends ActiveRecord implements IdentityInterface
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [
                [
                    'login',
                    'passwordHash',
                    'profileId',
                ],
                'required',
            ],
            [
                [
                    'profileId',
                    'isBan',
                    'isModerator',
                ],
                'integer',
            ],
            [
                ['login'],
                'string',
                'max' => 50,
            ],
            [
                ['passwordHash'],
                'string',
                'max' => 255,
            ],
            [
                ['login'],
                'unique',
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id'           => 'ID',
            'login'        => 'Login',
            'passwordHash' => 'Password Hash',
            'profileId'    => 'Profile ID',
            'isBan'        => 'Is Ban',
            'isModerator'  => 'Is Moderator',
        ];
    }

    public function validatePasswordHash($password)
    {
        return Yii::$app->security->validatePassword($password, $this->passwordHash);
    }

    public static function findByLogin($login)
    {
        return self::find()->where(['login' => $login])->one();
    }

    public static function isLoginUnique($login)
    {
        return ! self::find()->where(['login' => $login])->exists();
    }

    public function validateAuthKey($value)
    {
        return;
    }

    public function getId()
    {
        return $this->id;
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        return;
    }

    public function getAuthKey()
    {
        return;
    }

    public static function findIdentity($id)
    {
        return static::findOne($id);
    }
}

