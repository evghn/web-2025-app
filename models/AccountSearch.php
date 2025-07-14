<?php
namespace app\models;

use core\models\AppUser;

class AccountSearch extends Article
{
    public string $id_status_search = "";


    public function query(array $params): array
    {
        $result = [];
        $this->load($params);
        // var_dump($this->getAttributes()); die;

        $query = $this::prepareArticles();
        
        if (!empty($this->id_status_search)) {
            $query
                ->andWhere("a.id_status = :id_status")
                ->setParameter("id_status", $this->id_status_search)
            ;
        }

        
        $query  
            ->andWhere('id_account = :id_account')
            ->setParameter("id_account", (AppUser::getUserByToken())->id)            
            ;            
        
        
        $result = $query->fetchAllAssociative();
        return $result;
    }
}