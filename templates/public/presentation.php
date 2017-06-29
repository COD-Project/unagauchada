<!--Mask-->
<div class="" style="height: 75px;"></div>
<!--/.Mask-->

<?php
  if (isset($_GET['error'])) {
    echo '<div class="container pt-6 text-center wow fadeIn" data-wow-delay="0.2s">
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <p class="text-fluid"><strong>' . $_GET['error'] . '</strong></p>
    </div></div>';
  } else if (isset($_GET['success'])) {
    echo '<div class="container pt-6 text-center wow fadeIn" data-wow-delay="0.2s">
    <div class="alert alert-success alert-dismissible fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <p class="text-fluid"><strong>' . $_GET['success'] . '</strong></p>
    </div></div>';
  }

  $criteria = "<strong>Se filtraron las gauchadas que cumplen el siguiente criterio: </strong><br>";
  $criteria .= !(isset($_GET['search']) && !empty($_GET['search'])) ? '' : 'gauchadas que contienen la palabra clave <strong>' . $_GET['search'] . '</strong><br>';
  $criteria .= !(isset($_GET['category']) && is_numeric($_GET['category'])) ? '' : 'gauchadas pertenecientes a la categoría <strong>' . Categories(intval($_GET['category']))[0]['name']. '</strong><br>';
  $criteria .= !(isset($_GET['state']) && !empty($_GET['state'])) ? '' : 'gauchadas de la provincia <strong>' . $_GET['state'] . '</strong><br>';
  $criteria .= !(isset($_GET['locality']) && !empty($_GET['locality'])) ? '' : 'gauchadas de la localidad <strong>' . $_GET['locality'] . '</strong><br>';

  if ((isset($_GET['search']) || isset($_GET['category']) || isset($_GET['state']) || isset($_GET['locality']))) {
    echo '<div class="container pt-6 text-center wow fadeIn" data-wow-delay="0.2s">
    <div class="alert alert-warning fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <p class="text-fluid">' . $criteria . '</p>
    </div></div>';
  }
  if (isset($_GET['mode']) && !Func::emp($_GET['mode'])) {
    echo '<div class="container pt-6 text-center wow fadeIn" data-wow-delay="0.2s">
    <div class="alert alert-warning fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <p class="text-fluid">Se ordenaron las gauchadas por cantidad de postulantes de forma <strong>' . (strtolower($_GET['mode']) == 'asc' ? 'ascendente' : 'descendente'). '</strong></p>
    </div></div>';
  }
?>

<!--Main layout-->
<main class="container pt-6 text-center wow fadeInUp" style="margin-top: 25px;" data-wow-delay="0.3s">
  <div class="row">
    <div class="col-4 text-left">
      <h2 class="h2-responsive"> Gauchadas </h2>
    </div>
    <div class="col-4">

    </div>
    <?php
      if($this->sessions->isLoggedIn() && !$this->sessions->isGranted()) {
        echo ('
          <div class="col-4 text-right">
            <a class="btn btn-warning rounded-circle option-button text-center" style="background: coral;" href="?mode=DESC">
              <i class="fa fa-arrow-down"></i>
            </a>
            <a class="btn btn-warning rounded-circle option-button text-center" style="background: coral;" href="?mode=ASC">
              <i class="fa fa-arrow-up"></i>
            </a>
            <a class="btn btn-warning rounded-circle option-button text-center" style="background: coral;" href="gauchadas/add">
              <i class="fa fa-plus"></i>
            </a>
          </div>');
      }
    ?>
  </div>
</main>
<!--/Main layout-->

<div class="container">
  <hr class="extra-margins">
  <ul class="nav nav-pills nav-fill" style="margin-bottom: 5vh">
    <li class="nav-item">
        <a href="" data-target="#listado" data-toggle="tab" class="nav-link active"><i class="fa fa-bars"></i></a>
    </li>
    <li class="nav-item">
        <a href="" data-target="#filtrado" data-toggle="tab" class="nav-link"><i class="fa fa-search"></i></a>
    </li>
  </ul>
  <div class="tab-content">
    <div class="tab-pane active wow fadeIn" id="listado" data-wow-delay="0.1s">
      <?php $this->include('gauchadas/list'); ?>
    </div>
    <div class="tab-pane wow fadeIn" id="filtrado" data-wow-delay="0.1s">
      <?php
        if ($this->sessions->isLoggedIn()) {
          $this->include('public/filter');
        } else {
          echo "
            <div class=\"card-block text-center\">
              <h4 class=\"card-title\">Debes iniciar sesión para buscar y filtrar las gauchadas.</h4>
              <p class=\"card-text\">Debes iniciar sesión para buscar y filtrar las gauchadas. Puedes iniciar sesión presionando el siguiente botón.</p>
              <a class=\"btn btn-warning\" style=\"color: #fff;\" data-toggle=\"modal\" data-target=\"#Login\"><i class=\"fa fa-sign-in\"></i>  Iniciar sesión </a>
            </div>
          ";
        }

      ?>
    </div>
  </div>
</div>


<hr>
