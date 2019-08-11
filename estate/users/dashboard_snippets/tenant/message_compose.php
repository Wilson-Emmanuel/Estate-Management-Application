  <table class="table table-active table-lg table-responsive-sm w-100">
   <thead class="tenant_color"> 
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
                                              <input type="hidden" name="post" value="tenant_compose">
                                              
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
                                                      <input type="text" name="tenant_subject"  class="form-control">
                                                      <small><i class="fa fa-info-circle tenant_text"></i> This message will be sent to the administrator in your estate. </small>
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                  <label class="col-lg-2 control-label ">Message</label>
                                                  <div class="col-lg-10">
                                                      <textarea rows="10" cols="30" class="form-control"  name="tenant_message"></textarea>
                                                  </div>
                                              </div>

                                              <div class="form-group">
                                                  <div class="col-lg-offset-2 col-lg-10">
<!--                                                      <span class="btn green fileinput-button">
                                                        <i class="fa fa-plus fa fa-white"></i>
                                                        <span>Attachment</span>
                                                        <input type="file" name="files[]" multiple="">
                                                      </span>-->
                                                      <button class="btn btn-sm tenant_color" name="tenant_compose_btn" type="submit"><i class="fa fa-send-o"></i> Send</button>
                                                  </div>
                                              </div>
                                          </form>
                                      </div>
                                  </div><!-- /.modal-content -->
                              </div><!-- /.modal-dialog -->
                          </div><!-- /.modal -->

