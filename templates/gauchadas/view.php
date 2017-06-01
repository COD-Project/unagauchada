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
				if (count($gauchada['images'])) {
					$HTML .= '<div id="carousel-example-1z" style="padding-top: 100px;" class="carousel slide " data-ride="carousel">
					<ol class="carousel-indicators">';
					for($i = 1; $i <= count($gauchada['images']); $i++) {
						if ($i == 1) {
							$HTML .= '<li data-target="#carousel-example-1z" data-slide-to="' . $i . '" class="active"></li>';
						} else {
							$HTML .= '<li data-target="#carousel-example-1z" data-slide-to="' . $i . '"></li>';
						}
					}
					$HTML .= '</ol>
					<div class="carousel-inner" role="listbox">';

					for($i = 1; $i <= count($gauchada['images']); $i++) {
						if ($i == 1) {

							$HTML .= '
							<div class="carousel-item active">
		              <img class="img-fluid rounded mx-auto d-block" style="height: 150px;" src="' . $gauchada['images'][$i]['path'] . '" alt="First slide">
		          </div>';
						} else {
							$HTML .= '
							<div class="carousel-item">
		              <img class="img-fluid rounded mx-auto d-block" style="height: 150px;" src="' . $gauchada['images'][$i]['path'] . '" alt="First slide">
		          </div>';
						}
					}
					if(count($gauchada['images']) > 1) {
						$HTML .= '</div>
		        <a class="carousel-control-prev" href="#carousel-example-1z" role="button" data-slide="prev">
		            <span class="carousel-control-prev-icon" style="color: black;"aria-hidden="true"></span>
		            <span class="sr-only">Previous</span>
		        </a>
		        <a class="carousel-control-next" href="#carousel-example-1z" role="button" data-slide="next">
		            <span class="carousel-control-next-icon" aria-hidden="true"></span>
		            <span class="sr-only">Next</span>
		        </a>
		    	</div>';
					}
					}
					echo $HTML;
        	$HTML = "";
        	$HTML.= '<div class="row" style="padding-top: 50px">
					<div class="col-2 text-right">
						<div class="avatar">
							<img src="' . $gauchada['user']['profilePicture'] . '" class="rounded-circle img-responsive" style="width: 15vh">
						</div>
					</div>
					<div class="col-10">
						<h1 class="h1-responsive">'.$gauchada['title'] .'</h1>
        			<h6 class="h6-responsive">'. $gauchada['user']['completeName'] . ' - ' . $gauchada['creationDate'] .'</h6>
        			<hr>
        			<p class="text-fluid">' . $gauchada['body'] . '</p>';
        	echo $HTML;
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

				for($i = 0; $i < count($gauchada['comments']); $i++) {
					$comment = $gauchada['comments'][$i];
					$userComment = Users()[$comment['idUser']];
					$HTML.= '
					<div class="col-3 text-right">
						<div class="avatar">
							<img src="' . $userComment['profilePicture'] . '" class="rounded-circle img-responsive" style="width: 10vh">
						</div>
					</div>
					<div class="col-8">
						<h2 class="h2-responsive">' . $userComment['completeName'] . '</h2>
						<h5 class="h5-responsive">' . $comment['lastModify'] . '</h5>
						<p class="text-fluid">' . $comment['body'] . '</p>
					</div>';
					if($comment['answer']['idComment']) {
						$HTML .= '
				            <div class="col-4 text-right">
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
				echo $HTML;
			?>

        </div>

	</div>

    <?php $this->render('overall/footer'); ?>
    </body>
</html>
