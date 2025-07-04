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
        return $this->render("index", $data);
    }

    public function actionAbout($id, $a)
    {
        return $this->render("about", [
            'id' => $id,
            'a' => $a
        ]);
    }
}
