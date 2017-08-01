<form id="edit_user_form" role="form" method="post" action="" enctype="multipart/form-data">
  <div class="form-group row">
      <label class="col-lg-3 col-form-label form-control-label">Nombre</label>
      <div class="col-lg-9">
          <input id="name" class="form-control" type="text" value=" <?php echo $this->reputation['name']; ?> ">
      </div>
  </div>
  <div class="form-group row">
      <label class="col-lg-3 col-form-label form-control-label">Apellido</label>
      <div class="col-lg-9">
          <input id="surname" class="form-control" type="number" value=" <?php echo $this->reputation['name']; ?> ">
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
