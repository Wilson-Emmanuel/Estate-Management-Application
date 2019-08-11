<?php
    if(isset($_SESSION['estate_admin']) && $_SESSION['estate_admin']){

        include 'estate_admin.php';

       }elseif(isset($_SESSION['main_admin']) && $_SESSION['main_admin']){
           
           include 'main_admin.php';
           
      }elseif(isset($_SESSION['tenant']) && $_SESSION['tenant']){ 
          
          include 'tenant.php';
    }
    
?>

