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
        меню сайта
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