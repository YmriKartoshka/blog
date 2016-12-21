<?php

namespace app\controllers;

use app\forms\EventForm;
use app\models\book\Book;
use app\models\Comment;
use app\models\event\Event;
use app\models\User;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\HttpException;
use app\forms\SearchForm;

class EventController extends Controller
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
                            'search',
                        ],
                        'allow'   => true,
                        'roles'   => [
                            '?',
                            '@',
                        ],
                    ],
                    [
                        'actions' => [
                            'update',
                            'create',
                        ],
                        'allow'   => true,
                        'roles'   => ['@'],
                    ],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        $newcomment = new Comment();
        $id         = (int)Yii::$app->request->get('id', 0);
        if ($event = Event::find()->where(['id' => $id])->with('creator')->with('book')->with('comment')->with('subscription')->one()) {
            $user = User::findOne(['profileId' => $event->creatorId]);
            return $this->render('index', [
                'model'      => $event,
                'newcomment' => $newcomment,
                'userId'     => $user->id,
            ]);
        }
        throw new HttpException(404);
    }

    public function actionCreate()
    {
        $form = new EventForm();
        if (Yii::$app->request->isPost && $form->load(Yii::$app->request->post()) && $form->create()) {
            return $this->redirect('index?id=' . $form->getIdEvent());
        }
        return $this->render('create', ['model' => $form]);
    }

    static function getBooks()
    {
        $bookModels = Book::find()->all();
        return Book::toArrayBook($bookModels);
    }

    public function actionUpdate()
    {
        $id = (int)Yii::$app->request->get('id', 0);
        if ($event = Event::find()->where(['id' => $id])->one()) {
            if ($event->creatorId === Yii::$app->user->id) {
                $form = new EventForm();
                if (Yii::$app->request->isPost && $form->load(Yii::$app->request->post()) && $form->update($id)) {
                    return $this->redirect('index?id=' . $form->getIdEvent());
                }
                $form->setAttributes($event->getAttributes());
                return $this->render('update', ['model' => $form]);
            }
        }
        throw new HttpException(404);
    }

    public function actionSearch()
    {
        $form   = new SearchForm();
        $events = new Event();
        if (Yii::$app->request->isPost && $form->load(Yii::$app->request->post())) {
            $events = $form->advancedSearchEvent();
            return $this->render('search', [
                'events' => $events,
                'search' => $form,
            ]);
        }
        return $this->render('search', [
            'events' => $events->getEvents(),
            'search' => $form,
        ]);
    }
}
