<?php
?>


<div>
    <div class="">
    <?php foreach($userArticles as $article): ?>
        <?= $this->render("site/article-item", [
            "article" => $article
        ]) ?>
    <?php endforeach ?>
</div>
</div>
<?php
$this->setCssFile(ASSETS_CSS_PATH . "site-index.css");
$this->setJsFile(ASSETS_JS_PATH . "main.js");
