<?php
/**
 * Created by PhpStorm.
 * User: minaevaolga
 * Date: 12/5/16
 * Time: 10:40 PM
 */

namespace app\controllers;
use yii\web\Controller;

class ProfileController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
}

