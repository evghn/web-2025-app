<?php

use app\controllers\SiteController;
use app\controllers\UserController;

require_once __DIR__ . "/vendor/autoload.php";
require_once __DIR__ . "/config/app.php";

// require_once __DIR__ . "/config/test.php";
// $view = new BaseView();
// $view->layout = "main2";

// $userName = "user  name";
// вариант 1
// echo $view->render("site/index", ["userName" => $userName]);
// echo $view->render([
//     "user" => $userName, 
//     "a" => $a,
// ]);

// echo $$$userName;
// вариант 2
// echo $view->render(compact("userName", "a"));

// try {
//     echo calc(0);
// } catch (Exception $e) {
//     echo $e->getFile() . "<br>";
//     echo $e->getMessage();
// } finally {
//     echo "<br>code the end!";
// }

echo (new UserController())->actionRegister();

