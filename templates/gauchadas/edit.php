<!DOCTYPE html>
<html>
  <?php $this->render('overall/header'); ?>
<body>
  <?php $this->render('overall/topnav'); ?>
  <datalist id="states"></datalist>
  <datalist id="localities"></datalist>
  <div class="below-topnav"></div>
    <div class="container">
      <?php
        $HTML = "";
        $HTML .= '
          <div class="cmd_form_container">
            <div class="wrap">
              <form name="cmd_form" class="cmd_form" action="gauchadas/edit/' . $this->gauchada["idGauchada"] . '" method="post" enctype="multipart/form-data">
                    <div class="cmd_input-group">
                      <input type="text" id="title" name="title" value="' . $this->gauchada["title"] . '">
                      <label class="cmd_label" for="title">Titulo</label>
                    </div>
                    <div class="cmd_input-group">
                      <input type="text" id="body" name="body" value="' . $this->gauchada["body"] . '">
                      <label class="cmd_label" for="body">Descripción</label>
                    </div>
              <div class="cmd_input-group">
                <label class="col-2 control-label" for="categories">Categorias</label>
                <div class="col-10">
                  <select id="idCategory" class="form_control" name="idCategory">';
                      if($this->categories != NULL) {
                        $HTML .= "<option value=0 selected disabled> Seleccione una categoria </option>";
                        for($i = 0; $i < count($this->categories); $i++){
                          $HTML .= "<option value=" . $this->categories[$i]['idCategory'] . ">" . $this->categories[$i]['name'] . "</option>";
                        }
                      } else {
                        $HTML .= "<option value=\"blank\" selected disabled>No hay categorias</option>";
                      }
                    $HTML .= '
                  </select>
                </div>
              </div>
              <div class="cmd_input-group">
                      <input list="states" type="text" id="state" name="state" value="' . $this->gauchada["province"] . '">
                      <label class="cmd_label" for="state">Provincia</label>
                    </div>
              <div class="cmd_input-group">
                      <input list="localities" type="text" id="locality" name="locality" value="' . $this->gauchada["location"] . '">
                      <label class="cmd_label" for="locality">Localidad</label>
                    </div>
              <br>
                  <div class="cmd_input-group">
                    <input type="date" id="limitDate" min="' . date('Y-m-d') . '" name="limitDate" value="' . $this->gauchada["limitDate"] . '">
                    <label class="cmd_label" for="limitDate">Plazo Limite</label>
                  </div>
                  <div class="cmd_input-group">
                    <input type="file" name="images[]" accept="image/*" multiple="">
                    <label class="cmd_label" for="images[]">Imágenes</label>
                  </div>
                  <input type="submit" id="btn-submit" value="Editar">
                </form>
              </div>
        </div>';
      echo $HTML;
      ?>
    </div>
    <?php $this->render('overall/footer'); ?>
</body>
</html>
