<?php
include '../private/includes.php';
//import session material and other classes
//check session for a user before proceding
/*
    if(is_session_inplace("admin-user")){
        $page = "admin.php";
    }elseif (is_session_inplace("supervisor-user")) {
        $page = "dashboard.php?type=supervisor";
    }elseif(is_session_inplace("staff-user")){
        $page = "dashboard.php";
    }
*/
session_start();
///$_SESSION['tenant'] = true;
//$_SESSION['estate_admin'] = true;

if(!isset($_SESSION['estate_login'])){
    header("Location: ../index.php");
}
//////////////////////////////////////////
//VARIABLES USED IN THE POST FORMS
////////////////////////////////
$error ="";
$success ="";

//////////////////////////////////////////
//Custom clear/reset button
if(isset($_POST['reset'])){
  $_POST = array();
}


if(isset($_POST['post']) && $_POST['post'] !==''){
    include 'post_operations/main.php';
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
<title></title>
<meta name="author" content="Estate Manager">

<?php require_once('snippets/styles.php');?>

</head>

<body>
<!--     <div id="preloader"></div>-->

<?php
include_once("snippets/header.php");
?>
    <div class="row mt-4">
    <?php
 include_once("snippets/dash-header.php");
?>
   <div class='col-md-8 ml-md-3'>
   <div class='main-content'>

 
<?php
if(isset($_SESSION['estate_admin']) && $_SESSION['estate_admin']){
//if(true){//Estate admin
    
    include 'dashboard_snippets/estate_admin_dash.php';

   }elseif(isset($_SESSION['main_admin']) && $_SESSION['main_admin']){
       include 'dashboard_snippets/main_admin_dash.php';
       
  }elseif(isset($_SESSION['tenant']) && $_SESSION['tenant']){ 
   //if(true){
      include 'dashboard_snippets/tenant_dash.php';
}else{
    header("Location: index.php");
}


?>
   </div>
   </div>
    </div>
<?php
include_once("snippets/footer.php");
?>


       
<script>
    $(".details").click(function(){
        var id = this.id;

        $("#to-be-removed_" + id).fadeOut("slow",function(){

            $("#to-replace_" + id).fadeIn("slow");
        })
    })

    $(".back-btn").click(function(){
        var id = this.id;
        name = this.name;

        $("#to-" + id).fadeOut("slow",function(){
            $("#to-be-removed_" + name).fadeIn();
        });
    });
</script>

<?php
include 'snippets/scripts.php';
?>
</body>
</html>

