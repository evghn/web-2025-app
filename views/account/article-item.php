<div class="card mb-3">
    <div class="card-header">
        <h4>
            <?= $article["login"] ?? "anonymous" ?>, <?= $article["created_at"] ?>             
        </h4>
        <div>
            <?= $article["topic_name"] ?? "Категория не определена" ?>
        </div>
    </div>
  <div class="card-body">
    <h5 class="card-title"><?= $article["name"] ?></h5>    
    <div>
        Статус: <span class="fw-400 text-secondary"><?= $article["status_title"] ?></span>
    </div>
    <div class="d-flex gap-3 justify-content-end">
        <a href="account/postApply/id/<?= $article["id"] ?>" class="btn btn-outline-success"><i class="fa-regular fa-thumbs-up fa-lg"></i></a>
        <a href="account/postView/id/<?= $article["id"] ?>" class="btn btn-outline-primary"><i class="fa-regular fa-eye fa-lg"></i></a>
                
    </div>
  </div>
</div>