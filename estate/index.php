<?php
include 'private/includes.php';
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Estate Manager Home</title>
  <?php
    include_once 'snippets/header.php';
  ?>

</head>

<body data-spy="scroll" data-target="#navbar-example">

   <?php
 include_once 'snippets/nav_header.php';
 ?>
  <!-- header end -->

   <!-- =========================================
  Slider Area
  ============================================= -->
  <?php
include_once 'snippets/slider.php';
  ?>

    
 <!--==========================
      Services Section
    ============================-->
    <section id="services">
      <div class="container">
           <div class="section-headline text-center" >
              <h2>Features</h2>
              
              <p>
                 
                  Estate Manager is endowed with many features.
              </p>
        
            </div>
       

        <div class="row">

          <div class="col-lg-4 col-md-6 box wow bounceInUp service-box" data-wow-duration="1.4s">
            <div class="icon"><i class="ion-earth"></i></div>
            <h4 class="title"><a href="">Versatility </a></h4>
            <p class="description">The system is available and accessible everywhere and even beyond Nigeria.</p>
          </div>
          <div class="col-lg-4 col-md-6 box wow bounceInUp service-box" data-wow-duration="1.4s">
            <div class="icon"><i class="fa fa-money"></i></div>
            <h4 class="title"><a href="">No Cost </a></h4>
            <p class="description">It doesn't cost a dime to use the system. Only your rents, if you are a tenants in one of the estates.</p>
          </div>
          <div class="col-lg-4 col-md-6 box wow bounceInUp service-box" data-wow-duration="1.4s">
            <div class="icon"><i class="fa fa-space-shuttle"></i></div>
            <h4 class="title"><a href="">Fast </a></h4>
            <p class="description">Our system is hosted in one of the best servers in the world to be able to provide contents to users at the speed of light.</p>
          </div>
          <div class="col-lg-4 col-md-6 box wow bounceInUp service-box" data-wow-delay="0.1s" data-wow-duration="1.4s">
            <div class="icon"><i class="ion-ios-speedometer-outline"></i></div>
            <h4 class="title"><a href="">Measurement </a></h4>
            <p class="description">Estate Manager means success measurement to estate and building owners as well as estate admins, tenants and the government.</p>
          </div>
          <div class="col-lg-4 col-md-6 box wow bounceInUp service-box" data-wow-delay="0.1s" data-wow-duration="1.4s">
            <div class="icon"><i class="ion-android-person"></i></div>
            <h4 class="title"><a href="">Users Friendly</a></h4>
            <p class="description">Our system is user friendly. All components used are self explanatory and are all used in familiar environment to the users.</p>
          </div>
          <div class="col-lg-4 col-md-6 box wow bounceInUp service-box" data-wow-delay="0.1s" data-wow-duration="1.4s">
            <div class="icon"><i class="ion-ios-people-outline"></i></div>
            <h4 class="title"><a href="">Beauty Estates</a></h4>
            <p class="description">The system provides a better means of showcasing the beauty sides of Nigerian esetates to the world. <a href="estates.php">Explore our beautify estates now!</a></p>
          </div>

        </div>

      </div>
    </section><!-- #services -->  
  
    
 
  <!-- Start Footer bottom Area -->
  <?php
  include_once 'snippets/footer_first.php';
?>

  <?php
include_once 'snippets/footer.php';
  ?>
  <!-- Contact Form JavaScript File -->
  <script src="contactform/contactform.js"></script>

  <script src="js/main.js"></script>
</body>

</html>
