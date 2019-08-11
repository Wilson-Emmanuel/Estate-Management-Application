 <?php
 $id =0;
        if(!(isset($_GET['message_read']) && isset($_GET['id']))){
            
        $id = (int)$_GET['id'];
        }
       
        $message = new Message($id);
        $message->set_seen(1);
        $message->update_by_id();
        
        ?>
<!--   // $staff = <<<STAFF-->
          <table class="table table-active table-lg table-responsive-sm w-100">
            <thead class="estate_admin_color"> 
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
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="form-horizontal">
                <div class="form-group">
                    <label style="font-weight: bold;">Subject</label>
                    <div>
                        <span><?=$message->get_subject(); ?></span>
                    </div>
                </div>
                <div class="form-group">
                    <label style="font-weight: bold;">Sender</label>
                    <div>
                        <span ><?=$message->get_sender_text($message->get_sender()); ?></span>
                    </div>
                </div>
                 <div class="form-group">
                    <label style="font-weight: bold;">Address</label>
                    <div>
                        <span ><?=$message->get_address(); ?></span>
                    </div>
                </div>
<!--                <div class="form-group">
                    <label style="font-weight: bold;">Address</label>
                    <div>
                        <span > </span>
                    </div>
                </div>-->
                <div class="form-group">
                    <label style="font-weight: bold;">Date</label>
                    <div>
                        <span ><?=$message->get_date_text($message->get_date()).' '.$message->get_time_text($message->get_date()); ?></span>
                    </div>
                </div>
                <div class="form-group">
                    <label style="font-weight: bold;">Body</label>
                    <div>
                        <p>
                            <?=$message->get_body(); ?>
                            
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>