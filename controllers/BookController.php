<?php

namespace app\controllers;

use app\forms\BookForm;
use app\models\book\Book;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\HttpException;

class BookController extends Controller
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
        $id = (int)Yii::$app->request->get('id', 0);
        if ($book = Book::find()->where(['id' => $id])->with('author')->one()) {
            $this->render('index', ['model' => $book->getAttributes()]);
        }
        throw new HttpException(404);
    }

    public function actionCreate()
    {
        $form = new BookForm();
        if (Yii::$app->request->isPost && $form->load(Yii::$app->request->post()) && $form->create()) {
            return $this->redirect('index?id=' . $form->getIdBook());
        }

        return $this->render('create', ['model' => $form]);
    }

    public function getAuthors() {
        $authors = [
            0 => 'Пушкин А.С.',
            1 => 'Лермонтов М.Ю.',
            2 => 'Пупкин Вася',];
        return $authors;
    }

    public function getGenres() {
        $authors = [
            0 => 'Фантастика',
            1 => 'Детектив',
            2 => 'Роман',];
        return $authors;
    }

    public function actionUpdate()
    {
        $id = (int)Yii::$app->request->get('id', 0);
        if ($book = Book::find()->where(['id' => $id])->one()) {
            $form = new BookForm();
            $form->name = 'asd';
            $form->description = '124123';
            $form->idAuthor = 2;
            $form->idGenre = 2;
            if (/*Yii::$app->request->isPost && $form->load(Yii::$app->request->post()) &&*/ $form->update($id)) {

                return $this->redirect('index?id=' . $form->getIdBook());
            }
            $form->setAttributes($book->getAttributes());

            return $this->render('update', ['model' => $form]);
        }
        throw new HttpException(404);
    }
}
