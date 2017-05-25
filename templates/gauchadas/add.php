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
          <div>
            <div class="cmd_input-group">
              <input type="text" id="title" name="title">
              <label class="cmd_label" for="title">Titulo</label>
            </div>
          </div>
          <div>
            <div class="cmd_input-group">
              <input type="text" id="body" name="body">
              <label class="cmd_label" for="body">Cuerpo</label>
            </div>
          </div>
					<div class="cmd_input-group">
							<label class="col-md-2 control-label" for="categories">Categorias</label>
							<div class="col-md-10">
								<select id="categories" name="categories[]">
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
			<!--<input id="idUser" value=<?php echo $this->sessions->connectedUser()['idUser']?>>-->
			<br>
        	<input type="submit" id="btn-submit" value="Add">
       	</form>
      </div>
  	</div>
  </div>
  <?php $this->render('overall/footer'); ?>
</body>
</html>
