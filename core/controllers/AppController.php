<?php
namespace core\controllers;

use app\controllers\UserController;
use Exception;

class AppController
{
    private static ?object $self = null;
    private ?string $controller = null;
    private ?string $action = null;


    private function __construct()
    {
        
    }

    private static function getInstance()
    {
        if (static::$self == null) {
            static::$self = new static();
        }

        return static::$self;
    }

    public static function run()
    {
        try {
            $self = static::getInstance();
            $self->route(); 
        } catch (Exception $e) {
            (new ErrorController())->error($e->getMessage());
        }
    
    }

    private function route()
    {
        // https://blog-app/
        $urlParts = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
        $urlParts = trim($urlParts, "/");
        $urlParts = array_filter(explode("/", $urlParts));
        static::$self->setController($urlParts);
        static::$self->setAction($urlParts);
        if (!class_exists(static::$self->controller)) {
            throw new Exception("Класс " .static::$self->controller . " не найден!");
        }

        $controller = new static::$self->controller;
        $action = static::$self->action;
        echo $controller->$action();        
    }

    private function setController(array $urlParts)
    {
        static::$self->controller = !empty($urlParts[0])
            ? "app\\controllers\\" . ucfirst($urlParts[0]) . "Controller"
            : "app\\controllers\\SiteController";
    }

    private function setAction(array $urlParts)
    {
        static::$self->action = !empty($urlParts[1])
            ? "action" . ucfirst($urlParts[1])
            : "actionIndex";
    }

    

}
