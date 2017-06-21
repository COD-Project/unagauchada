<main>
<!--Main layout-->

  <div class="container">
      <hr class="extra-margins">

      <!--Second row-->
      <div class="row" style="margin-bottom: 5px;">
          <?php
            $gauchadas = Gauchadas();
            $HTML = "";
            if (!$gauchadas) {
              $HTML .= '<div class="col-12">
              <div class="alert alert-info alert-dismissible fade show" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <p class="text-fluid">Aún no se han registrado solicitudes de gauchadas. <strong>¡Se el primero en solicitar una!</strong></p>
              </div></div>';
            } else {
              $i = 1;
              foreach ($gauchadas as $id => $gauchada) {
                $HTML .= "<div class=\"col-lg-4\" style=\"margin-bottom: 10px;\">
                <!--Card-->
                    <div class=\"card wow fadeIn\" data-wow-delay=\"0." . ($i+1)*2 . "s\">
                    ";

                    if($this->sessions->connectedUser()['idUser'] == $gauchada['user']['idUser']){
                        $HTML .= "<a href=\"gauchadas/delete/" . $gauchadas[$id]['idGauchada'] . "\"><i class=\"fa fa-close\"></i></a>";
                    }
                        $HTML .= "
                        <!--Card image-->
                        <div class=\"card-up view overlay hm-white-slight text-center\" style=\"height: 245px;\">
                          <img src=\"" . $gauchada['images'][0]['path'] . "\" class=\"img-fluid\" alt=\"\" style=\"height: 100%;\">
                          <a href=\"#\">
                              <div class=\"mask\"></div>
                          </a>
                        </div>
                        <!--/.Card image-->
                        <!--Card content-->
                        <div class=\"card-block\">
                          <!--Avatar-->
                          <div class=\"row wow fadeIn\" data-wow-delay=\"0." . ($i+1)*3 . "s\" style=\"background-color: rgba(0, 0, 0, 0.5); margin-top: -100px; padding-top: 10px; \">
                            <div class=\"avatar text-right col-3\">
                              <img class=\"rounded-circle img-responsive\" src=\"" . $gauchada['user']['profilePicture'] . "\" style=\"width: 50px;\" >
                            </div>
                            <div class=\"text-left col-9\">
                              <p class=\"text-fluid\" style=\"color: #fff\">" . $gauchada['user']['completeName'] . "</p>
                              <p class=\"text-fluid\" style=\"color: #C0C0C0; margin-top: -15px\">" . $gauchada['creationDate'] . "</p>
                            </div>
                          </div>
                          <!--Title-->
                          <div class=\"card-title text-fluid\" style=\"margin-top: 20px; height: 55px;\">
                            <h5 class=\"h5-responsive\">" . Func::reduceString($gauchada['title'], 45) . "</h4>
                          </div>
                          <hr>
                          <!--Text-->
                          <p class=\"card-text text-fluid\" style=\"height: 50px;\">" . Func::reduceString($gauchada['body'], 75) . "</p>
                          <a href=\"gauchadas/view/" . $gauchada['idGauchada'] . "\" class=\"d-flex flex-row-reverse\"><h6 class=\"waves-effect p-2\"> Leer más <i class=\"fa fa-chevron-right\"></i></h6></a>
                        </div>
                        <!--/.Card content-->

                    </div>
                    <!--/.Card-->
                </div>";
                $i++;
              }
            }
            echo $HTML;
          ?>
      </div>
  </div>

<!--/.Main layout-->
</main>
