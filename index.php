<?php

use core\models\BaseView;

require_once __DIR__ . "/vendor/autoload.php";
require_once __DIR__ . "/config/app.php";


$view = new BaseView();
// $view->layout = "main2";

$userName = "user  name";
// вариант 1
echo $view->render("site/index", ["userName" => $userName]);
// echo $view->render([
//     "user" => $userName, 
//     "a" => $a,
// ]);

// echo $$$userName;
// вариант 2
// echo $view->render(compact("userName", "a"));



