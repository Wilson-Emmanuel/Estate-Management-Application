
    <div class="col-md-3 navigation">
        <h4 class="ml-3 hide-sm">
            <i class="fa fa-paw mr-2"></i>
            <span class="extra-sm">
                
                <?php
                    if(isset($_SESSION['estate_admin']) && $_SESSION['estate_admin']){
                        echo 'Estate Admin';
                      }elseif(isset($_SESSION['main_admin']) && $_SESSION['main_admin']){

                         echo 'Ministry Admin';

                      }elseif(isset($_SESSION['tenant']) && $_SESSION['tenant']){ 

                          echo 'Tenant';
                    }

                ?>
            
            </span>
        </h4>

        <ul class="main-nav">

             <li class="list-main">
                <a href="dashboard.php?tab=account">
                <i class="fa fa-user-circle icon"></i>
                <span class="extra-sm">My Account</span>
                </a>
            </li>

<?php
if(isset($_SESSION['estate_admin']) && $_SESSION['estate_admin']){
//if(true){//Estate admin
    
    include 'dash_header_snippets/estate_admin.php';

   }elseif(isset($_SESSION['main_admin']) && $_SESSION['main_admin']){
       include 'dash_header_snippets/main_admin.php';
  }elseif(isset($_SESSION['tenant']) && $_SESSION['tenant']){ 
      include 'dash_header_snippets/tenant.php';
}else{
    header("Location: index.php");
}
        ?>
        </ul>
    </div>

    
