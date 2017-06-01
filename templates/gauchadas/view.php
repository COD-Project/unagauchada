<!DOCTYPE html>
<html>
	<?php $this->render('overall/header'); ?>
<body>
	<?php $this->render('overall/topnav'); ?>
	<div class="container">
			<?php
				$gauchadas = Gauchadas();
				$gauchada = $gauchadas[$this->router->getId()];
				$HTML = '';
				if ($gauchada['images']) {
					$HTML .= '
					<div id="carousel-example-1z" style="padding-top: 100px;" class="carousel slide " data-ride="carousel">
						<ol class="carousel-indicators">';
					for($i = 0; $i < count($gauchada['images']); $i++) {
						if ($i == 0) {
							$HTML .= '<li data-target="#carousel-example-1z" data-slide-to="' . ($i + 1) . '" class="active"></li>';
						} else {
							$HTML .= '<li data-target="#carousel-example-1z" data-slide-to="' . ($i + 1) . '"></li>';
						}
					}
					$HTML .= '
						</ol>
						<div class="carousel-inner" role="listbox">';

					for($i = 0; $i < count($gauchada['images']); $i++) {
						if ($i == 0) {

							$HTML .= '
							<div class="carousel-item active">
		              <img class="img-fluid rounded mx-auto d-block" style="height: 100%;" src="' . $gauchada['images'][$i]['path'] . '" alt="First slide">
		          </div>';
						} else {
							$HTML .= '
							<div class="carousel-item">
		              <img class="img-fluid rounded mx-auto d-block" style="height: 100%;" src="' . $gauchada['images'][$i]['path'] . '" alt="First slide">
		          </div>';
						}
					}
					$HTML .= '</div>';
					if($gauchada['images']) {
						$HTML .= '
		        <a class="carousel-control-prev" href="#carousel-example-1z" role="button" data-slide="prev">
		            <span class="carousel-control-prev-icon" style="color: black; "aria-hidden="true"></span>
		            <span class="sr-only">Previous</span>
		        </a>
		        <a class="carousel-control-next" href="#carousel-example-1z" role="button" data-slide="next">
		            <span class="carousel-control-next-icon" aria-hidden="true"></span>
		            <span class="sr-only">Next</span>
		        </a>';
					}
					$HTML .= '</div>';
					}
					echo $HTML;
        	$HTML = "";
        	$HTML.= '<div class="row" style="padding-top: 50px">
					<div class="col-2 text-right">
						<div class="avatar">
							<img src="' . $gauchada['user']['profilePicture'] . '" class="rounded-circle img-responsive" style="width: 15vh">
						</div>
					</div>
					<div class="col-8">
						<h1 class="h1-responsive">'.$gauchada['title'] . '</h1>
        			<h6 class="h6-responsive">'. $gauchada['user']['completeName'] . ' - ' . $gauchada['location'] . ' - ' . $gauchada['creationDate'] .'</h6> 
        			<hr>
        			<p class="text-fluid">' . $gauchada['body'] . '</p>
					</div>';
					if($this->sessions->connectedUser()['idUser'] == $gauchada['user']['idUser']) {
						$HTML.= '<div class="col-2">
							<a class="btn btn-warning rounded-circle option-button text-center" href="#">
								<i class="fa fa-edit"></i>
							</a>
						</div>';
					}
        	echo $HTML;
	        ?>
	      </div>
      	<div class="row" style="margin-top: 20px; margin-bottom: 10px">
      		<div class="col-2"></div>
          	<div class="col-10 text-left">
            	<h3 class="h3-responsive">Comentarios</h3>
          	</div>
        </div>
        <div class="row">
			<?php
				$HTML = '';
				if ($gauchada['comments']) {
					for($i = 0; $i < count($gauchada['comments']); $i++) {
						$comment = $gauchada['comments'][$i];
						$userComment = Users()[$comment['idUser']];
						$HTML.= '
						<div class="col-3 text-right" style="margin-top: 15px;">
							<div class="avatar">
								<img src="' . $userComment['profilePicture'] . '" class="rounded-circle img-responsive" style="width: 10vh">
							</div>
						</div>
						<div class="col-8" style="margin-top: 10px;">
							<h2 class="h2-responsive">' . $userComment['completeName'] . '</h2>
							<h5 class="h5-responsive">' . $comment['lastModify'] . '</h5>
							<p class="text-fluid">' . $comment['body'] . '</p>
						</div>';
						if($comment['answer']['idComment']) {
							$HTML .= '
				            	<div class="col-4 text-right" style="margin-top: 5px;">
				              	<div class="avatar">
				               	 <img src="' . $gauchada['user']['profilePicture'] . '" class="rounded-circle img-responsive" style="width: 8vh">
				              	</div>
				            	</div>
				            	<div class="col-8">
				              	<h4>' . $gauchada['user']['completeName'] . '</h4>
				             	 <h6 class="h6-responsive">' . $comment['answer']['lastModify'] . '</h6>
				              	<p>' . $comment["answer"]["body"] . '</p>
				            	</div>';
						}
					}
				} else {
					$HTML .= '<div class="col-2"></div><div class="col-8">
              <div class="alert alert-info alert-dismissible fade show" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <p class="text-fluid">Aún no hay comentarios para esta gauchada. <strong>¡Se el primero en comentar!</strong></p>
              </div></div><div class="col-2">';
				}
				
				echo $HTML;
			?>

      </div>
				<?php
					$HTML = '';
					if($this->sessions->connectedUser()['idUser'] != $gauchada['user']['idUser'] && !$this->sessions->isGranted()) {
						$HTML .= '<div class="row justify-content-center" style="margin-top: 20px">
											<div class="col-8">
												<div class="text-center">
													<a class="btn btn-warning btn-lg btn-block option-button text-center" href="#">
														<i class="fa fa-comment"></i>
													</a>
												</div>
											</div>
										</div>
										<hr>';
					} else {
						$HTML .= "<hr>";
					}
					echo $HTML;
				?>
		</div>
  <?php $this->render('overall/footer'); ?>
  </body>
</html>
