<?php
namespace app\models;

use core\controllers\AppController;
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


    public function getUserByLogin($login)
    {
        $sql = "SELECT * FROM {$this::getTableName()} WHERE login = :login";
        $db = Db::getInstance(AppController::$config["db"]);
        $result = $db->queryAssociative($sql, ["login" => $login]);
        return $result[0] ?? null;
    }


    public function login(): bool
    {
        $account = $this->getUserByLogin($this->login);

        if ($account && $this->validatePassword($this->password, $account["password"])) {
            $this->load($account);
            $this->token = bin2hex(random_bytes(32));
            if ($this->save()) {
                Auth::setToken($this->token);
                return true;
            }
        }  
        return false;
    }

    public function validatePassword($password, $hash)
    {
        return password_verify($password, $hash);
    }
}
