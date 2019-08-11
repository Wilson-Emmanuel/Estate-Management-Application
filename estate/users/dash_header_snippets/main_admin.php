
            <li class="list-main">
                <a data-toggle="collapse" href="#create" role="button"
                   aria-controls="create">
                <i class="fa fa-plus icon"></i>
                <span class="extra-sm">Create</span>
                </a>

                <ul id="create" class="collapse toggle-collapse">
                    
                    <li>
                        <a href="dashboard.php?tab=estate">
                            <i class="fa fa-industry icon"></i>
                            <span class="extra-sm break">Estate</span>
                        </a>
                    </li>
                    <li>
                        <a href="dashboard.php?tab=admin">
                            <i class="fa fa-user icon"></i>
                            <span class="extra-sm break">Admin</span>
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
                   aria-controls="more">
                <i class="fa fa-adjust icon"></i>
                <span class="extra-sm">Manage</span>
                </a>

                <ul id="manage" class="collapse toggle-collapse">
                    <li>
                        <a href="dashboard.php?tab=manage_estate">
                            <i class="fa fa-industry icon"></i>
                            <span class="extra-sm break">Estate</span>
                        </a>
                    </li>
                    <li>
                        <a href="dashboard.php?tab=manage_admin">
                            <i class="fa fa-user icon"></i>
                            <span class="extra-sm break">Admin</span>
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
                   $unread_msg = (new Message())->get_unread_messages_main();
                   if($unread_msg >0){
                       echo '<span class="badge badge-warning">'.$unread_msg.'
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
                <a href="dashboard.php?tab=levy">
                <i class="fa fa-credit-card-alt icon"></i>
                <span class="extra-sm">Levy   <?php
                    
                    $unconfirmed = (new Levy())->get_unconfirmed_count();
                    if($unconfirmed >0){
                        echo '<span class="badge badge-danger" title="'.$unconfirmed.' Unconfirmed Levies">'.$unconfirmed.'</span>';
                    }
                    ?></span>
                </a>
            </li>
           
             
         

