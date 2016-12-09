<?php

namespace app\forms;

use app\models\book\Balink;
use app\models\book\Bglink;
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
    public  $idAuthor;
    public  $idGenre;
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
                    'idAuthor',
                    'idGenre',
                ],
                'required',
            ],
            [
                'name',
                'string',
                'max' => 50,
            ],
        ];
    }

    public function attributeLabels()
    {
        return [
            'idAuthor'  => 'Author',
            'idGenre'   => 'Genre',
        ];
    }

    public function create()
    {
        if (! $this->validate()) {
            return false;
        }
        $this->book = new Book();
        $this->book->setAttributes($this->getAttributes());
        if (! $this->book->save()) {
            $this->addError('name', 'Ошбка при сохранении книги в БД');
            return false;
        }
        $linkAuthor           = new Balink();
        $linkGenre            = new Bglink();
        $linkAuthor->idAuthor = $this->idAuthor;
        $linkGenre->idGenre   = $this->idGenre;
        $linkAuthor->idBook   = $this->book->id;
        $linkGenre->idBook    = $this->book->id;
        if (! $linkAuthor->save()) {
            $this->addError('idAuthor', 'Ошбка при сохранении автора в БД');
            return false;
        }
        if (! $linkGenre->save()) {
            $this->addError('idGenre', 'Ошбка при сохранении жанра в БД');
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
        $this->book->setAttributes($this->getAttributes());
        if (! $this->book->save()) {
            $this->addError('name', 'Ошбка при сохранении книги в БД');
            return false;
        }
        $linkAuthor           = new Balink();
        $linkGenre            = new Bglink();
        // fixme: линки не перетираются
        $linkAuthor->idAuthor = $this->idAuthor;
        $linkGenre->idGenre   = $this->idGenre;
        $linkAuthor->idBook   = $this->book->id;
        $linkGenre->idBook    = $this->book->id;
        if (! $linkAuthor->save()) {
            $this->addError('idAuthor', 'Ошбка при сохранении автора в БД');
            return false;
        }
        if (! $linkGenre->save()) {
            $this->addError('idGenre', 'Ошбка при сохранении жанра в БД');
            return false;
        }
        return true;
    }

    public function getIdBook()
    {
        return $this->book->id;
    }
}
