<?php
include '../../../private/includes.php';

///////////////////////////////////////////////////////////////////////////////////
//Estate Admin Message Building Fetch
if(isset($_POST['action']) && $_POST['action'] == "estate_recipient_building"){
   //action:"estate_recipients",select:select,estate_admin:estate_admin_id
    
    $estate_admin_id = (int)trim($_POST['estate_admin']);
    $admin  = new EstateAdmin($estate_admin_id);
    
    $buildings = (new Building())->fetch_buildings_by_estate($admin->get_estate_id());
    $ret_text = '<option value="0">Select...</option>';
    
    foreach($buildings as $building){
        $ret_text .= '<option value="'.$building->get_id().'">'.$building->get_name().' (Location : '.$building->get_location().')</option>';
    }
    
    echo $ret_text;
    
}
///////////////////////////////////////////////////////////////////////////////////
//Estate Admin Message Tenant Fetch
if(isset($_POST['action']) && $_POST['action'] == "estate_recipient_tenant"){
   //action:"estate_recipients",select:select,estate_admin:estate_admin_id
    
    $estate_admin_id = (int)trim($_POST['estate_admin']);
    $building_id = (int)trim($_POST['building']);
    
    $admin  = new EstateAdmin($estate_admin_id);
    $occupants = (new Occupant())->fetch_occupant_with_building_estate_id($admin->get_estate_id(), $building_id);
    $ret_text = '<option value="0">Select...</option>';
    
    foreach($occupants as $occupant){
        $ret_text .= '<option value="'.$occupant->get_id().'">'.$occupant->get_name().' (No. of flats : '.$occupant->get_flats().')</option>';
    }
    
    echo $ret_text;
    
}
