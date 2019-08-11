
<form method="post">
    <input type="hidden" name="post" value="create_estate" >
    
    <table class="table table-active table-lg table-responsive-sm w-100">
        <thead class="bg-primary">
        <th colspan="3" class="text-center">
                <h2>New Estate</h2>
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
                    <td><input class="form-control" type='text' value="<?= isset($_POST['name'])? $_POST['name']:""; ?>" id="email" name="name" ></td>
                    
                   <td>
                        <span class="fa fa-info-circle info " data-toggle="popover"
                               title="Estate Name" data-content="Name must not be above 50 characters"></span>
                    </td>
                </tr>
                <tr>
                    <td><h6>Address <i class="fa fa-address-card fa-fw text-primary"></i></h6></td>
                    <td><input class="form-control" type='text' value="<?= isset($_POST['address'])? $_POST['address']:""; ?>" id="address" name="address" ></td>
                    
                   <td>
                       &nbsp;&nbsp;
                    </td>
                </tr>
                <tr>
                    <td><h6>Description</h6></td>
                    <td><input class="form-control" type='text' value="<?= isset($_POST['description'])? $_POST['description']:""; ?>" id="description" name="description" ></td>
                    
                   <td>
                       <span class="fa fa-info-circle info " data-toggle="popover"
                               title="Estate Description" data-content="In fews lines, describe the estate for the public"></span>
                    </td>
                </tr>
                
                <tr>
                    <td><h6>City <i class="fa fa-map-pin fa-fw "></i></h6></td>
                    <td><input class="form-control" type='text' id="city" value="<?= isset($_POST['city'])? $_POST['city']:""; ?>" name="city" ></td>
                    
                   <td>
                       &nbsp;&nbsp;
                    </td>
                </tr>
                <tr>
                    <td><h6>State</h6></td>
                    <td>
                        <select class="form-control" type='text' id="state" name="state" >
                            <?=
                              get_states();?>
                        </select>
                    </td>
                    
                   <td>
                       &nbsp;&nbsp;
                    </td>
                </tr>
                 <tr>
                    <td ><button name="create_estate_btn" type="submit" class="btn btn-primary center-block">
                            <i class="fa fa-plus fa-fw"></i> Create Estate
                    </button>
                    </td>
                     <td>
                        &nbsp; &nbsp;
                    </td>
                    <td ><button  type="submit" name="reset" title="clear all form data" onclick="return confirm('Are you sure you want to clear this form?');" class="btn btn-light btn-sm">
                            <i class="fa fa-trash fa-fw"></i> Reset
                    </button>
                    </td>
                </tr>
    </table>
</form>

