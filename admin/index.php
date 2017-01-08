<?php
  $var_title = "OurStore";
  // operasi php validateSecurity
  require '../config.php';
  require 'login_check.php';
  $var_username = $_SESSION['username'];

  if (empty($var_username)) {
    header('location: login.php');
  }
?>

<?php include 'layout/header.php'; ?>

<!-- konten dari halaman admin -->
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <!-- main header / navbar -->
  <?php include 'layout/main-header.php'; ?>


  <!-- side menu, left menu -->
  <?php include 'layout/aside.php'; ?>

    <!-- Your Page Content Here -->
    <?php
      $pages_dir = 'product';
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
<?php include 'layout/footer.php'; ?>
