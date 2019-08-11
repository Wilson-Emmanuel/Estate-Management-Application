
<form method="post">
    <input type="hidden" name="post" value="create_occupant" >
    
    <table class="table table-active table-lg table-responsive-sm w-100">
        <thead class="estate_admin_color">
        <th colspan="3" class="text-center">
                <h2>New  Occupant</h2>
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
                    <td><h6>Name <i class="fa fa-user fa-fw estate_admin_text"></i></h6></td>
                    <td><input class="form-control" type='text' id="name" name="name"  value="<?= isset($_POST['name'])? $_POST['name']:""; ?>"></td>
                    
                   <td>
                        <span class="fa fa-info-circle info " data-toggle="popover"
                               title="Occupant name" data-content="Name must not be above 50 characters"></span>
                    </td>
                </tr>
                <tr>
                    <td><h6>Email</h6></td>
                    <td><input class="form-control" type='email' id="email" value="<?= isset($_POST['email'])? $_POST['email']:""; ?>" name="email" ></td>
                    
                   <td>
                       &nbsp;&nbsp;
                    </td>
                </tr>
                <tr>
                    <td><h6>Phone <i class="fa fa-bank fa-fw estate_admin_text"></i></h6></td>
                    <td><input class="form-control" type='tel' id="phone" value="<?= isset($_POST['phone'])? $_POST['phone']:""; ?>" name="phone" ></td>
                    
                   <td>
                       &nbsp;&nbsp;
                    </td>
                </tr>
                
                             <tr>
                    <td><h6>Buildings <i class="fa fa-building fa-fw estate_admin_text"></i></h6></td>
                    <td>
                        <select name="building" id="occupant_buildings"  class="form-control" >
                             <option value="0">Select Building...</option>
                             <?php
                                $estate_id = (new EstateAdmin($_SESSION['id']))->get_estate()->get_id();
                                $buildings = (new Building())->fetch_buildings_by_estate_not_on_sale($estate_id);
                                 foreach ($buildings as $building){
                                   if(isset($_POST['building'])){
                                       $id = $_POST['building'];
                                       if($id == $building->get_id()){
                                           echo '<option selected value="'.$building->get_id().'">'.$building->get_name().' (Available flats : '.$building->get_available_flats().')</option>';
                                           continue;  
                                       }
                                   }
                                    echo '<option value="'.$building->get_id().'">'.$building->get_name().' (Available flats : '.$building->get_available_flats().')</option>';
                                    
                                }
                            ?>
                           
                        </select>
                        
                    </td>
                    
                   <td>
                       &nbsp;&nbsp;
                    </td>
                </tr>
                       <tr>
                    <td><h6>No. of Flats </h6></td>
                    <td>
                        <input type="number" name="flats" id="flats" value="<?= isset($_POST['flats'])? $_POST['flats']:""; ?>" placeholder="No of flats" class="form-control">
                        
                    </td>
                    
                   <td>
                       &nbsp;&nbsp;
                    </td>
                </tr>
                
                
                  
                 <tr>
                     <td><h6>Default Password <i class="fa fa-lock fa-fw estate_admin_text"></i></h6></td>
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
                    <td ><button name="create_occupant_btn" type="submit" class="btn btn-sm estate_admin_color ">
                            <i class="fa fa-plus-square fa-fw"></i> Register Occupant
                    </button>
                    </td>
                    <td>
                        &nbsp; &nbsp;
                    </td>
                    <td ><button  type="submit" title="clear all form data" name="reset" onclick="return confirm('Are you sure you want to clear this form?');" class="btn btn-light btn-sm">
                            <i class="fa fa-trash fa-fw"></i> Reset
                    </button>
                    </td>
                </tr>
    </table>
</form>





