<!DOCTYPE html>
<html>
  <?php $this->include('overall/header'); ?>
  <body>
    <?php $this->include('overall/topnav'); ?>
    <div class="" style="background-color: transparent; padding-top: 125px;"></div>
    <div class="container">
      <div class="row m-y-2">
        <div class="col-lg-4 text-center">
          <?php
            echo '<img src="' . $this->sessions->connectedUser()['profilePicture'] . '" class="rounded-circle img-fluid cmd_zoomin">';
          ?>
          <h6 class="m-t-2">Upload a different photo</h6>
          <label class="custom-file">
              <input type="file" id="file" class="custom-file-input">
              <span class="custom-file-control">Choose file</span>
          </label>
        </div>
        <div class="col-lg-8">
          <ul class="nav nav-pills nav-fill" style="margin-bottom: 15px;">
            <li class="nav-item">
                <a href="" data-target="#profile" data-toggle="tab" class="nav-link active">Profile</a>
            </li>
            <li class="nav-item">
                <a href="" data-target="#messages" data-toggle="tab" class="nav-link">Messages</a>
            </li>
            <li class="nav-item">
                <a href="" data-target="#edit" data-toggle="tab" class="nav-link">Edit</a>
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
    </div>
    <hr>

    <?php $this->include('overall/footer'); ?>
  </body>
</html>
