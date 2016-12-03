<?php

namespace app\models\book;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%balink}}".
 *
 * @property integer $idBook
 * @property integer $idAuthor
 */
class Balink extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%balink}}';
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
                    'idAuthor',
                ],
                'required',
            ],
            [
                [
                    'idBook',
                    'idAuthor',
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
            'idBook' => 'Id Book',
            'idAuthor' => 'Id Author',
        ];
    }
}
