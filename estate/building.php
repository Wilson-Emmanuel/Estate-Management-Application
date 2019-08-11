<?php
include 'private/includes.php';
$id =0;
$image_building = null;
$building = null;
$e_data = "";
if(isset($_GET['bd_id']) && is_numeric($_GET['bd_id'])){
    $id = (int)$_GET['bd_id'];
    $image_building = (new Image())->fetch_by_id($id);
    if(!$image_building->get_id()){
        header("Location: estates.php");
    }
   // $images_building = (new Image())->fetch_by_id($id);
    $building = new Building($image_building->get_type_id());
    

}

?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title><?=$building->get_name()?> - Esate Manager</title>
  <?php
  
    include 'snippets/header.php';
  ?>

</head>

<body data-spy="scroll" data-target="#navbar-example">

   <?php
 include 'snippets/nav_header.php';
 
 ?>
  <!-- header end -->

  <section class="container" id="estates-section" style="padding-top: 90px;">
      <?php


    $e_data .= '
         <div class="row" > <div class="col-xs-12 ">
              <div class="card mb-4 bg-dark">
                  <img class="card-img-top"  style="height:300px;" src="users/uploads/buildings/'.$image_building->get_name().'" alt="'.$building->get_name().'" >
                  <div class="card-body">
                      <h5 class="card-title text-danger">'.  ucwords($building->get_name()).'</h5>
                      <p class="card-text text-white">
                     <span class="text-success"> Description: '.$building->get_description().'</span><br>
                      Location : '.$building->get_location().'<br>
                      Flats : '.$building->get_flat_count().'<br>';
    
    if($building->get_for_sale()){
        $e_data .= '<span class="text-info">This building is for sale.</span> <br>';
    }
    if($building->get_available_flats() >0 && !$building->get_for_sale()){
        $e_data .= '<span class=" text-success">'.$building->get_available_flats().'</span> Vacancies available';
    }
    if($building->get_available_flats() >0 || $building->get_for_sale()){
         $e_data .= '<a href="contact.php" > Contact Us Now!</a>';
    }
    
    $e_data .= '</p>
                  </div>
              </div>
  
      </div></div>';
  
    echo $e_data;

?>
      <?php
 $cur_building = (new Image())->fetch_by_id($id);
$image_buildings = (new Image())->fetch_by_type(Image::BUILDING, $cur_building->get_type_id());
//$image_buildings = (new Image())->fetch_all(Image::BUILDING);
$data ="";
$counter = 0;

foreach($image_buildings as $image_building){
    if($cur_building->get_id() == $image_building->get_id()){
        continue;
    }
    if($counter ==0){
        $data .= '<div class="row">';
    }
    
    $data .= '
          <div class="col-md-4 wow bounceInUp " data-wow-duration="1.4s">
              <div class="card mb-4 border-dark bg-white">
                  <img class="card-img-top" width="100" height="300" src="users/uploads/buildings/'.$image_building->get_name().'" alt="'.$image_building->get_description().'" >
                  <div class="card-body">
                      
                      <p class="card-text text-info">
                      '.  ucwords($image_building->get_description()).'</p>';
    
   
 
     $data .= '</div>
              </div>
  
      </div>';
    if($counter  ==3){
        $data .= '</div>';
        $counter =0;
    }else{
        $counter++;
    }
}
if($counter ==2 || $counter ==3){
    $data .= '</div>';
}
echo $data;

?>
<!--      <div class="row">
          <div class="col-md-4 wow bounceInUp " data-wow-duration="1.4s">
              <div class="card mb-4">
                  <img class="card-img-top" src="img/background/bg1.jpg" alt="Estate Name" >
                  <div class="card-body">
                      <h5 class="card-title">Estate Name</h5>
                      <p class="card-text">Some quick example text to build on the card title and make up the card's content</p>
                      <a href="#" class="btn btn-outline-dark btn-sm">Explore More</a>
                  </div>
              </div>
          </div>
          
          
          
          <div class="col-md-4 wow bounceInUp " data-wow-duration="1.4s">
              <div class="card mb-4 border-dark">
                  <img class="card-img-top" src="img/background/bg1.jpg" alt="Estate Name" >
                  <div class="card-body">
                      <h5 class="card-title">Estate Name</h5>
                      <p class="card-text">Some quick example text to build on the card title and make up the card's content</p>
                      <a href="#" class="btn btn-outline-primary btn-sm">Explore More</a>
                  </div>
              </div>
          </div>
          
          
          <div class="col-md-4 wow bounceInUp " data-wow-duration="1.4s">
              <div class="card mb-4  bg-dark">
                  <img class="card-img-top" src="img/background/bg1.jpg" alt="Estate Name" >
                  <div class="card-body text-danger ">
                      <h5 class="card-title  text-danger">Estate Name</h5>
                      <p class="card-text text-white">Some quick example text to build on the card title and make up the card's content</p>
                      <a href="#" class="btn btn-outline-success btn-sm">Explore More</a>
                  </div>
              </div>
          </div>
      </div>-->
      
  </section>


  
  <section  style="padding-top: 80px;"
  <!-- Start Footer bottom Area -->
  <?php
  include_once 'snippets/footer_first.php';
?>
  </section>
  
  <?php
include_once 'snippets/footer.php';
  ?>
  <!-- Contact Form JavaScript File -->
  <script src="contactform/contactform.js"></script>

  <script src="js/main.js"></script>
</body>

</html>
