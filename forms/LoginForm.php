<?php

namespace app\forms;

use app\models\User;
use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 *
 * @property User|null $user This property is read-only.
 *
 */
class LoginForm extends Model
{
    public  $login;
    public  $password;
    private $user;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [
                [
                    'login',
                    'password',
                ],
                'required',
            ],
            [
                'login',
                'string',
                'min' => 3,
                'max' => 50,
            ],
            [
                'password',
                'string',
                'min' => 6,
            ],
            [
                'password',
                'validatePassword',
            ],
        ];
    }

    public function validatePassword($attribute)
    {
        $user = $this->getUser();
        if (! $user || ! $user->validatePasswordHash($this->password)) {
            $this->addError($attribute, 'Неверный логин и/или пароль.');
        }
    }

    public function login()
    {
        if (! $this->validate()) {
            return false;
        }
        return Yii::$app->user->login($this->getUser());
    }

    public function getUser()
    {
        if (! $this->user) {
            $this->user = User::findByLogin($this->login);
        }
        return $this->user;
    }
}
