<?php
if(isset($_POST['estate_compose_btn']) ){
    $subject = trim($_POST['estate_subject']);
    $body = trim($_POST['estate_message']);
    
    $recipient = (int)trim($_POST['estate_recipient']); //0(none), 1(main admin), 2(all tenants in the estate admins estate), 3(all tenants in a building), 4(one tenant)
    $recipient_bd = 0;
    $recipient_tnt =0;
    $success = "";
    
    /*
     *  <option value="0">Select...</option>
                                                          <option value="1">Main Admin</option>
                                                          <option value="2">All Estate Tenants</option>
                                                          <option value="3">All Building Tenants</option>
                                                          <option value="4">One Tenant</option>
     */
    
    $error = "";
    if(strlen($subject) <3){
        $error = "Subject cannot be empty";
    }
    if(strlen($body) <3){
        $error .= "\n Message body cannot be empty";
    }
    if(!$recipient){
        $error .= "\n You must select a recipient";
    }
    
    if(strlen($error) <1){
        
       
        
        $admin = new EstateAdmin($_SESSION['id']);
        $messag = new Message();
        $messag->set_name($admin->get_name());
        $messag->set_email($admin->get_email());
        $messag->set_subject($subject);
        $messag->set_body($body);
        
        if($recipient ==3 || $recipient ==4){
             $recipient_bd = (int)trim($_POST['estate_recipient_building']);
            
            if(!$recipient_bd){
                $error .= "\n You must select building.";
            }  else {
                $messag->set_building($recipient_bd);
                if($recipient ==4){
                     $recipient_tnt =(int) trim($_POST['estate_recipient_tenant']);
                    if(!$recipient_tnt){
                        $error .= "\n You must select a tanant";
                    }else{
                        $messag->set_receiver(Occupant::TYPE);
                        $messag->set_receiver_id($recipient_tnt);
                    }
                }
            }
        }
        $messag->set_sender_id($admin->get_id());
        $messag->set_estate($admin->get_estate_id());
        $messag->set_sender(EstateAdmin::TYPE);
        
        
        $messag->set_address($admin->get_address());
        
       if(strlen($error) <1){
           if($recipient ==4){
               if($messag->insert()){
                   $success = "Message has been sent!";
               }
           }elseif ($recipient ==1) {
                $messag->set_receiver(MainAdmin::TYPE);
                //here receiver_id is set to 0 by default
                if($messag->insert()){
                    $success = "Message has been sent!";
                }
            }elseif($recipient ==2){
                //all tenants in this estate
                $messag->set_receiver(Occupant::TYPE);
                $estateID = (new EstateAdmin($_SESSION['id']))->get_estate_id();
                $tenants = (new Occupant())->fetch_occupant_with_estate_id($estateID); 
                foreach ($tenants as $tenant){
                    $messag->set_building($tenant->get_building_id());
                    $messag->set_receiver_id($tenant->get_id());
                    $messag->insert();
                }
                $success = "Message has been sent!";
            }elseif ($recipient ==3) {
                //all tenants in this building
                //see recipient_bd for the building id
                $messag->set_receiver(Occupant::TYPE);
                $tenants = (new Occupant())->fetch_occupant_with_building_id($recipient_bd); 
                foreach ($tenants as $tenant){
                     $messag->set_building($tenant->get_building_id());
                    $messag->set_receiver_id($tenant->get_id());
                    $messag->insert();
                }
                $success = "Message has been sent!";
                
            }else{
                $error .= "\n An unknown error has occured.";
            }
       }
        
    }
}
?>

