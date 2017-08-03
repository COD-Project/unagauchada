<form role="form" method="post" action="reputations/add">
  <div class="form-group row">
      <label class="col-lg-3 col-form-label form-control-label">Nombre</label>
      <div class="col-lg-9">
          <input name="name" class="form-control" type="text" value="" placeholder="Nombre de reputación" required>
      </div>
  </div>
  <div class="form-group row">
      <label class="col-lg-3 col-form-label form-control-label">Límite Superior</label>
      <div class="col-lg-9">
          <input type="number" name="bound" class="form-control" min="<?= PHP_INT_MIN ?>" max="<?= PHP_INT_MAX ?>" value="">
      </div>
  </div>
  <div class="form-group row">
      <label class="col-lg-3 col-form-label form-control-label"></label>
      <div class="col-lg-9 text-center">
        <button class="btn btn-warning btn-lg btn-block option-button text-center">
          <i class="fa fa-send"></i>
        </button>
      </div>
  </div>
</form>
