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
            echo '<pre>';
            print_r($book);
            die;
            $this->render('index', ['model' => $book->getAttributes()]);
        }
        throw new HttpException(404);
    }

    public function actionCreate()
    {
        $form = new BookForm();
        if (Yii::$app->request->isPost && $form->load(Yii::$app->request->post()) && $form->create()) {

            // fixme: Убери 2 строчки, чтобы вызывался рендер
            print_r($form->getIdBook());
            die;

            return $this->redirect('index?id=' . $form->getIdBook());
        }

        // fixme: Убери 3 строчки, чтобы вызывался рендер
        echo '<pre>';
        print_r($form->getAttributes());
        die;

        $this->render('index', ['model' => $form]);
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
                // fixme: Убери 2 строчки, чтобы вызывался рендер
                print_r($form->getIdBook());
                die;

                return $this->redirect('index?id=' . $form->getIdBook());
            }
            $form->setAttributes($book->getAttributes());

            // fixme: Убери 3 строчки, чтобы вызывался рендер
            echo '<pre>';
            print_r($form->getAttributes());
            die;

            $this->render('update', ['model' => $form]);
        }
        throw new HttpException(404);
    }
}
