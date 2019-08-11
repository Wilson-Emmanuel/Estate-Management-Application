<?php
    if(isset($_GET['tab']) && $_GET['tab'] =='account'){
        include 'tenant/account.php';
    }
    elseif(isset($_GET['tab']) && $_GET['tab'] == 'new_payment'){

        include 'tenant/new_payment.php';;

    }elseif (isset($_GET['tab']) && $_GET['tab'] == 'payments') {

        include 'tenant/payments.php';
    }elseif (isset($_GET['tab']) && $_GET['tab'] == 'bank_details') {

     include 'tenant/bank_details.php ';
     
   }elseif (isset($_GET['tab']) && $_GET['tab'] == 'inbox') {

       include 'tenant/message_inbox.php';

   
   }elseif (isset($_GET['tab']) && $_GET['tab'] == 'sent') {

       include 'tenant/message_sent.php';

   
   }elseif (isset($_GET['tab']) && $_GET['tab'] == 'compose') {

       include 'tenant/message_compose.php';
   }elseif (isset($_GET['tab']) && $_GET['tab'] == 'message_read') {

       include 'tenant/message_read.php';

   
}else{
    $username ="Tenant Name";
        $wilson = <<<FMS
            <div class="container mb-5 p-4">
                <h4 class="text-center">
                Welcome, $username</h1>
                <p>Here is where to manage your details as an occupant in of our estates.
                With the tabs on the left-sidebar, you can view, edit and delete
                 your account without any difficulty.</p>
                <p>Also included are the ability to view and update your details, view messages and send messages/complaints
                    to the estate admins. You can also make payments directly to the estate admin - all at the
                comfort of your home or on the go.</p>
                
                <h5>We hope you love your dashboard</h5>
                <quote class="float-right mute muted">
                    <i class="fa fa-heart fa-4x text-green"></i><br>
                    <span>Your friends!</span><br>
                    Estate Manager</quote>
                <br><br><br>
            </div>
        
FMS;
        echo $wilson;
    }
    
?>

