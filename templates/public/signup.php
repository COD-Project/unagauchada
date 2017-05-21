<div class="modal fade" id="Signup" role="dialog">
   <div class="modal-dialog">
     <div class="modal-content" style="background: #fafafa;">

       <div id="_AJAX_SIGNUP_"></div>

       <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal">&times;</button>
         <h4><span class="glyphicon glyphicon-lock"></span> Registrarse </h4>
       </div>
       <div class="modal-body">
         <div id="signup_form" role="form">
           <div class="group">
             <input type="text" id="name_signup" name="name">
             <span class="highlight"></span><span class="bar"></span>
             <label for="name_signup">Nombre</label>
           </div>
           <div class="group">
             <input type="text" id="surname_signup" name="surname">
             <span class="highlight"></span><span class="bar"></span>
             <label for="surname_signup">Apellido</label>
           </div>
           <div class="group">
             <input type="text" id="email_signup" name="email">
             <span class="highlight"></span><span class="bar"></span>
             <label for="email_signup">Email</label>
           </div>
           <div class="group">
             <input type="password" id="pass_signup" name="password">
             <span class="highlight"></span><span class="bar"></span>
             <label for="pass_signup">Contraseña</label>
           </div>
           <div class="group">
             <input type="password" id="pass_signup_dos" name="password">
             <span class="highlight"></span><span class="bar"></span>
             <label for="pass_signup_dos">Repetir contraseña</label>
           </div>
           <div class="group">
               <div class="">
                   <div class="cmd_material-switch pull-left">
                       <span> Acepto los terminos y condiciones </span>
                   </div>
                   <div class="cmd_material-switch pull-right">
                       <input id="tyc_signup" name="tyc_signup" type="checkbox"/>
                       <label for="tyc_signup" class="label-success"></label>
                   </div>
               </div>
           </div>
           <button id="signup_button" type="button" class="button"> Registrarse
               <div class="ripples buttonRipples"><span class="ripplesCircle"></span></div>
           </button>
         </div>
       </div>
       <div class="modal-footer">
         <p> ¿ Estás registrado ? <a data-toggle="modal" data-target="#Login"> ¡ Inicia sesión !</a></p>
       </div>
     </div>
   </div>
 </div>
