<!DOCTYPE html>
<html>
  <?php $this->render('overall/header'); ?>
<body>
    <?php $this->render('overall/topnav'); ?>

    <div class="below-topnav" style="margin-top: 100px"></div>
    <div class="container">

   		<?php 

		    if (isset($_GET['success'])) {
			    echo '<div class="container pt-6 text-center wow fadeIn" data-wow-delay="0.2s">
			    <div class="alert alert-success alert-dismissible fade show" role="alert">
			    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			    <p class="text-fluid"><strong>' . $_GET['success'] . '</strong></p>
			    </div></div>';
			}

		?>
	    <div class="cmd_form_container">
			<div class="wrap">
				<form name="cmd_form" class="cmd_form" action="categories/edit" method="post">
				<?php
					$HTML = '
					<div class="cmd_input-group">
						<label class="col-2 control-label" for="categories">Categorias</label>
						<div class="col-10">
							<select id="idCategory" class="form_control" name="idCategory">';
									$categories = Categories();
									if($categories != NULL) {
										$HTML .= "<option value=0 selected disabled> Seleccione una categoria </option>";
										for($i = 0; $i < count($categories); $i++){
											$HTML .= "<option value=" . $categories[$i]['idCategory'] . ">" . $categories[$i]['name'] . "</option>";
										}
				          } else {
										$HTML .= "<option value=\"blank\" selected disabled>No hay categorias</option>";
									}
								$HTML .= '
							</select>
						</div>
					</div>';
					echo $HTML;
					?>
					<div class="cmd_input-group">
		            	<input type="text" id="name" name="name">
		            	<label class="cmd_label" for="name">Nombre de Categoria</label>
		            </div>
					<input type="submit">
				</form> 
	  		</div>
	  	</div>
  	</div>
  <?php $this->render('overall/footer'); ?>
</body>
</html>