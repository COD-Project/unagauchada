<div class="modal fade" id="Signup" role="dialog">
   <div class="modal-dialog">
     <div class="modal-content" style="background: #fafafa;">

       <div id="_AJAX_SIGNUP_"></div>

       <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal">&times;</button>
         <h4><span class="glyphicon glyphicon-lock"></span> Sign Up</h4>
       </div>
       <div class="modal-body">
         <div role="form" onkeypress="return runScriptSignup(event)">
           <div class="group">
             <input type="text" id="name_signup" name="name">
             <span class="highlight"></span><span class="bar"></span>
             <label for="name_signup">Name</label>
           </div>
           <div class="group">
             <input type="text" id="surname_signup" name="surname">
             <span class="highlight"></span><span class="bar"></span>
             <label for="surname_signup">Surname</label>
           </div>
           <div class="group">
             <input type="text" id="email_signup" name="email">
             <span class="highlight"></span><span class="bar"></span>
             <label for="email_signup">Email</label>
           </div>
           <div class="group">
             <input type="password" id="pass_signup" name="password">
             <span class="highlight"></span><span class="bar"></span>
             <label for="pass_signup">Password</label>
           </div>
           <div class="group">
             <input type="password" id="pass_signup_dos" name="password">
             <span class="highlight"></span><span class="bar"></span>
             <label for="pass_signup_dos">Repeat Password</label>
           </div>
           <div class="group">
               <div class="">
                   <div class="umd_material-switch pull-left">
                       <span> Acept terms and conditions</span>
                   </div>
                   <div class="umd_material-switch pull-right">
                       <input id="tyc_signup" name="tyc_signup" type="checkbox"/>
                       <label for="tyc_signup" class="label-success"></label>
                   </div>
               </div>
           </div>
           <button type="button" class="button" onclick="goSignup()">Sign Up
               <div class="ripples buttonRipples"><span class="ripplesCircle"></span></div>
           </button>
         </div>
       </div>
       <div class="modal-footer">
         <p>Are you registered ? <a data-toggle="modal" data-target="#Login"> Login!</a></p>
       </div>
     </div>
   </div>
 </div>

 
