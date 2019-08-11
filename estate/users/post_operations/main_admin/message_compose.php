<?php
if(isset($_POST['main_compose_btn'])){
    
    $estate = (int)trim($_POST['main_estate']);
    $subject = trim($_POST['main_subject']);
    $message = trim($_POST['main_message']);
    $error = "";
    $success = "";
    if(!$estate){
        $error = "Select an estate.";
    }
    if(strlen($subject)<2 ){
        $error .= "\n Subject is too short";
    }
    if(strlen($message) <1){
        $error .= "\n Message cannot be empty";
    }
    
    if(strlen($error) <1){
        $main_admin = new MainAdmin($_SESSION['id']);
        $msg = new Message();
        $msg->set_subject($subject);
        $msg->set_sender(MainAdmin::TYPE);
        $msg->set_sender_id($_SESSION['id']);
        $msg->set_body($message);
        $msg->set_receiver(EstateAdmin::TYPE);
        $msg->set_receiver_id($estate);
        $msg->set_name($main_admin->get_name());
        $msg->set_address($main_admin->get_address());
        $msg->set_email($main_admin->get_email());
        
        if($msg->insert()){
            $success = "Message sent!";
        }
    }
    
}
?>

