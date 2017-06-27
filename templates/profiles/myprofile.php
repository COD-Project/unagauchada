<!DOCTYPE html>
<html>
  <?php $this->include('overall/header'); ?>
  <body>
    <?php $this->include('overall/topnav'); ?>
    <div class="" style="background-color: transparent; padding-top: 125px;"></div>
    <div class="container">
      <div class="row m-y-2">
        <div class="col-lg-4 text-center" style="margin-bottom: 1vh;">
          <?php
            echo '<img src="' . $this->sessions->connectedUser()['profilePicture'] . '" class="rounded-circle img-fluid cmd_zoomin"  style="max-width: 50%; background-size: cover;">';
          ?>
          <h6 class="m-t-2" style="margin-top: 2vh;">Cambia tu foto de perfil</h6>
          <form class="form-inline" action="ajax.php?for=users&mode=edit" method="post" enctype="multipart/form-data">
            <label class="custom-file" style="margin-right: -1.8rem;">
              <input type="file" name="images[]" class="custom-file-input" required>
              <span class="custom-file-control"><i class="fa fa-file-image-o"></i> Subir imagen</span>
            </label>
            <button type="submit" class="btn btn-warning rounded-circle" style="z-index: 2000;"><i class="fa fa-arrow-right"></i></button>
          </form>
        </div>
        <div class="col-lg-8">
          <ul class="nav nav-pills nav-fill" style="margin-bottom: 5vh">
            <li class="nav-item">
                <a href="" data-target="#profile" data-toggle="tab" class="nav-link active">Perfil</a>
            </li>
            <li class="nav-item">
                <a href="" data-target="#edit" data-toggle="tab" class="nav-link">Editar</a>
            </li>
          </ul>
          <div class="tab-content p-b-3">
            <?php
              $this->include('profiles/myprofile/user');
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
