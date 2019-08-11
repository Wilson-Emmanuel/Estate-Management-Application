<?php

    if(isset($_GET['tab']) && $_GET['tab'] == 'account'){

        include 'main_admin/account.php';

    }elseif(isset($_GET['tab']) && $_GET['tab'] =='admin'){
        include 'main_admin/create_admin.php';
    
    }elseif (isset($_GET['tab']) && $_GET['tab'] == 'estate') {

        include 'main_admin/create_estate.php';

   }elseif (isset($_GET['tab']) && $_GET['tab'] == 'bank') {

       include 'main_admin/create_bank.php';
    }elseif(isset ($_GET['tab']) && $_GET['tab'] =='manage_admin'){
    
        include 'main_admin/manage_admin.php';
    }elseif (isset($_GET['tab']) && $_GET['tab'] == 'manage_estate') {

        include 'main_admin/manage_estate.php';

   }elseif (isset($_GET['tab']) && $_GET['tab'] == 'manage_bank') {

       include 'main_admin/manage_bank.php';

    }elseif (isset($_GET['tab']) && $_GET['tab'] == 'inbox') {
        
        include 'main_admin/message_inbox.php';
        
    }elseif (isset($_GET['tab']) && $_GET['tab'] == 'sent') {
        
        include 'main_admin/message_sent.php';
        
    }elseif (isset($_GET['tab']) && $_GET['tab'] == 'compose') {
        
        include 'main_admin/message_compose.php';
        
    }elseif (isset($_GET['tab']) && $_GET['tab'] == 'message_read') {
        
        include 'main_admin/message_read.php';
        
}elseif (isset($_GET['tab']) && $_GET['tab'] == 'levy') {

    include 'main_admin/levies.php';
}elseif (isset($_GET['tab']) && $_GET['tab'] == 'levy_details') {

    include 'main_admin/levy_details.php';
         
}else{
    $fullname ="Admin name";
        $wilson = <<<FMS
            <div class="container mb-5 p-4">
                <h4 class="text-center">
                Welcome, $fullname</h1>
                <p>Here is where to manage your details as the main admin of this system.
                With the tabs on the left-sidebar, you can view, edit and delete
                 your account without any difficulty.</p>
                
                <p>You can view your estates and their admin and other necessary pieces of information that
                aids levy collection and ensures standards at the different estates.
                </p>
                <h5>We hope you love your dashboard</h5>
                <quote class="float-right mute muted">
                    <i class="fa fa-heart fa-4x text-green"></i><br>
                    <span>Your friends!</span><br>
                    Esate Manager</quote>
                <br><br><br>
            </div>
        
FMS;
        echo $wilson;
    }
    
?>

