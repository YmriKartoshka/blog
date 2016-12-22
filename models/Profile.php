<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%profile}}".
 *
 * @property integer $id
 * @property string  $firstName
 * @property string  $lastName
 * @property string  $secondName
 * @property string  $email
 * @property integer $phone
 */
class Profile extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%profile}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [
                ['phone'],
                'string',
            ],
            [
                [
                    'firstName',
                    'lastName',
                    'secondName',
                ],
                'string',
                'max' => 50,
            ],
            [
                ['email'],
                'string',
                'max' => 100,
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id'         => 'ID',
            'firstName'  => 'First name',
            'lastName'   => 'Last name',
            'secondName' => 'Second name',
            'email'      => 'Email',
            'phone'      => 'Phone',
        ];
    }

    public function beforeSave($insert)
    {
        $this->firstName = addslashes($this->firstName);
        $this->secondName = addslashes($this->secondName);
        $this->lastName = addslashes($this->lastName);
        return parent::beforeSave($insert);
    }

    public static function isPhoneUnique($phone)
    {
        return ! self::find()->where(['phone' => $phone])->exists();
    }

    public static function isEmailUnique($email)
    {
        return ! self::find()->where(['email' => $email])->exists();
    }
}
