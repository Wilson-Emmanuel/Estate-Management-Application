    <table class="table table-active table-lg table-responsive-sm w-100">
   <thead class="tenant_color"> 
<tr>
                <th colspan="8"><h2 class="text-center">Payments</h2></th>
  </tr>
   </thead>
    </table>
<table id="example" class="display" style="width:100%">
        <thead>
           
            <tr>
                <th>Purpose</th>
                <th>Amount</th>
                <th>Payment Date</th>
                <th>Method</th>
                <th>Slip No</th>
                <th>Duration</th>
                <th>Confirmed</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $payments = (new Payment())->fetch_all_occupant_payment($_SESSION['id']);
            
            foreach ($payments as $payment){
                echo '<tr>';
                echo '<td>'.$payment->get_purpose().' </td>';
                echo '<td>'.$payment->get_amount().' </td>';
                echo '<td>'.$payment->get_payment_date().' </td>';
                echo '<td>'.$payment->get_method().' </td>';
                echo '<td>'.$payment->get_slip_no().' </td>';
                if($payment->get_one_time()){
                    echo '<td>One Time</td>';
                }else{
                    if($payment->get_confirmed()){
                        echo '<td> <b>Start:</b> '.$payment->get_start().', <b>End: </b>'.$payment->get_end().' </td>';
                    }else{
                        echo '<td> <small><i>awaiting confirmation</i></small></td>';
                    }
                }
                if($payment->get_confirmed()){
                    echo '<td><i class="fa fa-check text-success"></i> ('.$payment->get_confirmed_date().') </td>';
                }else{
                    echo '<td><i class="fa fa-remove text-danger"></i> </td>';
                    
                }
                echo '</tr>';
            }
            ?>
            
            
           
                
        </tbody>
<!--        <tfoot>
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Age</th>
                <th>Start date</th>
                <th>Salary</th>
            </tr>
        </tfoot>-->
    </table>

