<?php

namespace app\controllers;

use app\models\book\Bclink;
use app\models\event\Eclink;
use Yii;
use yii\web\Controller;
use app\models\Comment;
use yii\web\HttpException;

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

    public function actionCreatebook()
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

    public function actionCreateevent()
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
}
