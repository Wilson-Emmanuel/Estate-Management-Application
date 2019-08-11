<?php
include '../../../private/includes.php';

///////////////////////////////////////////////////////////////////////////////////
//Estate Admin Bank management
if(isset($_POST['action']) && $_POST['action'] == "bank_edit"){
    $id = (int)  trim($_POST['id']);
    $name = trim($_POST['name']);
    $number = trim($_POST['number']);
    $bank = trim($_POST['bank']);
    
    $error = "";
     if(!is_name($name)){
        $error = "Wrong name";
    }
    if(strlen($number) != 10){
        $error .= "\nInvalid Account number.";
    }
    if(strlen($bank) <2){
        $error .= "\nWrong bank name";
    }
   //checking whether it is using another person bank details for this update
    $row = DB::queryFirstRow("SELECT * FROM bank WHERE id != %i AND number =%s",$id,$number);
    if(count($row) >0){
        $error .= "\nBank details already exist for another user.";
    }
    
  if(strlen($error) <1){
       $bnk = new Bank($id);
       $bnk->set_name($name);
       $bnk->set_number($number);
       $bnk->set_bank($bank);
    
    if($bnk->update_by_id()){
        echo "<tr><td colspan='3'><div class='alert alert-success alert-dismissible'>Bank successfully updated.<span class='close' data-dismiss='alert'>"
                    . "&times;</span></div></td></tr>";
    }else{
        echo "<tr><td colspan='3'><div class='alert alert-danger alert-dismissible'>An unkwown error has occured.
                    <span class='close' data-dismiss='alert'>"
                    . "&times;</span></div></td></tr>";
        
    }
  }else{
      echo "<tr><td colspan='3'><div class='alert alert-danger alert-dismissible'>Unsuccessful: ".$error."
                    <span class='close' data-dismiss='alert'>"
                    . "&times;</span></div></td></tr>"; 
  }
}
if(isset($_POST['action']) && $_POST['action'] == "bank_fetch"){
    $id = (int)trim($_POST['id']);
    $bank = (new Bank())->fetch_bank_by_id($id);
    
    echo json_encode($bank->get_array(TRUE));
    
}
if(isset($_POST['action']) && $_POST['action'] == "bank_delete"){
    $id = (int)  trim($_POST['id']);
    $bank = new Bank();
    $bank->set_id($id);
     if($bank->delete_by_id()){
        echo "<tr><td colspan='3'><div class='alert alert-success alert-dismissible'>Bank successfully deleted.<span class='close' data-dismiss='alert'>"
                    . "&times;</span></div></td></tr>";
    }else{
        echo "<tr><td colspan='3'><div class='alert alert-danger alert-dismissible'>Bank cannot be deleted. Please try again.
                    <span class='close' data-dismiss='alert'>"
                    . "&times;</span></div></td></tr>";
        
    }
    
}

/////////////////////////////////////////////////////////
//Building owner
if(isset($_POST['action']) && $_POST['action'] =="building_owner_fetch"){
    $id = (int)trim($_POST['id']);
    $b_owner = new BuildingOwner($id);
    
    echo json_encode($b_owner->get_array(TRUE));
}

if(isset($_POST['action']) && $_POST['action'] == "building_owner_edit"){
    $id = (int)trim($_POST['id']);
    $name = trim($_POST['name']);
    $phone = trim($_POST['phone']);
    $email = trim($_POST['email']);
    
    $error = "";
    if(!is_name($name)){
        $error = "Name is invalid";
    }
    if(!is_email($email)){
        $error .= "\n Email is invalid";
    }
    if(!is_phone($phone)){
        $error .= "\n Phone is invalid";
    }
     
    if(strlen($error) <1){
        $b_owner = new BuildingOwner($id);
        $b_owner->set_name($name);
        $b_owner->set_phone($phone);
        $b_owner->set_email($email);
       
        if($b_owner->update_by_id()){
        
        echo "<tr><td colspan='3'><div class='alert alert-success alert-dismissible'>Building Owner successfully updated.<span class='close' data-dismiss='alert'>"
                    . "&times;</span></div></td></tr>";
        }else{
            echo "<tr><td colspan='3'><div class='alert alert-danger alert-dismissible'>An unkwown error has occured.
                        <span class='close' data-dismiss='alert'>"
                        . "&times;</span></div></td></tr>";

        }
  }else{
      echo "<tr><td colspan='3'><div class='alert alert-danger alert-dismissible'>Unsuccessful: ".$error."
                    <span class='close' data-dismiss='alert'>"
                    . "&times;</span></div></td></tr>"; 
  }
}

