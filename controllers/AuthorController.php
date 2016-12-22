<?php

namespace app\controllers;

use yii\web\Controller;
use Yii;
use app\forms\AuthorForm;
use yii\filters\AccessControl;
use app\models\User;

class AuthorController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'actions' => ['create'],
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
        $user = User::find()->where(['id' => Yii::$app->user->id])->one();
        if(! $user->isBan)
        {
            $form = new AuthorForm();
            if (Yii::$app->request->isPost && $form->load(Yii::$app->request->post()) && $form->create()) {
                return $this->redirect('../site/index');
            }
            return $this->render('index', ['model' => $form]);
        }
        return $this->redirect('../login/logout');
    }
}
