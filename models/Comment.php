<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\db\Expression;

/**
 * This is the model class for table "{{%comment}}".
 *
 * @property integer $id
 * @property string  $message
 * @property integer $grade
 * @property integer $isShown
 * @property integer $creatorId
 * @property integer $createDate
 */
class Comment extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%comments}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [
                ['message'],
                'string',
                'max' => 100,
            ],
            [
                ['creatorId'],
                'exist',
                'skipOnError'     => true,
                'targetClass'     => Profile::class,
                'targetAttribute' => ['creatorId' => 'id'],
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
            'message'    => 'Message',
            'createDate' => 'Create Date',
            'creatorId'  => 'Creator ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuthor()
    {
        return $this->hasOne(Profile::class, ['id' => 'creatorId']);
    }

    public function getComment($id_comment)
    {
        return $this->findOne($id_comment);
    }

    public function beforeSave($insert)
    {
        if ($this->isNewRecord) {
            $this->creatorId  = Yii::$app->user->id;
            $this->createDate = new Expression('now()');
        }
        return parent::beforeSave($insert);
    }
}
