<?php

namespace app\models;


use app\repository\UsersRepository;
use yii\base\Model;

class UserForm extends Model
{
    public $login;
    public $password;
    public $_user = false;

    public function attributeLabels()
    {
        return [
            "login" => "Логин",
            "password" => "Пароль"
        ];
    }


    public function rules()
    {
        return [
            [["login", "password"], "required"],
            ["password", "validatePassword"],
        ];
    }


    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();

            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, "Ошибка в логине или пароле");
            }
        }
    }


    public function getUser()
    {
        if ($this->_user === false) {
            $this->_user = UsersRepository::getUserByLogin($this->login);
        }

        return $this->_user;
    }

    public function login()
    {
        if ($this->validate()) {
            return \Yii::$app->user->login($this->getUser());
        }

        return false;
    }
}