<div class="tab-pane wow fadeIn" id="postulations" data-wow-delay="0.1s">
  <div class="row" style="margin-bottom: 5px;">
      <?php
        if (!$this->postulants) {
          echo '<div class="col-12">
          <div class="alert alert-info alert-dismissible fade show" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <p class="text-fluid">Aún no te has postulado en ninguna gauchada.
          </div></div>';
        } else {
          $i = 0;
          array_walk($this->postulants, function($postulant) use($i) {
            echo "<div class=\"col-lg-12\" style=\"margin-bottom: 10px;\">
            <!--Card-->
                <div class=\"card wow fadeIn\" data-wow-delay=\"0." . ($i+1)*2 . "s\">
                    <!--Card content-->
                    <div class=\"card-block\">
                      <!--Title-->
                      <div class=\"card-title text-fluid\" style=\"max-height: 55px;\">
                        <h5 class=\"h5-responsive\">" . Func::reduceString($postulant['gauchada']['title'], 45) . "</h4>
                      </div>
                      <hr>
                      <!--Text-->
                      <p class=\"card-text text-fluid\" style=\"max-height: 50px;\">" . Func::reduceString($postulant['gauchada']['body'], 75) . "</p>
                      <a href=\"gauchadas/view/" . $postulant['gauchada']['idGauchada'] . "\" class=\"d-flex flex-row-reverse\"><h6 class=\"waves-effect p-2\"> Leer más <i class=\"fa fa-chevron-right\"></i></h6></a>
                    </div>
                    <!--/.Card content-->
                </div>
                <!--/.Card-->
            </div>";
            $i++;
          });
        }
      ?>
  </div>
</div>
