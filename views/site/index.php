<?php

use core\models\AppUser;
?>
site controller index page

<div>
    <?= $user ?>
    <?php var_dump(AppUser::isGuest()) ?>
</div>
<?php
$this->setCssFile(ASSETS_CSS_PATH . "site-index.css");
$this->setJsFile(ASSETS_JS_PATH . "main.js");
