<?php

namespace app\models\book;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%bglink}}".
 *
 * @property integer $idBook
 * @property integer $idGenre
 */
class Bglink extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%bglink}}';
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
                    'idGenre',
                ],
                'required',
            ],
            [
                [
                    'idBook',
                    'idGenre',
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
            'idGenre' => 'Id Genre',
        ];
    }
}
