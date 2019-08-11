<nav class="fixed-top navbar-expand-lg navbar-expand-xl navbar">

  <a class="navbar-brand mr-5" href="dashboard.php?tab=account"><i class="fa fa-industry text-green"></i> Estate Manager</a>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-toggle" aria-controls="navbar-toggle" aria-label="Toggle navigation">

    <span class="fa fa-bars"></span>

  </button>

  <div class="collapse navbar-collapse" id="navbar-toggle">

    <ul class="navbar-nav">
        <li>
           
            <h5 class="text-md text-info">
                <?=$_SESSION['name']; ?>
                <small><a href="dashboard.php?tab=account">(<?=$_SESSION['email'];?>)</a></small>
            </h5>
        </li>

            <li class="nav-item">
                <a class="nav-link" href="dashboard.php">
                <i class="fa fa-cog"></i> Dashboard</a>
            </li>

           

            <li class="nav-item">
                <a class="nav-link" href="dashboard.php?tab=account">
                <i class="fa fa-user-secret"></i> My Account</a>
            </li>

            <li class="nav-item">
                <a href="logout.php"  class="nav-link text-info">
                    <i class="fa fa-sign-out"></i>
                    Logout
                </a>
            </li>

        </ul>
    </div>
</nav>
    <hr>