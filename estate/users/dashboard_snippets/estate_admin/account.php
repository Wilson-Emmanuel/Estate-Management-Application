
        <?php
        $id = $_SESSION['id'];
        $admin = new EstateAdmin($id);
        ?>
<!--   // $staff = <<<STAFF-->
            <form  method="post">
                <input type="hidden" name="post" value="account">
                <table class="table table-hover table-lg table-responsive-sm w-100">
                    <thead class="estate_admin_color">
                    <th colspan="3" class="text-center"><h2>Estate Admin Details </h2></th>
                    </thead>
                    
                     <?php
               //$error ="";
              // $success = "Details has been updated!";
                 if(strlen(trim($error)) >0){
                     echo "<tr><td colspan='3'><div class='alert alert-danger alert-dismissible'>"
                    .$error."<span class='close' data-dismiss='alert'>"
                    . "&times;</span></div></td></tr>";
                 } 
                 
                 if(strlen(trim($success)) >0){
                     echo "<tr><td colspan='3'><div class='alert alert-success alert-dismissible'>"
                    .$success."<span class='close' data-dismiss='alert'>"
                    . "&times;</span></div></td></tr>";
                 } 
                ?>
                <tr>
                    <td><h6>Estate Name, City and State</h6></td>
                    <td><?=$admin->get_estate()->get_name().', '.$admin->get_estate()->get_city().', '.$admin->get_estate()->get_state(); ?></td>
                    <td>
                        <button class="btn text-sm" disabled>
                            <small>Cannot Change</small>
                        </button>
                    </td>
                </tr>

                <tr>
                    <td><h6>Fullname</h6></td>
                    <td><?=$admin->get_name(); ?></td>
                    <td>
                        <button class="btn text-sm" disabled>
                            <small>Cannot Change</small></button>
                    </td>
                </tr>

                <tr>
                    <td><h6>Email Address</h6></td>
                    <td><input class="form-control" type='email' id="email" name="email" value="<?=$admin->get_email(); ?>"></td>
                    
                    <td>
<!--                        <button class="btn text-sm" disabled><small>Cannot Change</small></button>-->
                        &nbsp;
                    </td>
                </tr>
                <tr>
                    <td><h6>Contact Address</h6></td>
                    <td><input type='text' class="form-control" id="address" name="address" value="<?=$admin->get_address(); ?>"></td>
                    
                    <td>
<!--                        <button class="btn text-sm" disabled><small>Cannot Change</small></button>-->
                        &nbsp;
                    </td>
                </tr>

<!--                 <tr>
                    <td><h6>Supervisor</h6></td>
                    <td>Supervisor here</td>
                    <td>
                        <button class="btn text-sm" disabled><small>Cannot Change</small></button>
                    </td>
                </tr>-->

                <tr>
                    <td><h6>Date Joined</h6></td>
                    <td><?=$admin->get_date(); ?></td>
                    <td>
                        <button class="btn text-sm" disabled><small>Cannot Change</small></button>
                    </td>
                </tr>
                <tr>
                    <td><h6>Phone Number</h6></td>
                    <td>
                    
                       
                        <input type='tel' class="form-control" id="phone" name="phone" value="<?=$admin->get_phone(); ?>">
                    
                    </td>
                    <td>
<!--                        <button class="btn btn-default" disabled>Disabled</button>-->
                   &nbsp;&nbsp;
                    </td>
                </tr>

               

                <tr>
                   <td><h6>New Password</h6></td>
                   <td>
                       <input type="password" name="password" value="<?=$admin->get_password(); ?>" class="form-control" id="password" placeholder="****">
                    <p class="text-red error-line1"></p>
                    </td>
                    <td>
<!--                        <button class="btn btn-default" disabled>Disabled</button>-->
&nbsp;                      &nbsp;
                    </td>
                </tr>
                <tr>
                   <td><h6>Confirm Password</h6></td>
                   <td>
                       <input type="password" name="confpassword"  class="form-control" value="<?=$admin->get_password(); ?>" id="conf-pass" placeholder="Retype Password">
                    <p class="text-red error-line2"></p>
                    </td>
                    <td>
<!--                        <button class="btn btn-default" disabled>Disabled</button>-->
&nbsp;&nbsp;
                    </td>
                </tr>
                <tr>
                    <td colspan="3"><button name="estate_admin_update" type="submit" class="btn estate_admin_color ">
                            <i class="fa fa-pencil-square fa-fw"></i> Update Details
                    </button>
                    </td>
                </tr>

              </table>
            </form>
<!--//STAFF;

    //echo $staff;-->


