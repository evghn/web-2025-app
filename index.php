<?php
use core\models\Db;

use app\models\Article;
// use app\models\Db;


require_once __DIR__ . "/vendor/autoload.php";
require_once __DIR__ . "/config/app.php";
// require_once __DIR__ . "/core/models/Db.php";

// $db = new Db();
$db = Db::getInstance();

$q = "SELECT * FROM user where name = :name";
$res = $db->queryAssociative($q, ["name" => "user-name-1"]);
// $
var_dump($res);


