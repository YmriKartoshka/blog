<?php

namespace app\forms;

use app\models\book\Genre;
use app\models\User;
use yii\base\Model;

/**
 * GenreForm is the model behind the genre form.
 *
 * @property User|null $user This property is read-only.
 *
 */
class GenreForm extends Model
{
    public $name;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [
                'name',
                'string',
                'max' => 255,
            ],
            [
                'name',
                'required',
            ],
        ];
    }

    public function create()
    {
        if (! $this->validate()) {
            return false;
        }
        $author = new Genre();
        $author->setAttributes($this->getAttributes());
        if (! $author->save()) {
            $this->addError('name', 'ошибка при сохранении жанра в БД');
            return false;
        }
        return true;
    }
}
