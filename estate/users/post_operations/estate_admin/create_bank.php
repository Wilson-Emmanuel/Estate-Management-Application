<?php
if(isset($_POST['create_bank_btn'])){
    $name = trim($_POST['name']);
    $number = trim($_POST['number']);
    $bank1 = trim($_POST['bank']);
    
    $error = "";
    $success = "";
    
    if(!is_name($name)){
        $error = "Wrong name";
    }
    if(strlen($number) != 10){
        $error .= "\nInvalid Account number.";
    }
    if(strlen($bank1) <2){
        $error .= "\nWrong bank name";
    }
    if(bank_in_db(EstateAdmin::TYPE, $number)){
        $error .= "\nBank details already exists for this user";
    }
    
    if(strlen($error) <1){
        $bank = new Bank();
        $bank->set_owner(EstateAdmin::TYPE);
        $bank->set_owner_id($_SESSION['id']);
        $bank->set_name($name);
        $bank->set_bank($bank1);
        $bank->set_number($number);
        if($bank->insert()){
            $success = "Bank details successfully added.";
        }else{
            $error = "Unknown error has occurred. Please try again.";
        }
        
    }
}
?>

