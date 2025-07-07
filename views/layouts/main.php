<?php

use core\models\AppUser;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet">

    <?= $this->getLinkCssFiles() ?>

</head>

<body>
    <header>
        <div>
            <?= $this->render("layouts/menu", [
                "menu" => [
                    ["title" => "Главная", "link" => "/", "auth" => null],
                    ["title" => "Регистрация", "link" => "/user/register", "auth" => false],
                    ["title" => "О нас..", "link" => "/site/about", "auth" => null],
                ]
            ]);
            ?>
        </div>
        <nav class="navbar">
            <div class="container-fluid">
                <?php if ($user = AppUser::getAppUser()): ?>
                    <form method="post" action="/user/logout"  class="row g-3">
                        <div class="col-auto">
                            <button type="submit" class="btn mb-3">Выход (<?= $user->login ?>)</button>
                        </div>
                    </form>
                <?php else: ?>
                    <a class="nav-link" aria-current="page" href="/user/login">Вход</a>
                <?php endif ?>
            </div>
        </nav>
    </header>
    <main>



        <div class="container">
            <?= $content ?>
        </div>
    </main>
    <footer>
        подвал сайта
    </footer>
    <script src="/assets/js/bootstrap.min.js"></script>
    <?= $this->getLinkJsFiles() ?>
</body>

</html>