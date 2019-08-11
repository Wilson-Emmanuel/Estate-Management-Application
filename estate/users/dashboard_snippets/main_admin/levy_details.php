<?php
    if(isset($_GET['id']) && is_numeric($_GET['id'])){
        $id = (int)trim($_GET['id']);
        
        $levy = (new Levy())->fetch_by_id($id);
        if(!$levy->get_id()){
            header("Location: dashboard.php");
        }
        $bank = (new Bank())->fetch_bank_by_id($levy->get_recipient_bank_id());
        $estate_admin = (new EstateAdmin())->fetch_estate_admin_by_estate_id($levy->get_estate());
    }
?>
<form method="post">
    <input type="hidden" name="post" value="main_levy_details" >
    
    <table class="table table-active table-lg table-responsive-sm w-100">
        <thead class="bg-primary">
        <th colspan="5" class="text-center">
                <h2>Levy Details</h2>
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
        <input type="hidden" name="levy_id" value="<?=$levy->get_id()?>">
                <tr>
                    <td colspan="2"><h6>Payer's Name </h6></td>
                    
                    <td colspan="3">
                        <?=$levy->get_payer_name()?>
                    </td>
                </tr>
                <tr>
                    <td colspan="2"><h6>Purpose </h6></td>
                    
                    <td colspan="3">
                        <?=$levy->get_purpose()?>
                    </td>
                </tr>
                <tr>
                    <td colspan="2"><h6>Amount </h6></td>
                    
                    <td colspan="3">
                        <?="&#8358;".  number_format($levy->get_amount(), 2)?>
                    </td>
                </tr>
                <tr>
                    <td colspan="2"><h6>Payment Date </h6></td>
                    
                    <td colspan="3">
                        <?=$levy->get_payment_date()?>
                    </td>
                </tr>
                 <tr>
                    <td colspan="2"><h6>Method </h6></td>
                    
                    <td colspan="3">
                        <?=$levy->get_method()?>
                    </td>
                </tr>
                 <tr>
                    <td colspan="2"><h6>Slip No. </h6></td>
                    
                    <td colspan="3">
                        <?=$levy->get_slip_no()?>
                    </td>
                </tr>
                 <tr>
                    <td colspan="2"><h6>Submitted Date </h6></td>
                    
                    <td colspan="3">
                        <?=$levy->get_date()?>
                    </td>
                </tr>
                 <tr>
                    <td colspan="2"><h6>Estate Admin Name </h6></td>
                    
                    <td colspan="3">
                        <?=$estate_admin->get_name()?>
                    </td>
                </tr>
                 <tr>
                    <td colspan="2"><h6>Estate Name </h6></td>
                    
                    <td colspan="3">
                        <?=$estate_admin->get_estate()->get_name()?>
                    </td>
                </tr>
                 <tr>
                    <td colspan="2"><h6>Estate Address </h6></td>
                    
                    <td colspan="3">
                        <?=$estate_admin->get_estate()->get_address()?>
                    </td>
                </tr>
                 <tr>
                    <td colspan="2"><h6>Validity Period </h6></td>
                    
                    <td colspan="3">
                        <?php
                         if($levy->get_one_time()){
                                echo 'One Time';
                            }else{
                                if($levy->get_confirmed()){
                                    echo '<b>Start:</b> '.$levy->get_start().', <b>End: </b>'.$levy->get_end();
                                }else{
                                    echo ' <small><i>awaiting confirmation</i></small>';
                                }
                            }
                        ?>
                    </td>
                </tr>
                 <tr>
                     <td colspan="5"><h5 class="text-center text-primary">Recipient Details </h5></td>
                    
                </tr>
                 <tr>
                    <td colspan="2"><h6>Account Name </h6></td>
                    
                    <td colspan="3">
                        <?=$bank->get_name()?>
                    </td>
                </tr>
                 <tr>
                    <td colspan="2"><h6>Account Number</h6></td>
                    
                    <td colspan="3">
                        <?=$bank->get_number()?>
                    </td>
                </tr>
                 <tr>
                    <td colspan="2"><h6>Bank Name </h6></td>
                    
                    <td colspan="3">
                        <?=$bank->get_bank()?>
                    </td>
                </tr>
                
                
             <?php
            //show confirmation part only when the payment has not been confirmed
          if($levy->get_confirmed()){
              echo ' <tr>
                    <td colspan="2"><h6>Confirmed </h6></td>
                    
                    <td colspan="3">
                        <i class="fa fa-check text-success"></i> ('.$levy->get_confirmed_date().')
                    </td>
                </tr>';
          }else{
          ?>
                <tr class="bg-primary">
                     <td colspan="5"><h5 class="text-center">Levy Confirmation </h5></td>
                    
                </tr>
                 <tr>
                     <td>&nbsp;</td>
                     <td colspan="3"><i class="fa fa-info-circle fa-fw text-danger"></i><em class="text-warning">Ensure your properly crosscheck before confirmation. Confirmed payments cannot be unconfirmed.</em></td>
                     <td>&nbsp;</td>
                </tr>
                 
         
                
                <tr>
                    <td><h6>Payment Type </h6></td>
                    <td colspan="3">
                        <select class="form-control" name="type" id="payment_details_type">
                            <option value="0">One time</option>
                            <option value="1">Recurrent</option>
                            
                        </select>
                    </td>
                   <td>
                        <span class="fa fa-info-circle info " data-toggle="popover"
                               title="Specify if the payment only needs to be done once or periodical" data-content=""></span>
                    </td>
                </tr>
                 <tr>
                     <td>&nbsp;</td>
                     <td colspan="3">If you selected recurrent above, please fill the start and end dates below.</td>
                     <td>&nbsp;</td>
                </tr>
                <tr  id="start_date">
                    <td><h6>Start Date <i class="fa fa-calendar"></i> </h6></td>
                    <td>
                        <select class="form-control" name="start_day" >
                            <option value="0">dd</option>
                            <?php
                            for($i=1; $i<=31; $i++){
                                echo '<option value="'.$i.'">'.$i.'</option>';
                            }
                            ?>
                        </select>
                    </td>
                    <td>
                        <select class="form-control" name="start_month" >
                            <option value="0">mm</option>
                            <?php
                            for($i=1; $i<=12; $i++){
                                echo '<option value="'.$i.'">'.$i.'</option>';
                            }
                            ?>
                        </select>
                    </td>
                    <td>
                        <select class="form-control" name="start_year" >
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
                <tr  id="end_date">
                    <td><h6>End Date <i class="fa fa-calendar fa-fw"></i></h6></td>
                    <td>
                        <select class="form-control" name="end_day" >
                            <option value="0">dd</option>
                            <?php
                            for($i=1; $i<=31; $i++){
                                echo '<option value="'.$i.'">'.$i.'</option>';
                            }
                            ?>
                        </select>
                    </td>
                    <td>
                        <select class="form-control" name="end_month" >
                            <option value="0">mm</option>
                            <?php
                            for($i=1; $i<=12; $i++){
                                echo '<option value="'.$i.'">'.$i.'</option>';
                            }
                            ?>
                        </select>
                    </td>
                    <td>
                        <select class="form-control" name="end_year" >
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
                     <td colspan="4"><button name="main_levy_details_btn" type="submit" class="btn btn-sm btn-primary ">
                            <i class="fa fa-save fa-fw"></i> Confirm Levy
                    </button>
                    </td>
                   
                    <td >
                        &nbsp;&nbsp;
                    </td>
                </tr>
                
                <?php
                         }
                ?>
    </table>
</form>





