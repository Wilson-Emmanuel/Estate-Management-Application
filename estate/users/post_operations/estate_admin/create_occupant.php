<?php
if(isset($_POST['create_occupant_btn'])){
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $password = trim($_POST['password']);
    $confpassword = trim($_POST['confpassword']);
    $flat = (int)trim($_POST['flats']);
    $building_id = (int)trim($_POST['building']);
    
    $error = "";
    $success = "";
    
    if(!is_name($name)){
        $error = "Invalid name.";
    }
    if(!is_email($email)){
        $error .= "\n Invalid Email Address";
    }
    if(!$building_id){
        $error .= "\n You must select a building";
    }
    if(!is_phone($phone)){
        $error .= "\n Invalid phone number";
    }
    if($password !== $confpassword){
        $error .= "\n Password doesn't match.";
    }
    if(!is_password($password)){
        $error .= "\n Invalid Password. Passord much contain between 4 to 20 characters.";
    }
    if($flat <1){
        $error .= "\n No. of flats must be more than 0";
    }
    
    $building = new Building($building_id);
    if($flat >0){
        if($flat > $building->get_available_flats()){
            $error .= "No. of flats cannot be more than available flats in the selected building";
        }
    }
    
    //check if the same name and has existed in a building
    $row = DB::query("SELECT * FROM occupant WHERE name = %s AND building =%i",$name, $building_id);
    if(count($row) >0){
        $error .= "\n Occupant already registerred in this building";
    }
    
    
    if(strlen($error) <1){
        $occupant = new Occupant();
        $occupant->set_name($name);
        $occupant->set_email($email);
        $occupant->set_phone($phone);
        $occupant->set_flats($flat);
        
        $occupant->set_estate_id((new EstateAdmin($_SESSION['id']))->get_estate_id());
        $occupant->set_building_id($building_id);
        $occupant->set_password($password);
        if($occupant->insert()){
            $success = "Occupant successfully registered";
        }
    }
}
?>
