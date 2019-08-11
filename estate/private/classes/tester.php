<?php
//Notice that included files are arranged in order of usages

    include '../db_setup.php';
    require 'Estate.php';
    //require 'BuildingOwner.php';
   // require 'Building.php';
    //require 'Flat.php';
    ///require 'Occupant.php';
   // require 'Payment.php';
    
   /* $estate = new Estate();
    $estate->set_id("1");
    $estate->set_address("Presco");
    $estate->set_name("Democracy Estate");
    $estate->set_city("Abakaliki");
    $estate->set_state("Ebonyi");
    $estate->set_description("One of the students in Ebonyi State");
    $estate->set_date(date("Y-m-d H:i:s"));
    
    
    $estate->set_name("Lagos Estate");
    $estate->insert();
    echo '<pre>';
    print_r($estate->get_array(false));
    echo '</pre>';
    
    echo '<br>'; */
    $es = new Estate(7);
   
    echo '<pre>';
    print_r($es->get_array(true));
    echo '</pre>';
    //update
    $es->set_name("Abakaliki Estate");
    $es->update_by_id();
    echo '<pre>';
    print_r($es->get_array());
    echo '</pre>';
    $es->set_id(2);
    $es->delete();
   
    echo 'Wilson you are here oh!';
?>

