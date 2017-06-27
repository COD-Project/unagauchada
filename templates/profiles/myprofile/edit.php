<div class="tab-pane wow fadeIn" id="edit" data-wow-delay="0.1s">
  <div id="_AJAX_EDIT_"></div>
  <form id="edit_user_form" role="form" method="post" action="" enctype="multipart/form-data">
    <?php
      $user = $this->sessions->connectedUser();
      echo "
        <div class=\"form-group row\">
            <label class=\"col-lg-3 col-form-label form-control-label\">Nombre</label>
            <div class=\"col-lg-9\">
                <input id=\"name\" class=\"form-control\" type=\"text\" value=\"" . $user['name'] . "\">
            </div>
        </div>
        <div class=\"form-group row\">
            <label class=\"col-lg-3 col-form-label form-control-label\">Apellido</label>
            <div class=\"col-lg-9\">
                <input id=\"surname\" class=\"form-control\" type=\"text\" value=\"" . $user['surname'] . "\">
            </div>
        </div>
        <div class=\"form-group row\">
            <label class=\"col-lg-3 col-form-label form-control-label\">Email</label>
            <div class=\"col-lg-9\">
                <input class=\"form-control\" type=\"email\" value=\"" . $user['email'] . "\" disabled>
            </div>
        </div>
        <div class=\"form-group row\">
            <label class=\"col-lg-3 col-form-label form-control-label\">Teléfono</label>
            <div class=\"col-lg-9\">
                <input id=\"phone\" class=\"form-control\" value=\"" . $user['phone'] . "\">
            </div>
        </div>
        <div class=\"form-group row\">
            <label class=\"col-lg-3 col-form-label form-control-label\">Localidad</label>
            <datalist id=\"states\"></datalist>
          	<datalist id=\"localities\"></datalist>
            <div class=\"col-lg-3\">
                <input list=\"states\" id=\"state\" class=\"form-control\" type=\"text\" value=\"\" placeholder=\"Provincia\">
            </div>
            <div class=\"col-lg-6\">
                <input list=\"localities\" id=\"locality\" class=\"form-control\" type=\"text\" value=\"\" placeholder=\"Ciudad\">
            </div>
        </div>
        <div class=\"form-group row\">
            <label class=\"col-lg-3 col-form-label form-control-label\">Contraseña</label>
            <div class=\"col-lg-9\">
                <input id=\"pass\" class=\"form-control\" type=\"password\">
            </div>
        </div>
        <div class=\"form-group row\">
            <label class=\"col-lg-3 col-form-label form-control-label\">Repetir contraseña</label>
            <div class=\"col-lg-9\">
                <input id=\"new_pass\" class=\"form-control\" type=\"password\">
            </div>
        </div>
        <div class=\"form-group row\">
            <label class=\"col-lg-3 col-form-label form-control-label\"></label>
            <div class=\"col-lg-9 text-center\">
              <button id=\"edit_user_button\" class=\"btn btn-warning btn-lg btn-block option-button text-center\">
                <i class=\"fa fa-send\"></i>
              </button>
            </div>
        </div>
      ";
    ?>
  </form>
</div>
