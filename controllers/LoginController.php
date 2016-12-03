<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\forms\LoginForm;

class LoginController extends Controller
{
    public function actionIndex()
    {
        $form = new LoginForm();
        if (Yii::$app->request->isPost && $form->load(Yii::$app->request->post()) && $form->login()) {
            return $this->redirect('..');
        }
        return $this->render('index', ['model' => $form]);
    }

    public function actionLogout()
    {
        if (! Yii::$app->user->isGuest) {
            Yii::$app->user->logout();
        }
        return $this->redirect('../..');
    }
}
