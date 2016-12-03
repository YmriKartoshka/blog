<?php

namespace app\models\book;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%genre}}".
 *
 * @property integer $id
 * @property string  $name
 */
class Genre extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%genre}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [
                ['name'],
                'string',
                'max' => 255,
            ],
            [
                'name',
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
            'id' => 'ID',
            'name' => 'Name',
        ];
    }
}
