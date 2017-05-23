<!DOCTYPE html>
<html>
	<?php $this->render('overall/header'); ?>
<body>
	<<?php $this->render('overall/topnav'); ?>
	<div class="below-topnav"></div>
  <div class="container">
    <div class="cmd_form_container">
      <div class="wrap">
        <form name="cmd_form" class="cmd_form" action="news/add" method="post">
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
					<div>
						<div class="cmd_input-group">
							<label class="col-md-2 control-label" for="categories">Categorias</label>
							<div class="col-md-10">
								<select id="categories" name="categories[]" multiple>
									<?php
										$categories = Categories();
										if($categories != NULL){
											$HTML = "<option value=\"blank\" selected disabled>Seleciona categorias</option>";
											foreach ($categories as $id => $content_array) {
												$HTML .= "<option value=" . $categories[$id]['id'] . ">" . $categories[$id]['name'] . "</option>";
											}
					          } else {
											$HTML = "<option value=\"blank\" selected disabled>No hay categorias</option>";
										}
										echo $HTML;
									?>
								</select>
							</div>
						</div>
					</div>
        	<input type="submit" id="btn-submit" value="Add">
       	</form>
      </div>
  	</div>
  </div>
  <?php $this->render('overall/footer'); ?>
</body>
</html>
