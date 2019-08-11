<?php
    if(isset($_POST['post']) && $_POST['post'] !==''){
        $actual_operation = trim($_POST['post']);
        
        switch ($actual_operation){
        case 'account':
            include 'main_admin/account.php';
            break;
        case 'create_estate':
            include 'main_admin/create_estate.php';
            break;
        case 'create_admin':
            include 'main_admin/create_admin.php';
            break;
        case 'create_bank':
            include 'main_admin/create_bank.php';
            break;
        case 'main_compose':
            include 'main_admin/message_compose.php';
            break;
        case 'main_levy_details':
            include 'main_admin/confirm_levy.php';
            break;
        }
    }
?>

