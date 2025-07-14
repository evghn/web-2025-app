<?php

use app\models\Account;
use app\models\Article;
use core\models\AppUser;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <?= $this->getLinkCssFiles() ?>

</head>

<body>
    <header class="fs-5">
        <div>
            <?= $this->render("layouts/menu", [
                "menu" => [
                    ["title" => "Главная", "link" => "/", "auth" => null],
                    ["title" => "Регистрация", "link" => "/user/register", "auth" => false],
                    ["title" => "Личный кабинет", "link" => "/account", "auth" => true, "role" => "user"],
                    ["title" => "Панель управления", "link" => "/admin", "auth" => true, "role" => "admin"],

                    ["title" => "О нас..", "link" => "/site/about/id/1/a/2", "auth" => null],
                ]
            ]);
            ?>
        </div>
        <nav class="navbar">
            <div class="container-fluid">
                <?php if ($user = AppUser::getAppUser()): ?>
                    <form method="post" action="/user/logout"  class="row g-3">
                        <div class="col-auto">
                            <button type="submit" class="btn fs-5">Выход (<?= $user->login ?>)</button>
                        </div>
                    </form>
                <?php else: ?>
                    <a class="nav-link" aria-current="page" href="/user/login">Вход</a>
                <?php endif ?>
            </div>
        </nav>
    </header>
    <main>
        <div class="d-flex bg-info-subtle justify-content-end p-2 gap-3 mb-3">
            <div class="d-flex gap-1">
                Статей в системе: <div class="count-posts"><?= Article::getCountArticles() ?></div>        
            </div>
            <div class="d-flex gap-1">
                Пользователей в системе: <div class="count-users"><?= Account::getCountUsers() ?></div>        
            </div>
        </div>


        <div class="container">
            <?= $content ?>
        </div>
    </main>
    <footer>
        подвал сайта
    </footer>
    <script src="/assets/js/bootstrap.min.js"></script>
    <script src="/assets/js/info.js"></script>
    <?= $this->getLinkJsFiles() ?>
</body>

</html>