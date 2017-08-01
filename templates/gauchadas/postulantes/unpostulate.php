<div class="modal fade modal-ext" id="Unpostulate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="background: #fafafa; border-radius: 0px;">

      <div class="modal-header">
        <div>
          <!-- -->
        </div>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true"> &times; </span>
         </button>
      </div>
      <div class="modal-body">
        <div class="text-center">
          <h3><i class="fa fa-user"></i> Despostularse </h3>
        </div>
        <form id="postulate_form" role="form" action=<?php echo "postulants/delete/" . $this->router->getId() ?> method="post">
          <button id="postulate_button" type="submit" class="button"> Despostularse
               <div class="ripples buttonRipples"><span class="ripplesCircle"></span></div>
           </button>
        </form>
      </div>
    </div>
  </div>
</div>
