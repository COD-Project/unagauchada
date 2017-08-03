<div class="row">
  <div class="col-md-6">
      <h3 style="color: #000"><?= $this->user['completeName'] ?></h3>
      <p style="color: gray;"><?= $this->user['email'] ?></p>
      <h6>Localidad</h6>
      <p style="color: gray;"><?= $this->user['entireLocation'] ?></p>
      <h6>Teléfono</h6>
      <p style="color: gray;"><?= $this->user['phone'] ?></p>
  </div>
  <div class="col-md-6 text-center">
      <h6>Créditos y Puntos</h6>
      <hr>
      <span class="badge badge-pill badge-success"><i class="fa fa-credit-card-alt"></i> <?= $this->user['credits'] ?> Crédito/s </span>
      <span class="badge badge-pill badge-danger"><i class="fa fa-star"></i> <?= $this->user['points'] ?> Punto/s </span>
  </div>
  <div class="col-md-12" style="margin-top: 20px;">
    <h4 class="m-t-2"><span class="fa fa-clock-o ion-clock"></span> Actividad Reciente</h4>
      <?php if (!$this->news()): ?>
          <div class="alert alert-info alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <p class="text-fluid"><strong></strong>No se han registrado actividades recientes.</p>
          </div>
      <?php else: ?>
          <table class="table table-hover table-striped">
            <tbody>
              <?php foreach ($this->news() as $key => $value): ?>
                <tr>
                  <td>
                    <strong><?= $value['user']['completeName'] ?></strong> eliminó la gauchada <strong><?= $value['title'] ?></strong>
                  </td>
                </tr>
              <?php endforeach ?>
            </tbody>
          </table>
      <?php endif ?>
  </div>
</div>
