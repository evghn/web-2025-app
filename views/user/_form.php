<form action="" method="post">
    <?php foreach($model as $field => $val): ?>
        <div>
            <label>
                <div><?= $field ?></div>
                <input type="text" name="<?= $field ?>" value="<?= $val ?>">
            </label>
        </div>
    <?php endforeach ?>
    <div>
        <button type="submit">Регистрация</button>
    </div>
</form>

<?php 
$this->setCssFile(ASSETS_CSS_PATH . "form-register.css");