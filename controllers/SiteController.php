<?php
namespace app\controllers;

use app\models\Article;
use core\controllers\WebController;

class SiteController extends WebController
{
    public function actionIndex()
    {
        $userArticles = Article::getArticles();
        // var_dump($userArticles); die;
        return $this->render("index", [
            "userArticles" => $userArticles
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
