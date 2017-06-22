<div class="tab-pane active wow fadeIn" id="profile" data-wow-delay="0.1s">
    <div class="row">
      <?php
        $user = $this->sessions->connectedUser();
        echo ("
          <div class=\"col-md-6\">
              <h5>" . $user['completeName'] . "</h5>
              <p style=\"color: gray;\"><em>" . $user['email'] . "</em></p>
              <h6>Teléfono</h6>
              <p style=\"color: gray;\"><em>" . $user['phone'] . "</em></p>
          </div>
          <div class=\"col-md-6 text-center\">
              <h6>Aasdasd</h6>
              <hr>
              <span class=\"\"><i class=\"fa fa-credit-card-alt\"></i> " . $user['credits'] . "Créditos</span>
              <span class=\"\"><i class=\"fa fa-credit-card-alt\"></i> " . $user['points'] . "Puntos</span>
          </div>
        ");
      ?>
    </div>
    <!--/row-->
    <div class="" style="margin-top: 45px;">
      <ul class="nav nav-tabs" style="margin-bottom: 5vh">
        <li class="nav-item">
            <a href="" data-target="#" data-toggle="tab" class="nav-link active">Mis gauchadas</a>
        </li>
        <li class="nav-item">
            <a href="" data-target="#" data-toggle="tab" class="nav-link">Mis comentarios</a>
        </li>
        <li class="nav-item">
            <a href="" data-target="#" data-toggle="tab" class="nav-link">Menciones</a>
        </li>
        <li class="nav-item">
            <a href="" data-target="#" data-toggle="tab" class="nav-link">Mis calificaciones</a>
        </li>
      </ul>
    </div>
</div>
