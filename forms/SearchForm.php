<?php

namespace app\forms;

use app\models\book\Book;
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
                ],
                'integer',
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
}
