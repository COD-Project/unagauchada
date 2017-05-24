<!--Navigation & Intro-->
<nav class="navbar fixed-top navbar-toggleable-md navbar-dark scrolling-navbar">
    <div class="container">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="#">
            <img src="views/app/images/avatar_28012e5b8492_128.png" class="d-inline-block align-top cmd_zoomin" style="height: 55px;" alt="UnaGauchada">
        </a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mr-auto">
                
            </ul>
            <ul class="navbar-nav nav-flex-icons">
                <li class="nav-item btn-group">
                    <a class="nav-link"  id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <!-- quité la clase  dropdown-toggle porque rompía todo -->
                      <i style="font-size: 20px;" class="fa fa-bars"></i>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenu1">
                      <?php
                          if($this->sessions->isLoggedIn()) {
                            echo ('
                            <a class="dropdown-item" href="profiles/' . $this->router->semanticURL($this->sessions->connectedUser()['name']) . '"><i class="fa fa-user"></i> ' . $this->sessions->connectedUser()['name'] . '</a>
                            <a class="dropdown-item" href="preferences"><i class="fa fa-sliders"></i> Preferencias </a>
                            <a class="dropdown-item" href="#"><i class="fa fa-cog"></i> Configuración </a>
                            <a class="dropdown-item" href="logout"><i class="fa fa-sign-out"></i> Cerrar sesión </a>
                            ');
                          } else {
                            echo ('
                            <a class="dropdown-item" data-toggle="modal" data-target="#Login"><i class="fa fa-sign-in"></i>  Iniciar sesión </a>
                            <a class="dropdown-item" data-toggle="modal" data-target="#Signup"><i class="fa fa-user-plus"></i>  Registrarse </a>
                            ');
                          }
                        ?>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!--/.Navigation & Intro-->

<?php
if(!$this->sessions->isLoggedIn()) {
  $this->include('public/login');
  $this->include('public/signup');
}
?>
