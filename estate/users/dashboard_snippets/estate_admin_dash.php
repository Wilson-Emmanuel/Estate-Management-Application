<?php

    if(isset($_GET['tab']) && $_GET['tab'] == 'account'){

        include 'estate_admin/account.php';

    }elseif (isset($_GET['tab']) && $_GET['tab'] == 'building') {

        include 'estate_admin/create_building.php';

   }elseif (isset($_GET['tab']) && $_GET['tab'] == 'tenant') {
        include 'estate_admin/create_occupant.php';

    }elseif (isset($_GET['tab']) && $_GET['tab'] == 'bank') {
          
        include 'estate_admin/create_bank.php';
         
        
    }elseif(isset ($_GET['tab']) && $_GET['tab'] == 'owner'){
        include 'estate_admin/create_owner.php';
    }elseif(isset ($_GET['tab']) && $_GET['tab'] == 'manage_owner'){
        include 'estate_admin/manage_owner.php';
    }
    elseif (isset($_GET['tab']) && $_GET['tab'] == 'manage_building') {

        include 'estate_admin/manage_building.php';

   }elseif (isset($_GET['tab']) && $_GET['tab'] == 'manage_tenant') {

       include 'estate_admin/manage_occupant.php';
    }elseif (isset($_GET['tab']) && $_GET['tab'] == 'manage_bank') {
          
        include 'estate_admin/manage_bank.php';
         
    }elseif (isset($_GET['tab']) && $_GET['tab'] == 'image_create') {
        
        include 'estate_admin/create_image.php';
        
    }elseif (isset ($_GET['tab']) && $_GET['tab'] == 'image_manage') {
        include 'estate_admin/manage_image.php';
    }
    elseif (isset($_GET['tab']) && $_GET['tab'] == 'inbox') {
        
        include 'estate_admin/message_inbox.php';
    }
    elseif (isset($_GET['tab']) && $_GET['tab'] == 'sent') {
        
        include 'estate_admin/message_sent.php';
    }
    elseif (isset($_GET['tab']) && $_GET['tab'] == 'compose') {
        
        include 'estate_admin/message_compose.php';
    }
    elseif (isset($_GET['tab']) && $_GET['tab'] == 'message_read') {
        
        include 'estate_admin/message_read.php';
    }
    elseif (isset($_GET['tab']) && $_GET['tab'] == 'bank_details') {
        
        include 'estate_admin/bank_details.php';
        
    }elseif (isset($_GET['tab']) && $_GET['tab'] == 'new_levy') {
        
        include 'estate_admin/new_levy.php';
    }elseif (isset($_GET['tab']) && $_GET['tab'] == 'levies') {
        
        include 'estate_admin/levies.php';
        
    }elseif (isset($_GET['tab']) && $_GET['tab'] == 'payment') {
        
        include 'estate_admin/payments.php';
    }elseif (isset($_GET['tab']) && $_GET['tab'] == 'payment_details') {
        
        include 'estate_admin/payment_details.php';

}else{
    $fullname ="Admin name";
        $wilson = <<<FMS
            <div class="container mb-5 p-4">
                <h4 class="text-center">
                Welcome, $fullname</h1>
                <p>We welcome you as one of the estate administrators of this system.
                Here is where to manage the details and information of your estate, buildings, flat, tenants and other
                 necessary payments.
                With the tabs on the left-sidebar, you can creaete, view, edit and delete
                 your account without any difficulty.</p>
                <p>You have been given the privilege of control over everything partaining to this Estate - all at the
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

