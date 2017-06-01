<!DOCTYPE html>
<html>
  <?php $this->render('overall/header'); ?>
<body>
  <?php $this->render('overall/topnav'); ?>
  <?php
    if (isset($_GET['success'])) {
      echo '<div class="container pt-6 text-center wow fadeIn" data-wow-delay="0.2s" style="margin-top: 100px;">
      <div class="alert alert-success alert-dismissible fade show" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <p class="text-fluid"><strong>La operación fue realizada con éxito.</strong></p>
      </div></div>';
    } else {
      echo '<div class="jumbotron" style="background-color: transparent;"></div>';
    }
  ?>
  <div class="container">
    <ul class="nav nav-tabs">
        <li class="nav-item">
          <a data-toggle="tab" href="#credits" class="nav-link active">Créditos</a>
        </li>
        <li class="nav-item">
          <a data-toggle="tab" href="#details" class="nav-link">Comprar</a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane active" id="credits">
          <div class="card text-center" style="margin-top: 10px">
            <div class="card-header">
              Compra Créditos
            </div>
            <div class="card-block">
              <h4 class="card-title">Cada crédito cuesta $<span id="precio"><?php echo Creditos()[0]['monto'] ?></span></h4>
              <p class="card-text">Debes contar con una tarjeta de crédito para comprar créditos. Si tienes una y quieres comprar oprime el botón para avanzar.</p>
              <a data-toggle="tab" href="#details" class="btn btn-primary" style="background-color:coral; border-color:coral">Siguiente >></a>
            </div>
          </div>
        </div>
        <div class="tab-pane" id="details">
          <datalist id="tipo_tarjetas">
            <option value="Visa"></option>
            <option value="Mastercard"></option>
          </datalist>
          <div class="container text-center" style="margin-top: 10px; margin-bottom: 0px; max-width: 750px" id="_AJAX_CREDITS_"></div>
          <div class="" id="compra_creditos"></div>
        </div>
    </div>
  </div>

  <?php $this->render('overall/footer'); ?>
</body>
</html>
