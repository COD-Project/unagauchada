<!--Mask-->
<div class="" style="height: 75px;"></div>
<!--/.Mask-->

<?php if (isset($_GET['error'])): ?>
    <div class="container pt-6 text-center wow fadeIn" data-wow-delay="0.2s">
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <p class="text-fluid"><strong><?= $_GET['error'] ?>'</strong></p>
      </div>
    </div>
<?php elseif (isset($_GET['success'])): ?>
    <div class="container pt-6 text-center wow fadeIn" data-wow-delay="0.2s">
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <p class="text-fluid"><strong><?= $_GET['success'] ?></strong></p>
      </div>
    </div>
<?php endif; ?>

<?php
  $criteria = "<strong>Se filtraron las gauchadas que cumplen el siguiente criterio: </strong><br>";
  $criteria .= !(isset($_GET['search']) && !empty($_GET['search'])) ? '' : 'gauchadas que contienen la palabra clave <strong>' . $_GET['search'] . '</strong><br>';
  $criteria .= !(isset($_GET['category']) && is_numeric($_GET['category'])) ? '' : 'gauchadas pertenecientes a la categoría <strong>' . $this->category['name']. '</strong><br>';
  $criteria .= !(isset($_GET['state']) && !empty($_GET['state'])) ? '' : 'gauchadas de la provincia <strong>' . $_GET['state'] . '</strong><br>';
  $criteria .= !(isset($_GET['locality']) && !empty($_GET['locality'])) ? '' : 'gauchadas de la localidad <strong>' . $_GET['locality'] . '</strong><br>';
?>

<?php  if ((isset($_GET['search']) || isset($_GET['category']) || isset($_GET['state']) || isset($_GET['locality']))): ?>
    <div class="container pt-6 text-center wow fadeIn" data-wow-delay="0.2s">
      <div class="alert alert-warning fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <p class="text-fluid"><?= $criteria ?></p>
      </div>
    </div>
<?php endif; ?>

<?php if (isset($_GET['mode']) && !Func::emp($_GET['mode'])): ?>
    <div class="container pt-6 text-center wow fadeIn" data-wow-delay="0.2s">
      <div class="alert alert-warning fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <p class="text-fluid">Se ordenaron las gauchadas por cantidad de postulantes de forma <strong><?= (strtolower($_GET['mode']) == 'asc' ? 'ascendente' : 'descendente') ?></strong></p>
      </div>
    </div>
<?php endif; ?>

<!--Main layout-->
<main class="container pt-6 text-center wow fadeInUp" style="margin-top: 25px;" data-wow-delay="0.3s">
  <div class="row">
    <div class="col-4 text-left">
      <h2 class="h2-responsive"> Gauchadas </h2>
    </div>
    <div class="col-4">

    </div>
    <?php if($this->sessions->isLoggedIn() && !$this->sessions->isGranted()): ?>
      <div class="col-4 text-right">
        <a href="?mode=DESC"><button type="button" class="btn btn-warning btn-circle btn-lg" title="Ordenar gauchadas por cantidad de postulantes de forma descendente">
          <i class="fa fa-arrow-down"></i>
        </button></a>
        <a href="?mode=ASC"><button type="button" class="btn btn-warning btn-circle btn-lg" title="Ordenar gauchadas por cantidad de postulantes de forma ascendente">
          <i class="fa fa-arrow-up"></i>
        </button></a>
        <a href="gauchadas/add"><button type="button" class="btn btn-warning btn-circle btn-lg" title="Agregar gauchada">
          <i class="fa fa-plus"></i>
        </button></a>
      </div>
    <?php endif; ?>
  </div>
</main>
<!--/Main layout-->

<div class="container">
  <hr class="extra-margins">
  <ul class="nav nav-pills nav-fill" style="margin-bottom: 5vh">
    <li class="nav-item">
        <a href="" data-target="#listado" data-toggle="tab" class="nav-link active" title="Listado de gauchadas"><i class="fa fa-bars"></i></a>
    </li>
    <li class="nav-item">
        <a href="" data-target="#filtrado" data-toggle="tab" class="nav-link" title="Filtrar gauchadas"><i class="fa fa-search"></i></a>
    </li>
  </ul>
  <div class="tab-content">
    <div class="tab-pane active wow fadeIn" id="listado" data-wow-delay="0.1s">
      <?php $this->include('gauchadas/list'); ?>
    </div>
    <div class="tab-pane wow fadeIn" id="filtrado" data-wow-delay="0.1s">
      <?php if ($this->sessions->isLoggedIn()):
              $this->include('index/filter');
            else: ?>
              <div class="card-block text-center">
                <h4 class="card-title">Debes iniciar sesión para buscar y filtrar las gauchadas.</h4>
                <p class="card-text">Debes iniciar sesión para buscar y filtrar las gauchadas. Puedes iniciar sesión presionando el siguiente botón.</p>
                <a class="btn btn-warning" style="color: #fff;" data-toggle="modal" data-target="#Login"><i class="fa fa-sign-in"></i>  Iniciar sesión </a>
              </div>
      <?php endif; ?>
    </div>
  </div>
</div>


<hr>
