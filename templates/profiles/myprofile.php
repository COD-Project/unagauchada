<!DOCTYPE html>
<html>
  <?php $this->include('overall/header'); ?>
  <body>
    <?php $this->include('overall/topnav'); ?>
    <div class="" style="background-color: transparent; padding-top: 125px;"></div>
    <div class="container">
      <div class="row m-y-2">
        <div class="col-lg-4 text-center" style="margin-bottom: 5vh;">
          <?php
            echo '<img src="' . $this->sessions->connectedUser()['profilePicture'] . '" class="rounded img-fluid cmd_zoomin"  style="max-height: 250px; width: auto; ">';
          ?>
          <h6 class="m-t-2" style="margin-top: 2vh;"><strong>Cambia tu foto de perfil</strong></h6>
          <form class="form-inline" id="profile_picture_form" action="ajax.php?for=users&mode=edit" method="post" enctype="multipart/form-data">
            <label class="custom-file" style="margin: auto;">
              <input type="file" id="new_profile_picture" name="images[]" accept="image/*" class="custom-file-input" style="margin: 0 auto;" required>
              <span class="custom-file-control"><i class="fa fa-file-image-o"></i> Subir imagen</span>
            </label>
          </form>
        </div>
        <div class="col-lg-8">
          <ul class="nav nav-pills nav-fill" style="margin-bottom: 5vh;">
            <li class="nav-item">
                <a href="" data-target="#profile" data-toggle="tab" class="nav-link active"><i class="fa fa-user"></i> Perfil</a>
            </li>
            <li class="nav-item">
                <a href="" data-target="#gauchadas" data-toggle="tab" class="nav-link"><i class="fa fa-bars"></i> Gauchadas</a>
            </li>
            <li class="nav-item">
                <a href="" data-target="#postulations" data-toggle="tab" class="nav-link"><i class="fa fa-users"></i> Postulaciones</a>
            </li>
            <li class="nav-item">
                <a href="" data-target="#califications" data-toggle="tab" class="nav-link"><i class="fa fa-check"></i> Calificaciones</a>
            </li>
            <li class="nav-item">
                <a href="" data-target="#edit" data-toggle="tab" class="nav-link"><i class="fa fa-cogs"></i> Editar</a>
            </li>
          </ul>
          <div class="tab-content p-b-3">
            <div class="tab-pane wow fadeIn" id="califications" data-wow-delay="0.1s">
              <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <p class="text-fluid"><strong>Ups! Esta historia corresponde a la siguiente demo.</strong></p>
              </div>
            </div>
            <?php
              $this->include('profiles/myprofile/user');
              $this->include('profiles/myprofile/gauchadas');
              $this->include('profiles/myprofile/postulations');
              $this->include('profiles/myprofile/edit');
            ?>
          </div>
        </div>
      </div>
      <hr>
    </div>

    <?php $this->include('overall/footer'); ?>
  </body>
</html>
