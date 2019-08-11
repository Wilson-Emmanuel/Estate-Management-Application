
<form method="post">
    <input type="hidden" name="post" value="create_building" >
    
    <table class="table table-active table-lg table-responsive-sm w-100">
        <thead class="estate_admin_color">
        <th colspan="3" class="text-center">
                <h2>New Building</h2>
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
                    <td><h6>Building Name <i class="fa fa-building fa-fw estate_admin_text"></i></h6></td>
                    <td><input class="form-control" type='text' id="name" name="name"  value="<?= isset($_POST['name'])? $_POST['name']:""; ?>"></td>
                    
                   <td>
                        <span class="fa fa-info-circle info " data-toggle="popover"
                               title="Building name" data-content="Name must not be above 50 characters"></span>
                    </td>
                </tr>
                <tr>
                    <td><h6>Location <i class="fa fa-map-marker fa-fw estate_admin_text"></i></h6></td>
                    <td>
                        <div class="form-group">
                            <input class="form-control" type='text' id="location" value="<?= isset($_POST['location'])? $_POST['location']:""; ?>" name="location" >
                            <small class=" text-info">Describe the (street) location of the building in the estate.</small>
                        </div>
                    </td>
                    
                   <td>
                       &nbsp;&nbsp;
                    </td>
                </tr>
                <tr>
                    <td><h6>Description 
<!--                            <i class="fa fa-bank fa-fw estate_admin_text"></i>-->
                        </h6></td>
                        <td><input type="text" class="form-control"  id="description"  name="description" 
                    value="<?= isset($_POST['description'])? $_POST['description']:""; ?>"></td>
                    
                   <td>
                       &nbsp;&nbsp;
                    </td>
                </tr>
                
                <tr>
                    <td><h6>Building Owner  </h6></td>
                    <td>
                        <select name="owner"   class="form-control" >
                             <option value="0">Select owner...</option>
                             <?php
                                $estate_id = (new EstateAdmin($_SESSION['id']))->get_estate()->get_id();
                                $owners = (new BuildingOwner())->fetch_all_owners_by_estate_id($estate_id);
                                 foreach ($owners as $owner){
                                   if(isset($_POST['owner'])){
                                       $id = $_POST['owner'];
                                       if($id == $owner->get_id()){
                                           echo '<option selected value="'.$owner->get_id().'">'.$owner->get_name().'</option>';
                                           continue;  
                                       }
                                   }
                                    echo '<option value="'.$owner->get_id().'">'.$owner->get_name().'</option>';
                                    
                                }
                            ?>
                           
                        </select>
                        
                    </td>
                    
                   <td>
                       &nbsp;&nbsp;
                    </td>
                </tr>
                 <tr>
                    <td><h6>For Sale <i class="fa fa-money fa-fw estate_admin_text"></i>
<!--                            <i class="fa fa-bank fa-fw estate_admin_text"></i>-->
                        </h6></td>
                    <td>
                        <select class="form-control"  id="for_sale"  name="for_sale" >
                            <?php
                            $ans = 0;
                            if(isset($_POST['for_sale'])){
                                $ans = (int)$_POST['for_sale'];
                            }
                            ?>
                            <option <?= (!$ans)? "selected":""; ?> value="0">No</option>
                            <option <?= ($ans)? "selected":""; ?>  value="1">Yes</option>
                        </select>
                        <div class="form-group" id="sale-amount-div">
                            <div class="input-group">
                                <input type="number" value="<?= isset($_POST['sale_amount'])? $_POST['sale_amount']:""; ?>" name="sale_amount" placeholder="Sale Amount in Nigeria Naira" id="sale_amount" class="form-control">
                            </div>
                        </div>
                    </td>
                    
                   <td>
                       &nbsp;&nbsp;
                    </td>
                </tr>
                
                <tr>
                    <td><h6>Flat Count <i class="fa fa-calculator fa-fw estate_admin_text"></i></h6></td>
                    <td>
                        <div class="form-group">
                            <input class="form-control" type='number' id="flat_count" value="<?= isset($_POST['flat_count'])? $_POST['flat_count']:""; ?>" name="flat_count" >
                        </div>
                    </td>
                    
                   <td>
                       &nbsp;&nbsp;
                    </td>
                </tr>
                <tr>
                    <td><h6>Flat Description </h6></td>
                    <td>
                        <div class="form-group">
                            <input class="form-control" type='text' id="flat_description" value="<?= isset($_POST['flat_description'])? $_POST['flat_description']:""; ?>" name="flat_description" >
                            <small class=" text-info">Describe the capacity/features of the flats.</small>
                        </div>
                    </td>
                    
                   <td>
                       &nbsp;&nbsp;
                    </td>
                </tr>
                <tr>
                    <td><h6>Flat Rent <i class="fa fa-money fa-fw estate_admin_text"></i></h6></td>
                    <td>
                        <div class="form-group">
                            <input class="form-control" type='number' id="flat_rent" value="<?= isset($_POST['flat_rent'])? $_POST['flat_rent']:""; ?>" name="flat_rent" >
                        </div>
                    </td>
                    
                   <td>
                       &nbsp;&nbsp;
                    </td>
                </tr>
               
                
             
               
               
                
                 <tr>
                    <td ><button name="create_building_btn" type="submit" class="btn btn-sm estate_admin_color ">
                            <i class="fa fa-plus-square fa-fw"></i> Add Building
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





