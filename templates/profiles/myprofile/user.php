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
              <h6>Créditos y Puntos</h6>
              <hr>
              <span class=\"badge badge-pill badge-success\"><i class=\"fa fa-credit-card-alt\"></i> " . $user['credits'] . " Crédito/s </span>
              <span class=\"badge badge-pill badge-danger\"><i class=\"fa fa-pinterest\"></i> " . $user['points'] . " Punto/s </span>
          </div>
          <div class=\"col-md-12\" style=\"margin-top: 20px;\">
            <h4 class=\"m-t-2\"><span class=\"fa fa-clock-o ion-clock\"></span> Actividad Reciente</h4>
        ";
        if (News()) {
          $HTML .= "<table class=\"table table-hover table-striped\">
              <tbody>";
                foreach (News() as $key => $value) {
                  $HTML .= "
                    <tr>
                        <td>
                            <strong>" . $value['user']['completeName'] . "</strong> eliminó la gauchada <strong>`" . $value['title'] . "`</strong>
                        </td>
                    </tr>
                  ";
                }
          $HTML .= "</tbody>
              </table>";
        } else {
          $HTML .= '<div class="alert alert-info alert-dismissible fade show" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <p class="text-fluid"><strong></strong>No se han registrado actividades recientes.</p>
          </div>';
        }
        $HTML .= "</div>";
        echo $HTML;
      ?>
    </div>
</div>
