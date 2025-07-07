<?php

use app\models\AccountRole;
use core\models\AppUser;

?>
<nav class="navbar navbar-expand-lg">
  <div class="container-fluid">
    <a class="navbar-brand" href="/">Блог</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <?php foreach($menu as $item): ?>
            <li class="nav-item">
              <?php if ($item["auth"] === false && AppUser::isGuest()): ?> 
                <a class="nav-link"  aria-current="page" href="<?= $item['link'] ?>"><?= $item["title"] ?></a>
             <?php elseif ($item["auth"] === true && AccountRole::checkUserRole($item["role"])): ?>
                <a class="nav-link"  aria-current="page" href="<?= $item['link'] ?>"><?= $item["title"] ?></a>
             <?php elseif ($item["auth"] === null): ?>
                <a class="nav-link"  aria-current="page" href="<?= $item['link'] ?>"><?= $item["title"] ?></a>
             <?php endif ?>
            </li>
        <?php endforeach ?>
      </ul>
    </div>
  </div>
</nav>
