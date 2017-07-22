<form id="edit_user_form" role="form" method="get" action="">
  <div class="form-group row">
      <label class="col-lg-3 col-form-label form-control-label">Buscar</label>
      <datalist id="titles">
        <?php
          foreach ($this->models['gauchadas']->get(['all']) as $key => $value) {
            echo"<option value=\"" . $value['title'] . "\"></option>";
          }
        ?>
      </datalist>
      <div class="col-lg-9">
          <input list="titles" name="search" class="form-control" type="text" value="" placeholder="">
      </div>
  </div>
  <div class="form-group row">
      <label class="col-lg-3 col-form-label form-control-label">Categoría</label>
      <div class="col-lg-9">
          <select class="form-control" name="category">
            <option value="" selected disabled>Todas las categorías...</option>
            <?php
              foreach ($this->models['categories']->get() as $key => $value) {
                echo"<option value=\"" . $value['idCategory'] . "\">" . $value['name'] . "</option>";
              }
            ?>
          </select>
      </div>
  </div>
  <div class="form-group row">
      <label class="col-lg-3 col-form-label form-control-label">Localidad</label>
      <datalist id="states"></datalist>
      <datalist id="localities"></datalist>
      <div class="col-lg-3">
          <input list="states" id="state" name="state" class="form-control" type="text" value="" placeholder="Provincia">
      </div>
      <div class="col-lg-6">
          <input list="localities" id="locality" name="locality" class="form-control" type="text" value="" placeholder="Ciudad">
      </div>
  </div>
  <div class="form-group row">
      <label class="col-lg-3 col-form-label form-control-label"></label>
      <div class="col-lg-9 text-center">
        <button type="submit" class="btn btn-warning btn-lg btn-block option-button text-center">
          <i class="fa fa-search"></i>
        </button>
      </div>
  </div>
</form>
