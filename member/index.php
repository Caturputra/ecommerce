<?php
  $var_title = "Member Dashboard";
  // operasi php validateSecurity
  // require '../config.php';
  // require 'login_check.php';
  // $var_username = $_SESSION['username'];
  //
  // if (empty($var_username)) {
  //   header('location: login.php');
  // }
?>

<?php include __DIR__ . '/../admin/layout/header.php'; ?>

<!-- konten dari halaman admin -->
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <!-- main header / navbar -->
  <?php include __DIR__ . '/../admin/layout/main-header.php'; ?>


  <!-- side menu, left menu -->
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="../images/avatar5.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>  <?php /*Echo nama admin*/ if(isset($_SESSION['username'])) echo $_SESSION['username']; ?></p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu">
        <li class="header">MENU NAVIGATION</li>
        <!-- Optionally, you can add icons to the links -->
        <li class="treeview <?php if(isset($_GET['page']) == "home") echo "active"; else ""; ?>">
          <a href="?page=home">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <!-- /.treeview -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Transaction</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="?page=cart"><i class="fa fa-circle-o"></i> Cart</a></li>
            <li><a href="?page=transaction"><i class="fa fa-circle-o"></i> Transaction</a></li>
          </ul>
        </li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>


    <!-- Your Page Content Here -->
    <?php
      $pages_dir = 'pages';
      if(!empty($_GET['page'])){
        $pages = scandir($pages_dir, 0);
        unset($pages[0], $pages[1]);

        $p = $_GET['page'];
        if(in_array($p.'.php', $pages)){
          include($pages_dir.'/'.$p.'.php');
        } else {
          include '404page.php';
        }
      } else {
        include($pages_dir.'/home.php');
      }
    ?>


  <!-- ./wrapper -->
<?php include __DIR__ . '/../admin/layout/footer.php'; ?>
