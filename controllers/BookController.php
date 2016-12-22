<?php

namespace app\controllers;

use app\forms\BookForm;
use app\models\book\Genre;
use app\models\book\Author;
use app\models\book\Book;
use app\models\Comment;
use app\models\User;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\HttpException;
use app\forms\SearchForm;

class BookController extends Controller
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
                            'hide',
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
        $isModerator = false;
        if(null !== ($user = User::find()->where(['id' => Yii::$app->user->id])->one()) && $user->isModerator)
        {
            $isModerator = true;
        }
        $newcomment = new Comment();
        $id         = (int)Yii::$app->request->get('id', 0);
        if ($book = Book::find()->where(['id' => $id])->with('creator')->with('author')->with('genre')->with('comment')->one()) {
            $user = User::findOne(['profileId' => $book->creatorId]);
            return $this->render('index', [
                'model'        => $book,
                'newcomment'   => $newcomment,
                'userId'       => $user->id,
                'isModerator' => $isModerator,
            ]);
        }
        throw new HttpException(404);
    }

    public function actionCreate()
    {

        $user = User::find()->where(['id' => Yii::$app->user->id])->one();
        if(! $user->isBan)
        {
            $form = new BookForm();
            if (Yii::$app->request->isPost && $form->load(Yii::$app->request->post()) && $form->create()) {
                return $this->redirect('index?id=' . $form->getIdBook());
            }
            return $this->render('create', ['model' => $form]);
        }
        return $this->redirect('../login/logout');
    }

    static function getAuthors()
    {
        $authorsModels = Author::find()->all();
        return Author::toArrayAuthor($authorsModels);
    }

    static function getGenres()
    {
        $genresModels = Genre::find()->all();
        return Genre::toArrayGenre($genresModels);
    }

    public function actionUpdate()
    {
        $user = User::find()->where(['id' => Yii::$app->user->id])->one();
        if(! $user->isBan)
        {
            $id = (int)Yii::$app->request->get('id', 0);
            if ($book = Book::find()->where(['id' => $id])->one()) {
                if ($book->creatorId === Yii::$app->user->id) {
                    $form = new BookForm();
                    if (Yii::$app->request->isPost && $form->load(Yii::$app->request->post()) && $form->update($id)) {
                        return $this->redirect('index?id=' . $form->getIdBook());
                    }
                    $form->setAttributes($book->getAttributes());
                    $form->year = 2016 - $form->year;
                    return $this->render('update', ['model' => $form]);
                }
            }
            throw new HttpException(404);
        }
        return $this->redirect('../login/logout');
    }

    public function actionSearch()
    {
        $form  = new SearchForm();
        $books = new Book();
        if (Yii::$app->request->isPost && $form->load(Yii::$app->request->post())) {
            $books = $form->advancedSearchBook();
            if ($form->year !== "") {
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

    public function actionHide()
    {
        if(null !== ($user = User::find()->where(['id' => Yii::$app->user->id])->one()) && $user->isModerator)
        {
            $id = (int)Yii::$app->request->get('id', 0);
            if ($book = Book::find()->where(['id' => $id])->one()) {
                if($book->publish)
                {
                    $book->publish = 0;
                }
                else{
                    $book->publish = 1;
                }
                $book->save();
            }
            return $this->redirect('index?id=' . $id);
        }
        throw new HttpException(403);
    }
}
