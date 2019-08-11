 <table class="table table-active table-lg table-responsive-sm w-100">
   <thead class="bg-primary"> 
<tr>
                <th colspan="8"><h2 class="text-center">Sent Messsages</h2></th>
  </tr>
   </thead>
   <tbody style="background-color:white;">
       <tr>
           <td colspan="3">
               <div class="pull-right">
                   <a  role="button" href="dashboard.php?tab=compose" title="Compose New Message"    class="btn btn-sm btn-warning">
                              <i class="fa fa-plus-circle"></i> Compose
                </a>
            </div>
           </td>
       </tr>
   </tbody>
    </table>
<table id="example" class="display" style="width:100%">
        <thead>
           
            <tr>
                <th>Subject</th>
                <th>Recipient</th>
                <th>Body</th>
               
               
                <th>Date</th>
                
            </tr>
        </thead>
        <tbody>
            <?php
                
               $messages = (new Message())->fetch_messages_sent(MainAdmin::TYPE,$_SESSION['id']);
                foreach ($messages as $message){
                    echo '<tr>';
                    echo '<td>'.$message->get_subject().'</td>';
                    echo '<td>'.$message->get_recipient_info().'</td>';
                   
                    echo '<td>'.$message->get_body().'</td>';
                   
                    echo '<td>'.$message->get_date_text($message->get_date()).' '.$message->get_time_text($message->get_date()).'</td>';

                   //echo ' <td><p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" onclick="occupant_delete(this);" data-id="'.$occupant->get_id().'" data-toggle="modal" data-target="#delete" ><span class="fa fa-trash"></span></button></p></td>';

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

