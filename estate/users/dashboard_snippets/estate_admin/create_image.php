
<form method="post" enctype="multipart/form-data">
    <input type="hidden" name="post" value="create_image" >
    
    <table class="table table-active table-lg table-responsive-sm w-100">
        <thead class="estate_admin_color">
        <th colspan="3" class="text-center">
                <h2>Upload New Images</h2>
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
                    <td><h6>Image Category </h6></td>
                    <td>
                        <select class="form-control" type='text' id="image-category" name="type"  >
                            <option value="0">Estate</option>
                            <option value="1">Building</option>
                        </select>
                              
                    </td>
                    
                   <td>
                        <span class="fa fa-info-circle info " data-toggle="popover"
                               title="Select gategory the image is representing. e.g Esate or Building" data-content=""></span>
                    </td>
                </tr>
                <tr>
                    <td><h6 id="image-building-text">Buildings</h6></td>
                    <td>
                        <select class="form-control" type='text' id="image-buildings" name="buildings"  >
                            <?php
                                $estate_admin = (new EstateAdmin($_SESSION['id']));
                                $buildings = (new Building())->fetch_buildings_by_estate($estate_admin->get_estate_id());
                                foreach($buildings as $building){
                                    echo '<option value="'.$building->get_id().'">'.$building->get_name().' | (Location:'.$building->get_location().') </option>';
                                }
                            ?>
                        </select>
                              
                    </td>
                    
                    <td>&nbsp; </td>
                      
                </tr>
                <tr>
                    <td colspan="5">
                        <h6 class="text-center"> <i class="fa fa-info-circle danger "></i> <i class="text-brown"> Select one image file. File must not be above 5MB. </i></h6>
                    </td>
                </tr>
                <tr>
                    <td><h6>Image File</h6></td>
                    <td>
                        <input type="file" required class="form-control" name="image_file"  id="description"> </td>
                    
                   <td>
                         <span class="fa fa-info-circle info " data-toggle="popover"
                               title="Select one image file." data-content=""></span>
                    </td>
                </tr>
                <tr>
                    <td><h6>Description</h6></td>
                    <td><input class="form-control" type='text' id="description" value="<?= isset($_POST['description'])? $_POST['description']:""; ?>" name="description" ></td>
                    
                   <td>
                         <span class="fa fa-info-circle info " data-toggle="popover"
                               title="This description will be available to the public." data-content=""></span>
                    </td>
                </tr>
               
                
                
               
                
             
               
               
                
                 <tr>
                    <td ><button name="create_image_btn" type="submit" class="btn btn-sm estate_admin_color ">
                            <i class="fa fa-image fa-fw"></i> Add Image
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





