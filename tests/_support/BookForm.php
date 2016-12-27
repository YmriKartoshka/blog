<?php

namespace app\forms;

use app\models\book\Book;
use app\models\User;
use yii\base\Model;

/**
 * BookForm is the model behind the book form.
 *
 * @property User|null $user This property is read-only.
 *
 */
class BookForm extends Model
{
    public  $name;
    public  $description;
    public  $year;
    public  $authorId;
    public  $genreId;
    public  $coverImage;
    private $book;

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
                    //'coverImage',
                    'authorId',
                    'genreId',
                    'year',
                ],
                'required',
            ],
            [
                'name',
                'string',
                'max' => 50,
            ],
            [
                'year',
                'integer',
            ],
        ];
    }

    public function attributeLabels()
    {
        return [
            'authorId' => 'Author',
            'genreId'  => 'Genre',
        ];
    }

    public function create()
    {
        if (! $this->validate()) {
            $this->addError('name', 'Не прошла валидация');
            return false;
        }

        $this->book = new Book();
        $this->book->setAttributes($this->getAttributes());
        $this->book->year = 2016 - $this->book->year;
        if (! $this->book->save()) {
            $this->addError('name', 'Ошбка при сохранении книги в БД');
            return false;
        }
        return true;
    }

    public function update($id)
    {
        if (! $this->validate()) {
            return false;
        }
        $this->book = Book::find()->where(['id' => $id])->one();
        if($this->book != null)
        {
            $this->book->setAttributes($this->getAttributes());
            $this->book->year = 2016 - $this->book->year;
            if (! $this->book->save()) {
                $this->addError('name', 'Ошбка при сохранении книги в БД');
                return false;
            }
            return true;
        }
        return false;
    }

    public function getIdBook()
    {
        return $this->book->id;
    }
}
