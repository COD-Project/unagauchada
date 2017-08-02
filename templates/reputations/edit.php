<form role="form" method="post" action="reputations/edit/<?= $this->reputation['idReputation'] ?>">
  <div class="form-group row">
      <label class="col-lg-3 col-form-label form-control-label">Nombre</label>
      <div class="col-lg-9">
          <input name="name" class="form-control" type="text" value="<?= $this->reputation['name']; ?>" required>
      </div>
  </div>
  <div class="form-group row">
      <label class="col-lg-3 col-form-label form-control-label">Límite Inferior</label>
      <div class="col-lg-9">
          <input class="form-control" type="number" value="<?= $this->reputation['min_bound'] ?>" disabled>
      </div>
  </div>
  <div class="form-group row">
      <label class="col-lg-3 col-form-label form-control-label">Límite Superior</label>
      <div class="col-lg-9">
          <input type="number" name="bound" class="form-control" min="<?= $this->reputation['min_bound'] ?>" max="<?= $this->reputation['next'] ?>" value="<?= $this->reputation['bound'] ?>">
      </div>
  </div>
  <div class="form-group row">
      <label class="col-lg-3 col-form-label form-control-label"></label>
      <div class="col-lg-9 text-center">
        <button class="btn btn-warning btn-lg btn-block option-button text-center">
          <i class="fa fa-edit"></i>
        </button>
      </div>
  </div>
</form>
