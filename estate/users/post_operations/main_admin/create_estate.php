<?php
if(isset($_POST['create_estate_btn'])){
    $name = trim($_POST['name']);
    $address = trim($_POST['address']);
    $description = trim($_POST['description']);
    $city = trim($_POST['city']);
    $state = trim($_POST['state']);
    
    $error = "";
    $success = "";
    if(!is_name($name)){
        $error = "Wrong name entered.";
        
    }
    if(strlen($city) <2){
        $error .= "\nWrong city entered.";
    }
    if($state ==="none"){
        $error .= "\nSelect state.";
    }
    if(strlen($address) <2){
        $error .= "\nInvaid address.";
    }
    $est = new Estate();
    $est->set_name($name);
    $est->set_address($address);
    if(strlen($description)==0){
        $description ="none";
    }
    $est->set_description($description);
    $est->set_city($city);
    $est->set_state($state);
    $est->set_date(date("Y-m-d H:i:s"));
    
    if($est->insert()){
        $success = "Estate has been enterred.";
    }
    
}
?>

