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
    public ?int $id_account = null;

    public static function getTableName()
    {
        return "artical";
    }


    public function create(int $id_topic): bool
    {
        $this->id_status = Status::getStatusId("Новая");
        $this->id_account = (AppUser::getAppUser())->id;
        if ($this->save()) {
            $topicArtilce = new TopicArticle();
            $topicArtilce->id_artical = $this->id;
            $topicArtilce->id_topic = $id_topic;
            $topicArtilce->save();
            return true;
        }

        return false;
    }


   
    protected static function prepareArticles(): object
    {
        $result = (Db::getInstance(AppController::$config["db"]))
            ->conn
            ->createQueryBuilder()            
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
            ->leftJoin('a', TopicArticle::getTableName(), "t_a", "t_a.id_artical = a.id")
            ->leftJoin('t_a', Topic::getTableName(), "t", "t_a.id_topic = t.id")
            ->leftJoin('a', Status::getTableName(), "s", "a.id_status = s.id")
            ->leftJoin('a', Account::getTableName(), 'u', "u.id = a.id_account")
            ;       

        return $result;        
    }
    
    public static function getArticles(): array
    {
        $result = self::prepareArticles()            
            ->where("a.id_status = :status")
            ->setParameter("status", Status::getStatusId("Готова"))
            ->fetchAllAssociative()
            ;
        return $result;        
    }
    
    public static function getCountArticles(): int
    {
        $sub = self::prepareArticles()            
            ->where("a.id_status = :status")
            ->setParameter("status", Status::getStatusId("Готова"))        
            ;
        $result = (Db::getInstance(AppController::$config["db"]))
            ->conn
            ->createQueryBuilder()            
            ->select("COUNT(sub.id)")
            ->from("(" . $sub->getSQL() . ")", "sub")
            ->setParameters($sub->getParameters())
            ->executeQuery()
            ->fetchOne()
            // ->getSQL()
            ;

        return $result;        
    }
    

    public static function getArticle(int $id): array
    {
        $result = self::prepareArticles()            
            ->where('a.id = :id_article')
            ->setParameter("id_article", $id)
            ->fetchAllAssociative()
            ;       

        return empty($result) ? [] : $result[0];        
    }
    

    public static function getAdminArticles(): array
    {
        $result = self::prepareArticles()                        
            ->fetchAllAssociative()
            ;       

        return empty($result) ? [] : $result;        
    }
    

    public static function getUserArticles(): array
    {
        $result = [];

        if ($user = AppUser::getUserByToken()) {
            
            $result = self::prepareArticles()
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