if(isset($_POST['action']) && $_POST['action'] == "building_owner_delete"){
    $id = (int)trim($_POST['id']);
    $b_owner = new BuildingOwner($id);
     if($b_owner->delete_by_id()){
        echo "<tr><td colspan='3'><div class='alert alert-success alert-dismissible'>Building Onwer has been successfully deleted.<span class='close' data-dismiss='alert'>"
                    . "&times;</span></div></td></tr>";
    }else{
        echo "<tr><td colspan='3'><div class='alert alert-danger alert-dismissible'>Building Owner cannot be deleted. Please try again.
                    <span class='close' data-dismiss='alert'>"
                    . "&times;</span></div></td></tr>";
        
    }
    
}

////////////////////////////////////////////////////////
//Building
if(isset($_POST['action']) && $_POST['action'] =="building_fetch"){
    $id = (int)trim($_POST['id']);
    $building = new Building($id);
    $owner_name = $building->get_owner()->get_name();
    
    echo json_encode(array_merge($building->get_building_array(true),array('owner_name'=>$owner_name)));
}
if(isset($_POST['action']) && $_POST['action'] =="building_edit"){
   
    $id = (int)trim($_POST['id']);
    $name = trim($_POST['name']);
    $location = trim($_POST['location']);
    $description = trim($_POST['description']);
    $owner_id = (int)trim($_POST['owner_id']);
    $for_sale = (int)trim($_POST['for_sale']);
    $sale_amount = (double)trim($_POST['sale_amount']);
    $flat_count = (int)trim($_POST['flat_count']);
    $flat_description = trim($_POST['flat_description']);
    $flat_rent = (double)trim($_POST['flat_rent']);
    
    $error = "";
   
    $new_building = new Building($id);
    if(strlen($name) < 3 || strlen($name) >50){
        $error = "Name is too short or too long";
    }
    if(strlen($location) <3 || strlen($location) >100){
        $error .= "\n Location is too short or too long.";
    }
    if(strlen($description) ==0){
        $description = $new_building->get_description();
    }
    if(!$owner_id){
        $owner_id = $new_building->get_owner_id();
    }
    if(strlen($flat_description) <3){
        $error .= "\n Flats descriptions cannot be empty.";
    }
    if($flat_count ==0){
        $error .= "\n Flat count cannot be 0. The building should better be deleted from the system.";
    }
    $occupied_flats =(int) $new_building->get_flat_count() - $new_building->get_available_flats();
    if($flat_count < $occupied_flats){
        $error .= "\n No. of flats in this building cannot be less than the currently occupied flats";
    }
    if($flat_rent ==0 && $for_sale ==0){
        $error .= "\n Flat rent cannot be 0";
    }
//    if(in_db("building", "name", $name)){
//        $error .= "\n Building name already exits.";
//    }
   
   if($for_sale <10){
        if($for_sale){
       
        if(!($sale_amount >0)){
            $error .= "\n Enter a valid sale amount for the building";
        }
        $sale_amount = (double)$sale_amount;
        $flat_rent =0;
     }else{
         $sale_amount = 0;
     }
   }else{
       $for_sale = $new_building->get_for_sale();
       $sale_amount = $new_building->get_sale_amount();
   }
    
    if(strlen($error) <1){
         $new_building->set_name($name);
        $new_building->set_location($location);
        $new_building->set_description($description);
        $new_building->set_owner_id($owner_id);
        $new_building->set_for_sale($for_sale);
        $new_building->set_sale_amount($sale_amount);
        $new_building->set_flat_count($flat_count);
        $new_building->set_flat_description($flat_description);
        $new_building->set_flat_rent($flat_rent);
       
          if($new_building->update_by_id()){
        
              echo "<tr><td colspan='3'><div class='alert alert-success alert-dismissible'>Building successfully updated.<span class='close' data-dismiss='alert'>"
                    . "&times;</span></div></td></tr>";
        }else{
            echo "<tr><td colspan='3'><div class='alert alert-danger alert-dismissible'>An unkwown error has occured.
                        <span class='close' data-dismiss='alert'>"
                        . "&times;</span></div></td></tr>";

        }
        }else{
            echo "<tr><td colspan='3'><div class='alert alert-danger alert-dismissible'>Unsuccessful: ".$error."
                          <span class='close' data-dismiss='alert'>"
                          . "&times;</span></div></td></tr>"; 
        }
    
}

