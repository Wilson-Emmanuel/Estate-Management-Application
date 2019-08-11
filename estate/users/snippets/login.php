<?php

$error_message = "";
if(isset($_POST['user']) && isset($_POST['login'])){
    $user = trim($_POST['user']);
    if($user ==="none"){
        $error_message ="Select user.";
    }else{
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
        
        
        $row = array();
        if($user === "main"){
            $row = DB::queryFirstRow('SELECT * FROM main_admin WHERE email=%s AND password=%s',$username,$password);
        }elseif($user ==="estate"){
            $row = DB::queryFirstRow('SELECT * FROM estate_admin WHERE email=%s AND password=%s',$username,$password);
            
        }elseif ($user ==="occupant") {
            $row = DB::queryFirstRow('SELECT * FROM occupant WHERE email=%s AND password=%s',$username,$password);
            
        }
       
         $error_message = count($row);       
        
        if(count($row) <1){
            $error_message = "Wrong username and/or password";
        }else{
           $error_message ="up to this point";
           session_start();
           $_SESSION = array();
            if($user ==="main"){
                $_SESSION['main_admin'] = true;
            }elseif($user ==="estate"){
                $_SESSION['estate_admin'] = true;
            }elseif($user ==="occupant"){
                $_SESSION['tenant'] = TRUE;
            }
            $_SESSION['id'] = (int)$row['id'];
            $_SESSION['name'] = ucwords($row['name']);
            $_SESSION['email'] =$row['email'];
            $_SESSION['estate_login'] = true;
           header("Location: dashboard.php");
           exit(); 
        }
        
        
    }
}

?>
 <div class='splash-img'>
    <div class="container login">
    <h1 class="hide">Login</h1>

    <div class="row">

        <div class="col-md-4 col-lg-4 col-xl-4 mx-auto">
            <h3 class="text-center form-head"><a href="../index.php"><i class="fa fa-home"></i></a> Login</h3>

            <div class="card login">
                <?php
               
                 if(strlen(trim($error_message)) >0){
                     echo "<div class='alert alert-success alert-dismissible'>"
                    .$error_message."<span class='close' data-dismiss='alert'>"
                    . "&times;</span></div>";
                 } 
                ?>

                
 
                
            <form  method="post" id="">
                
                <select name="user" id="user" class="form-control">
                    <option value="none">Select...</option>
                    <option value="main">Main</option>
                    <option value="estate">Estate</option>
                    <option value="occupant">Occupant</option>
                </select>
                <br>
    
                <label class="text-black" for="staff_user">Email</label><br>
                <input type="text" required name="username" maxlength="50" class="input-text" id="username"><br>
                       
                <label class="text-black" for="password">Password</label><br>
                <input type="password" required name="password" maxlength="20" class="input-text" id="password">
 
                <button name="login" class="btn btn-yellow" type="submit">Login</button>
                <br>
               
                <small class='ml-2'>
                    <a href="../index.php" class='text-sm'>Home</a>
                </small>
            </form>
            
        </div>
</div>
    </div>
    </div>
 </div>