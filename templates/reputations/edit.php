<form role="form" method="post" action="">
  <div class="form-group row">
      <label class="col-lg-3 col-form-label form-control-label">Nombre</label>
      <div class="col-lg-9">
          <input id="name" class="form-control" type="text" value=" <?= $this->reputation['name']; ?> ">
      </div>
  </div>
  <div class="form-group row">
      <label class="col-lg-3 col-form-label form-control-label">Límite Inferior</label>
      <div class="col-lg-9">
          <input class="form-control" type="number" value="<?= $this->reputation['min_bound'];?>" disabled>
      </div>
  </div>
  <div class="form-group row">
      <label class="col-lg-3 col-form-label form-control-label">Límite Superior</label>
      <div class="col-lg-9">
          <input id="bound" class="form-control" min="<?= $this->reputation['min_bound'];?>" max="<?= $this->reputation['next'];?>" type="number" value="<?= $this->reputation['bound'];?>">
      </div>
  </div>
  <div class="form-group row">
      <label class="col-lg-3 col-form-label form-control-label"></label>
      <div class="col-lg-9 text-center">
        <button id="edit_user_button" class="btn btn-warning btn-lg btn-block option-button text-center">
          <i class="fa fa-send"></i>
        </button>
      </div>
  </div>
</form>
