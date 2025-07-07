<?php

namespace app\models;
use core\models\BaseDbModel;


class Topic extends BaseDbModel
{
    public ?int $id = null;
    public ?string $name = null;
    public ?string $description = null;

    public static function getTableName()
    {
        return "topic";
    }

}
