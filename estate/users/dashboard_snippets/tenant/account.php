
        <?php
        $id = $_SESSION['id'];
        $occupant = new Occupant($id);
        ?>
<!--   // $staff = <<<STAFF-->
            <form  method="post">
                <input type="hidden" name="post" value="account">
                <table class="table table-hover table-lg table-responsive-sm w-100">
                    <thead class="tenant_color">
                    <th colspan="3" class="text-center"><h2>Occupant Details </h2></th>
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
                    <td><h6>No. of Flats</h6></td>
                    <td><?=$occupant->get_flats(); ?></td>
                    <td>
                        <button class="btn text-sm" disabled>
                            <small>Cannot Change</small>
                        </button>
                    </td>
                </tr>
                <tr>
                    <td><h6>Flat Description</h6></td>
                    <td><?=$occupant->get_building()->get_flat_description(); ?></td>
                    <td>
                        <button class="btn text-sm" disabled>
                            <small>Cannot Change</small>
                        </button>
                    </td>
                </tr>
                <tr>
                    <td><h6>Estate and Location</h6></td>
                    <td><?php
                     $estate = $occupant->get_building()->get_estate(); 
                     echo $estate->get_name()." (".$estate->get_address().', '.$estate->get_city().', '.$estate->get_state().')';
                    ?></td>
                    <td>
                        <button class="btn text-sm" disabled>
                            <small>Cannot Change</small>
                        </button>
                    </td>
                </tr>
                <tr>
                    <td><h6>Building and Location</h6></td>
                    <td><?php
                     $building = $occupant->get_building(); 
                     echo $building->get_name()." (".$building->get_location().',)';
                     ?></td>
                    <td>
                        <button class="btn text-sm" disabled>
                            <small>Cannot Change</small>
                        </button>
                    </td>
                </tr>

                <tr>
                    <td><h6>Occupant Name</h6></td>
                    <td><?=$occupant->get_name(); ?></td>
                    <td>
                        <button class="btn text-sm" disabled>
                            <small>Cannot Change</small></button>
                    </td>
                </tr>

                <tr>
                    <td><h6>Email Address</h6></td>
                    <td><input class="form-control" type='email' id="email" name="email" value="<?=$occupant->get_email(); ?>"></td>
                    
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
                    <td><?=$occupant->get_date(); ?></td>
                    <td>
                        <button class="btn text-sm" disabled><small>Cannot Change</small></button>
                    </td>
                </tr>
              <!--  <tr>
                    <td><h6>Occupant Status</h6></td>
                    <td><?php
                  /*  if($occupant->get_status()){ 
                        echo 'Currently Occupying';
                    }else{
                        echo 'Packed out';
                    }
                        ?></td>
                    <td>
                        <?php
                        if($occupant->get_status()){
                            echo '<button class="btn  btn-success form-control" ><small><i class="fa fa-check-square "></i></small></button>';
                        }else{
                            echo '<button class="btn btn-danger form-control" ><small><i class="fa fa-remove "></i></small></button>';
                        }
                   * 
                   */
                        ?>
                    </td>
                </tr>
                <tr>
                    <td><h6>Payment Status</h6></td>
                    <td><?php
                 /*   if($occupant->get_payment_status()){ 
                        echo 'Paid';
                    }else{
                        echo 'Owing';
                    }
                        ?></td>
                    <td>
                        <?php
                        if($occupant->get_payment_status()){
                            echo '<button class="btn  btn-success form-control" ><small><i class="fa fa-check-square "></i></small></button>';
                        }else{
                            echo '<button class="btn  btn-danger form-control" ><small><i class="fa fa-remove "></i></small></button>';
                        }
                  * 
                  */
                        ?>
                    </td>
                </tr>
                <tr>
                    <td><h6>Last Payment Info</h6></td>
                    <td><?php
                       // echo $occupant->get_last_payment_info();
                        ?></td>
                    <td><button class="btn btn-default" disabled>Disabled</button>
                    </td>
                </tr>
                <tr>
                    <td><h6>Next Payment Info Payment Info</h6></td>
                    <td><?php
                        //echo $occupant->get_next_payment_info();
                        ?></td>
                    <td><button class="btn btn-default" disabled>Disabled</button>
                    </td>
                </tr> -->
                <tr>
                    <td><h6>Phone Number</h6></td>
                    <td>
                    
                       
                        <input type='tel' class="form-control" id="phone" name="phone" value="<?=$occupant->get_phone(); ?>">
                    
                    </td>
                    <td>
<!--                        <button class="btn btn-default" disabled>Disabled</button>-->
                   &nbsp;&nbsp;
                    </td>
                </tr>

               

                <tr>
                   <td><h6>New Password</h6></td>
                   <td>
                       <input type="password" name="password" value="<?=$occupant->get_password(); ?>" class="form-control" id="password" placeholder="****">
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
                       <input type="password" name="confpassword"  class="form-control" value="<?=$occupant->get_password(); ?>" id="conf-pass" placeholder="Retype Password">
                    <p class="text-red error-line2"></p>
                    </td>
                    <td>
<!--                        <button class="btn btn-default" disabled>Disabled</button>-->
&nbsp;&nbsp;
                    </td>
                </tr>
                <tr>
                    <td colspan="3"><button name="tenant_update" type="submit" class="btn tenant_color"><i class="fa fa-pencil-square fa-fw"></i>
                    Update Details
                    </button>
                    </td>
                </div>

              </table>
            </form>
<!--//STAFF;

    //echo $staff;-->


