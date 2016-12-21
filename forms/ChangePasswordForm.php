<?php

namespace app\forms;

use app\models\User;
use yii\base\Model;
use Yii;

/**
 * GenreForm is the model behind the genre form.
 *
 * @property User|null $user This property is read-only.
 *
 */
class ChangePasswordForm extends Model
{
    public $userId;
    public $password;
    public $newPassword;
    public $passwordConfirm;
    public $passwordHash;
    public $newPasswordHash;

    private $user;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [
                [
                    'password',
                    'newPassword',
                    'passwordConfirm',
                ],
                'required',
            ],
            [
                [
                    'password',
                    'newPassword',
                    'passwordConfirm',
                ],
                'string',
                'min' => 6,
                'max' => 255,
            ],
            [
                'passwordConfirm',
                'compare',
                'compareAttribute' => 'newPassword',
            ],
            [
                'passwordHash',
                'default',
                'value' => function($model) {
                    return Yii::$app->security->generatePasswordHash($model->password);
                },
            ],
            [
                'newPasswordHash',
                'default',
                'value' => function($model) {
                    return Yii::$app->security->generatePasswordHash($model->newPassword);
                },
            ],
        ];
    }

    public function attributeLabels()
    {
        return [
            'newPassword'       => 'New password',
            'passwordConfirm'   => 'Confirm password'
        ];
    }

    public function validatePassword($attribute)
    {
        $user = $this->getUser();
        if (! $user || ! $user->validatePasswordHash($this->password)) {
            $this->addError($attribute, 'Неверный пароль.');
        }
    }

    public function changePassword($id)
    {
        $this->userId = $id;
        if (! $this->validate()) {
            return false;
        }
        $user               = $this->getUser();
        $user->passwordHash = $this->newPasswordHash;
        if (! $user->save()) {
            return false;
        }
        return true;
    }

    public function getUser()
    {
        if (! $this->user) {
            $this->user = User::findIdentity($this->userId);
        }
        return $this->user;
    }
}
