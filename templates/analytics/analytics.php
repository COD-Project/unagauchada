<div class="row mb-3">
    <div class="col-xl-3 col-lg-6 wow fadeIn" data-wow-delay="0.2s">
        <div class="card card-inverse card-success">
            <div class="card-block bg-success">
                <div class="rotate">
                    <i class="fa fa-user fa-5x"></i>
                </div>
                <h6 class="text-uppercase">Users</h6>
                <h1 class="display-1"><?php echo count($this->users); ?></h1>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 wow fadeIn" data-wow-delay="0.4s">
        <div class="card card-inverse card-danger">
            <div class="card-block bg-danger">
                <div class="rotate">
                    <i class="fa fa-list fa-4x"></i>
                </div>
                <h6 class="text-uppercase">Gauchadas</h6>
                <h1 class="display-1"><?php echo count($this->gauchadas); ?></h1>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 wow fadeIn" data-wow-delay="0.8s">
        <div class="card card-inverse card-info">
            <div class="card-block bg-info">
                <div class="rotate">
                    <i class="fa fa-support fa-5x"></i>
                </div>
                <h6 class="text-uppercase">Postulaciones</h6>
                <h1 class="display-1"><?php echo count($this->postulants); ?></h1>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 wow fadeIn" data-wow-delay="1.0s">
        <div class="card card-inverse card-warning">
            <div class="card-block bg-warning">
                <div class="rotate">
                    <i class="fa fa-shopping-bag fa-5x"></i>
                </div>
                <h6 class="text-uppercase">Compras</h6>
                <h1 class="display-1">12</h1>
            </div>
        </div>
    </div>
</div>
<!--/row-->

<hr/>

<div class="row">
  <div class="col-md-3 col-lg-2" role="navigation">
    <ul class="nav nav-tabs flex-column pl-1">
        <li class="nav-item"><a data-target="#principal" data-toggle="tab" class="nav-link active">Principal</a></li>
        <li class="nav-item"><a class="nav-link">Estadísticas</a></li>
        <li class="nav-item"><a class="nav-link">Usuarios</a></li>
        <li class="nav-item"><a class="nav-link">Gauchadas</a></li>
        <li class="nav-item"><a class="nav-link">Configuración</a></li>
    </ul>
  </div>
  <div class="col-md-9 col-lg-10">
    <div class="tab-content p-b-3">
      <div class="tab-pane active wow fadeIn" id="principal" data-wow-delay="0.1s">
asd
      </div>
    </div>
  </div>
</div>
