<h3>
    Личный кабинет
</h3>

<div>
    <a href="/account/postCreate" class="btn btn-primary">Создать пост</a>
</div>

<div class="">
    <?php foreach($userArticles as $article): ?>
        <?= $this->render("account/article-item", [
            "article" => $article
        ]) ?>
    <?php endforeach ?>
</div>