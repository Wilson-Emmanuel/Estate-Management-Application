 <table class="table table-active table-lg table-responsive-sm w-100">
   <thead class="bg-primary"> 
<tr>
                <th colspan="8"><h2 class="text-center">Messsage Inbox</h2></th>
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
                <th></th>
                <th>Subject</th>
                <th>Body</th>
                <th>From</th>
                <th>Address</th>
               
                <th ></th>
                <th></th>
                <th>Date</th>
                
            </tr>
        </thead>
        <tbody>
            <?php
                
               $messages = (new Message())->fetch_messages_main();
                foreach ($messages as $message){
                   
                    echo '<tr>';
                    if($message->get_seen() ==0){
                        echo '<td title="Unread"><i class="fa fa-envelope text-warning"></i></td>';
                    }else{
                        echo '<td title="Read"><i class="fa fa-envelope-open text-warning"></i></td>';
                        
                    }
                    echo '<td>'.$message->get_subject().'</td>';
                    $short_body = "";
                    if(strlen($message->get_body()) > 20){
                        $short_body = substr($message->get_body(), 0, 20)." ...";
                    }else{
                        $short_body = $message->get_body();
                    }
                    echo '<td title="'.$message->get_body().'">'.$short_body.'</td>';
                    echo '<td>'.$message->get_sender_text($message->get_sender()).'</td>';
                    $short_address = "";
                    if(strlen($message->get_address()) >20){
                        $short_address = substr($message->get_address(), 0, 20).' ...';
                    }else{
                        $short_address = $message->get_address();
                    }
                    echo '<td title="'.$message->get_address().'">'.$short_address.'</td>';
                    
                    echo ' <td><a class="btn btn-sm btn-xs" title="Click to read the full message" href="dashboard.php?tab=message_read&id='.$message->get_id().'"   ><span class="fa fa-envelope text-warning"></span></a></td>';
                    echo ' <td><a class="btn btn-sm btn-xs" title="Reply" href="#"   ><span class="fa fa-reply text-success"></span></a></td>';
                    echo '<td>'.$message->get_date_text($message->get_date()).'</td>';

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

