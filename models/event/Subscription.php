<?php

namespace app\models\event;

use yii\db\ActiveRecord;
use app\models\Profile;

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
            [
                ['idEvent'],
                'exist',
                'skipOnError'     => true,
                'targetClass'     => Event::class,
                'targetAttribute' => ['idEvent' => 'id'],
            ],
            [
                ['idUser'],
                'exist',
                'skipOnError'     => true,
                'targetClass'     => Profile::class,
                'targetAttribute' => ['idUser' => 'id'],
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

    static function hasSubscription($idUser, $idEvent)
    {
        return self::find()->where(['idUser' => $idUser])->andWhere(['idEvent' => $idEvent])->exists();
    }
}
