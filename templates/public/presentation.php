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
      <?php $this->include('public/filter'); ?>
    </div>
  </div>
</div>


<hr>
