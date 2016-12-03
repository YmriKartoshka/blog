<?php

namespace app\models\book;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%author}}".
 *
 * @property integer $id
 * @property string  $firstName
 * @property string  $lastName
 * @property string  $secondName
 * @property string  $birthDay
 * @property string  $deathDay
 */
class Author extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%author}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [
                [
                    'birthDay',
                    'deathDay',
                ],
                'safe',
            ],
            [
                [
                    'firstName',
                    'lastName',
                    'secondName',
                ],
                'string',
                'max' => 255,
            ],
            [
                [
                    'firstName',
                    'lastName',
                    'secondName',
                    'birthDay',
                    'deathDay',
                ],
                'required',
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
            'firstName'  => 'First Name',
            'lastName'   => 'Last Name',
            'secondName' => 'Second Name',
            'birthDay'   => 'Birth Day',
            'deathDay'   => 'Death Day',
        ];
    }
}
