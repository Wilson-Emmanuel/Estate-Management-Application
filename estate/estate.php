<?php
include 'private/includes.php';
$id =0;
if(isset($_GET['estate']) && is_numeric($_GET['estate'])){
    $id = (int)$_GET['estate'];
    $image = (new Image())->fetch_by_id($id);
    if(!$image->get_id()){
        header("Location: estates.php");
    }
    
    $images_estate = (new Image())->fetch_by_id($id);
    $e_data ="";


    $estate = new Estate($images_estate->get_type_id());
}

?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title><?=$estate->get_name()?> - Esate Manager</title>
  <?php
    include_once 'snippets/header.php';
  ?>

</head>

<body data-spy="scroll" data-target="#navbar-example">

   <?php
 include_once 'snippets/nav_header.php';
 ?>
  <!-- header end -->

  <section class="container" id="estates-section" style="padding-top: 90px;">
      <?php
      

    
    $e_data .= '
         <div class="row" > <div class="col-xs-12 ">
              <div class="card mb-4 bg-dark">
                 <img class="card-img-top"  style="height:300px;" src="users/uploads/estate/'.$images_estate->get_name().'" alt="'.$estate->get_name().'" >
                  <div class="card-body">
                      <h5 class="card-title text-danger">'.  ucwords($estate->get_name()).'</h5>
                      <p class="card-text text-white">
                     <span class="text-success"> Description: '.$estate->get_description().'</span><br>
                      Address : '.$estate->get_address().','.$estate->get_city().','.$estate->get_state().'<br>
                      Buildings : '.$estate->get_all_buildings();
    if($estate->get_all_buildings_for_sale() >0){
        $e_data .= ', <span class=" text-warning"> '.$estate->get_all_buildings_for_sale().'</span> for sale. <a href="contact.php">Contact us now! </a><br>';
    }
    if($estate->get_all_vacancies() >0){
        $e_data .= '<span class=" text-success">'.$estate->get_all_vacancies().'</span> Vacancies available';
    }
    $e_data .= '</p>
                  </div>
              </div>
  
      </div></div>';
  
    echo $e_data;

?>
      <?php
 $cur_estate = (new Image())->fetch_by_id($id);
//$images_estates = (new Image())->fetch_by_building($cur_estate->get_type_id());
$images_estates = (new Image())->fetch_single_all_buildings($cur_estate->get_type_id());
$data ="";
$counter = 0;

foreach($images_estates as $images_estate){
    $bd = new Building($images_estate->get_type_id());
    if($counter ==0){
        $data .= '<div class="row">';
    }
    $data .= '
          <div class="col-md-4 wow bounceInUp " data-wow-duration="1.4s">
              <div class="card mb-4 border-dark bg-white">
                   <a href="building.php?bd_id='.$images_estate->get_id().'"><img class="card-img-top" width="100" height="300" src="users/uploads/buildings/'.$images_estate->get_name().'" alt="'.$bd->get_name().'" ></a>
                  <div class="card-body">
                      <h5 class="card-title text-success">'.  ucwords($bd->get_name()).'</h5>
                      <p class="card-text text-dark">
                      Description: '.$bd->get_description().'<br>
                      Location : '.$bd->get_location().'<br>';
                     
   
    if($bd->get_available_flats() >0 && !$bd->get_for_sale()){
        $data .= '<span class=" text-success">'.$bd->get_available_flats().'</span> Vacancies available<br>';
    }
    if($bd->get_for_sale()){
        $data .= '<span class=" text-info"><i class="fa fa-info"></i> This building is up for sale!</span> <br>';
    }
    $data .= '</p>';
    if($bd->get_available_flats() >0 || $bd->get_for_sale()){
        $data .= '<a href="contact.php" class="btn btn-outline-success btn-sm">Contact Us Now!</a>';
    }
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
