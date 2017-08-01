<div class="">

<?php

  if (isset($_GET['success'])) {
      echo '<div class="container pt-6 text-center wow fadeIn" data-wow-delay="0.2s">
    <div class="alert alert-success alert-dismissible fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <p class="text-fluid"><strong>' . $_GET['success'] . '</strong></p>
    </div></div>';
  } elseif (isset($_GET['error'])) {
      echo '<div class="container pt-6 text-center wow fadeIn" data-wow-delay="0.2s">
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <p class="text-fluid"><strong>' . $_GET['error'] . '</strong></p>
    </div></div>';
  }

  $this->render('categories/add');
  $this->render('categories/list');

?>

</div>
