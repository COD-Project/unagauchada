<div class="container" id="categories_list">
  <div class="wrap">
  <?php if (!$this->categories): ?>
    <div class="col-12">
      <div class="alert alert-info alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <p class="text-fluid">Aún no se han registrado categorias.</p>
      </div>
    </div>
  <?php else: ?>
    <ul class="list-group">
    <?php foreach ($this->categories as $id => $constent_array): ?>
      <li class="list-group-item justify-content-between">
        <div class="col-1">
          <i class="fa fa-tag"></i>
        </div>
        <?php if ($this->categories[$id]['idCategory'] != 1): ?>
          <div class="col-1">
            <a class="edit" href="categories/edit/<?= $this->categories[$id]['idCategory'] ?>">
              <i class="fa fa-edit" style="color: blue"></i>
            </a>
          </div>
        <?php else: ?>
          <div class="col-1"></div>
        <?php endif; ?>
        <div class="col-7"><?= $this->categories[$id]['name'] ?></div>
        <div class="col-3">
          <?php if ($this->categories[$id]['idCategory'] != 1): ?>
            <a style="color: grey" href="categories/delete/<?= $this->categories[$id]['idCategory'] ?>">
              <i class="fa fa-close"></i>
            </a>
          <?php endif; ?>
        </div>
      </li>
    <?php endforeach; ?>
    </ul>
  <?php endif; ?>
  </div>
</div>
