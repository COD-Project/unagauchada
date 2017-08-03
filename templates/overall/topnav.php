
<!--Navigation & Intro-->
<header>
  <nav class="navbar navbar-dark navbar-toggleable-md scrolling-navbar bg-faded fixed-top">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"><i class="fa fa-bars"></i></span>
    </button>
    <div class="container">
      <a class="navbar-brand" href="<?= URL ?>">
          <img src="assets/app/images/logo.png" class="d-inline-block align-top cmd_zoomin" style="height: 35px;" alt="UnaGauchada">
          <span style="color: coral;"><strong>Una</strong>Gauchada</span>
      </a>
      <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav mr-auto">

          </ul>
          <?php if($this->sessions->isLoggedIn()): ?>
              <div class="dropdown navbar-text">
                <a class="nav-link dropdown-toggle"  id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <img src="<?= $this->sessions->connectedUser()['profilePicture'] ?>" class="rounded-circle img-fluid" style="height: 35px; width: 35px; margin-right: 2px;">
                  <span class="navbar-text"><?= $this->sessions->connectedUser()['name'] ?></span>
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenu1">
                  <?php if(!$this->sessions->isGranted()): ?>
                    <a class="dropdown-item" href="profiles/myprofile"><i class="fa fa-user"></i> Ver Perfil </a>
                    <a class="dropdown-item" href="credits/comprar"><i class="fa fa-credit-card-alt"></i> Créditos: <?= $this->sessions->connectedUser()['credits'] ?></a>
                    <a class="dropdown-item"><i class="fa fa-star"></i> Puntos: <?= $this->sessions->connectedUser()['points'] ?></a>
                  <?php else: ?>
                    <a class="dropdown-item" href="administration"><i class="fa fa-cogs"></i> Administración</a>
                  <?php endif; ?>
                  <hr />
                  <a class="dropdown-item" href="logout"><i class="fa fa-sign-out"></i> Cerrar sesión </a>
                </div>
              </div>
          <?php else: ?>
              <div class="navbar-right">
                <ul class="navbar-nav mr-auto">
                  <li><a class="dropdown-item" data-toggle="modal" data-target="#Login"><i class="fa fa-sign-in"></i>  Iniciar sesión </a></li>
                  <li><a class="dropdown-item" data-toggle="modal" data-target="#Signup"><i class="fa fa-user-plus"></i>  Registrarse </a></li>
                </ul>
              </div>
          <?php endif; ?>
      </div>
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