if(isset($_POST['action']) && $_POST['action'] == "building_delete"){
    $id = (int)trim($_POST['id']);
    $building = new Building($id);
     if($building->delete_by_id()){
        echo "<tr><td colspan='3'><div class='alert alert-success alert-dismissible'>Building  has been successfully deleted as well as all the occupants in the building.<span class='close' data-dismiss='alert'>"
                    . "&times;</span></div></td></tr>";
    }else{
        echo "<tr><td colspan='3'><div class='alert alert-danger alert-dismissible'>Building cannot be deleted. Please try again.
                    <span class='close' data-dismiss='alert'>"
                    . "&times;</span></div></td></tr>";
        
    }
    
}
////////////////////////////////////////////////////////
//Occupants
if(isset($_POST['action']) && $_POST['action'] =="occupant_fetch"){
    $id = (int)trim($_POST['id']);
    $occupant = new Occupant($id);
    
    echo json_encode(array_merge($occupant->get_array(true),array("building_name"=>$occupant->get_building()->get_name())));
    
}
if(isset($_POST['action']) && $_POST['action'] =="occupant_edit"){
   /*
    * id:id,name:name,
        email:email,phone:phone,building:building,flats:flats,password:password
    */
    $id = (int)trim($_POST['id']);
    $name = trim($_POST['name']);
    $phone = trim($_POST['phone']);
    $email = trim($_POST['email']);
    $building_id = (int)trim($_POST['building']);
    $flats = (int)trim($_POST['flats']);
    $password = trim($_POST['password']);
    
   $error = "";
    $exist_occupant = new Occupant($id);
    if(!is_name($name)){
        $error = "Invalid name.";
    }
    if(!is_email($email)){
        $error .= "\n Invalid Email Address";
    }
    if(!$building_id){
        $building_id = $exist_occupant->get_building_id();
    }
    if(!is_phone($phone)){
        $error .= "\n Invalid phone number";
    }
    
    if(!is_password($password)){
        $error .= "\n Invalid Password. Passord much contain between 4 to 20 characters.";
    }
    if($flats <1){
        $error .= "\n No. of flats must be more than 0";
    }
    
    $building = new Building($building_id);
    if($flats >0){
        if($flats > ($building->get_available_flats() + $exist_occupant->get_flats())){
            $error .= "No. of flats cannot be more than available flats in the selected building.";
        }
    }
    
    //check if the same name and has existed in a building
    $row = DB::query("SELECT * FROM occupant WHERE name = %s AND building =%i AND id != %i",$name, $building_id,$id);
    if(count($row) >0){
        $error .= "\n Occupant is already registered in this building";
    }
    
   
    
    if(strlen($error) <1){
        
       $exist_occupant->set_name($name);
       $exist_occupant->set_phone($phone);
       $exist_occupant->set_email($email);
       $exist_occupant->set_building_id($building_id);
       $exist_occupant->set_flats($flats);
       $exist_occupant->set_password($password);
          if($exist_occupant->update_by_id()){
        
              echo "<tr><td colspan='3'><div class='alert alert-success alert-dismissible'>Occupant successfully updated.<span class='close' data-dismiss='alert'>"
                    . "&times;</span></div></td></tr>";
        }else{
            echo "<tr><td colspan='3'><div class='alert alert-danger alert-dismissible'>An unkwown error has occured.
                        <span class='close' data-dismiss='alert'>"
                        . "&times;</span></div></td></tr>";

        }
        }else{
            echo "<tr><td colspan='3'><div class='alert alert-danger alert-dismissible'>Unsuccessful: ".$error."
                          <span class='close' data-dismiss='alert'>"
                          . "&times;</span></div></td></tr>"; 
        }
    
}

if(isset($_POST['action']) && $_POST['action'] == "occupant_delete"){
    $id = (int)trim($_POST['id']);
    $occupant = new Occupant($id);
     if($occupant->delete_by_id()){
        echo "<tr><td colspan='3'><div class='alert alert-success alert-dismissible'>Occupant  has been successfully deleted.<span class='close' data-dismiss='alert'>"
                    . "&times;</span></div></td></tr>";
    }else{
        echo "<tr><td colspan='3'><div class='alert alert-danger alert-dismissible'>Occupant cannot be deleted. Please try again.
                    <span class='close' data-dismiss='alert'>"
                    . "&times;</span></div></td></tr>";
        
    }
    
}
?>

