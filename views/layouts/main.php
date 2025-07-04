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
        <a href="/site">Главная</a> | <a href="/user/register">Регистрация</a> | <a href="/site/about">О нас..</a>
    </header>
    <main>
        главный шаблон

        <div>
            <?= date("d.m.Y H:i:s") ?>
        </div>
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