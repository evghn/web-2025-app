<?php

namespace app\models;

use core\controllers\AppController;
use core\models\AppUser;
use core\models\Auth;
use core\models\BaseDbModel;
use core\models\Db;

class AccountRole extends BaseDbModel
{
    public ?int $id = null;
    public ?int $id_account = null;
    public ?int $id_role = null;
    
    
    public static function getTableName()
    {
        return "account_role";
    }

    public static function isAdmin(): ?bool
    {
        if ($user = AppUser::getUserByToken()) {
            $userRoleId = (Db::getInstance(AppController::$config["db"]))
            ->conn
            ->createQueryBuilder()
            ->select('id_role')
            ->from(self::getTableName())
            ->where('id_account = :id_account')
            ->setParameter("id_account", $user->id)
            ->fetchOne();
            $isAdmin = $userRoleId == Role::getRoleId("admin");
        }

        return $isAdmin ?? null;
    }


    public static function checkUserRole($role): bool
    {
        if ($user = AppUser::getUserByToken()) {
            $userRoleId = (Db::getInstance(AppController::$config["db"]))
            ->conn
            ->createQueryBuilder()
            ->select('id_role')
            ->from(self::getTableName())
            ->where('id_account = :id_account')
            ->setParameter("id_account", $user->id)
            ->fetchOne();
            $check = $userRoleId == Role::getRoleId($role);
        }

        return $check ?? false;
    }
}
