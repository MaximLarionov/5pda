<?php

namespace app\entity;

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
        // TODO: Implement findIdentity() method.
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
    }

    public function getId()
    {
        // TODO: Implement getId() method.
    }

    public function getAuthKey()
    {
    }

    public function validateAuthKey($authKey)
    {
    }
}
