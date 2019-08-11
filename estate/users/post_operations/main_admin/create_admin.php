<?php
if(isset($_POST['create_estate_admin_btn'])){
    $name = trim($_POST['name']);
    $phone = trim($_POST['phone']);
    $email = trim($_POST['email']);
    $address = trim($_POST['address']);
    $estate_id = (int)$_POST['estate'];
    
    $password = trim($_POST['password']);
    $conf = trim($_POST['confpassword']);
    
    
    
    $error = "";
    $success = "";
    
    if(!is_email($email)){
        $error = "Wrong email address";
    }
    if(!is_name($name)){
        $error .= "\nWrong name.";
    }
    if(!is_phone($phone)){
        $error .= "\nWrong phone number";
    }
    if(!is_address($address)){
        $error .= "\nWrong contact address";
    }
    
    if($password !== $conf){
        $error .= "\nPassword does't match.";
    }
    if(!is_password($password)){
        $error .= "Password must be between 4 to 20 characters.";
    }
    if(in_db("estate_admin", "email", $email)){
        $error .= "\nUser already exists.";
    }
    if(in_db("estate_admin", "estate", $estate_id)){
        $error .= "\nAdmin already exists for this estate.";
    }
    
    if(strlen($error) <1){
        
        $new_ad = new EstateAdmin();
        $new_ad->set_name($name);
        $new_ad->set_phone($phone);
        $new_ad->set_email($email);
        $new_ad->set_address($address);
        $new_ad->set_estate_id($estate_id);
        $new_ad->set_password($password);
        $new_ad->set_date(date("Y-m-d H:i:s"));
        if($new_ad->insert()){
            $success = "Estate admin has been successfully registerred.";
        }else{
            $error = "Unknown error. Pleae try again.";
        }
    }
}
?>

