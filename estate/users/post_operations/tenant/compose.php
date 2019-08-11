<?php
if(isset($_POST['tenant_compose_btn']) ){
    $subject = trim($_POST['tenant_subject']);
    $body = trim($_POST['tenant_message']);
    
    $success = "";
    
    $error = "";
    if(strlen($subject) <3){
        $error = "Subject cannot be empty";
    }
    if(strlen($body) <3){
        $error = "Message body cannot be empty";
    }
    
    if(strlen($error) <1){
        $tenant = new Occupant($_SESSION['id']);
        $messag = new Message();
        $messag->set_name($tenant->get_name());
        $messag->set_email($tenant->get_email());
        $messag->set_subject($subject);
        $messag->set_body($body);
        $messag->set_building($tenant->get_building_id());
        $messag->set_sender_id($tenant->get_id());
        $messag->set_sender(Occupant::TYPE);
        $messag->set_receiver(EstateAdmin::TYPE);
       
        $estateID = $tenant->get_building()->get_estate_id();
        $estate_admin = (new EstateAdmin())->fetch_estate_admin_by_estate_id($estateID);
        $messag->set_receiver_id($estate_admin->get_id());
        
        $address = $tenant->get_building()->get_name().' in '.$tenant->get_building()->get_location();
        $messag->set_address($address);
        
        if($messag->insert()){
            $success = "Message has been sent!";
        }
        
    }
}
?>

