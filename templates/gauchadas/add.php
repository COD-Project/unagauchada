<!DOCTYPE html>
<html>
	<?php $this->render('overall/header'); ?>
<body>
	<?php $this->render('overall/topnav'); ?>
	<div class="below-topnav"></div>
  	<div class="container">
    	<div class="cmd_form_container">
	      	<div class="wrap">
	    		<?php
	    			if($this->sessions->hasCredits()) {
	    				echo ('
			    			<form name="cmd_form" class="cmd_form" action="gauchadas/add" method="post">
					            <div class="cmd_input-group">
					            	<input type="text" id="title" name="title">
					            	<label class="cmd_label" for="title">Titulo</label>
					            </div>
					          	<div class="cmd_input-group">
						            <input type="text" id="body" name="body">
						            <label class="cmd_label" for="body">Descripción</label>
					          	</div>
								<div class="cmd_input-cmd_input-group">
									<label class="col-2 control-label" style="color:blue" for="categories">Categorias</label>
									<div class="col-10">
										<select id="idCategory" class="form_control" name="idCategory">');
												$_categories = Categories();
												if($_categories != NULL) {
													$HTML = "<option value=0 selected disabled> Seleccione una categoria </option>";
													for($i = 0; $i < count($_categories); $i++){
														$HTML .= "<option value=" . $_categories[$i]['idCategory'] . ">" . $_categories[$i]['name'] . "</option>";
													}
							          			} else {
													$HTML = "<option value=\"blank\" selected disabled>No hay categorias</option>";
												}
												echo $HTML;
											echo ('
										</select>
									</div>
								<br>
								<div class="cmd_input-cmd_input-group">
									<label class="col-2 control-label" style="color:blue" for="categories">Localidades</label>
									<div class="col-10">
										<select id="idCategory" class="form_control" name="idCategory">
											
										</select>
									</div>
								<br>
					            <div class="cmd_input-group">
					            	<label class="col-2 control-label" style="color:blue" for="fechalimite">PlazoLimite</label>
						            <input type="date" id="limitDate" min="'.date('Y-m-d').'" name="limitDate">
					            </div>
				        		<input type="submit" id="btn-submit" value="Añadir">
			       			</form>');
	    			} else {
	    				echo ('<h2 style="color:black">Usted no posee creditos disponibles para solicitar una gauchada.</h2>');
	    			}
	    			?>
	      	</div>
  		</div>
  	</div>
  	<?php $this->render('overall/footer'); ?>
</body>
</html>