<div class="modal fade" id="Contact" role="dialog">
   <div class="modal-dialog">
     <div class="modal-content" style="background: #fafafa;">

       <div id="_AJAX_CONTACT_"></div>

       <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal">&times;</button>
         <div class="text-xs-center">
           <h3><i class="fa fa-envelope"></i> Write to us:</h3>
           <hr class="m-t-2 m-b-2">
         </div>
       </div>
       <div class="modal-body">
         <div class="umd_form_container" style="padding: 0;">
       		<div class="" onkeypress="return runScriptContact(event)">
       			<form name="umd_form" class="umd_form">
       				<div>
       					<div class="umd_input-group">
       						<input type="email" id="email" name="email" value="">
       						<label class="umd_label" for="email">Email</label>
       					</div>
                <div class="umd_input-group">
       						<input type="text" id="subject" name="text">
       						<label class="umd_label" for="text">Subject</label>
       					</div>
                <div class="umd_input-group">
       						<input type="text" id="message" name="text">
       						<label class="umd_label" for="text">Message</label>
       					</div>
               </div>
       			</form>
           </div>
       	 </div>
         <button type="button" class="button" onclick="goContact()">Send
             <div class="ripples buttonRipples"><span class="ripplesCircle"></span></div>
         </button>
       </div>
       <div class="modal-footer">
         <div class="call">
            <br>
            <p>Or would you prefer to call?
                <br>
                <span><i class="fa fa-phone"></i></span> 221-XXX-XXXX</p>
        </div>
       </div>
     </div>
   </div>
 </div>
