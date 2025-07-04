<div>
    Регистрация
</div>
<div>

    <?= $this->render("user/_form", [
        "model" => $model,
        "account" => $account,
    ]) ?>
</div>