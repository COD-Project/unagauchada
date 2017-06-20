<div class="tab-pane" id="edit">
  <h4 class="m-y-2">Edit Profile</h4>
  <form role="form" method="post" action="">
    <?php
      $user = $this->sessions->connectedUser();
      echo "
        <div class=\"form-group row\">
            <label class=\"col-lg-3 col-form-label form-control-label\">Nombre</label>
            <div class=\"col-lg-9\">
                <input class=\"form-control\" type=\"text\" value=\"" . $user['name'] . "\">
            </div>
        </div>
        <div class=\"form-group row\">
            <label class=\"col-lg-3 col-form-label form-control-label\">Apellido</label>
            <div class=\"col-lg-9\">
                <input class=\"form-control\" type=\"text\" value=\"" . $user['surname'] . "\">
            </div>
        </div>
        <div class=\"form-group row\">
            <label class=\"col-lg-3 col-form-label form-control-label\">Email</label>
            <div class=\"col-lg-9\">
                <input class=\"form-control\" type=\"email\" value=\"" . $user['email'] . "\" disabled>
            </div>
        </div>
        <div class=\"form-group row\">
            <label class=\"col-lg-3 col-form-label form-control-label\">Company</label>
            <div class=\"col-lg-9\">
                <input class=\"form-control\" type=\"text\" value=\"\">
            </div>
        </div>
        <div class=\"form-group row\">
            <label class=\"col-lg-3 col-form-label form-control-label\">Website</label>
            <div class=\"col-lg-9\">
                <input class=\"form-control\" type=\"url\" value=\"\">
            </div>
        </div>
        <div class=\"form-group row\">
            <label class=\"col-lg-3 col-form-label form-control-label\">Localidad</label>
            <div class=\"col-lg-\">
                <input id=\"state\" class=\"form-control\" type=\"text\" value=\"\" placeholder=\"Provincia\">
            </div>
            <div class=\"col-lg-3\">
                <input id=\"locality\" class=\"form-control\" type=\"text\" value=\"\" placeholder=\"Ciudad\">
            </div>
        </div>
        <div class=\"form-group row\">
            <label class=\"col-lg-3 col-form-label form-control-label\">Contraseña</label>
            <div class=\"col-lg-9\">
                <input class=\"form-control\" type=\"password\">
            </div>
        </div>
        <div class=\"form-group row\">
            <label class=\"col-lg-3 col-form-label form-control-label\">Repetir contraseña</label>
            <div class=\"col-lg-9\">
                <input class=\"form-control\" type=\"password\">
            </div>
        </div>
        <div class=\"form-group row\">
            <label class=\"col-lg-3 col-form-label form-control-label\"></label>
            <div class=\"col-lg-9\">
                <button type=\"reset\" class=\"btn btn-secondary btn-rounded\">Reset</button>
                <button type=\"submit\" class=\"btn btn-primary btn-rounded\">Editar</button>
            </div>
        </div>
      ";
    ?>
  </form>
</div>
