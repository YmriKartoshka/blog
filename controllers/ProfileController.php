<?php
/**
 * Created by PhpStorm.
 * User: minaevaolga
 * Date: 12/5/16
 * Time: 10:40 PM
 */

namespace app\controllers;

use app\forms\ChangePasswordForm;
use yii\web\Controller;
use yii\filters\AccessControl;
use Yii;
use app\models\Profile;
use app\models\User;
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
                        'actions' => [
                            'index',
                            'update',
                            'change',
                        ],
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

    public function actionUpdate()
    {
        $id = (int)Yii::$app->request->get('id', 0);
        if ($profile = Profile::find()->where(['id' => $id])->one()) {
            if (Yii::$app->request->isPost && $profile->load(Yii::$app->request->post()) && $profile->update($id)) {
                return $this->redirect('index?id=' . $profile->id);
            }
            return $this->render('update', ['profile' => $profile]);
        }
        throw new HttpException(404);
    }

    public function actionChange()
    {
        $id = (int)Yii::$app->request->get('id', 0);
        if ($user = User::find()->where(['profileId' => $id])->one()) {
            $changePasswordForm = new ChangePasswordForm();
            if (Yii::$app->request->isPost && $changePasswordForm->load(Yii::$app->request->post()) && $changePasswordForm->changePassword($id)) {
                $profile = Profile::find()->where(['id' => $id])->one();
                return $this->redirect('index?id=' . $profile->id);
            }
            return $this->render('change', ['passForm' => $changePasswordForm]);
        }
        throw new HttpException(404);
    }
}

