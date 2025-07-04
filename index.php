<?php

use core\controllers\AppController;

require_once __DIR__ . "/vendor/autoload.php";
require_once __DIR__ . "/config/app.php";

AppController::run($app);
