<?php

namespace app\models;

use core\controllers\AppController;
use core\models\AppUser;
use core\models\Auth;
use core\models\BaseDbModel;
use core\models\Db;

class Account extends BaseDbModel
{
    public ?int $id = null;
    public ?string $login = null;
    public ?string $password = null;
    public ?string $created_at = null;
    public ?string $token = null;

    public static function getTableName()
    {
        return "account";
    }


    public function create()
    {
        $this->password = password_hash($this->password, PASSWORD_BCRYPT);
        $this->save();
    }

    public function loginUser(): bool
    {
        $account = AppUser::getUserByLogin($this->login);

        if ($account && AppUser::validatePassword($this->password)) {
            $this->token = bin2hex(random_bytes(32));
            if ($this->save()) {
                Auth::setToken($this->token);
                return true;
            }
        }
        return false;
    }
}
