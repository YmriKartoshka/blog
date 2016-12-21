<?php

namespace app\models\event;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%eclink}}".
 *
 * @property integer $idEvent
 * @property integer $idComment
 */
class Eclink extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%eclink}}';
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
                    'idComment',
                ],
                'required',
            ],
            [
                [
                    'idEvent',
                    'idComment',
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
            'idBook'    => 'Id Event',
            'idComment' => 'Id Comment',
        ];
    }
}
