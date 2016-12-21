<?php

namespace app\forms;

use app\models\event\Event;
use app\models\User;
use yii\base\Model;

/**
 * BookForm is the model behind the book form.
 *
 * @property User|null $user This property is read-only.
 *
 */
class EventForm extends Model
{
    public  $name;
    public  $description;
    public  $date;
    public  $bookId;
    private $event;

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
                    'bookId',
                    'date',
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
            'bookId' => 'Book',
        ];
    }

    public function create()
    {
        if (! $this->validate()) {
            $this->addError('name', 'Не прошла валидация');
            return false;
        }

        $this->event = new Event();
        $this->event->setAttributes($this->getAttributes());
        if (! $this->event->save()) {
            $this->addError('name', 'Ошбка при сохранении события в БД');
            return false;
        }
        return true;
    }

    public function update($id)
    {
        if (! $this->validate()) {
            return false;
        }
        $this->event = Event::find()->where(['id' => $id])->one();
        $this->event->setAttributes($this->getAttributes());
        if (! $this->event->save()) {
            $this->addError('name', 'Ошбка при сохранении события в БД');
            return false;
        }
        return true;
    }

    public function getIdEvent()
    {
        return $this->event->id;
    }
}
