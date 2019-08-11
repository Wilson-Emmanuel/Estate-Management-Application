<?php
 if(isset($_POST['create_owner_btn'])){
     
        $owner_name = trim($_POST['name']);
        $owner_phone = trim($_POST['phone']);
        $owner_email = trim($_POST['email']);
        if(!is_name($owner_name)){
            $error .= "\n Owner's name incorrect";
        }
        if(!is_email($owner_email)){
            $error .= "\n Owner's email incorrect";
        }
        if(!is_phone($owner_phone)){
            $error .= "\n Owner's phone incorrect";
        }
        if(in_db("building_owner", "email", $owner_email)){
            $error .= "\n Owner already exists by email, please select from the existing.";
        }
        if(in_db("building_owner", "name", $owner_name)){
            $error .= "\n Owner already exists by name, please select from the existing owners.";
        }
        if(in_db("building_owner", "phone", $owner_phone)){
            $error .= "\n Owner already exists by phone, please select from the existing owners.";
        }
        if(strlen($error) <1){
            //Insert the building owner into the database
            $new_owner = new BuildingOwner();
            $new_owner->set_name($owner_name);
            $new_owner->set_email($owner_email);
            $new_owner->set_phone($owner_phone);
            $new_owner->set_estate_id((new EstateAdmin($_SESSION['id']))->get_estate_id());
            if($new_owner->insert()){
                $success = "Building Onwer has been successfully added.";
            }
            //$b_owner = (int)DB::insertId(); 
            
        }
        
    
 }
?>
