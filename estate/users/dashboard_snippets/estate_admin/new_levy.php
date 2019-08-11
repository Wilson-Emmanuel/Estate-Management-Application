
<form method="post">
    <input type="hidden" name="post" value="estate_new_levy" >
    
    <table class="table table-active table-lg table-responsive-sm w-100">
        <thead class="estate_admin_color">
        <th colspan="5" class="text-center">
                <h2>New Levy</h2>
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
                    <td><h6>Payer's Name </h6></td>
                    <td colspan="3"><input class="form-control" type='text' id="payer" name="payer"  value="<?= isset($_POST['payer'])? $_POST['payer']:""; ?>"></td>
                    
                   <td>
                        <span class="fa fa-info-circle info " data-toggle="popover"
                               title="Name of the person who made the payment" data-content=""></span>
                    </td>
                </tr>
                <tr>
                    <td><h6>Purpose </h6></td>
                    <td colspan="3"><input class="form-control" type='text' id="purpose" name="purpose"  value="<?= isset($_POST['purpose'])? $_POST['purpose']:""; ?>"></td>
                    
                   <td>
                        <span class="fa fa-info-circle info " data-toggle="popover"
                               title="Purpose of the payment" data-content="E.g House Rent"></span>
                    </td>
                </tr>
                <tr>
                    <td><h6>Amount (&#8358;) </h6></td>
                    <td colspan="3"><input class="form-control" type='number' id="amount" name="amount"  value="<?= isset($_POST['amount'])? $_POST['amount']:""; ?>"></td>
                    
                   <td>
                       &nbsp;
                    </td>
                </tr>
                <tr>
                    <td><h6>Payment Date </h6></td>
                    <td>
                        <select class="form-control" name="pay_day" >
                            <option value="0">dd</option>
                            <?php
                            for($i=1; $i<=31; $i++){
                                echo '<option value="'.$i.'">'.$i.'</option>';
                            }
                            ?>
                        </select>
                    </td>
                    <td>
                        <select class="form-control" name="pay_month" >
                            <option value="0">mm</option>
                            <?php
                            for($i=1; $i<=12; $i++){
                                echo '<option value="'.$i.'">'.$i.'</option>';
                            }
                            ?>
                        </select>
                    </td>
                    <td>
                        <select class="form-control" name="pay_year" >
                            <option value="0">yyyy</option>
                            <?php
                            for($i=(int)date("Y"); $i<=((int)date("Y"))+10; $i++){
                                echo '<option value="'.$i.'">'.$i.'</option>';
                            }
                            ?>
                        </select>
                    </td>
                   <td>
                       &nbsp;
                    </td>
                </tr>
                 <tr>
                    <td><h6>Method </h6></td>
                    <td colspan="3"><input class="form-control" type='text' id="method" name="method"  value="<?= isset($_POST['method'])? $_POST['method']:""; ?>"></td>
                    
                   <td>
                        <span class="fa fa-info-circle info " data-toggle="popover"
                               title="Method of payment. e.g Bank Deposit, Online Transfer, ATM Transfer, etc." data-content="E.g Bank Deposit, Transfer, etc"></span>
                    </td>
                </tr>
                 <tr>
                    <td><h6>Slip No </h6></td>
                    <td colspan="3"><input class="form-control" type='text' id="slip_no" name="slip_no"  value="<?= isset($_POST['slip_no'])? $_POST['slip_no']:""; ?>"></td>
                    
                   <td>
                        <span class="fa fa-info-circle info " data-toggle="popover"
                               title="Only if the payment has a slip no. e.g. Bank Deposit" data-content=""></span>
                    </td>
                </tr>
                <tr>
                    <td><h6>Bank Used </h6></td>
                    <td colspan="3">
                        <select class="form-control" name="bank" id="bank">
                            <option value="0">Select one</option>
                            <?php
                                
                               $banks = (new Bank())->fetch_main_admin_banks();
                               foreach ($banks as $bank){
                                   echo '<option value="'.$bank->get_id().'"> '.$bank->get_name().' | '.$bank->get_number().' | '.$bank->get_bank().' </option>';
                               }
                            ?>
                        </select>
                    </td>
                   <td>
                        <span class="fa fa-info-circle info " data-toggle="popover"
                               title="Select the bank you used to do the transaction" data-content=""></span>
                    </td>
                </tr>
                
                
                
               
                
             
               
               
                
                 <tr>
                     <td colspan="4"><button name="estate_new_levy_btn" type="submit" class="btn btn-sm estate_admin_color ">
                            <i class="fa fa-plus-square fa-fw"></i> Submit Levy
                    </button>
                    </td>
                   
                    <td ><button  type="submit" title="clear all form data" name="reset" onclick="return confirm('Are you sure you want to clear this form?');" class="btn btn-light btn-sm">
                            <i class="fa fa-trash fa-fw"></i> Reset
                    </button>
                    </td>
                </tr>
    </table>
</form>





