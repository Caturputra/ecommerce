<?php
  /* Memanggil database */
  require '../config.php';

  /* Memanggil fungsi */
  require '../inc/function.php';

  //jika button insert berfungsi
  if (isset($_POST['frm_btn_forgot'])) {
    // deklarasi variabel insert
    $var_email = validateSecurity($_POST['frm_member_forgot']);

    if(empty($var_email)) {
      $var_message = "We need your email to reset your password.";
    } else {
      $var_sqlmail = "SELECT * FROM oc_customer WHERE customer_mail = '{$var_email}'";
      $var_querymail = mysqli_query($var_con, $var_sqlmail);
      $var_mail = mysqli_fetch_array($var_querymail);
      if ($var_mail['customer_mail'] == $var_email) {
        $var_new = randpass(7);
        $var_new_password .= "Your new password for ". $var_mail['customer_username'] . " is <u>" . $var_new . "</u> <a href=\"login.php\">Login Here!</a>";
        $var_u = array('customer_mail' => $var_email);
        $var_update = array(
          'customer_password' => $var_new
        );
        update($var_con, "oc_customer", $var_update, $var_u);
      } else {
        $var_message = "You must register before reset your password.";
      }
    }
  }
?>

<!-- halaman utama shopping activity -->

<?php include 'layout/header.php'; ?>

<?php include 'layout/main-header.php'; ?>

<!-- begin content -->
<!-- catg header banner section -->
  <section id="aa-catg-head-banner">
   <img src="../images/page-top.jpg" alt="product img">
   <div class="aa-catg-head-banner-area">
     <div class="container">
      <div class="aa-catg-head-banner-content">
        <h2>Password Reset</h2>
        <ol class="breadcrumb">
          <li><a href="../index.php">Home</a></li>
          <li class="active">Password Reset</li>
        </ol>
      </div>
     </div>
   </div>
  </section>
  <!-- / catg header banner section -->

  <section>
    <div class="container">
    <div class="col-sm-8 col-sm-push-2" style="margin: 20px 10px">
      <?php if ( !empty($var_message) ) : ?>
        <div class="alert alert-danger">
          <i class="fa fa-key fa-lg"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <strong><?= $var_message; ?></strong>
        </div>
      <?php endif; ?>

      <?php if ( !empty($var_new_password) ) : ?>
        <div class="alert alert-info">
          <i class="fa fa-key fa-lg"></i>
          <strong><?= $var_new_password; ?></strong>
        </div>
      <?php endif; ?>
    <form class="form-horizontal" action="" method="post">
      <h5 style="text-align:center; margin-bottom:40px;">Enter Your Email Address.</h5>
      <div class="form-group">
        <label for="frm_member_forgot" class="col-sm-3 control-label"><i class="fa fa-user fa-lg"></i>&nbsp;Email</label>
        <div class="col-sm-8">
          <input type="text" name="frm_member_forgot" id="frm_member_forgot" class="form-control" placeholder="Your email">
        </div>
      </div>
      <!-- /form-group forgot email -->

      <div class="form-group">
        <div class="col-sm-8 col-sm-push-3">
          <button type="submit" name="frm_btn_forgot" id="frm_btn_forgot" class="aa-browse-btn"><i class="fa fa-key"></i>&nbsp;Reset Password</button>
        </div>
      </div>
      <!-- /button forgot -->
    </form>
  </div>
  <!-- /col-sm-8 -->
  </div>
  </section>


  <!-- /end content -->

  <?php include 'layout/footer.php'; ?>
