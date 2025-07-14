<?php

namespace core\controllers;

use core\models\AppUser;
use core\models\BaseView;


class WebController
{
    public ?object $view;
    private ?object $user = null;


    public function __construct()
    {
        $this->view = new BaseView();
        $this->user = AppUser::getUserByToken();
        $this->view->controller = $this;
        // var_dump(AccountRole::isAdmin());
    }

    public function render(string $fileHtml, array $data = []): string
    {
        $fileHtml = $this->getId() . "/" . $fileHtml;
        return $this->view->renderLayout(
            $this->view->render($fileHtml, $data)
        );
    }


    public function isPost()
    {
        return $_SERVER["REQUEST_METHOD"] == "POST";
    }


    public function isGet()
    {
        return $_SERVER["REQUEST_METHOD"] == "GET";
    }


    public function post()
    {
        return $_POST;
    }


    public function get()
    {
        return $_GET;
    }

    public function getId()
    {
        return strtolower(
            explode(
                "Controller",
                pathinfo($this::class)["filename"]
            )[0]
        );
    }


    public function redirect($url)
    {
        header("Location: " . $url);
        exit;
    }


    public function asJson(mixed $val): string
    {
        header("Content-Type: application/json");
        return json_encode($val);
    }


    public function getQueryParams(): array
    {
        return AppController::getParams();
    }
}
