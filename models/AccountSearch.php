<?php
namespace app\models;

use core\models\AppUser;

class AccountSearch extends Article
{
    public string $id_status_search = "";
    public string $text_search = "";
    public string $date = "desc";
    public string $topic = "";

    private $query;


    public function query(array $params)
    {        
        $this->load($params);
        // var_dump($this->getAttributes()); die;

        $this->query = $this::prepareArticles();
        
        if (!empty($this->id_status_search)) {
            $this->query
                ->andWhere("a.id_status = :id_status")
                ->setParameter("id_status", $this->id_status_search)
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

        

        
        $this->query  
            ->andWhere('id_account = :id_account')
            ->setParameter("id_account", (AppUser::getUserByToken())->id)            
            ;            
        
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