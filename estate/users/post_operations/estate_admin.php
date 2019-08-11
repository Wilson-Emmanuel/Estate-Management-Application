<?php
    if(isset($_POST['post']) && $_POST['post'] !==''){
        $actual_operation = trim($_POST['post']);
        
        switch ($actual_operation){
        case 'account':
            include 'estate_admin/account.php';
            break;
        case 'create_bank':
            include 'estate_admin/create_bank.php';
            break;
        case 'create_building':
            include 'estate_admin/create_building.php';
            break;
        case 'create_owner':
            include 'estate_admin/create_owner.php';
            break;
        case 'create_occupant':
            include 'estate_admin/create_occupant.php';
            break;
        case 'estate_compose':
            include 'estate_admin/compose.php';
            break;
        case 'estate_new_levy':
            include 'estate_admin/new_levy.php';
            break;
        case 'estate_payment_details':
            include 'estate_admin/confirm_payment.php';
            break;
        case 'create_image':
        case 'manage_image':
            include 'estate_admin/create_image.php';
            break;
        }
    }
?>

