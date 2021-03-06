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
          $HTML = '';
          if($this->postulants) {
              $HTML .= '<ul class="list-group">';
    				for($i = 0; $i < count($this->postulants); $i++) {
              $HTML.= '
              <li class="list-group-item justify-content-between">
                <div class="container">
                  <div class="row">
                    <div class="col-3">
                      <span class="badge badge-pill badge-danger text-white">
                        <i class="fa fa-star"></i>' . $this->user['reputation'] . '
                      </span>
                    </div>
                    <div class="col-5 text-fluid">
                      <h6>'.$this->postulants[$i]['completeName'].'</h6>
                    </div>
                    <div class="col-2 text-right">
                        <a class="btn btn-warning option-button text-right" href="profiles/profile/' . $this->postulants[$i]['idUser'] . '">
                          <i class="fa fa-user"></i>
                        </a>
                    </div>
              ';
              if(!$this->selected) {
                $HTML .= '
                    <div class="col-2">
                      <a onclick="postulantconfirm(this.href)" href="postulants/edit/' . $this->postulants[$i]['idGauchada'] . '/' . $this->postulants[$i]['idUser'] . '" class="btn btn-warning option-button text-right" data-dismiss="modal" data-toggle="modal" data-target="#Confirmation">
                        <i class="fa fa-check" style="color: #fff"></i>
                      </a>
                    </div>
              ';
              } else if($this->selected[0]['idUser'] == $this->postulants[$i]['idUser']){
                $HTML .= '
                    <div class="col-2 text-right">
                      <span class="badge badge-success">
                        <i class="fa fa-check"></i>
                      </span>
                    </div>';
              } else {
                $HTML .= '
                    <div class="col-2 text-right">
                      <span class="badge badge-danger">
                        <i class="fa fa-close"></i>
                      </span>
                    </div>';
              }
              $HTML .= '
                  </div>
                  <hr/>
                  <div class="row">
                    <div class="col-12 text-center" style="margin-top: -17px;">
                    <p style="color: gray;"><small>"' . $this->postulants[$i]['description'] . '"</small></p>
                    </div>
                  </div>
                </div>
              </li><br>';
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
