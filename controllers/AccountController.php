<?php

namespace app\controllers;

use app\models\Account;
use app\models\Article;
use app\models\Topic;
use app\models\User;
use core\controllers\WebController;
use core\models\AppUser;
use core\models\Auth;

class AccountController extends WebController
{
    public function actionIndex()
    {
        $userArticles = Article::getUserArticles();
        return $this->render("index", [
            "userArticles" => $userArticles
        ]);
    }


    public function actionPostCreate()
    {
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
        return $this->render("view", [
            'article' => Article::getArticle($id)
        ]);
    }


    public function actionPostApply($id)
    {
        Article::articleApply($id);        
        return $this->redirect("/" . $this->getId());
    }

    

    

}
