<?php

namespace app\controllers;

use app\forms\RegisterForm;
use Yii;
use yii\web\Controller;
use yii\filters\AccessControl;

class RegisterController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'actions' => [
                            'index',
                        ],
                        'allow'   => true,
                        'roles'   => [
                            '?',
                        ],
                    ],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        $form = new RegisterForm();
        if (Yii::$app->request->isPost && $form->load(Yii::$app->request->post()) && $form->register()) {
            $this->redirect('../login');
        }
        return $this->render('index', ['model' => $form]);
    }
}
