<?php

namespace app\controllers;

use app\forms\RegisterForm;
use Yii;
use yii\web\Controller;

class RegisterController extends Controller
{
    public function actionIndex()
    {
        $form = new RegisterForm();
        if (Yii::$app->request->isPost && $form->load(Yii::$app->request->post()) && $form->register()) {
            $this->redirect('../login');
        }
        return $this->render('index', ['model' => $form]);
    }
}
