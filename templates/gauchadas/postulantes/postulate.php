<div class="modal fade modal-ext" id="Postulate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
             <h3><i class="fa fa-user"></i> Postularse </h3>
         </div>
         <form id="postulate_form" role="form" action=<?php echo "postulant/add/" . $this->router->getId() ?> method="post">
           <div class="group">
             <input type="text" name="description">
             <span class="highlight"></span><span class="bar"></span>
             <label for="text">Descripcion</label>
           </div>
           <button id="postulate_button" type="submit" class="button"> Postularse
               <div class="ripples buttonRipples"><span class="ripplesCircle"></span></div>
           </button>
         </form>
       </div>
     </div>
   </div>
 </div>
