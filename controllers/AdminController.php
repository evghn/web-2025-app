<?php

namespace app\controllers;

use app\models\AccountRole;
use app\models\Article;
use app\models\Topic;

use core\controllers\WebController;


class AdminController extends WebController
{

    private function checkAccess()
    {
        if (!AccountRole::isAdmin()) {
            return $this->redirect("/");
        }
    }

    public function actionIndex()
    {
        $this->checkAccess();
        $userArticles = Article::getAdminArticles();
        return $this->render("index", [
            "userArticles" => $userArticles
        ]);
    }


    public function actionPostCreate()
    {
        $this->checkAccess();
        $article = new Article();
        $topics = Topic::getTopics();
        if ($this->isPost()) {
            $id_topic = $this->post()['id_topic'];
            $article->load($this->post());
            if ($article->create($id_topic)) {
                return $this->redirect("/" . $this->getId());
            }

        }
        return $this->render("post-create", [
            "topics" => $topics,
        ]);
    }


    public function actionPostView($id)
    {        
        $this->checkAccess();
        return $this->render("view", [
            'article' => Article::getArticle($id)
        ]);
    }


    public function actionPostApply($id)
    {
        $this->checkAccess();
        Article::articleApply($id);        
        return $this->redirect("/" . $this->getId());
    }

}
