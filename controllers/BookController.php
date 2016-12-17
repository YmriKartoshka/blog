<?php

namespace app\controllers;

use app\forms\BookForm;
use app\models\book\Genre;
use app\models\book\Author;
use app\models\book\Book;
use app\models\User;
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
        if ($book = Book::find()->where(['id' => $id])->with('author')->with('genre')->one()) {
            $user = User::findOne(['profileId' => $book->creatorId]);
            return $this->render('index', [
                'model'  => $book,
                'userId' => $user->id,
            ]);
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

    public function getAuthors()
    {
        $authorsModels = Author::find()->all();
        return Author::toArrayAuthor($authorsModels);
    }

    public function getGenres()
    {
        $genresModels = Genre::find()->all();
        return Genre::toArrayGenre($genresModels);
    }

    public function actionUpdate()
    {
        $id = (int)Yii::$app->request->get('id', 0);
        if ($book = Book::find()->where(['id' => $id])->one()) {
            $form = new BookForm();
            if (Yii::$app->request->isPost && $form->load(Yii::$app->request->post()) && $form->update($id)) {
                return $this->redirect('index?id=' . $form->getIdBook());
            }
            $form->setAttributes($book->getAttributes());
            return $this->render('update', ['model' => $form]);
        }
        throw new HttpException(404);
    }
}
