<?php
namespace app\controllers;

use app\models\Account;
use app\models\User;
use core\controllers\WebController;

class UserController extends WebController
{
    public function actionRegister()
    {
        $user = new User(); 
        $account = new Account();
        if ($this->isPost()) {
            $account->load($this->post());
            $user->load($this->post());
            if ($user->register($account)) {
                $this->redirect("/");
            }
        }

        return $this->render("register", [
            "model" => $user,
            "account" => $account,
        ]);
    }


    public function actionLogin()
    {        
        $account = new Account();
        if ($this->isPost()) {
            $account->load($this->post());
            // var_dump($account->getAttributes()); die;
            if ($account->login()) {
                // var_dump(__LINE__); die;

                $this->redirect("/");
            }
            // var_dump(__LINE__); die;
        }

        return $this->render("login", [
            "model" => $account,
        ]);
    }
}
