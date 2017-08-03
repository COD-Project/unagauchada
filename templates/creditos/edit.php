<form role="form" method="post" action="credits/add">
  <div class="form-group row">
      <label class="col-lg-3 col-form-label form-control-label">Precio</label>
      <div class="col-lg-9">
          <input class="form-control" name="mount" type="number" min="0" max="<?= PHP_INT_MAX ?>" value="<?= $this->credit['monto'] ?? 0 ?>">
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
