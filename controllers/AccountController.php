<?php

namespace app\controllers;

use app\models\Account;
use app\models\User;
use core\controllers\WebController;
use core\models\AppUser;
use core\models\Auth;

class AccountController extends WebController
{
    public function actionIndex()
    {
        return $this->render("index", [
        ]);
    }


    public function actionPostCreate()
    {
        return $this->render("post-create", [
        ]);
    }

}
