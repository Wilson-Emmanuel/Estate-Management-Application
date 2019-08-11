<?php
if(isset($_POST['tenant_update'])){
    $email = trim($_POST['email']);
$phone = trim($_POST['phone']);
$password = trim($_POST['password']);
$conf_password = trim($_POST['confpassword']);

$error = "";

if($password !== $conf_password){
    $error = "Password don't match.";
}

if(!is_email($email)){
    $error .= "\nWrong email address.";
}
if(!is_phone($phone)){
    $error .= "\nWrong phone number.";
}
if(!is_password($password)){
    $error .= "\nWrong password.";
}

if(strlen($error) <1){
    
    
    
       $occupant = new Occupant($_SESSION['id']);
    if($occupant->get_email() !== $email || $occupant->get_phone() !== $phone || $occupant->get_password() !== $password ){
        $occupant->set_email($email);
        $occupant->set_phone($phone);
        $occupant->set_password($password);
        
        if($occupant->update_by_id()){
        $success = "Details successfully updated.";
        }else{
            $error = "An error occured. Please try again.";
        }
    }else{
        //$error = "Dont't do anything if nothingn is changed and the update details button is clicked";
        
    }
}
}

?>

