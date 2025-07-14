<h3>
    Личный кабинет
</h3>

<div class="my-3">
    <a href="/account/postCreate" class="btn btn-primary">Создать пост</a>
</div>
<div class="my-3 border d-flex justify-content-between">
    <div>

    </div>
    <div>
        <form action="">
            <div class="d-flex gap-3">
                <select class="form-select" name="id_status_search" aria-label="Выбор статуса статьи">
                    <option selected>Выберете статус статьи</option>
                    <?php foreach ($statuses as $key => $val): ?>
                        <option value="<?= $key ?>"><?= $val["title"] ?></option>
                    <?php endforeach ?>
                </select>
                <button type="submit" class="btn btn-outline-primary">
                    <i class="fa-solid fa-check fa-lg"></i>
                 </button>
                <a href="/account" class="btn btn-outline-danger text-decoration-none">
                    <i class="fa-solid fa-xmark fa-lg"></i>
                </a>
            </div>
        </form>
    </div>
</div>

<div class="">
    <?php if ( !empty($userArticles)): ?>
        <?php foreach ($userArticles as $article): ?>
            <?= $this->render("account/article-item", [
                "article" => $article
            ]) ?>
        <?php endforeach ?>
    <?php else: ?>
        <div class="p-3 alert alert-primary" role="alert">
            Отсутствуют данные для отображения.
        </div>
    <?php endif ?>
</div>