<!DOCTYPE html>
<html>
  <?php $this->render('overall/header'); ?>
<body>
  <?php $this->render('overall/topnav'); ?>
  <div class="jumbotron" style="background-color: transparent;"></div>
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
              <h4 class="card-title">Cada crédito cuesta $<span id="precio">10</span></h4>
              <p class="card-text">Debes contar con una tarjeta de crédito para comprar créditos. Si tienes una y quieres comprar oprime el botón para avanzar.</p>
              <a data-toggle="tab" href="#details" class="btn btn-primary" style="background-color:coral; border-color:coral">Siguiente >></a>
            </div>
          </div>
        </div>
        <div class="tab-pane" id="details">
            <div class="" id="compra_creditos"></div>
        </div>
    </div>
  </div>

  <?php $this->render('overall/footer'); ?>
</body>
</html>
