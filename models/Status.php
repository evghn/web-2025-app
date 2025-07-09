<?php

namespace app\models;

use core\controllers\AppController;
use core\models\BaseDbModel;
use core\models\Db;

class Status extends BaseDbModel
{
    public ?int $id = null;
    public ?string $title = null;
    

    public static function getTableName()
    {
        return "status";
    }


   public static function getStatusId($status): int|bool
    {
        return (Db::getInstance(AppController::$config["db"]))
            ->conn
            ->createQueryBuilder()
            ->select('id')
            ->from(self::getTableName())
            ->where('title = :status')
            ->setParameter("status", $status)
            ->fetchOne();
    }

}
