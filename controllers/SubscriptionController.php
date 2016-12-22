<?php

namespace app\controllers;

use yii\web\Controller;
use Yii;
use yii\filters\AccessControl;
use app\models\event\Subscription;
use yii\web\HttpException;
use app\models\event\Event;
use app\models\User;

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
                    [
                        'actions' => [
                            'index',
                        ],
                        'allow'   => true,
                        'roles'   => [
                            '?',
                            '@',
                        ],
                    ],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        $id = (int)Yii::$app->request->get('id', 0);
        if ($event = Event::find()->where(['id' => $id])->with('creator')->with('book')->with('subscriptions')->one()) {
            $user = User::findOne(['profileId' => $event->creatorId]);
            return $this->render('index', [
                'model'      => $event,
                'userId'     => $user->id,
            ]);
        }
        throw new HttpException(404);
    }

    public function actionCreate()
    {
        $user = User::find()->where(['id' => Yii::$app->user->id])->one();
        if(! $user->isBan)
        {
            $subscription          = new Subscription();
            $subscription->idEvent = (int)Yii::$app->request->get('id', 0);
            $subscription->idUser  = Yii::$app->user->id;
            $event = Event::find()->where(['id' => $subscription->idEvent])->one();
            if($event->publish)
            {
                if (! $subscription->validate() || ! $subscription->save()) {
                    throw new HttpException(404);
                }
            }
            return $this->redirect('../event/index?id=' . $subscription->idEvent);
        }
        return $this->redirect('../login/logout');
    }

    public function actionDelete()
    {
        $user = User::find()->where(['id' => Yii::$app->user->id])->one();
        if(! $user->isBan)
        {
            $idEvent = (int)Yii::$app->request->get('id', 0);
            if ($subscription = Subscription::find()->where(['idEvent' => $idEvent])->andWhere(['idUser' => Yii::$app->user->id])->one()) {
                if ($subscription->idUser === Yii::$app->user->id) {
                    if (! $subscription->delete()) {
                        throw new HttpException(404);
                    }
                    return $this->redirect('../event/index?id=' . $subscription->idEvent);
                }
            }
            throw new HttpException(404);
        }
        return $this->redirect('../login/logout');
    }
}
