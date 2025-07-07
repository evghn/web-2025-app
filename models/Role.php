<?php

namespace app\models;

use core\controllers\AppController;
use core\models\AppUser;
use core\models\Auth;
use core\models\BaseDbModel;
use core\models\Db;

class Role extends BaseDbModel
{
    public ?int $id = null;
    public ?string $title = null;
    
    public static function getTableName()
    {
        return "role";
    }
   


    public static function getRoleId($role): int|bool
    {
        return (Db::getInstance(AppController::$config["db"]))
            ->conn
            ->createQueryBuilder()
            ->select('id')
            ->from(self::getTableName())
            ->where('title = :role')
            ->setParameter("role", $role)
            ->fetchOne();
    }
}
