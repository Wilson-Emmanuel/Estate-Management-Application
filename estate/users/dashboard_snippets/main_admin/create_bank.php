
<form method="post">
    <input type="hidden" name="post" value="create_bank" >
    
    <table class="table table-active table-lg table-responsive-sm w-100">
        <thead class="bg-primary">
        <th colspan="3" class="text-center">
                <h2>New Bank Details</h2>
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
                    <td><h6>Account Name <i class="fa fa-user fa-fw text-primary"></i></h6></td>
                    <td><input class="form-control" type='text' id="name" name="name"  value="<?= isset($_POST['name'])? $_POST['name']:""; ?>"></td>
                    
                   <td>
                        <span class="fa fa-info-circle info " data-toggle="popover"
                               title="Account name" data-content="Name must not be above 50 characters"></span>
                    </td>
                </tr>
                <tr>
                    <td><h6>Account Number</h6></td>
                    <td><input class="form-control" type='text' id="number" value="<?= isset($_POST['number'])? $_POST['number']:""; ?>" name="number" ></td>
                    
                   <td>
                       &nbsp;&nbsp;
                    </td>
                </tr>
                <tr>
                    <td><h6>Bank Name <i class="fa fa-bank fa-fw text-primary"></i></h6></td>
                    <td><input class="form-control" type='text' id="bank" value="<?= isset($_POST['bank'])? $_POST['bank']:""; ?>" name="bank" ></td>
                    
                   <td>
                       &nbsp;&nbsp;
                    </td>
                </tr>
                
                
               
                
             
               
               
                
                 <tr>
                    <td ><button name="create_bank_btn" type="submit" class="btn btn-sm btn-primary ">
                            <i class="fa fa-plus-square fa-fw"></i> Add Bank
                    </button>
                    </td>
                    <td>
                        &nbsp; &nbsp;
                    </td>
                    <td ><button  type="submit" name="reset"  title="clear all form data" onclick="return confirm('Are you sure you want to clear this form?');" class="btn btn-light btn-sm">
                            <i class="fa fa-trash fa-fw"></i> Reset
                    </button>
                    </td>
                </tr>
    </table>
</form>





