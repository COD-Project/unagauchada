
<!--Navigation & Intro-->
<header>
  <nav class="navbar navbar-toggleable-md navbar-dark scrolling-navbar bg-faded fixed-top">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"><i class="fa fa-bars"></i></span>
    </button>
    <a class="navbar-brand" href="<?php echo URL; ?>">
        <img src="views/app/images/avatar_28012e5b8492_128.png" class="d-inline-block align-top cmd_zoomin" style="height: 35px;" alt="UnaGauchada">
    </a>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mr-auto">

        </ul>
        <?php
            if($this->sessions->isLoggedIn()) {
              echo ('
              <div class="dropdown navbar-text">
                <a class="nav-link dropdown-toggle"  id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <!-- quité la clase  dropdown-toggle porque rompía todo -->
                  <img src="' . ProfilePicture($this->sessions->connectedUser()['idImage'])['path'] . '" class="rounded-circle img-responsive cmd_zoomin" style="width: 35px;">
                  <span class="navbar-text">' . $this->sessions->connectedUser()['name'] . '</span>
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenu1">
                  <a class="dropdown-item" href="profiles/' . $this->router->semanticURL($this->sessions->connectedUser()['name']) . '"><i class="fa fa-user"></i> Ver Perfil </a>
                  <a class="dropdown-item" href="preferences"><i class="fa fa-sliders"></i> Preferencias </a>
                  <a class="dropdown-item" href="#"><i class="fa fa-cog"></i> Configuración </a>
                  <a class="dropdown-item" href="logout"><i class="fa fa-sign-out"></i> Cerrar sesión </a>
                </div>
              </div>
              ');
            } else {
              echo ('
              <div class="navbar-right">
                <ul class="navbar-nav mr-auto">
                  <li><a class="dropdown-item" data-toggle="modal" data-target="#Login"><i class="fa fa-sign-in"></i>  Iniciar sesión </a></li>
                  <li><a class="dropdown-item" data-toggle="modal" data-target="#Signup"><i class="fa fa-user-plus"></i>  Registrarse </a></li>
                </ul>
              </div>
              ');
            }
          ?>
    </div>
  </nav>
<!--/.Navigation & Intro-->
<header>

<?php
if(!$this->sessions->isLoggedIn()) {
  $this->include('public/login');
  $this->include('public/signup');
}
?>
