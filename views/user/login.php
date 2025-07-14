<div>
    Авторизация
</div>
<form action="" method="post">
    <div>
        <label  class="form-label">
            <div>Login</div>
            <input type="text" class="form-control" name="login" value="<?= $model->login ?>" required>
        </label>
    </div>
    <div>
        <label  class="form-label">
            <div>Password</div>
            <input type="password" class="form-control"  name="password" value="" required>
        </label>
    </div>
    <div>
        <button class="btn btn-outline-primary" type="submit">Вход</button>
    </div>
</form>

<?php 
$this->setCssFile(ASSETS_CSS_PATH . "form-register.css");