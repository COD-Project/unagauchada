<div class="modal fade modal-ext" id="Postulants" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
             <h3><i class="fa fa-users"></i> Postulantes </h3>
         </div>
         <hr>
           <?php
            $postulantes = Postulants($this->router->getId());
            $HTML = '';
            if($postulantes) {
                $HTML .= '<ul class="list-group">';
      				for($i = 0; $i < count($postulantes); $i++) {
                $HTML.= '<div class="container"><li class="list-group-item justify-content-between">
                  <h4>'.$postulantes[$i]['completeName'].'</h4>
                  <span>
                    <a class="btn btn-warning option-button text-right" href="profiles/profile/' . $postulantes[$i]['idUser'] . '/' . $this->router->getId() . '/' . $postulantes[$i]['idUser'] . '">
                      <i class="fa fa-user"></i>
                    </a>
                    <a class="btn btn-warning option-button text-right" data-dismiss="modal" data-toggle="modal" data-target="#Confirmation">
                      <i class="fa fa-check" style="color: #fff"></i>
                    </a>
                  </span>
                </li>
              </div>';
              }
              $HTML .= '</ul>';
            } else {
              $HTML .= '<div class="col-12">
              <div class="alert alert-info alert-dismissible fade show" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <p class="text-fluid"><strong>Ouch!</strong> La gauchada no tiene postulantes</p>
              </div></div>';
            }
            echo $HTML;
           ?>
         </div>
       </div>
     </div>
   </div>
 </div>