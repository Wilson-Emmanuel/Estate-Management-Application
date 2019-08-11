  <table class="table table-active table-lg table-responsive-sm w-100">
   <thead class="estate_admin_color"> 
<tr>
                <th colspan="8"><h2 class="text-center">Compose Message</h2></th>
  </tr>
 
   </thead>
   
   
    </table>    


   <!-- Modal -->
                          <div >
                              <div >
                                  <div class="panel panel-default">
                                      
                                      <div class="panel-body">
                                          <form  method="post" class="form-horizontal">
                                              <input type="hidden" name="post" value="estate_compose">
                                              
<!--                                              <div class="form-group">
                                                  <label class="col-lg-2 control-label">To</label>
                                                  <div class="col-lg-10">
                                                      <input type="text" placeholder="" id="inputEmail1" class="form-control">
                                                  </div>
                                              </div>-->
                                              
                                              
                                              
<!--                                              <div class="form-group">
                                                  <label class="col-lg-2 control-label">Cc / Bcc</label>
                                                  <div class="col-lg-10">
                                                      <input type="text" placeholder="" id="cc" class="form-control">
                                                  </div>
                                              </div>-->
                                              <div class="form-group">
                                                                                        <?php
                                                    //$error ="";
                                                   // $success = "Details has been updated!";
                                                      if(strlen(trim($error)) >0){
                                                          echo "<tr><td colspan='3'><div class='alert alert-danger alert-dismissible'>"
                                                         .$error."<span class='close' data-dismiss='alert'>"
                                                         . "&times;</span></div></td></tr>";
                                                      } 

                                                      if(strlen(trim($success)) >0){
                                                          echo "<tr><td colspan='3'><div class='alert alert-success alert-dismissible'>"
                                                         .$success."<span class='close' data-dismiss='alert'>"
                                                         . "&times;</span></div></td></tr>";
                                                      } 
                                                     ?>
                                              </div>


                                              <div class="form-group">
                                                  <label class="col-lg-2 control-label">Subject</label>
                                                  <div class="col-lg-10">
                                                      <input type="text" name="estate_subject"  class="form-control">
<!--                                                      <small><i class="fa fa-info-circle tenant_text"></i> This message will be sent . </small>-->
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                  <label class="col-lg-2 control-label">Recipient</label>
                                                  <div class="col-lg-10">
                                                      <select name="estate_recipient" class="form-control" id="estate_recipient" data-id ="<?=$_SESSION['id']?>">
                                                          <option value="0">Select...</option>
                                                          <option value="1">Main Admin</option>
                                                          <option value="2">All Estate Tenants</option>
                                                          <option value="3">All Building Tenants</option>
                                                          <option value="4">One Tenant</option>
                                                      </select>
                                                  </div>
                                              </div>

                                             <div class="form-group" id="estate_recipient_div1"  >
                                                 <label class="col-lg-2 control-label" >Building</label>
                                                  <div class="col-lg-10"> <!-- Check the main.js script for the JS code -->
                                                      <select  id="estate_recipient_select1" data-id ="<?=$_SESSION['id']?>" name="estate_recipient_building">
                                                          
                                                      </select>
                                                  </div>
                                              </div>

                                             <div class="form-group" id="estate_recipient_div2" >
                                                 <label class="col-lg-2 control-label" >Tenants</label>
                                                  <div class="col-lg-10"> <!-- Check the main.js script for the JS code -->
                                                      <select id="estate_recipient_select2" name="estate_recipient_tenant">
                                                          
                                                      </select>
                                                  </div>
                                              </div>


                                              <div class="form-group">
                                                  <label class="col-lg-2 control-label ">Message</label>
                                                  <div class="col-lg-10">
                                                      <textarea rows="5" cols="30" class="form-control"  name="estate_message"></textarea>
                                                  </div>
                                              </div>

                                              <div class="form-group">
                                                  <div class="col-lg-offset-2 col-lg-10">
<!--                                                      <span class="btn green fileinput-button">
                                                        <i class="fa fa-plus fa fa-white"></i>
                                                        <span>Attachment</span>
                                                        <input type="file" name="files[]" multiple="">
                                                      </span>-->
                                                      <button class="btn btn-sm estate_admin_color" name="estate_compose_btn" type="submit"><i class="fa fa-send-o"></i> Send</button>
                                                  </div>
                                              </div>
                                          </form>
                                      </div>
                                  </div><!-- /.modal-content -->
                              </div><!-- /.modal-dialog -->
                          </div><!-- /.modal -->

