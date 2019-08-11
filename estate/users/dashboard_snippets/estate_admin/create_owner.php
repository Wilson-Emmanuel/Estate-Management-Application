
<form method="post">
    <input type="hidden" name="post" value="create_owner" >
    
    <table class="table table-active table-lg table-responsive-sm w-100">
        <thead class="estate_admin_color">
        <th colspan="3" class="text-center">
                <h2>New  Building Owner</h2>
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
                    <td><h6>Owner Name <i class="fa fa-user fa-fw estate_admin_text"></i></h6></td>
                    <td><input class="form-control" type='text' id="name" name="name"  value="<?= isset($_POST['name'])? $_POST['name']:""; ?>"></td>
                    
                   <td>
                        <span class="fa fa-info-circle info " data-toggle="popover"
                               title="Owner name" data-content="Name must not be above 50 characters"></span>
                    </td>
                </tr>
                <tr>
                    <td><h6>Owner Email</h6></td>
                    <td><input class="form-control" type='email' id="email" value="<?= isset($_POST['email'])? $_POST['email']:""; ?>" name="email" ></td>
                    
                   <td>
                       &nbsp;&nbsp;
                    </td>
                </tr>
                <tr>
                    <td><h6>Owner Phone <i class="fa fa-bank fa-fw estate_admin_text"></i></h6></td>
                    <td><input class="form-control" type='tel' id="phone" value="<?= isset($_POST['phone'])? $_POST['phone']:""; ?>" name="phone" ></td>
                    
                   <td>
                       &nbsp;&nbsp;
                    </td>
                </tr>
                
                
               
                
             
               
               
                
                 <tr>
                    <td ><button name="create_owner_btn" type="submit" class="btn btn-sm estate_admin_color ">
                            <i class="fa fa-plus-square fa-fw"></i> Add Owner
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





