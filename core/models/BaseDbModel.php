<?php

namespace core\models;

use core\controllers\AppController;

class BaseDbModel extends BaseModel
{
    public ?object $db;

    public function __construct()
    {
        $this->db = (Db::getInstance(AppController::$config["db"]))->conn;
    }

    

    public function save(): bool
    {
        if ($this->isInsert()) {
            // insert            
            $this->db->insert(
                $this::getTableName(),
                $this->getAttributes(true)
            );

            $this->setId($this->db->lastInsertId());
        } else {
            //update
            $this->db->update(
                $this::getTableName(),
                $this->getAttributes(true),
                ['id' => $this->getId()]
            );
        }

        return true;
    }


    private function isInsert()
    {
        return empty($this->getId());
    }

    private function getId()
    {
        return $this->id ?? null;
    }


    private function setId($id)
    {
        $this->id = $id;
    }
}
