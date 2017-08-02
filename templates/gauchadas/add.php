<!DOCTYPE html>
<html>
  <?php $this->render('overall/header'); ?>
<body>
  <?php $this->render('overall/topnav'); ?>
  <div class="below-topnav"></div>
  <div class="container">
    <?php if($this->sessions->hasCredits()): ?>
      <div class="cmd_form_container">
        <div class="wrap">
          <form name="cmd_form" class="cmd_form" action="gauchadas/add" method="post" enctype="multipart/form-data">
            <div class="cmd_input-group">
              <input type="text" id="title" name="title">
              <label class="cmd_label" for="title">Titulo</label>
            </div>
            <div class="cmd_input-group">
              <input type="text" id="body" name="body">
              <label class="cmd_label" for="body">Descripción</label>
            </div>
            <div class="cmd_input-group">
              <label class="col-2 control-label" for="categories">Categorias</label>
              <div class="col-10">
                <select id="idCategory" class="form_control" name="idCategory">
                    <?php if($this->categories != NULL): ?>
                      <option value=0 selected disabled> Seleccione una categoria </option>
                      <?php for($i = 0; $i < count($this->categories); $i++): ?>
                        <option value="<?= $this->categories[$i]['idCategory'] ?>"><?= $this->categories[$i]['name'] ?></option>";
                      <?php endfor ?>
                    <?php else: ?>
                      <option value="blank" selected disabled>No hay categorias</option>
                    <?php endif; ?>
                </select>
              </div>
            </div>
            <datalist id="states"></datalist>
            <div class="cmd_input-group">
              <input list="states" type="text" id="state" name="state">
              <label class="cmd_label" for="state">Provincia</label>
            </div>
            <datalist id="localities"></datalist>
            <div class="cmd_input-group">
              <input list="localities" type="text" id="locality" name="locality">
              <label class="cmd_label" for="locality">Localidad</label>
            </div>
            <br>
            <div class="cmd_input-group">
              <input type="date" id="limitDate" min="<?= date('Y-m-d') ?>" name="limitDate">
              <label class="cmd_label" for="limitDate">Plazo Limite</label>
            </div>
            <div class="cmd_input-group">
              <input type="file" name="images[]" accept="image/*" multiple="">
              <label class="cmd_label" for="images[]">Imágenes</label>
            </div>
            <input type="submit" id="btn-submit" value="Añadir">
          </form>
        </div>
      </div>
    <?php else: ?>
      <div class="card text-center" style="margin-top:150px">
        <div class="card-header">
          Espera
        </div>
        <div class="card-block">
          <h4 class="card-title">No se disponen de creditos</h4>
          <p class="card-text">Debes tener aunque sea un crédito para poder solicitar una gauchada, si deseas comprar mas, ¡toca el botón!.</p>
          <a href="creditos/comprar" class="btn btn-primary" style="background-color:coral; border-color:coral">Comprar Creditos</a>
        </div>
      </div>
    <?php endif; ?>
  </div>
  <?php $this->render('overall/footer'); ?>
</body>
</html>
