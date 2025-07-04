<?php
namespace core\models;

class BaseModel
{

    private array $skipFields = [
        "id", 
        "created_at",        
    ];
    private array $skipAllow = [
        "skipFields",
        "skipAllow",
        "db",
    ];

    public function load(array $data)
    {
        $fields = get_object_vars($this);        
        foreach ($data as $key => $val) {
            if (array_key_exists($key, $fields)) {
                $this->$key = $val;
            }
        }
    }


    public function getAttributes(bool $skip = false): array
    {
        $result = [];
        $fields = get_object_vars($this);
        
        foreach ($fields as $field => $val) {
            if ($skip && $this->skipFeild($field)) {
                continue;                
            }
            if ($this->skipAllow($field) || method_exists($this, $field)) {
                continue;
            }
            $result[$field] = $val;
        }       

        return $result;
    }

    private function skipAllow(string $field)
    {
        return in_array($field, $this->skipAllow);
    }

    private function skipFeild(string $field)
    {
        return in_array($field, $this->skipFields);
    }
}
