<!DOCTYPE html>
<html>
  <?php $this->include('overall/header'); ?>
  <body>
    <?php $this->include('overall/topnav'); ?>
    <div class="" style="background-color: transparent; padding-top: 125px;"></div>
    <div class="container">
      <div class="row">
        <?php
          $user = Users()[$this->router->getId()];
          $postulants = UserPostulantions($this->router->getId());
          $HTML = '';
          if ($user) {
            $HTML .= '<div class="col-11">
              <h1>' . $user['completeName'] . '</h1>
            </div>
            <div class="col-1">
              <a class="btn btn-warning option-button text-center" data-toggle="modal" data-target="#ListGauchadas">
                <i class="fa fa-check" style="color: #fff"></i>
              </a>
            </div>
            <div class="col-12">
              <hr>
              <br>
              <div class="list-group">';
            if($postulants) {
              foreach ($postulants as $postulant) {
                $rating = Rating($postulant['idGauchada']);
                if($rating) {
                  $HTML .= '<a href="gauchadas/view/' . $postulant['idGauchada'] . '" class="list-group-item list-group-item-action flex-column align-items-start">
                    <div class="d-flex w-100 justify-content-between">
                      <h5 class="mb-1"><strong>' . $rating['title'] . '</strong></h5>
                      <h5><span class="badge badge-pill badge' . $rating['color'] . '">'.$rating['rating'].'</span></h5>
                    </div>
                    <p class="mb-1">' . $rating['body'] . '</p>
                  </a>';
                }
              }
            }
            $HTML .= '</div>
            <br><hr><br>
            </div>
          </div>';

            if(SelectedAndNotFinished($this->router->getId(), $this->sessions->connectedUser()['idUser']) || SelectedAndNotFinished($this->sessions->connectedUser()['idUser'], $this->router->getId())) {
              $user = Users()[$this->router->getId()];
              $HTML .= '<div class="jumbotron">
              <h1 class="h1-responsive"> Información de contacto</h1>
              <div class="row">
                <div class="col-2">
                  <img src=' . $user['profilePicture'] . '></img>
                </div>
                <div class="col-10">
                  <p class="lead"> Nombre: <small>' .$user['name'] . '</small></p>
                  <p class="lead"> Apellido: <small>' . $user['surname'] . '</small></p>
                  <p class="lead"> Email: <small>' . $user['email'] . '</small></p>
                  <p class="lead"> Teléfono: <small>' . $user['phone'] . '</small></p>
                  <p class="lead"> Fecha de Nacimiento: <small>' . $user['birthdate'] . '</small></p>
                  <p class="lead"> Localización: <small>' . $user['location'] . '</small></p>
                </div>
              </div>
            </div>';
          }
        }
          echo $HTML;
        ?>
      </div>
    </div>
    <?php
      $this->include('gauchadas/postulantes/list');
      $this->include('overall/footer');
    ?>
  </body>
</html>
