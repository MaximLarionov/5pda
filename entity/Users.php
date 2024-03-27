<?php

namespace app\entity;

use app\repository\UsersRepository;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * Users
 * @property integer id Id пользователя
 * @property string login Логин пользователя
 * @property string password Пароль пользователя
 * @property string photo Аватар пользователя
 */
class Users extends ActiveRecord implements IdentityInterface
{

    public static function findIdentity($id)
    {
        return new static(UsersRepository::getUserById($id));
    }

    public function getId()
    {
        return $this->id;
    }

    public function validatePassword($password)
    {
        return password_verify($password, $this->password);
    }

    public function findUserByLogin($login)
    {
        return new static(UsersRepository::getUserByLogin($login));
    }


    public function getAuthKey()
    {
    }

    public function validateAuthKey($authKey)
    {
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
    }
}
