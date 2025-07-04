<div>
    Авторизация
</div>
<form action="" method="post">
    <div>
        <label>
            <div>Login</div>
            <input type="text" name="login" value="<?= $model->login ?>" required>
        </label>
    </div>
    <div>
        <label>
            <div>Password</div>
            <input type="password" name="password" value="" required>
        </label>
    </div>
    <div>
        <button type="submit">Вход</button>
    </div>
</form>

<?php 
$this->setCssFile(ASSETS_CSS_PATH . "form-register.css");