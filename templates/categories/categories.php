<!DOCTYPE html>
<html>
  <?php $this->render('overall/header'); ?>
<body>
    <?php $this->render('overall/topnav'); ?>

    <div class="below-topnav" style="margin-top: 100px"></div>
    <div class="container">

   		<?php 

		    if (isset($_GET['success'])) {
			    echo '<div class="container pt-6 text-center wow fadeIn" data-wow-delay="0.2s">
			    <div class="alert alert-success alert-dismissible fade show" role="alert">
			    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			    <p class="text-fluid"><strong>' . $_GET['success'] . '</strong></p>
			    </div></div>';
			} else if (isset($_GET['error'])) {
			    echo '<div class="container pt-6 text-center wow fadeIn" data-wow-delay="0.2s">
			    <div class="alert alert-warning alert-dismissible fade show" role="alert">
			    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			    <p class="text-fluid"><strong>' . $_GET['error'] . '</strong></p>
			    </div></div>';
			}

		?>
	    <main>

			<?php $this->render('categories/add'); ?>

			<?php $this->render('categories/list'); ?>

			</div>
		</main>
  	</div>
  <?php $this->render('overall/footer'); ?>
</body>
</html>