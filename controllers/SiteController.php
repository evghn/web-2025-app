<?php
namespace app\controllers;

use core\controllers\WebController;

class SiteController extends WebController
{
    public function actionIndex()
    {
        $data = [
            "user" => "user - name",
        ];
        return $this->render("site/index", $data);
    }

    public function actionAbout()
    {
        return $this->render("site/about");
    }
}
