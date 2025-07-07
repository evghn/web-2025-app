<?php

use core\models\AppUser;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?= $this->getLinkCssFiles() ?>

</head>

<body>
    <header>
        <div>
            <a href="/site">Главная</a> | <a href="/user/register">Регистрация</a> | <a href="/user/login">Вход</a> | <a href="/site/about">О нас..</a>

        </div>
        <div>
            <?= AppUser::getAppUser()?->login ?>
        </div>
    </header>
    <main>



        <div>
            <?= $content ?>
        </div>
    </main>
    <footer>
        подвал сайта
    </footer>
    <?= $this->getLinkJsFiles() ?>
</body>

</html>