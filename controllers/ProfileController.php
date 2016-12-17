<?php
/**
 * Created by PhpStorm.
 * User: minaevaolga
 * Date: 12/5/16
 * Time: 10:40 PM
 */

namespace app\controllers;
use yii\web\Controller;
use yii\filters\AccessControl;

class ProfileController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'actions' => ['index'],
                        'allow'   => true,
                        'roles'   => [
                            '@',
                        ],
                    ],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }
}

