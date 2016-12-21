<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\book\Book;
use app\models\event\Event;
use app\forms\SearchForm;

class SiteController extends Controller
{
    public function actionIndex()
    {
        $form  = new SearchForm();
        $books = new Book();
        if (Yii::$app->request->isPost && $form->load(Yii::$app->request->post())) {
            $books = $form->searchBook();
            return $this->render('index', [
                'books'  => $books,
                'search' => $form,
            ]);
        }
        return $this->render('index', [
            'books'  => $books->getBooks(),
            'search' => $form,
        ]);
    }

    public function actionEvents()
    {
        $form   = new SearchForm();
        $events = new Event();
        if (Yii::$app->request->isPost && $form->load(Yii::$app->request->post())) {
            $events = $form->searchEvent();
            return $this->render('events', [
                'events' => $events,
                'search' => $form,
            ]);
        }
        return $this->render('events', [
            'events' => $events->getEvents(),
            'search' => $form,
        ]);
    }
}
