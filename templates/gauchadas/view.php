<!DOCTYPE html>
<html>
	<?php $this->render('overall/header'); ?>
<body>
	<?php $this->render('overall/topnav'); ?>
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
	      <div class="col-2 text-right">
	        <div class="avatar">
	          <img src="https://mdbootstrap.com/img/Photos/Avatars/img%20%289%29.jpg" class="rounded-circle img-responsive" style="width: 15vh">
	        </div>
	      </div>
	      <div class="col-10">
	        <?php
	          	$_gauchadas = Gauchadas();
							if (!array_key_exists($this->router->getId(), $_gauchadas)) {
								echo '<h1 style="color: red"> PUTO </h1>';
							}
							else {
								$_gauchada = $_gauchadas[$this->router->getId()];
		          	$HTML = "";
		          	$HTML.= '<h1 class="h1-responsive">'.$_gauchada['title'].'</h1>
		          			<h6 class="h6-responsive">'. $_gauchada['user']['completeName'] . ' - ' . $_gauchada['creationDate'] .'</h6>
		          			<hr>
		          			<p class="text-fluid">' . $_gauchada['body'] . '</p>';
		          	echo $HTML;
				}
	        ?>
	      </div>
	    </div>
      	<div class="row">
      		<div class="col-2"></div>
          	<div class="col-10 text-left">
            	<h3 class="h3-responsive">Comentarios</h3>
          	</div>
        </div>
        <div class="row">
			<?php
				$HTML = '';

				for($i = 0; $i < count($_gauchada['comments']); $i++) {
					$comment = $_gauchada['comments'][$i];
					$userComment = Users()[$comment['idUser']];
					$HTML.= '
					<div class="col-3 text-right">
						<div class="avatar">
							<img src="https://mdbootstrap.com/img/Photos/Avatars/img%20%289%29.jpg" class="rounded-circle img-responsive" style="width: 10vh">
						</div>
					</div>
					<div class="col-9">
						<h2 class="h2-responsive">' . $userComment['completeName'] . '</h2>
						<h5 class="h5-responsive">' . $comment['lastModify'] . '</h5>
						<p class="text-fluid">' . $comment['body'] . '</p>
					</div>';
					if($comment['answer']['idComment']) {
						$HTML .= '
						<div class="row">
				            <div class="col-3 text-right">
				              <div class="avatar">
				                <img src="https://mdbootstrap.com/img/Photos/Avatars/img%20%289%29.jpg" class="rounded-circle img-responsive" style="width: 8vh">
				              </div>
				            </div>
				            <div class="col-9">
				              <h4>' . $_gauchada['user']['completeName'] . '</h4>
				              <h6 class="h6-responsive">' . $comment['answer']['lastModify'] . '</h6>
				              <p style="color: red">Aca tendria que ir el body $comment[answer][body] pero como es una mierda, se pierden las columnas.<br> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
				            </div>
				        </div>';
					}
				}
				echo $HTML;
			?>
        </div>
	</div>

    <?php $this->render('overall/footer'); ?>
    </body>
</html>
