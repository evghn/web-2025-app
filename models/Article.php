<?php

namespace app\models;
use core\models\AppUser;
use core\models\Auth;
use core\models\BaseDbModel;


class Article extends BaseDbModel
{
    public ?int $id = null;
    public ?string $name = null;
    public ?string $content = null;
    public ?string $created_at = null;
    public ?int $id_status = null;

    public static function getTableName()
    {
        return "artical";
    }


    public function create()
    {
        
    }
    
}
