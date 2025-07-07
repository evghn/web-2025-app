<?php

namespace app\models;
use core\models\BaseDbModel;


class TopicArticle extends BaseDbModel
{
    public ?int $id = null;
    public ?int $id_topic = null;
    public ?int $id_artical = null;
    
    
    public static function getTableName()
    {
        return "topic_artical";
    }

}
