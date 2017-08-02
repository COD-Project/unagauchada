<div class="list-group">
  <?php if($this->postulants): ?>
    <?php foreach ($this->postulants as $postulant):
      $rating = Rating($postulant['idGauchada']);
      if($rating): ?>
        <a href="gauchadas/view/<?= $postulant['idGauchada'] ?>" class="list-group-item list-group-item-action flex-column align-items-start">
          <div class="d-flex w-100 justify-content-between">
            <h5 class="mb-1"><strong><?= $rating['title'] ?></strong></h5>
            <h5><span class="badge badge-pill badge<?= $rating['color'] ?>"><?= $rating['rating'] ?></span></h5>
          </div>
          <p class="mb-1"><?= $rating['body'] ?></p>
        </a>
      <?php endif; ?>
    <?php endforeach; ?>
  <?php else: ?>

  <?php endif; ?>
</div>
