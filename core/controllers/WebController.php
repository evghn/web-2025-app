<?php
namespace core\controllers;

use core\models\Auth;
use core\models\BaseView;

class WebController
{
    public ?object $view;


    public function __construct()
    {
        $this->view = new BaseView();

        $user = Auth::getUserByToken(); 
        if ($user) {
            var_dump($token); die;
        }
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
}
