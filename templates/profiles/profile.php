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
          $postulants = UserPostulants($this->router->getId());
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
              <ul class="list-group">';
            if($postulants) {
              foreach ($postulants as $postulant) {
                $rating = Rating($postulant);
                if($rating) {
                  $HTML .= '<li class="list-group-item justify-content-between">
                    <span class="badge badge-primary"> ' . $rating['title'] . '</span>
                    <h4>' . $rating['body'] . '</h4>
                    <span class="badge badge' . $rating['color'] . ' badge-pill">'.$rating['rating'].'</span>
                  </li>';
                }
              }
            }
            $HTML .= '</ul>
            <br><hr><br>
            </div>
          </div>';

            if(PostulantAndNotSelected($this->router->getId(), $this->sessions->connectedUser()['idUser']) || PostulantAndNotSelected($this->sessions->connectedUser()['idUser'], $this->router->getId())) {
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
