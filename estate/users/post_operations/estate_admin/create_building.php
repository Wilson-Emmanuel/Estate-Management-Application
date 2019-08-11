<?php
if(isset($_POST['create_building_btn'])){
    $name = trim($_POST['name']);
    $location = trim($_POST['location']);
    $description = trim($_POST['description']);
    $b_owner =(int)trim($_POST['owner']);
    
    $for_sale = (int)trim($_POST['for_sale']);
    $sale_amount = (double)trim($_POST['sale_amount']);
    
    
    $flat_count = (int)trim($_POST['flat_count']);
    $flat_description = trim($_POST['flat_description']);
    $flat_rent = (int)trim($_POST['flat_rent']);
    $error = "";
    $success = "";
   
    $new_building = new Building();
    if(strlen($name) < 3 || strlen($name) >50){
        $error = "Name is too short or too long";
    }
    if(strlen($location) <3 || strlen($location) >100){
        $error .= "\n Location is too short or too long.";
    }
    if(strlen($description) ==0){
        $description = "none";
    }
    if(!$b_owner){
        $error .= "\n Select building owner.";
    }
    if(strlen($flat_description) <3){
        $error .= "\n Flats descriptions cannot be empty.";
    }
    if($flat_count ==0){
        $error .= "\n Flat count cannot be 0";
    }
    if($flat_rent ==0){
        $error .= "\n Flat rent cannot be 0";
    }
    if(in_db("building", "name", $name)){
        $error .= "\n Building name already exits.";
    }
   
    if($for_sale){
       
       if(!($sale_amount >0)){
           $error .= "\n Enter a valid sale amount for the building";
       }
       $sale_amount = (double)$sale_amount;
    }else{
        $sale_amount = 0;
    }
    
    if(strlen($error) <1){
        $new_building->set_name($name);
        $new_building->set_location($location);
        $new_building->set_description($description);
        $new_building->set_owner_id($b_owner);
        $new_building->set_estate_id((new EstateAdmin($_SESSION['id']))->get_estate()->get_id());
        $new_building->set_for_sale($for_sale);
        $new_building->set_sale_amount($sale_amount);
        $new_building->set_flat_count($flat_count);
        $new_building->set_flat_description($flat_description);
        $new_building->set_flat_rent($flat_rent);
        if($new_building->insert()){
            $success = "Building successfully added";
        }
    }
}
?>

