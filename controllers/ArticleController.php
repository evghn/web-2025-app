<?php
namespace app\controllers;

use app\models\Article;
use core\controllers\WebController;

class ArticleController extends WebController
{    
    public function actionView($id)
    {       
        return $this->render("view", [
            'article' => Article::getArticle($id)
        ]);
    }
}
