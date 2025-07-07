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
}
