<?php

namespace app\controllers;

use app\models\Account;
use app\models\User;
use core\controllers\WebController;
use core\models\AppUser;
use core\models\Auth;

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
            if ($account->loginUser()) {
                return $this->redirect("/");
            }
        }

        return $this->render("login", [
            "model" => $account,
        ]);
    }


    public function actionLogout()
    {        
        if ($this->isPost()) {
            if ($account = AppUser::getUserByToken()) {
                $account->token = null;
                $account->save();
                Auth::resetToken();
            }            
        }

        return $this->redirect("/");
    }
}
