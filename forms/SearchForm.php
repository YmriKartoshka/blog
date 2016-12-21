<?php

namespace app\forms;

use app\models\book\Book;
use app\models\event\Event;
use yii\base\Model;
use app\models\book\Author;
use app\models\book\Genre;
use yii\db\Query;
use yii\helpers\ArrayHelper;

class SearchForm extends Model
{
    public $name;
    public $description;
    public $year     = null;
    public $authorId = null;
    public $genreId  = null;
    public $date     = null;
    public $bookId   = null;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [
                [
                    'name',
                    'description',
                ],
                'string',
                'max' => 255,
            ],
            [
                [
                    'year',
                    'authorId',
                    'genreId',
                    'bookId',
                ],
                'integer',
            ],
            [
                [
                    'date',
                ],
                'date',
            ],
            [
                ['authorId'],
                'exist',
                'skipOnError'     => true,
                'targetClass'     => Author::class,
                'targetAttribute' => ['authorId' => 'id'],
            ],
            [
                ['genreId'],
                'exist',
                'skipOnError'     => true,
                'targetClass'     => Genre::class,
                'targetAttribute' => ['genreId' => 'id'],
            ],
            [
                ['genreId'],
                'exist',
                'skipOnError'     => true,
                'targetClass'     => Genre::class,
                'targetAttribute' => ['genreId' => 'id'],
            ],
        ];
    }

    public function searchBook()
    {
        return Book::find()->filterWhere([
            'like',
            'name',
            $this->name,
        ])->orderBy('id')->all();
    }

    public function advancedSearchBook()
    {
        $query = (new Query())->select('id')->from(Book::tableName())->filterWhere([
            'like',
            'name',
            $this->name,
        ])->andFilterWhere([
            'like',
            'description',
            $this->description,
        ]);
        if ($this->authorId !== "") {
            $query->andWhere(['authorId' => $this->authorId]);
        }
        if ($this->genreId !== "") {
            $query->andWhere(['genreId' => $this->genreId]);
        }
        if ($this->year !== "") {
            $this->year = 2016 - $this->year;
            $query->andWhere(['year' => $this->year]);
        }
        $ids = $query->orderBy('id')->all();
        $ids = ArrayHelper::getColumn($ids, 'id');

        return Book::find()->where(['id' => $ids])->orderBy('id')->all();
    }

    public function searchEvent()
    {
        return Event::find()->filterWhere([
            'like',
            'name',
            $this->name,
        ])->orderBy('id')->all();
    }

    public function advancedSearchEvent()
    {
        $query = (new Query())->select('id')->from(Event::tableName())->filterWhere([
            'like',
            'name',
            $this->name,
        ])->andFilterWhere([
            'like',
            'description',
            $this->description,
        ]);
        if ($this->date !== "") {
            $query->andWhere(['date' => $this->date]);
        }
        if ($this->bookId !== "") {
            $query->andWhere(['bookId' => $this->bookId]);
        }
        $ids = $query->orderBy('id')->all();
        $ids = ArrayHelper::getColumn($ids, 'id');

        return Event::find()->where(['id' => $ids])->orderBy('id')->all();
    }
}
