<h3>
    Личный кабинет
</h3>

<div class="my-3">
    <a href="/account/postCreate" class="btn btn-primary">Создать пост</a>
</div>
<div class="my-3 mt-5 d-flex justify-content-between ">
    <div class="d-flex gap-3 text-decoration-none">
        <span>
            <?php if ($model->date == "desc"): ?>
                <a href="/account?date=asc" class=" text-decoration-none">
                    Дата <i class="fa-solid fa-arrow-up fa-lg"></i>    
                </a>    
            <?php else: ?>                
                <a href="/account?date=desc" class=" text-decoration-none">
                    Дата <i class="fa-solid fa-arrow-down fa-lg"></i>
                </a>
            <?php endif ?>
        </span>        
    </div>
    <div>
        <form action="">
            <div class="d-flex gap-3">
                <div class="input-group flex-nowrap">
                    <span class="input-group-text text-secondary" id="addon-wrapping"><i class="fa-solid fa-magnifying-glass fa-lg"></i></span>
                    <input type="text" name="text_search" class="form-control" placeholder="Найти..." aria-label="Найти" aria-describedby="addon-wrapping" value="<?= $model->text_search ?>">
                </div>
                <select class="form-select" name="id_status_search" aria-label="Выбор статуса статьи">
                    <option value="">Выберете статус статьи</option>
                    <?php foreach ($statuses as $key => $val): ?>
                        <option 
                            <?php if ($model->id_status_search == $key): ?>
                                selected 
                            <?php endif ?>
                        value="<?= $key ?>"><?= $val["title"] ?></option>
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
    <?php if (!empty($userArticles)): ?>
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