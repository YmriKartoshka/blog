<?php

namespace app\controllers;

use app\models\book\Bclink;
use app\models\event\Eclink;
use app\models\User;
use Yii;
use yii\web\Controller;
use app\models\Comment;
use yii\web\HttpException;
use yii\filters\AccessControl;

class CommentController extends Controller
{
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'actions' => [
                            'createbook',
                            'createevent',
                            'hidebook',
                            'hideevent',
                        ],
                        'allow'   => true,
                        'roles'   => ['@'],
                    ],
                ],
            ],
        ];
    }

    public function actionCreatebook()
    {
        $user = User::find()->where(['id' => Yii::$app->user->id])->one();
        if(! $user->isBan)
        {
            $newcomment = new Comment();
            if (Yii::$app->request->isPost && $newcomment->load(Yii::$app->request->post())) {
                $id = Yii::$app->request->post('createBook-button');
                if (! $newcomment->save()) {
                    Yii::$app->getResponse()->redirect(['site/index']);
                }
                $link            = new Bclink();
                $link->idBook    = $id;
                $link->idComment = $newcomment->id;
                if (! $link->save()) {
                    Yii::$app->getResponse()->redirect(['site/index']);
                }
                return $this->redirect('../book/index?id=' . $id);
            }
            throw new HttpException(404);
        }
        return $this->redirect('../login/logout');
    }

    public function actionCreateevent()
    {
        $user = User::find()->where(['id' => Yii::$app->user->id])->one();
        if(! $user->isBan)
        {
            $newcomment = new Comment();
            if (Yii::$app->request->isPost && $newcomment->load(Yii::$app->request->post())) {
                $id = Yii::$app->request->post('createEvent-button');
                if (! $newcomment->save()) {
                    Yii::$app->getResponse()->redirect(['site/index']);
                }
                $link            = new Eclink();
                $link->idEvent   = $id;
                $link->idComment = $newcomment->id;
                if (! $link->save()) {
                    Yii::$app->getResponse()->redirect(['site/index']);
                }
                return $this->redirect('../event/index?id=' . $id);
            }
            throw new HttpException(404);
        }
        return $this->redirect('../login/logout');
    }

    public function actionHidebook()
    {
        if(null !== ($user = User::find()->where(['id' => Yii::$app->user->id])->one()) && $user->isModerator)
        {
            $id = (int)Yii::$app->request->get('id', 0);
            $book = (int)Yii::$app->request->get('book', 0);
            if ($comment = Comment::find()->where(['id' => $id])->one()) {
                if($comment->isShown)
                {
                    $comment->isShown = 0;
                }
                else{
                    $comment->isShown = 1;
                }
                $comment->save();
            }
            return $this->redirect('../book/index?id=' . $book);
        }
        throw new HttpException(403);
    }

    public function actionHideevent()
    {
        if(null !== ($user = User::find()->where(['id' => Yii::$app->user->id])->one()) && $user->isModerator)
        {
            $id = (int)Yii::$app->request->get('id', 0);
            $event = (int)Yii::$app->request->get('event', 0);
            if ($comment = Comment::find()->where(['id' => $id])->one()) {
                if($comment->isShown)
                {
                    $comment->isShown = 0;
                }
                else{
                    $comment->isShown = 1;
                }
                $comment->save();
            }
            return $this->redirect('../event/index?id=' . $event);
        }
        throw new HttpException(403);
    }
}
