<?php

namespace app\controllers;

use yii\web\Controller;
use Yii;
use app\forms\AuthorForm;
use yii\filters\AccessControl;

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
        $form = new AuthorForm();
        if (Yii::$app->request->isPost && $form->load(Yii::$app->request->post()) && $form->create()) {
            return $this->redirect('../book/create');
        }
        return $this->render('index', ['model' => $form]);
    }
}
