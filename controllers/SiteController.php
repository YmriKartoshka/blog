<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\User;
use app\models\Post;
use \yii\web\HttpException;

class SiteController extends Controller
{
    public function actionIndex()
    {
		return $this->render('index');
    }
}
