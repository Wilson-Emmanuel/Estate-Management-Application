<?php
if(isset($_POST['main_admin_update'])){
    $email = trim($_POST['email']);
$address = trim($_POST['address']);
$phone = trim($_POST['phone']);
$password = trim($_POST['password']);
$conf_password = trim($_POST['confpassword']);

$error = "";
$success = "";

if($password !== $conf_password){
    $error = "Password don't match.";
}

if(!is_email($email)){
    $error .= "\nWrong email address.";
}
if(!is_phone($phone)){
    $error .= "\nWrong phone number.";
}
if(!is_address($address)){
    $error .= "\nWrong contact address";
}
if(!is_password($password)){
    $error .= "\nWrong password.";
}

if(strlen($error) <1){
    $update = FALSE;
    
    $admin = new MainAdmin($_SESSION['id']);
    if($email !== $admin->get_email()){
        $update = TRUE;
        $admin->set_email($email);
    }
    if($phone !== $admin->get_phone()){
        $update = TRUE;
        $admin->set_phone($phone);
    }
    if($address !== $admin->get_address()){
        $update = TRUE;
        $admin->set_address($address);
    }
    if($password !== $admin->get_password()){
        $update = TRUE;
        $admin->set_password($password);
    }
    
    if($update){
        if($admin->update_by_id()){
        $success = "Details successfully updated.";
        }else{
            $error = "An error occured. Please try again.";
        }
    }
}
}

?>

