<div class="tab-pane active wow fadeIn" id="profile" data-wow-delay="0.1s">
    <div class="row">
      <?php
        $HTML = "";
        $user = $this->sessions->connectedUser();
        $HTML .= "
          <div class=\"col-md-6\">
              <h3 style=\"color: #000\">" . $user['completeName'] . "</h3>
              <p style=\"color: gray;\">" . $user['email'] . "</p>
              <h6>Localidad</h6>
              <p style=\"color: gray;\">" . $user['location'] . "</p>
              <h6>Teléfono</h6>
              <p style=\"color: gray;\">" . $user['phone'] . "</p>
          </div>
          <div class=\"col-md-6 text-center\">
              <h6>Aasdasd</h6>
              <hr>
              <span class=\"badge badge-pill badge-success\"><i class=\"fa fa-credit-card-alt\"></i> " . $user['credits'] . " Créditos</span>
              <span class=\"badge badge-pill badge-danger\"><i class=\"fa fa-credit-card-alt\"></i> " . $user['points'] . " Puntos</span>
          </div>
          <div class=\"col-md-12\" style=\"margin-top: 20px;\">
            <h4 class=\"m-t-2\"><span class=\"fa fa-clock-o ion-clock pull-xs-right\"></span> Recent Activity</h4>
            <table class=\"table table-hover table-striped\">
                <tbody>
                    <tr>
                        <td>
                            <strong>Abby</strong> joined ACME Project Team in <strong>`Collaboration`</strong>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <strong>Gary</strong> deleted My Board1 in <strong>`Discussions`</strong>
                        </td>

                    </tr>
                    <tr>
                        <td>
                            <strong>Kensington</strong> deleted MyBoard3 in <strong>`Discussions`</strong>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <strong>John</strong> deleted My Board1 in <strong>`Discussions`</strong>
                        </td>

                    </tr>
                    <tr>
                        <td>
                            <strong>Skell</strong> deleted his post Look at Why this is.. in <strong>`Discussions`</strong>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        ";
        echo $HTML;
      ?>
    </div>
</div>
