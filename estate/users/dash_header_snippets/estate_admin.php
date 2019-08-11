
            <li class="list-main">
                <a data-toggle="collapse" href="#create" role="button"
                   aria-controls="create">
                <i class="fa fa-plus icon"></i>
                <span class="extra-sm">Create</span>
                </a>

                <ul id="create" class="collapse toggle-collapse">
                    <li>
                        <a href="dashboard.php?tab=building">
                            <i class="fa fa-building icon"></i>
                            <span class="extra-sm break">Building</span>
                        </a>
                    </li>

                   
                    <li>
                        <a href="dashboard.php?tab=tenant">
                            <i class="fa fa-user icon"></i>
                            <span class="extra-sm break">Tenant</span>
                        </a>
                    </li>
                    <li>
                        <a href="dashboard.php?tab=owner">
                            <i class="fa fa-user icon"></i>
                            <span class="extra-sm break">Building Owner</span>
                        </a>
                    </li>
                    <li>
                        <a href="dashboard.php?tab=bank">
                            <i class="fa fa-bank icon"></i>
                            <span class="extra-sm break">Bank</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="list-main">
                <a data-toggle="collapse" href="#manage" role="button"
                   aria-controls="manage">
                <i class="fa fa-adjust icon"></i>
                <span class="extra-sm">Manage</span>
                </a>

                <ul id="manage" class="collapse toggle-collapse">
                    <li>
                        <a href="dashboard.php?tab=manage_building">
                            <i class="fa fa-building-o icon"></i>
                            <span class="extra-sm break">Building</span>
                        </a>
                    </li>

                   
                    <li>
                        <a href="dashboard.php?tab=manage_tenant">
                            <i class="fa fa-users icon"></i>
                            <span class="extra-sm break">Tenant</span>
                        </a>
                    </li>
                    <li>
                        <a href="dashboard.php?tab=manage_owner">
                            <i class="fa fa-users icon"></i>
                            <span class="extra-sm break">Building Owner</span>
                        </a>
                    </li>
                    <li>
                        <a href="dashboard.php?tab=manage_bank">
                            <i class="fa fa-bank icon"></i>
                            <span class="extra-sm break">Bank</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="list-main">
                <a data-toggle="collapse" href="#images" role="button"
                   aria-controls="images">
                <i class="fa fa-image icon"></i>
                <span class="extra-sm">Images</span>
                </a>

                <ul id="images" class="collapse toggle-collapse">
                    <li>
                        <a href="dashboard.php?tab=image_create">
                            <i class="fa fa-plus icon"></i>
                            <span class="extra-sm break">Create</span>
                        </a>
                    </li>

                    <li>
                        <a href="dashboard.php?tab=image_manage">
                            <i class="fa fa-pencil icon"></i>
                            <span class="extra-sm break">Manage</span>
                        </a>
                    </li>
                   
                </ul>
            </li>
<!--            <li class="list-main">
                <a href="dashboard.php?tab=delete">
                <i class="fa fa-trash-o icon"></i>
                <span class="extra-sm">Delete</span>
                </a>
            </li>-->

            <li class="list-main">
                <a data-toggle="collapse" href="#message" role="button"
                   aria-controls="more">
                <i class="fa fa-envelope icon"></i>
                        <span class="extra-sm">Messages/Feedback  <?php
                    $unread_msg = (new Message())->get_unread_messages(EstateAdmin::TYPE,$_SESSION['id']);
                   if($unread_msg >0){
                       echo '<span class="badge badge-warning" title="'.$unread_msg.' Unread Message">'.$unread_msg.'
                    </span>';
                   }
                    ?></span>
                </a>

                <ul id="message" class="collapse toggle-collapse">
                    <li>
                        <a href="dashboard.php?tab=inbox">
                            <i class="fa fa-inbox icon"></i>
                            <span class="extra-sm break">Inbox</span>
                        </a>
                    </li>
                    <li>
                        <a href="dashboard.php?tab=sent">
                            <i class="fa fa-send icon"></i>
                            <span class="extra-sm break">Sent</span>
                        </a>
                    </li>

                    <li>
                        <a href="dashboard.php?tab=compose">
                            <i class="fa fa-plus-square icon"></i>
                            <span class="extra-sm break">Compose</span>
                        </a>
                    </li>
                </ul>
            </li>
            
           
                    <li class="list-main">
                <a data-toggle="collapse" href="#levy" role="button"
                   aria-controls="levy">
                <i class="fa fa-credit-card icon"></i>
                <span class="extra-sm">Levy</span>
                </a>

                <ul id="levy" class="collapse toggle-collapse">
                    <li>
                        <a href="dashboard.php?tab=new_levy">
                            <i class="fa fa-plus-square icon"></i>
                            <span class="extra-sm break">New Levy</span>
                        </a>
                    </li>

                    <li>
                        <a href="dashboard.php?tab=levies">
                            <i class="fa fa-money icon"></i>
                            <span class="extra-sm break">Levies</span>
                        </a>
                    </li>
                   
                </ul>
            </li>
            <li class="list-main">
                <a href="dashboard.php?tab=bank_details">
                <i class="fa fa-bank icon"></i>
                <span class="extra-sm">Bank Details</span>
                </a>
            </li>
            
              <li class="list-main">
                <a href="dashboard.php?tab=payment">
                <i class="fa fa-money icon"></i>
                        <span class="extra-sm">Payments 
                    <?php
                    $estate_id = (new EstateAdmin($_SESSION['id']))->get_estate_id();
                    $unconfirmed = (new Payment())->get_estate_unconfirmed($estate_id);
                    if($unconfirmed >0){
                        echo '<span class="badge badge-danger" title="'.$unconfirmed.' Unconfirmed payments">'.$unconfirmed.'</span>';
                    }
                    ?>
                 </span>
                </a>
            </li>
         

