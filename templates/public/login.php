<div class="modal fade" id="Login" role="dialog">
   <div class="modal-dialog">
     <div class="modal-content" style="background: #fafafa;">

       <div id="_AJAX_LOGIN_"></div>

       <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal">&times;</button>
         <h4><span class="glyphicon glyphicon-lock"></span>  Iniciar sesión </h4>
       </div>
       <div class="modal-body">
         <div role="form" onkeypress="return runScriptLogin(event)">
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
           <button type="button" class="button" onclick="goLogin()"> Iniciar sesión
               <div class="ripples buttonRipples"><span class="ripplesCircle"></span></div>
           </button>
         </div>
       </div>
       <div class="modal-footer">
         <p> ¿ Estás registrado ? <a data-toggle="modal" data-target="#Signup"> ¡Registrate!</a></p>
         <p><a data-toggle="modal" data-target="#Lostpass"> ¿ Perdiste la contraseña ?</a></p>
       </div>
     </div>
   </div>
 </div>