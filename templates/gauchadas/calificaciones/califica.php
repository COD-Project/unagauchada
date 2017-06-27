<div class="modal fade modal-ext" id="califica" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
     <div class="modal-content" style="background: #fafafa; border-radius: 0px;">

       <div class="modal-header">
         <div>
           <!-- -->
         </div>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true"> &times; </span>
         </button>
       </div>
       <div class="modal-body">
         <div class="text-center">
             <h3><i class="fa fa-users"></i> Calificar Gauchada </h3>
         </div>
         <hr>
        	<div class="below-topnav"></div>
			  	<div class="container">
					<div class="cmd_form_container">
    					<div class="wrap">
			    			<form name="cmd_form" class="cmd_form" action=<?php echo "ratings/add/" . $this->router->getId() ?> method="post">
					            <div class="cmd_input-group">
									<label class="col-2 control-label" for="rating">Calificaciones</label>
									<div class="col-10">
										<select id="rating" class="form_control" name="rating">
										<option value=0 selected disabled> Seleccione una calificacion </option>
										<option value=1> Mal </option>
										<option value=2> Neutral </option>
										<option value=3> Bien </option>
										</select>
									</div>
								</div>
					          	<div class="cmd_input-group">
						            <input type="text" id="body" name="body">
						            <label class="cmd_label" for="body">Descripción</label>
					          	</div>
					          	<input type="submit" id="btn-submit" value="Añadir">
					        </form>
					    </div>
			        </div>
			    </div>
			</div>
         </div>
       </div>
     </div>
   </div>
 </div>
