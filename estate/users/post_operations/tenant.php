<?php
    if(isset($_POST['post']) && $_POST['post'] !==''){
        $actual_operation = trim($_POST['post']);
        
        switch ($actual_operation){
        case 'account':
            include 'tenant/account.php';
            break;
        case 'tenant_compose':
            include 'tenant/compose.php';
            break;
        case 'tenant_new_payment':
            include 'tenant/new_payment.php';
            break;
        }
    }
?>

