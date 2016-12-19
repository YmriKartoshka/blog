<?php

namespace app\models\book;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%bclink}}".
 *
 * @property integer $idBook
 * @property integer $idComment
 */
class Bclink extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%bclink}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [
                [
                    'idBook',
                    'idComment',
                ],
                'required',
            ],
            [
                [
                    'idBook',
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
            'idBook'    => 'Id Book',
            'idComment' => 'Id Comment',
        ];
    }
}
