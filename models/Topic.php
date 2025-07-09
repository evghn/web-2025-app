<?php

namespace app\models;

use core\controllers\AppController;
use core\models\BaseDbModel;
use core\models\Db;

class Topic extends BaseDbModel
{
    public ?int $id = null;
    public ?string $name = null;
    public ?string $description = null;

    public static function getTableName()
    {
        return "topic";
    }


    // [
    //     1 => "title1",
    //     2 => "title2",

    // ]

    public static function getTopics()
    {
        
        $result = (Db::getInstance(AppController::$config["db"]))
            ->conn
            ->createQueryBuilder()
            ->select('id', 'name')
            ->from(self::getTableName())    
           ->fetchAllAssociativeIndexed()
            ;
        
            
        // var_dump($result); die;

        return $result;
    }

}
