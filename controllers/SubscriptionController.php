<?php

namespace app\controllers;

use yii\web\Controller;
use Yii;
use yii\filters\AccessControl;
use app\models\event\Subscription;
use yii\web\HttpException;

class SubscriptionController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'actions' => [
                            'create',
                            'delete',
                        ],
                        'allow'   => true,
                        'roles'   => [
                            '@',
                        ],
                    ],
                ],
            ],
        ];
    }

    public function actionCreate()
    {
        $subscription = new Subscription();
        $subscription->idEvent = (int)Yii::$app->request->get('id', 0);
        $subscription->idUser = Yii::$app->user->id;
        if (! $subscription->validate() || ! $subscription->save()) {
            throw new HttpException(404);
        }
        return $this->redirect('../event/index?id=' . $subscription->idEvent);
    }

    public function actionDelete()
    {
        $idEvent = (int)Yii::$app->request->get('id', 0);
        if ($subscription = Subscription::find()->where(['idEvent' => $idEvent])->andWhere(['idUser' => Yii::$app->user->id])->one()) {
            if (! $subscription->delete()) {
                throw new HttpException(404);
            }
            return $this->redirect('../event/index?id=' . $subscription->idEvent);
        }
        throw new HttpException(404);
    }
}
