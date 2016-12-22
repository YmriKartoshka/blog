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
use app\models\book\Book;
use app\models\event\Event;

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
                            'events',
                            'block',
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
        $isModerator = false;
        if(null !== ($user = User::find()->where(['id' => Yii::$app->user->id])->one()) && $user->isModerator)
        {
            $isModerator = true;
        }
        $id    = (int)Yii::$app->request->get('id', 0);
        $books = Book::find()->where(['creatorId' => $id])->all();
        if ($profile = Profile::find()->where(['id' => $id])->one()) {
            $user = User::find()->where(['id' => $id])->one();
            return $this->render('index', [
                'profile' => $profile,
                'books'   => $books,
                'isModerator' => $isModerator,
                'isBan' => $user->isBan,
            ]);
        }
        throw new HttpException(404);
    }

    public function actionEvents()
    {
        $isModerator = false;
        if(null !== ($user = User::find()->where(['id' => Yii::$app->user->id])->one()) && $user->isModerator)
        {
            $isModerator = true;
        }
        $id     = (int)Yii::$app->request->get('id', 0);
        $events = Event::find()->where(['creatorId' => $id])->all();
        if ($profile = Profile::find()->where(['id' => $id])->one()) {
            $user = User::find()->where(['id' => $id])->one();
            return $this->render('events', [
                'profile' => $profile,
                'events'  => $events,
                'isModerator' => $isModerator,
                'isBan' => $user->isBan,
            ]);
        }
        throw new HttpException(404);
    }

    public function actionUpdate()
    {
        $user = User::find()->where(['id' => Yii::$app->user->id])->one();
        if(! $user->isBan)
        {
            if ($profile = Profile::find()->where(['id' => Yii::$app->user->id])->one()) {
                if (Yii::$app->request->isPost && $profile->load(Yii::$app->request->post()) && $profile->update($id)) {
                    return $this->redirect('index?id=' . $profile->id);
                }
                return $this->render('update', ['profile' => $profile]);
            }
            throw new HttpException(404);
        }
        return $this->redirect('../login/logout');
    }

    public function actionChange()
    {
        $user = User::find()->where(['id' => Yii::$app->user->id])->one();
        if(! $user->isBan)
        {
            if ($user = User::find()->where(['profileId' => Yii::$app->user->id])->one()) {
                $changePasswordForm = new ChangePasswordForm();
                if (Yii::$app->request->isPost && $changePasswordForm->load(Yii::$app->request->post()) && $changePasswordForm->changePassword($id)) {
                    $profile = Profile::find()->where(['id' => $id])->one();
                    return $this->redirect('index?id=' . $profile->id);
                }
                return $this->render('change', ['passForm' => $changePasswordForm]);
            }
            throw new HttpException(404);
        }
        return $this->redirect('../login/logout');
    }

    public function actionBlock()
    {
        if(null !== ($user = User::find()->where(['id' => Yii::$app->user->id])->one()) && $user->isModerator)
        {
            $id = (int)Yii::$app->request->get('id', 0);
            if ($user = User::find()->where(['id' => $id])->one()) {
                if($user->isBan)
                {
                    $user->isBan = 0    ;
                }
                else{
                    $user->isBan = 1;
                }
                $user->save();
            }
            return $this->redirect('index?id=' . $id);
        }
        throw new HttpException(403);
    }
}

