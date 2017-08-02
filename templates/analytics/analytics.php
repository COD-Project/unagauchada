<div class="row mb-3">
    <div class="col-xl-3 col-lg-6 wow fadeIn" data-wow-delay="0.15s">
        <div class="card card-inverse card-success">
            <div class="card-block bg-success">
                <div class="rotate">
                    <i class="fa fa-user fa-5x"></i>
                </div>
                <h6 class="text-uppercase">Users</h6>
                <h1 class="display-1"><?= count($this->users) ?></h1>
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
                <h1 class="display-1"><?= count($this->gauchadas) ?></h1>
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
                <h1 class="display-1"><?= count($this->postulants) ?></h1>
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
                <h1 class="display-1"><?= count($this->purchases) ?></h1>
            </div>
        </div>
    </div>
</div>
<!--/row-->

<hr/>

<div class="row wow fadeIn" data-wow-delay="0.4s">
  <div class="col-md-3" role="navigation">
    <ul class="nav nav-pills nav-fill flex-column pl-1">
      <li class="nav-item"><a data-target="#purchases" data-toggle="tab" class="nav-link active">Estadísticas</a></li>
        <li class="nav-item"><a data-target="#analytics" data-toggle="tab" class="nav-link">Filtrar</a></li>
    </ul>
  </div>
  <div class="col-md-9">
      <div class="tab-content p-b-3">
          <div class="tab-pane active wow fadeIn" id="purchases" data-wow-delay="0.1s">
            <?php if($this->purchases): ?>
              <div class="row">
                <div class="col-6 wow fadeIn" data-wow-delay="0.3s">
                    <div class="card card-inverse card-info">
                        <div class="card-block bg-info">
                            <div class="rotate">
                                <i class="fa fa-shopping-bag fa-5x"></i>
                            </div>
                            <h6 class="text-uppercase">Compras</h6>
                            <h1 class="display-1"><?= count($this->purchases) ?></h1>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-6 wow fadeIn" data-wow-delay="0.3s">
                    <div class="card card-inverse card-success">
                        <div class="card-block bg-success">
                            <div class="rotate">
                                <i class="fa fa-btc fa-5x"></i>
                            </div>
                            <h6 class="text-uppercase">Ganancia promedio</h6>
                            <h1 class="display-1"><?= (int) $this->avg ?></h1>
                        </div>
                    </div>
                </div>
              </div>
              <br>
              <div class="table-responsive">
                  <table class="table table-striped">
                      <thead class="thead-inverse">
                          <tr>
                              <th>#</th>
                              <th>Usuario</th>
                              <th>Email</th>
                              <th>Fecha</th>
                              <th>Cantidad</th>
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
                                <td>" . $purchase['count'] . "</td>
                                <td>$" . $purchase['mount'] . "</td>
                            </tr>
                          ");
                        }
                        ?>
                      </tbody>
                  </table>
              </div>
            <?php else: ?>
              <div class="container pt-6 text-center wow fadeIn" data-wow-delay="0.2s">
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <p class="text-fluid">Aún <strong>no</strong> se han registrado <strong>compras de Créditos</strong>.</p>
                </div>
              </div>
            <?php endif ?>
          </div>
          <div class="tab-pane wow fadeIn" id="analytics" data-wow-delay="0.1s">
            <div class="row">
              <div class="col-8">
                <div id="purchases_date_list"></div>
              </div>
              <div class="col-4">
              </div>
            </div>
          </div>
      </div>
  </div>
</div>
