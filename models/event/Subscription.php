<?php

namespace app\models\event;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%subscriptions}}".
 *
 * @property integer $idEvent
 * @property integer $idUser
 */
class Subscription extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%subscriptions}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [
                [
                    'idEvent',
                    'idUser',
                ],
                'required',
            ],
            [
                [
                    'idEvent',
                    'idUser',
                ],
                'integer',
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idBook'  => 'Id Event',
            'idGenre' => 'Id User',
        ];
    }
}
