<!DOCTYPE html>
<html>
  <?php $this->include('overall/header'); ?>
  <body>
    <?php $this->include('overall/topnav'); ?>
    <div class="" style="background-color: transparent; padding-top: 125px;"></div>
    <div class="container">
      <div class="row">
        <?php
          $user = Users()[$this->router->getId()];
          $HTML = '';
          if ($user) {
            $HTML .= '<div class="col-10">
              <h1>' . $user['completeName'] . '</h1>
            </div>
            <div class="col-1">
              <a class="btn btn-warning option-button text-center" data-toggle="modal" data-target="#ListGauchadas">
                <i class="fa fa-check" style="color: #fff"></i>
              </a>
            </div>
            <div class="col-1">
              <a class="btn btn-warning option-button text-center" href="gauchadas/view">
                <i class="fa fa-mail-forward" aria-hidden="true"></i>
              </a>
            </div>
            <div class="col-12">
              <p> >>Insert Here a calification and a comment<< </p>
            </div>';
          }
          echo $HTML;
        ?>
      </div>
    </div>
    <?php
      $this->include('gauchadas/postulantes/list');
      $this->include('overall/footer');
    ?>
  </body>
</html>
