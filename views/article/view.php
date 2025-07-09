
<div class="card mb-3">
    <div class="card-header">
        <h4>
            <?= $article["login"] ?>, <?= $article["created_at"] ?>             
        </h4>
        <div>
            <?= $article["topic_name"] ?>
        </div>
    </div>
  <div class="card-body">
    <h5 class="card-title"><?= $article["name"] ?></h5>    
    <div>
        Статус: <span class="fw-400 text-secondary"><?= $article["status_title"] ?></span>
    </div>
    <div class="p-2">
        <?= $article["content"] ?>
    </div>
    <div class="d-flex gap-3 justify-content-end">
        <!-- <a href="article/view/id/<?=$article["id"] ?>" class="btn btn-outline-primary"><i class="fa-regular fa-eye fa-lg"></i></a>         -->
    </div>
  </div>
</div>