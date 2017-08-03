<!DOCTYPE html>
<html>
<?php $this->render('overall/header'); ?>

<body>
  <?php $this->render('overall/topnav'); ?>
  <div class="container">
    <?php
        $HTML = '';
        if ($this->gauchada['images']) {
          $HTML .= '
          <div id="gauchadas_images" style="padding-top: 100px;" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">';
          for($i = 0; $i < count($this->gauchada['images']); $i++) {
            if ($i == 0) {
              $HTML .= '<li data-target="#gauchadas_images" data-slide-to="' . ($i + 1) . '" class="active"></li>';
            } else {
              $HTML .= '<li data-target="#gauchadas_images" data-slide-to="' . ($i + 1) . '"></li>';
            }
          }
          $HTML .= '
            </ol>
            <div class="carousel-inner" role="listbox">';

          for($i = 0; $i < count($this->gauchada['images']); $i++) {
            if ($i == 0) {

              $HTML .= '
              <div class="carousel-item active">
                  <img class="img-fluid rounded mx-auto d-block" style="height: 100%;" src="' . $this->gauchada['images'][$i]['path'] . '">
              </div>';
            } else {
              $HTML .= '
              <div class="carousel-item">
                  <img class="img-fluid rounded mx-auto d-block" style="height: 100%;" src="' . $this->gauchada['images'][$i]['path'] . '">
              </div>';
            }
          }
          $HTML .= '</div>';
          if($this->gauchada['images']) {
            $HTML .= '
            <a class="carousel-control-prev" href="#gauchadas_images" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" style="color: black; "aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#gauchadas_images" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>';
          }
          $HTML .= '</div>';
          }
          echo $HTML;
          $HTML = "";
          if($this->selected[0]['idUser'] == $this->user['idUser'] && !$this->ranked) {
            $HTML .= '
            <div class="col-12"><br>
              <div class="alert alert-info alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <p class="text-fluid text-center">¡Felicitaciones <strong>' . $this->user['completeName'] . '</strong> el poncho es todo tuyo!</p>
              </div>
            </div>';
          } else if($this->selected[0]['idUser'] != $this->user['idUser'] && $this->gauchada['idUser'] != $this->user['idUser'] && $this->is_postulated() && $this->selected) {
            $HTML .= '
            <div class="col-12"><br>
              <div class="alert alert-info alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <p class="text-fluid text-center">Fuiste rechazado... Pero no te desmotives <a href=' . URL . '?state=' . str_replace(" ", "%20", $this->user['province']) . '&locality=' . str_replace(" ", "%20", $this->user['location']) . ' >aquí</a> hay más gauchadas</p>
              </div>
            </div>';
          } else if($this->selected[0]['idUser'] == $this->user['idUser'] && $this->ranked) {
            $HTML .= '
            <div class="col-12"><br>
              <div class="alert alert-info alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <p class="text-fluid text-center">¡¡Te han calificado tu gauchada!!<br>Puedes ver la calificación en tu <a href=profiles/myprofile> perfil </a></p>
              </div>
            </div>';
          }
          $HTML.= '
          <div class="row" style="padding-top: 50px">
            <div class="col-2 text-right">
              <div class="avatar">
                <a href=profiles/profile/' . $this->gauchada['user']['idUser'] . '><img src="' . $this->gauchada['user']['profilePicture'] . '" class="rounded-circle img-responsive" style="width: 11vh"></a>
              </div>
            </div>
            <div class="col-8">
              <h1 class="h1-responsive">'.$this->gauchada['title'] . '</h1>
                <a href=profiles/profile/' . $this->gauchada['user']['idUser'] . '><h6 class="h6-responsive">'. $this->gauchada['user']['completeName'] . '</a> - ' . $this->gauchada['entireLocation'] . ' - ' . $this->gauchada['creationDate'] . ' - <a href="?category=' . $this->category['idCategory'] . '">' . $this->category['name'] . '</a></h6>
                <hr>
                <p class="text-fluid">' . $this->gauchada['body'] . '</p>
            </div>';
          if(!$this->sessions->isGranted()) {
            if($this->user['idUser'] == $this->gauchada['user']['idUser']) {
              $HTML.= '<div class="col-2">
                <a class="btn btn-warning rounded-circle option-button text-center" href="gauchadas/edit/' . $this->gauchada["idGauchada"] . '" title="Editar gauchada">
                  <i class="fa fa-edit"></i>
                </a>
                <a class="btn btn-warning rounded-circle option-button text-center" data-toggle="modal" data-target="#Postulants" title="Ver postulantes">
                  <i class="fa fa-users" style="color: #fff"></i>
                </a>';
              if($this->selected && Ratings($this->router->getId())){
                $HTML .= '
                <a class="btn btn-warning option-button text-center" style="color: #fff" data-toggle="modal" data-target="#califica">
                  <i class="fa fa-star" style="color: #fff"></i>Calificar!
                </a>';
              }
              $HTML .= '</div>';
            } else if(!$this->is_postulated() && !$this->selected) {
              $HTML.= '<div class="col-2">
                <a class="btn btn-warning option-button text-center" style="color: #fff" data-toggle="modal" data-target="#Postulate">
                  <img src="assets/app/img/mate.png" style="width: 25px;"></img>Postulate!
                </a>
              </div>';
            } else if($this->is_postulated() && !$this->ranked){
              $HTML.= '<div class="col-2">
                <a class="btn btn-warning option-button text-center" style="color: #fff" data-toggle="modal" data-target="#Unpostulate">
                  <img src="assets/app/img/mate.png" style="width: 25px;"></img>Despostulate
                </a>
              </div>';
            }
          }
          echo $HTML;
          ?>
  </div>
  <div class="row" style="margin-top: 20px; margin-bottom: 10px">
    <div class="col-2"></div>
    <div class="col-10 text-left">
      <h3 class="h3-responsive">Comentarios</h3>
    </div>
  </div>
  <div class="row">
    <?php
        $HTML = '';
        if ($this->gauchada['comments']) {
          for($i = 0; $i < count($this->gauchada['comments']); $i++) {
            $comment = $this->gauchada['comments'][$i];
            $userComment = $this->users[$comment['idUser']];
            $HTML.= '
            <div class="col-3 text-right" style="margin-top: 15px;">
              <div class="avatar">
                <img src="' . $userComment['profilePicture'] . '" class="rounded-circle img-responsive" style="width: 8vh">
              </div>
            </div>
            <div class="col-8" style="margin-top: 10px;">
              <h2 class="h2-responsive">' . $userComment['completeName'] . '</h2>
              <h5 class="h5-responsive">' . $comment['lastModify'] . '</h5>
              <p class="text-fluid">' . $comment['body'] . '</p>
            </div><div class="col-1"></div>';
            if($comment['answer']['idComment']) {
              $HTML .= '
                      <div class="col-4 text-right" style="margin-top: 5px;">
                        <div class="avatar">
                         <img src="' . $this->gauchada['user']['profilePicture'] . '" class="rounded-circle img-responsive" style="width: 6vh">
                        </div>
                      </div>
                      <div class="col-8">
                        <h4>' . $this->gauchada['user']['completeName'] . '</h4>
                       <h6 class="h6-responsive">' . $comment['answer']['lastModify'] . '</h6>
                        <p>' . $comment["answer"]["body"] . '</p>
                      </div>';
            } else {
              if($this->user['idUser'] == $this->gauchada['user']['idUser'] && !$this->sessions->isGranted()){
                $HTML .= '
                    <div class="col-3"></div>
                      <div id="div_comment_button_' . $comment['idComment'] . '" class="col-9" style="margin-top: 20px; margin-bottom: 20px; "margin-bottom: 20px">
                        <div>
                          <div class="text-center">
                            <form class="form-inline" action="comments/add/'. $this->router->getId() . '?idQuestion='. $comment['idComment'] .'" method="post">
                              <div class="avatar" style="margin-right:3rem">
                               <img src="' . $this->gauchada['user']['profilePicture'] . '" class="rounded-circle img-responsive" style="width: 8vh">
                              </div>
                              <label class="sr-only" for="body">Hace una pregunta!</label>
                              <input type="text" id="body" name="body" style="margin-right:1.5rem" class="form-control" for="body" placeholder="Responde la pregunta!">

                              <button type="submit" class="btn btn-primary">Responder</button>
                            </form>
                          </div>
                        </div>
                      </div>
                  ';
                }
            }
          }
        } else {
          if(($this->user['idUser'] != $this->gauchada['user']['idUser']) && !$this->sessions->isGranted()) {
            $HTML .= '<div class="col-2"></div><div class="col-8">
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <p class="text-fluid">Aún no hay comentarios para esta gauchada. <strong>¡Se el primero en comentar!</strong></p>
                </div></div><div class="col-2"></div>';
          }
        }
        echo $HTML;
      ?>

    </div>
    <?php
      $HTML = '';
      if($this->user['idUser'] != $this->gauchada['user']['idUser'] && !$this->sessions->isGranted()) {
        $HTML .= '
          <div class="row">
            <div class="col-3 text-right">
              <div class="avatar">
               <img src="' . $this->gauchada['user']['profilePicture'] . '" class="rounded-circle img-responsive" style="width: 8vh">
              </div>
            </div>
            <div class="col-8" style="margin-top: 20px; "margin-bottom: 20px">
              <div class="text-center">
                <form class="form-inline" action="comments/add/'. $this->router->getId() . '" method="post">
                  <label class="sr-only" for="body">Hace una pregunta!</label>
                  <input type="text" id="body" name="body" style="width: 55%; margin-right: -1.35rem" class="form-control" for="body" placeholder="Escribe un comentario...">
                  <button type="submit" class="btn btn-warning rounded-circle"><i class="fa fa-angle-right"></i></button>
                </form>
              </div>
            </div>
            <div class="col-1"></div>
          </div>';
      }
      $HTML .= '<hr>';
      echo $HTML;
    ?>
    </div>
    <?php
    $this->include('gauchadas/postulantes/postulants');
    $this->include('gauchadas/postulantes/unpostulate');
    $this->include('gauchadas/postulantes/postulate');
    $this->include('gauchadas/postulantes/confirmation');
    $this->include('gauchadas/calificaciones/califica');
    $this->include('overall/footer');
  ?>
</body>

</html>
