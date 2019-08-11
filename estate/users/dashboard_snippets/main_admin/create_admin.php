
<form method="post">
    <input type="hidden" name="post" value="create_admin" >
    
    <table class="table table-active table-lg table-responsive-sm w-100">
        <thead class="bg-primary">
        <th colspan="3" class="text-center">
                <h2>New Estate Admin</h2>
            </th>
        </thead>
        
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
        
                <tr>
                    <td><h6>Name <i class="fa fa-user fa-fw text-primary"></i></h6></td>
                    <td><input class="form-control" type='text' id="email" name="name"  value="<?= isset($_POST['name'])? $_POST['name']:""; ?>"></td>
                    
                   <td>
                        <span class="fa fa-info-circle info " data-toggle="popover"
                               title="Estate admin Name" data-content="Name must not be above 50 characters"></span>
                    </td>
                </tr>
                <tr>
                    <td><h6>Phone <i class="fa fa-phone fa-fw text-primary"></i></h6></td>
                    <td><input class="form-control" type='tel' id="phone" value="<?= isset($_POST['phone'])? $_POST['phone']:""; ?>" name="phone" ></td>
                    
                   <td>
                       &nbsp;&nbsp;
                    </td>
                </tr>
                <tr>
                    <td><h6>Email Address <i class="fa fa-envelope-open fa-fw text-yellow"></i></h6></td>
                    <td><input class="form-control" type='email' id="email" value="<?= isset($_POST['email'])? $_POST['email']:""; ?>" name="email" ></td>
                    
                   <td>
                       &nbsp;&nbsp;
                    </td>
                </tr>
                
                
                <tr>
                    <td><h6>Address <i class="fa fa-map-marker fa-fw text-info"></i></h6></td>
                    <td><input class="form-control" type='text' value="<?= isset($_POST['address'])? $_POST['address']:""; ?>" id="address" name="address" ></td>
                    
                   <td>
                       &nbsp;&nbsp;
                    </td>
                </tr>
                
                
             
                 <tr>
                     <td><h6>Estate <i class="fa fa-building fa-fw text-primary"></i></h6></td>
                    <td>
                        <select class="form-control" type='text' id="estate" name="estate" >
                            <?php
                            
                                $estates = (new Estate())->fetch_all_estates();
                                foreach ($estates as $est){
                                   if(isset($_POST['estate'])){
                                       $id = $_POST['estate'];
                                       if($id == $est->get_id()){
                                           echo '<option selected value="'.$est->get_id().'">'.$est->get_name().' in '.$est->get_address().', '.$est->get_city().', '.$est->get_state().'</option>';
                                       
                                           continue;  
                                       }
                                   }
                                   echo '<option value="'.$est->get_id().'">'.$est->get_name().' in '.$est->get_address().', '.$est->get_city().', '.$est->get_state().'</option>';
                                    
                                }
                            ?>
                        </select>
                       
                    </td>
                    
                   <td>
                       &nbsp;&nbsp;
                    </td>
                </tr>
                      <tr>
                   <td><h6>Default Password</h6></td>
                   <td>
                       <input type="password" name="password" value="<?= isset($_POST['password'])? $_POST['password']:""; ?>" class="form-control" id="password" placeholder="****">
                    <p class="text-red error-line1"></p>
                    </td>
                    <td>
<!--                        <button class="btn btn-default" disabled>Disabled</button>-->
&nbsp;                      &nbsp;
                    </td>
                </tr>
                <tr>
                   <td><h6>Confirm Password</h6></td>
                   <td>
                       <input type="password" name="confpassword"  class="form-control" value="<?= isset($_POST['confpassword'])? $_POST['confpassword']:""; ?>" id="conf-pass" placeholder="Retype Password">
                    <p class="text-red error-line2"></p>
                    </td>
                    <td>
<!--                        <button class="btn btn-default" disabled>Disabled</button>-->
&nbsp;&nbsp;
                    </td>
                </tr>
                
                 <tr>
                    <td ><button name="create_estate_admin_btn" type="submit" class="btn btn-sm btn-primary ">
                            <i class="fa fa-plus fa-fw"></i> Create Estate Admin
                    </button>
                    </td>
                    <td>
                        &nbsp; &nbsp;
                    </td>
                    <td ><button  title="clear form data" type="submit" name="reset" onclick="return confirm('Are you sure you want to clear this form?');" class="btn btn-light btn-sm">
                            <i class="fa fa-trash fa-fw"></i> Reset
                    </button>
                    </td>
                </tr>
    </table>
</form>



