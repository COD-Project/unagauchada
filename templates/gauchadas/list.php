<main>
<!--Main layout-->

  <div class="container">
      <hr class="extra-margins">


      <!--Second row-->
      <div class="row" style="margin-bottom: 5px;">
          <?php
            $_gauchadas = Gauchadas();
            $HTML = "";
            if (!$_gauchadas) {

            } else {
              $i = 1;
              foreach ($_gauchadas as $id => $constent_array) {
                $HTML .= $i % 4 == 0 ? "<div class=\"row\"> style=\"margin-bottom: 5px;\"" : "";
                $HTML .= "<div class=\"col-lg-4\">
                    <!--Card-->
                    <div class=\"card wow fadeIn\" data-wow-delay=\"0." . ($i+1)*2 . "s\">

                        <!--Card image-->
                        <div class=\"card-up view overlay hm-white-slight\">
                            <img src=\"views/app/images/unagauchada.$i.jpg\" class=\"img-fluid\" alt=\"\">
                            <a href=\"#\">
                                <div class=\"mask\"></div>
                            </a>
                        </div>
                        <!--/.Card image-->
                        <!--Card content-->
                        <div class=\"card-block\">
                            <!--Title-->
                            <!--Avatar-->
                            <div class=\"row\">
                              <div class=\"avatar text-right col-3\">
                                <img style=\"width: 65px;\" src=\"https://mdbootstrap.com/img/Photos/Avatars/img%20%289%29.jpg\" class=\"rounded-circle img-responsive\">
                              </div>
                              <div class=\"text-left col-9\">
                                <p class=\"text-fluid\">" . Users()[$_gauchadas[$id]['idUser']]['completeName'] . "</p>
                                <p style=\"color: gray; margin-top: -15px;\" class=\"text-fluid\">" . Users()[$_gauchadas[$id]['idUser']]['email'] . "</p>
                              </div>
                            </div>

                            <div class=\"card-title text-fluid\" style=\"margin-top: 15px; height: 45px;\"><h4 class=\"h4-responsive\">" . $_gauchadas[$id]['title'] . "</h4></div>
                            <hr>
                            <!--Text-->
                            <p class=\"card-text text-fluid\" style=\"height: 45px;\">" . Func::reduceString($_gauchadas[$id]['body'], 75) . "</p>
                            <a href=\"#\" class=\"d-flex flex-row-reverse\"><h6 class=\"waves-effect p-2\"> Read more <i class=\"fa fa-chevron-right\"></i></h6></a>
                        </div>
                        <!--/.Card content-->

                    </div>
                    <!--/.Card-->
                </div>";
                $HTML .= $i % 3 == 0 ? "</div>" : "";
                $i++;
              }
            }
            echo $HTML;
          ?>
      </div>
  </div>

<!--/.Main layout-->
</main>
