<?php
include 'private/includes.php';

$result = DB::query("SELECT * FROM states");
$state ="";
foreach($result as $row){
    $name = $row['name'];
    $name = trim(str_replace("State", "", $name));
    $state .= htmlentities('<').'option value="'.$name.'"'.  htmlentities('>').$name.  htmlentities('</').'option'.  htmlentities('>');
}echo $state;
?>

