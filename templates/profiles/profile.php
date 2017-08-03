<!DOCTYPE html>
<html>
  <?php $this->include('overall/header'); ?>
  <body>
    <?php $this->include('overall/topnav'); ?>
    <div class="" style="background-color: transparent; padding-top: 125px;"></div>
    <div class="container">
      <div class="row">
        <?php if ($this->user): ?>
            <div class="col-8">
              <h1><?= $this->user['completeName'] ?></h1>
            </div>
            <div class="col-3 text-right">
            <span class="badge badge-pill badge-danger"><i class="fa fa-star"></i><?= $this->user['reputation'] ?></span>
            </div>
            <div class="col-1">
              <a class="btn btn-warning option-button text-center" data-toggle="modal" data-target="#ListGauchadas">
                <i class="fa fa-check" style="color: #fff"></i>
              </a>
            </div>
            <div class="col-12">
              <hr>
              <br>
              <div class="list-group">
                <?php if($this->rankings): ?>
                  <?php foreach ($this->rankings as $postulant):
                    $data = Rating($postulant['idGauchada']);
                    if($data): ?>
                      <a href="gauchadas/view/<?= $postulant['idGauchada'] ?>" class="list-group-item list-group-item-action flex-column align-items-start">
                        <div class="d-flex w-100 justify-content-between">
                          <h5 class="mb-1"><strong><?= $data['title'] ?></strong></h5>
                          <h5><span class="badge badge-pill badge<?= $data['color'] ?>"><?= $data['rating'] ?></span></h5>
                        </div>
                        <p class="mb-1"><?= $data['body'] ?></p>
                      </a>
                    <?php endif; ?>
                  <?php endforeach; ?>
                <?php endif; ?>
                </div>
                <br><hr><br>
                </div>
              </div>
            <?php if($this->access()): ?>
                  <div class="jumbotron">
                  <h1 class="h1-responsive"> Información de contacto</h1>
                  <div class="row">
                    <div class="col-2">
                      <img src=<?= $this->user['profilePicture'] ?>></img>
                    </div>
                    <div class="col-10">
                      <p class="lead"> Nombre: <small>' .$this->user['name'] ?></small></p>
                      <p class="lead"> Apellido: <small><?= $this->user['surname'] ?></small></p>
                      <p class="lead"> Email: <small><?= $this->user['email'] ?></small></p>
                      <p class="lead"> Teléfono: <small><?= $this->user['phone'] ?></small></p>
                      <p class="lead"> Fecha de Nacimiento: <small><?= $this->user['birthdate'] ?></small></p>
                      <p class="lead"> Localización: <small><?= $this->user['location'] ?></small></p>
                    </div>
                  </div>
                </div>
              <?php endif; ?>
            <?php endif; ?>
      </div>
    </div>
    <?php
      $this->include('gauchadas/postulantes/list');
      $this->include('overall/footer');
    ?>
  </body>
</html>
