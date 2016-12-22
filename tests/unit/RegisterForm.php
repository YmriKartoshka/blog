<?php

namespace app\tests\unit;

use app\models\Profile;
use app\models\User;
use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 *
 * @property User|null $user This property is read-only.
 *
 */
class RegisterForm extends Model
{
    public $login;
    public $password;
    public $passwordConfirm;
    public $firstName;
    public $lastName;
    public $secondName;
    public $email;
    public $phone;
    public $passwordHash;

    private $user;
    private $profile;

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
                    'passwordConfirm',
                    'firstName',
                    'lastName',
                    'secondName',
                    'email',
                    'phone',
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
                [
                    'firstName',
                    'lastName',
                    'secondName',
                ],
                'string',
                'max' => 50,
            ],
            [
                [
                    'password',
                    'passwordConfirm',
                ],
                'string',
                'min' => 6,
                'max' => 255,
            ],
            [
                'passwordConfirm',
                'compare',
                'compareAttribute' => 'password',
            ],
            [
                'email',
                'email',
            ],
            [
                'phone',
                'match',
                'pattern' => '/^(?:\+?\d{11,12}|\+?\d\s?\(\d{3}\)\s\d{3}(?:\-\d{2}){2})$/',
            ],
            [
                'passwordHash',
                'default',
                'value' => function($model) {
                    return Yii::$app->security->generatePasswordHash($model->password);
                },
            ],
        ];
    }

    public function register()
    {
        if (! $this->validate()) {
            return false;
        }

        $errors = 0;
        if (! User::isLoginUnique($this->login)) {
            $this->addError('login', 'Пользователь с таким логином уже существует.');
            $errors ++;
        }
        if (! Profile::isEmailUnique($this->email)) {
            $this->addError('email', 'Пользователь с таким email уже существует.');
            $errors ++;
        }
        if (! Profile::isPhoneUnique($this->phone)) {
            $this->addError('phone', 'Пользователь с таким телефоном уже существует.');
            $errors ++;
        }
        if ($errors) {
            return false;
        }

        $profile = new Profile();
        $profile->setAttributes($this->getAttributes());
        $user = new User();
        $user->setAttributes($this->getAttributes());
        if (! $profile->save()) {
            return false;
        }
        $user->profileId    = $profile->id;
        echo '<pre>';
        print_r($user->getAttributes());

        if (! $user->save()) {
            return false;
        }
        return true;
    }
}
