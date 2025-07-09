<?php

namespace app\models;

use core\controllers\AppController;
use core\models\AppUser;
use core\models\Auth;
use core\models\BaseDbModel;
use core\models\Db;

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


    public function create(int $id_topic): bool
    {
        $this->id_status = Status::getStatusId("Новая");
        if ($this->save()) {
            $topicArtilce = new TopicArticle();
            $topicArtilce->id_artical = $this->id;
            $topicArtilce->id_topic = $id_topic;
            $topicArtilce->save();
            return true;
        }

        return false;
    }


    public static function getArticles(bool $isArray = true): array|object
    {
        $result = (Db::getInstance(AppController::$config["db"]))
            ->conn
            ->createQueryBuilder()
            /** public 
             * ?int $id = null;
             *   public ?string $name = null;
             *     public ?string $content = null;
             *     public ?string $created_at = null;
             *     public ?int $id_status = null; 
             * */
            ->select(
                'a.id',
                'a.name',
                'a.content',
                'a.created_at',
                't.name as topic_name',
                's.title as status_title',
                'u.login',
            )
            ->from(self::getTableName(), 'a')
            ->leftJoin('a', "topic_artical", "t_a", "t_a.id_artical = a.id")
            ->leftJoin('t_a', "topic", "t", "t_a.id_topic = t.id")
            ->leftJoin('a', "status", "s", "a.id_status = s.id")
            ->leftJoin('a', 'account', 'u', "u.id = a.id_account")
            ->where("a.id_status = :status")
            ->setParameter("status", Status::getStatusId("Готова"))
            ->fetchAllAssociative()
            ;
        

        return $result;        
    }
    

    public static function getArticle(int $id): array
    {
        $result = (Db::getInstance(AppController::$config["db"]))
            ->conn
            ->createQueryBuilder()
            /** public 
             * ?int $id = null;
             *   public ?string $name = null;
             *     public ?string $content = null;
             *     public ?string $created_at = null;
             *     public ?int $id_status = null; 
             * */
            ->select(
                'a.id',
                'a.name',
                'a.content',
                'a.created_at',
                't.name as topic_name',
                's.title as status_title',
                'u.login',
            )
            ->from(self::getTableName(), 'a')
            ->leftJoin('a', "topic_artical", "t_a", "t_a.id_artical = a.id")
            ->leftJoin('t_a', "topic", "t", "t_a.id_topic = t.id")
            ->leftJoin('a', "status", "s", "a.id_status = s.id")
            ->leftJoin('a', 'account', 'u', "u.id = a.id_account")            
             ->where('a.id = :id_article')
            ->setParameter("id_article", $id)
            ->fetchAllAssociative()
            ;
        

        return empty($result) ? [] : $result[0];        
    }
    

    public static function getUserArticles(): array
    {
        $result = [];

        if ($user = AppUser::getUserByToken()) {
            
            $result = (Db::getInstance(AppController::$config["db"]))
            ->conn
            ->createQueryBuilder()
            /** public 
             * ?int $id = null;
             *   public ?string $name = null;
             *     public ?string $content = null;
             *     public ?string $created_at = null;
             *     public ?int $id_status = null; 
             * */
            ->select(
                'a.id',
                'a.name',
                'a.content',
                'a.created_at',
                't.name as topic_name',
                's.title as status_title',
                'u.login',
            )
            ->from(self::getTableName(), 'a')
            ->leftJoin('a', "topic_artical", "t_a", "t_a.id_artical = a.id")
            ->leftJoin('t_a', "topic", "t", "t_a.id_topic = t.id")
            ->leftJoin('a', "status", "s", "a.id_status = s.id")
            ->leftJoin('a', 'account', 'u', "u.id = a.id_account")
            ->where('id_account = :id_account')
            ->setParameter("id_account", $user->id)
            ->fetchAllAssociative()
            ;            
        }
        
        return $result;        
    }


    public static function articleApply(int $id)
    {
        return 
            (Db::getInstance(AppController::$config["db"]))->conn
            ->update(
                self::getTableName(),
                ["id_status" => Status::getStatusId("Готова")],
                ['id' => $id]
            );
    }
    
}
