<?php

namespace app\forms;

use app\models\book\Author;
use app\models\User;
use yii\base\Model;

/**
 * AuthorForm is the model behind the author form.
 *
 * @property User|null $user This property is read-only.
 *
 */
class AuthorForm extends Model
{
    public  $firstName;
    public  $lastName;
    public  $secondName;
    public  $birthDay;
    public  $deathDay;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [
                [
                    'firstName',
                    'lastName',
                    'secondName',
                ],
                'string',
                'max' => 255,
            ],
            [
                [
                    'firstName',
                    'lastName',
                    'secondName',
                    'birthDay',
                ],
                'required',
            ],
        ];
    }

    public function create()
    {
        if (! $this->validate()) {
            return false;
        }
        $author = new Author();
        $author->setAttributes($this->getAttributes());
        if (! $author->save()) {
            $this->addError('firstName', 'ошибка при сохранении автора в БД');
            return false;
        }
        return true;
    }
}
