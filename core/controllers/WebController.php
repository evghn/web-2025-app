<?php
namespace core\controllers;

use core\models\BaseView;

class WebController
{
    public ?object $view;


    public function __construct()
    {
        $this->view = new BaseView();
    }

    public function render(string $fileHtml, array $data = []): string
    {
        return $this->view->renderLayout(        
            $this->view->render($fileHtml, $data)
        );
    }

}
