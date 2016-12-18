<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\book\Book;
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

    public function actionSearch()
    {
        $form  = new SearchForm();
        $books = new Book();
        if (Yii::$app->request->isPost && $form->load(Yii::$app->request->post())) {
            $books = $form->advancedSearchBook();
            if($form->year !== "")
            {
                $form->year = 2016 - $form->year;
            }
            return $this->render('search', [
                'books'  => $books,
                'search' => $form,
            ]);
        }
        return $this->render('search', [
            'books'  => $books->getBooks(),
            'search' => $form,
        ]);
    }
}
