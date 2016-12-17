<?php

namespace app\controllers;

use yii\web\Controller;
use app\models\book\Book;

class SiteController extends Controller
{
    public function actionIndex()
    {
        $books = new Book();
        return $this->render('index', ['books' => $books->getBooks()]);
    }
}
