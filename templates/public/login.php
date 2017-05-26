<div class="modal fade modal-ext" id="Login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
     <div class="modal-content" style="background: #fafafa; border-radius: 0px;">

       <div id="_AJAX_LOGIN_"></div>

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
             <h3><i class="fa fa-sign-in"></i> Iniciar Sesión </h3>
         </div>
         <div id="login_form" role="form">
           <div class="group">
             <input type="text" id="email" name="email">
             <span class="highlight"></span><span class="bar"></span>
             <label for="email">Email</label>
           </div>
           <div class="group">
             <input type="password" id="pass" name="password">
             <span class="highlight"></span><span class="bar"></span>
             <label for="pass"> Contraseña </label>
           </div>
           <div class="group">
               <div class="">
                   <div class="cmd_material-switch pull-left">
                       <span> Recodarme </span>
                   </div>
                   <div class="cmd_material-switch pull-right">
                       <input id="session_login" name="session_login" type="checkbox"/>
                       <label for="session_login" class="label-success"></label>
                   </div>
               </div>
           </div>
           <button id="login_button" type="button" class="button"> Iniciar sesión
               <div class="ripples buttonRipples"><span class="ripplesCircle"></span></div>
           </button>
         </div>
       </div>
       <div class="modal-footer">
         <p> ¿Aún no tenés una cuenta? <a data-toggle="modal" data-dismiss="modal" data-target="#Signup"> ¡Registrate!</a></p>
       </div>
     </div>
   </div>
 </div>
