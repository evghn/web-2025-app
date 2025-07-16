<?php
namespace app\controllers;

use app\models\Article;
use app\models\ArticleSearch;
use app\models\Topic;
use core\controllers\WebController;

class SiteController extends WebController
{
    public function actionIndex()
    {
        $model = new ArticleSearch();

        $model->query($this->getQueryParams());

        $userArticles = Article::getArticles();
        // var_dump($userArticles); die;
        return $this->render("index", [
           "userArticles" => $model->getData(),
            "topics" => Topic::getTopics(),
            "model" => $model,
        ]);
    }


    public function actionAbout($id, $a)
    {
        return $this->render("about", [
            'id' => $id,
            'a' => $a
        ]);
    }
}
