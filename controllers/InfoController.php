<?php
namespace app\controllers;

use app\models\Account;
use app\models\Article;
use core\controllers\WebController;

class InfoController extends WebController
{
    public function actionGetCountPosts()
    {
        if ($this->isPost()) {
            return $this->asJson([
                "status" => true,
                "count" => Article::getCountArticles()
            ]);
        }

        http_response_code(400);
        return $this->asJson([
            "status" => false,
            "message" => "Ошибка запроса"        
        ]);
    }


    public function actionGetCountUsers()
    {
        if ($this->isPost()) {
            return $this->asJson([
                "status" => true,
                "count" => Account::getCountUsers()
            ]);
        }

        http_response_code(400);
        return $this->asJson([
            "status" => false,
            "message" => "Ошибка запроса"        
        ]);
    }



}
