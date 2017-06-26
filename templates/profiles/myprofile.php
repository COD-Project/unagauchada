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
            echo '<img src="' . $this->sessions->connectedUser()['profilePicture'] . '" class="rounded-circle img-fluid cmd_zoomin">';
          ?>
          <br>
          <h6 class="m-t-2">Cambia tu foto de perfil</h6>
          <label class="custom-file">
              <input type="file" id="user-profile-picture[]" class="custom-file-input" accept="image/*">
              <span class="custom-file-control">Subir imagen</span>
          </label>
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
