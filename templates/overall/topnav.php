<section class="engine"><a rel="nofollow" href="#"><?php ?></a></section>

<nav class="navbar navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- El logotipo y el icono que despliega el menú se agrupan
           para mostrarlos mejor en los dispositivos móviles -->
        <a class="navbar-brand waves-effect waves-light" href="<?php URL ?>"><p style="font-size: 20px;"><?php echo APP; ?> </p></a>
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse"
                data-target=".navbar-ex1-collapse">
                <span class="sr-only">Desplegar navegación</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>

        <!-- Agrupar los enlaces de navegación, los formularios y cualquier
        otro elemento que se pueda ocultar al minimizar la barra -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a class="" role="button" data-toggle="dropdown" href="#">
                        <i style="font-size: 20px;" class="glyphicon glyphicon-menu-hamburger"></i>
                    </a>
                    <ul class="dropdown-menu">
                      <?php
                        if($this->sessions->session_in_use()){
                          echo ('
                          <li><a href="profiles/' . $this->router->semanticURL($this->sessions->connected_user()['name']) . '"><i class="glyphicon glyphicon-user"></i> ' . $this->sessions->connected_user()['name'] . '</a></li>
                          <li><a href="logout"><i class="glyphicon glyphicon-log-out"></i> Log Out</a></li>
                          <li><a href="preferences"><i class="glyphicon glyphicon-wrench"></i> Preferences</a></li>
                          <li><a href="#"><i class="glyphicon glyphicon-cog"></i> Settings</a></li>
                          ');
                        } else {
                          echo ('
                          <li><a data-toggle="modal" data-target="#Login"><i class="glyphicon glyphicon-log-in"></i>  Log In</a></li>
                          <li><a data-toggle="modal" data-target="#Signup"><i class="glyphicon glyphicon-log-in"></i>  Sign Up</a></li>
                          ');
                        }
                      ?>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

<?php

if(!$this->sessions->session_in_use()) {
  $this->include('public/login');
  $this->include('public/signup');
}

?>
