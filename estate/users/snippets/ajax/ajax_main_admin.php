<?php
include '../../../private/includes.php';
///////////////////////////////////////////////////////////////////////////////////
//Main admin Estate management
if(isset($_POST['action']) && $_POST['action'] == "main_admin_estate_edit"){
    $id = (int)  trim($_POST['id']);
    $name = trim($_POST['name']);
    $desc = trim($_POST['desc']);
    
    $error = "";
    if(!is_name($name)){
        $error = "Wrong name";
    }
    if(strlen($desc)==0){
        $desc="none";
    }
    
  if(strlen($error) <1){
        $estate = new Estate($id);
    $estate->set_name($name);
    $estate->set_description($desc);
    
    if($estate->update_by_id()){
        echo "<tr><td colspan='3'><div class='alert alert-success alert-dismissible'>Estate successfully updated.<span class='close' data-dismiss='alert'>"
                    . "&times;</span></div></td></tr>";
    }else{
        echo "<tr><td colspan='3'><div class='alert alert-danger alert-dismissible'>An unkwown error has occured.
                    <span class='close' data-dismiss='alert'>"
                    . "&times;</span></div></td></tr>";
        
    }
  }else{
      echo "<tr><td colspan='3'><div class='alert alert-danger alert-dismissible'>".$error."
                    <span class='close' data-dismiss='alert'>"
                    . "&times;</span></div></td></tr>"; 
  }
}
if(isset($_POST['action']) && $_POST['action'] == "main_admin_estate_fetch"){
    $id = (int)  trim($_POST['id']);
    $estate = new Estate($id);
    
    echo json_encode($estate->get_array(TRUE));
    
}
if(isset($_POST['action']) && $_POST['action'] == "main_admin_estate_delete"){
    $id = (int)  trim($_POST['id']);
    $estate = new Estate($id);
     if($estate->delete()){
        echo "<tr><td colspan='3'><div class='alert alert-success alert-dismissible'>Estate successfully deleted.<span class='close' data-dismiss='alert'>"
                    . "&times;</span></div></td></tr>";
    }else{
        echo "<tr><td colspan='3'><div class='alert alert-danger alert-dismissible'>Estate cannot be deleted. Please try again.
                    <span class='close' data-dismiss='alert'>"
                    . "&times;</span></div></td></tr>";
        
    }
    
}
///////////////////////////////////////////////////////////////////////////////////
//Main admin Estate Admin management
if(isset($_POST['action']) && $_POST['action'] == "main_admin_estate_admin_edit"){
    $id = (int)  trim($_POST['id']);
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $address = trim($_POST['address']);
    $password = trim($_POST['password']);
    $estate = trim($_POST['estate']);
    
    $admin = new EstateAdmin($id);
    $error = "";
    if(!is_name($name)){
        $error = "Wrong name.";
    }
    if(!is_email($email)){
        $error .= "\nWrong email address.";
    }
    if(in_db("estate_admin", "email", $email) &&  $email !== $admin->get_email() ){
        $error .= "\nUser already exits.";
    }
    if(!is_phone($phone)){
        $error .= "\nWrong phone number.";
    }
    if(!is_address($address)){
        $error .= "\nWrong contact address.";
    }
    if(!is_password($password)){
        $error .= "\nWrong password.";
    }
    ///check whether an estate that is already assigned to someone is being assigned to this admin
if($estate != "none"){
    $estate = (int)$estate;
    $row = DB::queryFirstRow("SELECT * FROM estate_admin WHERE estate =%i",$estate);
    if(count($row) >0){
        $error .= "\nEstate already assigned to another admin";
    }
}
    
  if(strlen($error) <1){
        $admin = new EstateAdmin($id);
    $admin->set_name($name);
    $admin->set_phone($phone);
    $admin->set_email($email);
    $admin->set_address($address);
    $admin->set_password($password);
    if($estate != "none"){
       
        $admin->set_estate_id($estate);
    }
    
    if($admin->update_by_id()){
        echo "<tr><td colspan='3'><div class='alert alert-success alert-dismissible'>Estate admin successfully updated.<span class='close' data-dismiss='alert'>"
                    . "&times;</span></div></td></tr>";
    }else{
        echo "<tr><td colspan='3'><div class='alert alert-danger alert-dismissible'>An unkwown error has occured. Please try again.
                    <span class='close' data-dismiss='alert'>"
                    . "&times;</span></div></td></tr>";
        
    }
  }else{
      echo "<tr><td colspan='3'><div class='alert alert-danger alert-dismissible'>".$error."
                    <span class='close' data-dismiss='alert'>"
                    . "&times;</span></div></td></tr>"; 
  }
}
if(isset($_POST['action']) && $_POST['action'] == "main_admin_estate_admin_fetch"){
    $id = (int)  trim($_POST['id']);
    $admin = new EstateAdmin($id);
    $estate = $admin->get_estate();
    $es = $estate->get_name()." in ".$estate->get_address().", ".$estate->get_city().", ".$estate->get_state();
    
    
    
    echo json_encode(array_merge($admin->get_array(TRUE), array("estate"=>$es)));
    
}
if(isset($_POST['action']) && $_POST['action'] == "main_admin_estate_admin_delete"){
    $id = (int)  trim($_POST['id']);
    $admin = new EstateAdmin($id);
     if($admin->delete()){
        echo "<tr><td colspan='3'><div class='alert alert-success alert-dismissible'>Estate admin successfully deleted.<span class='close' data-dismiss='alert'>"
                    . "&times;</span></div></td></tr>";
    }else{
        echo "<tr><td colspan='3'><div class='alert alert-danger alert-dismissible'>Estate admin cannot be deleted. Please try again.
                    <span class='close' data-dismiss='alert'>"
                    . "&times;</span></div></td></tr>";
        
    }
    
}

///////////////////////////////////////////////////////////////////////////////////
//Main admin Bank management
if(isset($_POST['action']) && $_POST['action'] == "main_admin_bank_edit"){
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
if(isset($_POST['action']) && $_POST['action'] == "main_admin_bank_fetch"){
    $id = (int)trim($_POST['id']);
    $bank = (new Bank())->fetch_bank_by_id($id);
    
    echo json_encode($bank->get_array(TRUE));
    
}
if(isset($_POST['action']) && $_POST['action'] == "main_admin_bank_delete"){
    $id = (int) trim($_POST['id']);
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
?>

