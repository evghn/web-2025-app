<?php

namespace core\models;

use core\controllers\AppController;

class AppUser extends BaseDbModel
{
    private ?object $_user = null;
    private ?object $_db = null;
    private static ?self $_self = null;
    private static bool $isGuest = true;


    private function __construct()
    {
        parent::__construct();
        $this->_db = Db::getInstance(AppController::$config["db"]);
    }

    public static function getInstance()
    {
        if (self::$_self === null) {
            self::$_self = new self();
        }
        return self::$_self;
    }

    public static function getAppUser()
    {
        $self = self::getInstance();
        return $self->_user;
    }

    private function getUser()
    {
        return $this->_user;
    }



    private function createUser()
    {
        if ($this->_user === null) {
            $accountClass = AppController::$config["user"]["class"];
            $this->_user = new $accountClass;
        }
        return $this->_user;
    }


    private function setUser(?object $user)
    {
        $this->_user = $user
            ? clone $user
            : null;
    }


    public function getDb()
    {
        return $this->_db;
    }


    public static function getUserByLogin($login): ?object
    {
        $self = self::getInstance();
        $self->createUser();
        $sql = "SELECT * FROM "
            . $self->getUser()::getTableName()
            . " WHERE login = :login";

        $result = $self->getDb()->queryAssociative($sql, ["login" => $login]);
        if (!empty($result[0])) {
            $self->getUser()->load($result[0]);
            self::$isGuest = false;
            return $self->getUser();
        } else {
        }
        $self->setUser(null);
        return null;
    }

    public static function isGuest(): bool
    {
        return self::$isGuest;
    }

    public static function validatePassword(string $password): bool
    {
        $self = self::getInstance();
        $user = $self->getUser();
        return $user && password_verify($password, $user->password);
    }


    public static function getUserByToken(): ?object
    {
        $self = self::getInstance();
        if ($user = Auth::getUserByToken()) {
            $self->createUser()->load($user);
            $self::$isGuest = false;
            return $self->getUser();
        } else {
            $self->setUser(null);
        }

        return null;
    }
}
