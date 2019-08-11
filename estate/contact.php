<?php
include 'private/includes.php';




$error = "";
$success = "";
if(isset($_POST['message_btn'])){
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $to_estate = (int)$_POST['to_estate'];
    $subject = trim($_POST['subject']);
    $body = trim($_POST['message']);
    $address = trim($_POST['address']);
    
    if(!is_name($name)){
        $error .= "\n Please reenter you name";
    }
    if(!is_address($address)){
        $error .= "\n You must enter your address";
    }
    if(!is_email($email)){
        $error .= "\n Invalid email!";
    }
    if(!$to_estate){
        $error .= "\n You must select an estate where the message should be delivered to.";
    }
    if(strlen($subject) <2){
        $error .= "\n Subject is too short.";
    }
    if(strlen($body) <2){
        $error .= "\n Message is too short.";
    }
    if(strlen($error) <1){
        $e_admin = (new EstateAdmin())->fetch_estate_admin_by_estate_id($to_estate);
        $message = new Message();
        $message->set_address($address);
        $message->set_subject($subject);
        $message->set_body($body);
        $message->set_email($email);
        $message->set_receiver(EstateAdmin::TYPE);
        $message->set_sender("user");
        $message->set_receiver_id($e_admin->get_id());
        $message->set_name($name);
        if($message->insert()){
            $success = "Message has been sent! We will get back to you via the email address you supplied.";
        }
    }
}
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Estate Management System Contact Us</title>
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


   <!-- Start Contact us Area -->
   <div class="suscribe-area" style="margin-top: 80px;">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="suscribe-text text-center">
              <h3>Welcome to <strong style="color:white; font-size: 26px;">Estate<small style="color:black;"><sub> manager</sub></small></strong> Support!</h3>
            <a class="sus-btn" href="#contact-form">How may we help you?</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End Suscrive Area -->
  <!-- Start contact Area -->
  <div id="contact" class="contact-area">
    <div class="contact-inner area-padding">
      <div class="contact-overly"></div>
      <div class="container ">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="section-headline text-center" id="contact-us">
              <h2>Contact us</h2>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- Start contact icon column -->
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="contact-icon text-center">
              <div class="single-icon">
                <i class="fa fa-mobile site-text-color"></i>
                <p>
                  Call: +2348130293746<br>
                  <span>Monday-Friday (9am-5pm)</span>
                </p>
              </div>
            </div>
          </div>
          <!-- Start contact icon column -->
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="contact-icon text-center">
              <div class="single-icon">
                <i class="fa fa-envelope-o site-text-color"></i>
                <p>
                  Email: support@estatemanager.com<br>
                  <span>Web: www.estatemanager.com</span>
                </p>
              </div>
            </div>
          </div>
          <!-- Start contact icon column -->
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="contact-icon text-center">
              <div class="single-icon">
                <i class="fa fa-map-marker site-text-color"></i>
                <p>
                  Location: Computer Science Department,<br>
                  <span>Faculty of Sciences, Ebonyi State University.</span>
                </p>
              </div>
            </div>
          </div>
        </div>
        <div class="row">

          <!-- Start Google Map -->
          <div class="col-md-6 col-sm-6 col-xs-12">
            <!-- Start Map -->
              <div id="google-map" data-latitude="6.325790" data-longitude="8.104964"></div>
            <!-- End Map -->
          </div>
          <!-- End Google Map -->

          <!-- Start  contact -->
          <div class="col-md-6 col-sm-6 col-xs-12 ">
            <div class="form contact-form">
              <?php
               //$error ="";
              // $success = "Details has been updated!";
                 if(strlen(trim($error)) >0){
                     echo "<div class='alert alert-danger alert-dismissible'>"
                    .$error."<span class='close' data-dismiss='alert'>"
                    . "&times;</span></div>";
                 } 
                 
                 if(strlen(trim($success)) >0){
                     echo "<div class='alert alert-success alert-dismissible'>"
                    .$success."<span class='close' data-dismiss='alert'>"
                    . "&times;</span></div>";
                 } 
                ?>
              <form  method="post" >
                <div class="form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name"  />
                </div>
                <div class="form-group">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email"  />
                </div>
                <div class="form-group">
                  <input type="address" class="form-control" name="address"  placeholder="Your Address"  />
                  
                </div>
                <div class="form-group">
                    <label class="control-label">To Estate</label>
                    <select name="to_estate" class="form-control" id="to_estate">
                        <option value="0">Select...</option>
                        <?php
                        $estates = (new Estate())->fetch_all_estates();
                        foreach($estates as $estate){
                            echo '<option value="'.$estate->get_id().'">'.  ucfirst($estate->get_name()).', '.  ucfirst($estate->get_city()).','.  ucfirst($estate->get_state()).' </option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject"  />
                  <div class="validation"></div>
                </div>
                <div class="form-group">
                  <textarea class="form-control" name="message" rows="5" placeholder="Message"></textarea>
                  <div class="validation"></div>
                </div>
                  <div class="text-center"><button type="submit" name="message_btn">Send Message</button></div>
              </form>
            </div>
          </div>
          <!-- End Left contact -->
        </div>
      </div>
    </div>
  </div>
  <!-- End Contact Area -->
  
  



  
  
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
