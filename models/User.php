<?php

namespace app\models;

use core\controllers\ErrorController;
use core\models\BaseDbModel;
use Exception;

class User extends BaseDbModel
{
    public ?int $id = null;
    public ?int $id_account = null;
    public ?string $name = null;
    public ?string $surname = null;
    public ?string $bddate = null;
    public ?string $sex = null;
    public ?string $bio = null;

    public static function getTableName()
    {
        return "user";
    }

    public function register(Account $account)
    {
        try {
            $account->create();
            $this->id_account = $account->id;
            $this->surname = "surname";
            $this->bddate = date("Y-m-d");
            $this->bio = "bio text";
            $this->save();
            return true;
        } catch (Exception $e) {
            (new ErrorController)->error($e->getMessage());
            die;
        }
    }
}
