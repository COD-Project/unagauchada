<div class="modal fade modal-ext" id="ListGauchadas" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
             <?php
                $user = Users()[$this->router->getId()];
                $HTML = '<h3>' . $user['completeName'] .' se postuló en las siguientes gauchadas:</h3>
                <br>';
                $HTML .= '<ul class="list-group">';
                $gauchadas = Gauchadas();
                $postulantes = Postulants();
                foreach ($postulantes as $postulante) {
                  if($postulante['idUser'] == $this->router->getId()) {
                    $HTML .= '<li class="list-group-item justify-content-between">
                    <h4>' . $gauchadas[$postulante['idGauchada']]['title'] . '</h4>
                    <span>
                      <a class="btn btn-warning option-button text-center" data-dismiss="modal" data-toggle="modal" data-target="#Confirmation">
                        <i class="fa fa-check" style="color: #fff"></i>
                      </a>
                    </span>
                    </li>';
                  }
                  $HTML .= '</ul>';
                }
                echo $HTML;
             ?>
         </div>
       </div>
     </div>
   </div>
 </div>
<?php
  $this->include('gauchadas/postulantes/confirmation');
?>
