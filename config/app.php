<?php

use app\models\Account;

const FILE_CONFIG_DB = __DIR__ . "/../config/db.php";
const VIEW_PATH = __DIR__ . "/../views/";
const LAYOUT_PATH = VIEW_PATH . "layouts/";
const ASSETS_PATH = "/assets/";
const ASSETS_CSS_PATH = ASSETS_PATH . "css/";
const ASSETS_JS_PATH = ASSETS_PATH . "js/";

$db = require_once "db.php";
$app = [
    "db" => $db,
    "user" => [
        "class" => "app\\models\\Account",
    ]
];
