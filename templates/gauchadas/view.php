<!DOCTYPE html>
<html>
	<?php $this->render('overall/header'); ?>
<body>
	<<?php $this->render('overall/topnav'); ?>
  <div class="container">
    <div id="carousel-example-1z" style="padding-top: 100px" class="carousel slide carousel-fade" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carousel-example-1z" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-example-1z" data-slide-to="1"></li>
            <li data-target="#carousel-example-1z" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
                <img src="https://mdbootstrap.com/img/Photos/Slides/img%20(18).jpg" alt="First slide">
            </div>
            <div class="carousel-item">
                <img src="https://mdbootstrap.com/img/Photos/Slides/img%20(19).jpg" alt="Second slide">
            </div>
            <div class="carousel-item">
                <img src="https://mdbootstrap.com/img/Photos/Slides/img%20(20).jpg" alt="Third slide">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carousel-example-1z" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carousel-example-1z" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <div class="row" style="padding-top: 50px">
      <div class="col-sm-2 col-md-offset-3">
        <div class="avatar text-center">
          <img src="https://mdbootstrap.com/img/Photos/Avatars/img%20%289%29.jpg" class="rounded-circle img-responsive" style="width: 15vh">
        </div>
      </div>
      <div class="col-sm-10">
        <?php
          $gauchada = Gauchadas()[$this->router->getId()];
          $user = Users()[$gauchada['idUser']];
          $HTML = "";
          $HTML.= '<h1>'.$gauchada['title'].'</h1>
          <h6>'. $user['name'] . ' ' . $user['surname'] . ' - ' . $gauchada['creationDate'] .'</h6>
          <hr>
          <p>' . $gauchada['body'] . '</p>';
          echo $HTML;
        ?>
      </div>
      <div class="col-sm-12">
        <br>
        <div class="row">
          <div class="col-sm-4">
            <h3 class="text-center">Comentarios</h3>
            <br>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-2">
            <div class="avatar text-right">
              <img src="https://mdbootstrap.com/img/Photos/Avatars/img%20%289%29.jpg" class="rounded-circle img-responsive" style="width: 10vh">
            </div>
          </div>
          <div class="col-sm-8">
            <h2>Nombre</h2>
            <h5>dd/mm/aaaa</h5>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            <br>
          </div>
          <div class="row">
            <div class="col-sm-3">
              <div class="avatar text-right">
                <img src="https://mdbootstrap.com/img/Photos/Avatars/img%20%289%29.jpg" class="rounded-circle img-responsive" style="width: 8vh">
              </div>
            </div>
            <div class="col-sm-8">
              <h4>Nombre</h4>
              <h6>dd/mm/aaaa</h6>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php $this->render('overall/footer'); ?>
  </body>
</html>
