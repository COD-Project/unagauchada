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
                $HTML = '<h3>' . $this->user['completeName'] .' se postuló en las siguientes gauchadas:</h3>
                <br>';
                // $this->postulantes = PostulantIn($this->router->getId(), $this->sessions->connectedUser()['idUser']);
                if($this->postulants) {
                  $HTML .= '<ul class="list-group">';
                  foreach ($this->postulants as $postulante) {
                    if($postulante['idUser'] == $this->router->getId()) {
                      $HTML .= '<li class="list-group-item justify-content-between">
                      <h4>' . $this->gauchadas[$postulante['idGauchada']]['title'] . '</h4>
                      <small>' . $postulante['description'] . '</small>
                      <span>';
                      if(!SelectedPostulant($postulante['idGauchada'])) {
                        $HTML .= '<a onclick="postulantconfirm(this.href)" href="postulants/edit/' . $postulante['idGauchada'] . '/' . $postulante['idUser'] . '" class="btn btn-warning option-button text-center" data-dismiss="modal" data-toggle="modal" data-target="#Confirmation">
                          <i class="fa fa-check" style="color: #fff"></i>
                        </a>';
                      }
                      $HTML .= '</span>
                      </li>';
                    }
                    $HTML .= '</ul>';
                  }
                } else {
                  $HTML .= '<div class="col-12">
                  <div class="alert alert-info alert-dismissible fade show" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <p class="text-fluid">Parece que el usuario <strong>' . $this->user['completeName'] . '</strong> no se postuló en ninguna de tus gauchadas.<br>O ya finalizó todas</p>
                  </div></div>';
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
