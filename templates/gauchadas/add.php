<!DOCTYPE html>
<html>
	<?php $this->render('overall/header'); ?>
<body>
	<?php $this->render('overall/topnav'); ?>
	<div class="below-topnav"></div>
  <div class="container">
    <div class="cmd_form_container">
      <div class="wrap">
        <form name="cmd_form" class="cmd_form" action="gauchadas/add" method="post">
          <div class="group">
            <input type="text" id="title" name="title">
            <span class="highlight"></span><span class="bar"></span>
            <label for="title">Titulo</label>
          </div>
          <div class="group">
            <input type="text" id="body" name="body">
            <span class="highlight"></span><span class="bar"></span>
            <label for="body">Descripción</label>
          </div>
					<div class="cmd_input-group">
						<label class="col-md-2 control-label" for="categories">Categorias</label>
						<div class="col-md-10">
							<select id="idCategory" name="idCategory">
								<?php
									$categories = Categories();
									if($categories != NULL){
										$HTML = "<option value= 0 selected disabled> Seleccione una categoria </option>";
										for($i = 0; $i < count($categories); $i++){
											$HTML .= "<option value=" . $categories[$i]['idCategory'] . ">" . $categories[$i]['name'] . "</option>";
										}
				          			} else {
										$HTML = "<option value=\"blank\" selected disabled>No hay categorias</option>";
									}
									echo $HTML;
								?>
							</select>
						</div>
          <div class="group">
            <h4>Plazo Limite</h4>
            <input type="date" id="limitDate" name="limitDate">
            <span class="highlight"></span><span class="bar"></span>
            <label for="limitDate"></label>
          </div>
          <input type="hidden" id="idUser" name="idUser" value=<?php echo ("\"" . $this->sessions->connectedUser()['idUser'] . "\"") ?>>
        	<input type="submit" id="btn-submit" value="Añadir">
       	</form>
      </div>
  	</div>
  </div>
  <?php $this->render('overall/footer'); ?>
</body>
</html>
