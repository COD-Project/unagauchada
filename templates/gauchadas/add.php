<!DOCTYPE html>
<html>
	<?php $this->render('overall/header'); ?>
<body>
	<?php $this->render('overall/topnav'); ?>
	<datalist id="states"></datalist>
	<datalist id="locates"></datalist>
	<div class="below-topnav"></div>
  	<div class="container">
	    		<?php
	    			$HTML = "";
	    			if($this->sessions->hasCredits()) {
	    				$HTML .= '
	    					<div class="cmd_form_container">
	      					<div class="wrap">
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
											<select id="idCategory" class="form_control" name="idCategory">';
													$_categories = Categories();
													if($_categories != NULL) {
														$HTML .= "<option value=0 selected disabled> Seleccione una categoria </option>";
														for($i = 0; $i < count($_categories); $i++){
															$HTML .= "<option value=" . $_categories[$i]['idCategory'] . ">" . $_categories[$i]['name'] . "</option>";
														}
								          } else {
														$HTML .= "<option value=\"blank\" selected disabled>No hay categorias</option>";
													}
												$HTML .= '
											</select>
										</div>
									</div>
									<br>
									<div class="cmd_input-group">
						            	<input list="states" type="text" id="state" name="state">
						            	<label class="cmd_label" for="state">Provincia</label>
						            </div>
									<div class="cmd_input-group">
						            	<input list="locates" type="text" id="locate" name="locate">
						            	<label class="cmd_label" for="locate">Localidad</label>
						            </div>
									<br>
					        <div class="cmd_input-group">	        	
						        <input type="date" id="limitDate" min="' . date('Y-m-d') . '" name="limitDate">
						        <label class="cmd_label" for="limitDate">Plazo Limite</label>
					        </div>
				        	<input type="submit" id="btn-submit" value="Añadir">
			       		</form>
			       		</div>
  						</div>';
	    			} else {
	    				$HTML .= '
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
	    				';
	    			}
	    			echo $HTML;
	    			?>
  	</div>
  	<?php $this->render('overall/footer'); ?>
</body>
</html>