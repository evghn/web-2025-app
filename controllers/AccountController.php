<?php

namespace app\controllers;

use app\models\Account;
use app\models\AccountRole;
use app\models\AccountSearch;
use app\models\Article;
use app\models\Status;
use app\models\Topic;
use app\models\User;
use core\controllers\WebController;
use core\models\AppUser;
use core\models\Auth;

class AccountController extends WebController
{

    private function checkAccess()
    {
        if (!AccountRole::isUser()) {
            return $this->redirect("/");
        }
    }

    
    public function actionIndex()
    {
        $this->checkAccess();
        $model = new AccountSearch();

        $model->query($this->getQueryParams());
        // var_dump($data); die;
        // $userArticles = Article::getUserArticles();
        return $this->render("index", [
            "userArticles" => $model->getData(),
            "statuses" => Status::getStatuses(),
            "model" => $model,
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
