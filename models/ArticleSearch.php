<?php
namespace app\models;

use core\models\AppUser;

class ArticleSearch extends Article
{
    public string $id_topic_search = "";
    public string $text_search = "";
    public string $date = "desc";
    public string $topic = "";

    private $query;


    public function query(array $params)
    {        
        $this->load($params);
        // var_dump($this->getAttributes()); die;

        $this->query = $this::prepareArticles()
            ->andWhere("a.id_status = :id_status")
            ->setParameter("id_status", Status::getStatusId("Готова")) 
        ;
        if (!empty($this->id_topic_search)) {
            $this->query
                ->andWhere("t.id = :id_topic_search")
                ->setParameter("id_topic_search", $this->id_topic_search)
            ;
        }


        if (!empty($this->text_search)) {
            $this->query
                ->andWhere(
                    $this->query->expr()->or(
                        $this->query->expr()->like("a.name", ":text_search"),
                        $this->query->expr()->like("a.content", ":text_search"),
                    )
                    // "a.name like :text_search or  a.content like :text_search"
                )
                ->setParameter("text_search", "%" . $this->text_search . "%")
            ;
        }

          
        
        if ($this->date) {
             $this->query->orderBy("a.created_at", strtoupper($this->date));
        }
        // var_dump($query->getSQL()); die;
        
        
    }

    public function getData()
    {
        return $this->query->fetchAllAssociative();
    }
}