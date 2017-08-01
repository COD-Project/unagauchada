<div class="row mb-3">
    <div class="col-xl-3 col-lg-6 wow fadeIn" data-wow-delay="0.15s">
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
    <div class="col-xl-3 col-lg-6 wow fadeIn" data-wow-delay="0.2s">
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
    <div class="col-xl-3 col-lg-6 wow fadeIn" data-wow-delay="0.25s">
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
    <div class="col-xl-3 col-lg-6 wow fadeIn" data-wow-delay="0.3s">
        <div class="card card-inverse card-warning">
            <div class="card-block bg-warning">
                <div class="rotate">
                    <i class="fa fa-shopping-bag fa-5x"></i>
                </div>
                <h6 class="text-uppercase">Compras</h6>
                <h1 class="display-1"><?php echo count($this->purchases); ?></h1>
            </div>
        </div>
    </div>
</div>
<!--/row-->

<hr/>

<div class="row wow fadeIn" data-wow-delay="0.4s">
  <div class="col-md-3" role="navigation">
    <ul class="nav nav-pills nav-fill flex-column pl-1">
        <li class="nav-item"><a data-target="#analytics" data-toggle="tab" class="nav-link active">Estadísticas</a></li>
        <li class="nav-item"><a data-target="#purchases" data-toggle="tab" class="nav-link">Compras</a></li>
    </ul>
  </div>
  <div class="col-md-9">
    <div class="tab-content p-b-3">
      <div class="tab-pane active wow fadeIn" id="analytics" data-wow-delay="0.1s">
        <div class="row">
          <div class="col-8">
            <div id="purchases_date_list"></div>
          </div>
          <div class="col-4">
            Soy una estadística
          </div>
        </div>
      </div>
      <div class="tab-pane wow fadeIn" id="purchases" data-wow-delay="0.1s">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead class="thead-inverse">
                    <tr>
                        <th>#</th>
                        <th>Usuario</th>
                        <th>Email</th>
                        <th>Fecha</th>
                        <th>Monto</th>
                    </tr>
                </thead>
                <tbody>
                  <?php
                  for ($i=0; $i < count($this->purchases); $i++) {
                      $purchase = $this->purchases[$i];
                      echo("
                      <tr>
                          <td>" . ($i + 1) . "</td>
                          <td>" . $this->users[$purchase['idUser']]['completeName'] . "</td>
                          <td>" . $this->users[$purchase['idUser']]['email'] . "</td>
                          <td>" . $purchase['date'] . "</td>
                          <td>$" . $purchase['mount'] . "</td>
                      </tr>
                    ");
                  }
                  ?>
                </tbody>
            </table>
        </div>
      </div>
    </div>
  </div>
</div>
