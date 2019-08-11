<?php
if(isset($_SESSION['staff-user']) && $_SESSION['staff-user'] !== ''){

   

}elseif(isset($_SESSION['admin-user']) && $_SESSION['admin-user'] !== ''){

    

}else{
    redirect_user("index.php");
}

?>
