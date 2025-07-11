<h3>
    Панель управления
</h3>


<div class="mt-3">
    <?php foreach($userArticles as $article): ?>
        <?= $this->render("admin/article-item", [
            "article" => $article
        ]) ?>
    <?php endforeach ?>
</div>