
      

<!--            <li class="list-main">
                <a href="dashboard.php?tab=rent">
                <i class="fa fa-money icon"></i>
                <span class="extra-sm">Rent Payment</span>
                </a>
            </li>-->
             <li class="list-main">
                <a href="dashboard.php?tab=bank_details">
                <i class="fa fa-bank icon"></i>
                <span class="extra-sm">Bank Details</span>
                </a>
            </li>
<!--            <li class="list-main">
                <a href="dashboard.php?tab=payment">
                <i class="fa fa-credit-card-alt icon"></i>
                <span class="extra-sm">Payments</span>
                </a>
            </li>-->

              <li class="list-main">
                <a data-toggle="collapse" href="#payment" role="button"
                   aria-controls="more">
                <i class="fa fa-credit-card-alt icon"></i>
                        <span class="extra-sm">Payments 
                   
                        </span>
                </a>

                <ul id="payment" class="collapse toggle-collapse">
                    <li>
                        <a href="dashboard.php?tab=new_payment">
                            <i class="fa fa-plus-square icon"></i>
                            <span class="extra-sm break">New Payment</span>
                        </a>
                    </li>
                    <li>
                        <a href="dashboard.php?tab=payments">
                            <i class="fa fa-money icon"></i>
                            <span class="extra-sm break">Payments</span>
                        </a>
                    </li>

                   
                </ul>
            </li>
            
              <li class="list-main">
                <a data-toggle="collapse" href="#message" role="button"
                   aria-controls="more">
                <i class="fa fa-envelope icon"></i>
                        <span class="extra-sm">Messages/Feedback 
                    <?php
                   $unread_msg = (new Message())->get_unread_messages(Occupant::TYPE,$_SESSION['id']);
                   if($unread_msg >0){
                       echo '<span class="badge badge-warning">'.$unread_msg.'
                    </span>';
                   }
                    ?>
                        </span>
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
            
            
           

