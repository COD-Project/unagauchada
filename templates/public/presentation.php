<!--Mask-->
<div class="" style="height: 75px;"></div>
<!--/.Mask-->


<!--Main layout-->
<main class="container pt-6 text-center wow fadeInUp" style="padding-top: 50px;" data-wow-delay="0.3s">
    <div class="row">
      <div class="col-4 text-left">
        <h2 class="h2-responsive"> Gauchadas </h2>
      </div>
      <div class="col-4">

      </div>
      <?php 
        if($this->sessions->isLoggedIn()) {
          echo ('
            <div class="col-4 text-right">
              <a class="btn btn-warning rounded-circle option-button text-center" href="gauchadas/add">
                <i class="fa fa-plus"></i>
              </a>
            </div>');
        }
      ?>
    </div>
</main>
<!--/Main layout-->

<?php $this->include('gauchadas/list'); ?>
