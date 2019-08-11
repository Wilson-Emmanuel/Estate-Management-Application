    <table class="table table-active table-lg table-responsive-sm w-100">
   <thead class="bg-primary"> 
<tr>
                <th colspan="8"><h2 class="text-center">Levies</h2></th>
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
                <th>&nbsp;&nbsp;&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $levys = (new Levy())->fetch_all();
            
            foreach ($levys as $levy){
                echo '<tr>';
                echo '<td>'.$levy->get_purpose().' </td>';
                echo '<td>'.$levy->get_amount().' </td>';
                echo '<td>'.$levy->get_payment_date().' </td>';
                echo '<td>'.$levy->get_method().' </td>';
                echo '<td>'.$levy->get_slip_no().' </td>';
                if($levy->get_one_time()){
                    echo '<td>One Time</td>';
                }else{
                    if($levy->get_confirmed()){
                        echo '<td> <b>Start:</b> '.$levy->get_start().', <b>End: </b>'.$levy->get_end().' </td>';
                    }else{
                        echo '<td> <small><i>awaiting confirmation</i></small></td>';
                    }
                }
                if($levy->get_confirmed()){
                    echo '<td><i class="fa fa-check text-success"></i> ('.$levy->get_confirmed_date().') </td>';
                }else{
                    echo '<td><i class="fa fa-remove text-danger"></i> </td>';
                    
                }
                echo '<td><a href="dashboard.php?tab=levy_details&id='.$levy->get_id().'" title="Click to see full payment details."> <i class="fa fa-eye text-info"> </i> </a> </td>';
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

