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
use Yii;
use app\models\Profile;
use yii\web\HttpException;

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
        $id = (int)Yii::$app->request->get('id', 0);
        if ($profile = Profile::find()->where(['id' => $id])->one()) {
            return $this->render('index', ['profile' => $profile]);
        }
        throw new HttpException(404);
    }
}

