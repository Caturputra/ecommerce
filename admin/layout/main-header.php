<!-- Main Header -->
<header class="main-header">

  <!-- Logo -->
  <a href="" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><b>OST</span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><b>Our</b>Store</span>
  </a>

  <!-- Header Navbar -->
  <nav class="navbar navbar-static-top" role="navigation">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
      <span class="sr-only">Toggle navigation</span>
    </a>
    <!-- Navbar Right Menu -->
    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <!-- Messages: style can be found in dropdown.less-->
        <li class="dropdown messages-menu">
          <!-- Menu toggle button -->
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-shopping-cart"></i>
            <!-- <span class="label label-success">4</span> -->
          </a>
          <ul class="dropdown-menu">
            <li class="header">Your Store</li>
            <li>
              <!-- inner menu: contains the messages -->
              <ul class="menu">
                <li><!-- start message -->
                  <a href="../index.php" target="_blank">
                    <!-- Message title and timestamp -->
                    <h4>
                      OurStore
                    </h4>
                    <!-- The message -->
                    <p>See your e-commerce Site</p>
                  </a>
                </li>
                <!-- end message -->
              </ul>
              <!-- /.menu -->
            </li>
          </ul>
        </li>
        <!-- /.messages-menu -->

        <!-- User Account Menu -->
        <li class="dropdown user user-menu">
          <!-- Menu Toggle Button -->
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <!-- The user image in the navbar-->
            <img src="../images/avatar5.png" class="user-image" alt="User Image">
            <!-- hidden-xs hides the username on small devices so only the image appears. -->
            <span class="hidden-xs">Hello, <?php /*Echo nama admin*/ if(isset($_SESSION['username'])) echo $_SESSION['username']; ?></span>
          </a>
          <ul class="dropdown-menu">
            <!-- The user image in the menu -->
            <li class="user-header">
              <img src="../images/avatar5.png" class="img-circle" alt="User Image">

              <p>
                <?php /*Echo nama admin*/ if(isset($_SESSION['username'])) echo $_SESSION['username']; ?>
              </p>
            </li>
            <!-- Menu Body -->
            <li class="user-body">
              <div class="row">
                <div class="col-xs-2 text-center">
                  <a href="#">Administrator</a>
                </div>
              </div>
              <!-- /.row -->
            </li>
            <!-- Menu Footer-->
            <li class="user-footer">
              <!-- <div class="pull-left">
                <a href="profile.php" class="btn btn-default btn-flat">Profile</a>
              </div> -->
              <div class="pull-right">
                <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
              </div>
            </li>
          </ul>
        </li>
        <!-- Control Sidebar Toggle Button -->
        <li>
          <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
        </li>
      </ul>
    </div>
  </nav>
</header>
