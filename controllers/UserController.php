<?php
namespace app\controllers;

use core\controllers\WebController;

class UserController extends WebController
{
    public function actionRegister()
    {
        $data = [
            "name" => "",
            "email" => "",
            "login" => "",
            "password" => "",
        ];
        return $this->render("user/register", [
            "model" => $data,
        ]);
    }

}
