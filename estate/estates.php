<?php
include 'private/includes.php';
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Estates - Esate Manager</title>
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
      
$images_estates = (new Image())->fetch_all(Image::ESTATE);
$data ="";
$counter = 0;

foreach($images_estates as $images_estate){
    $estate = new Estate($images_estate->get_type_id());
    if($counter ==0){
        $data .= '<div class="row">';
    }
    $data .= '
          <div class="col-md-4 wow bounceInUp " data-wow-duration="1.4s">
              <div class="card mb-4 bg-dark">
                  <img class="card-img-top" width="100" height="200" src="users/uploads/estate/'.$images_estate->get_name().'" alt="'.$estate->get_name().'" >
                  <div class="card-body">
                      <h5 class="card-title text-danger">'.  ucwords($estate->get_name()).', '.  ucfirst($estate->get_state()).'</h5>
                      <p class="card-text text-white">
                      Description: '.$estate->get_description().'<br>
                      Address : '.$estate->get_address().','.$estate->get_city().','.$estate->get_state().'<br>
                      Buildings : '.$estate->get_all_buildings();
    if($estate->get_all_buildings_for_sale() >0){
        $data .= ', <span class=" text-warning"> '.$estate->get_all_buildings_for_sale().'</span> for sale.<br>';
    }
    if($estate->get_all_vacancies() >0){
        $data .= '<span class=" text-success">'.$estate->get_all_vacancies().'</span> Vacancies available';
    }
    $data .= '</p><a href="estate.php?estate='.$images_estate->get_id().'" class="btn btn-outline-success btn-sm">Explore Estate</a>
                  </div>
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
