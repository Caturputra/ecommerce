<?php
  /* Memanggil database */
  require '../config.php';

  /* Memanggil fungsi */
  require '../inc/function.php';

  //jika button insert berfungsi
  if (isset($_POST['frm_btn_member'])) {
    // deklarasi variabel insert
    $var_name = validateSecurity($_POST['frm_member_username']);
    $var_pass = validateSecurity($_POST['frm_member_password']);
    $var_init = true;

    //validasi name
    if (empty($var_name)) {
      $var_message = "We need your username or email.";
      $var_init = false;
    }

    if (strlen($var_name) > 50) {
      $var_message = "Your username invalid.";
      $var_init = false;
    }

    // validasi password
    if (empty($var_pass)) {
      $var_message = "We need your passoword";
      $var_init = "false";
    }

    if (!empty($var_name) and !empty($var_pass)) {
      if ($var_init = true) {
      $var_sqluser = "SELECT customer_username, customer_password, customer_mail FROM oc_customer WHERE customer_status = 1";
      $var_queryuser = mysqli_query($var_con, $var_sqluser);
      while ($var_datauser = mysqli_fetch_array($var_queryuser)) {
          if (($var_datauser['customer_mail'] == $var_name || $var_datauser['customer_username'] == $var_name) and $var_datauser['customer_password'] == $var_pass) {
            $_SESSION['customer'] = $var_name;
            echo "
              <div class=\"alert alert-info\">
                <i class=\"fa fa-key fa-lg\"></i><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>
                <strong>You have been loggin.</strong>
              </div>";

          } else if (($var_datauser['customer_mail'] != $var_name || $var_datauser['customer_username'] != $var_name) or $var_datauser['customer_password'] != $var_pass) {
            $var_message = "Your username or password invalid.";
          }
        }
      }
    }
  }
  /* end of login function */

  //jika button register berfungsi
  if (isset($_POST['frm_btn_register'])) {
    // deklarasi variabel insert
    $var_name = validateSecurity($_POST['frm_customer_name']);
    $var_email = validateSecurity($_POST['frm_customer_email']);
    $var_prov =  validateSecurity($_POST['frm_customer_prov']);
    $var_reg =  validateSecurity($_POST['frm_customer_region']);
    $var_postcode = validateSecurity($_POST['frm_customer_postcode']);
    $var_address = validateSecurity($_POST['frm_customer_address']);
    $var_phone = validateSecurity($_POST['frm_customer_phone']);
    $var_nation = validateSecurity($_POST['frm_customer_nation']);
    $var_username = validateSecurity($_POST['frm_customer_username']);
    $var_password = validateSecurity($_POST['frm_customer_password']);
    $var_date = date('Y:m:d h:i:s');
    $var_init = true;

    //validasi name
    if (empty($var_name)) {
      $var_messagep = "We need your fullname.";
      $var_init = false;
    } else

    if (strlen($var_name) > 50) {
      $var_messagep = "Your name is greater than 50 Char.";
      $var_init = false;
    } else

    // validasi email
    if (empty($var_email)) {
      $var_messagep = "We need your email.";
      $var_init = false;
    } else

    // validasi email preg_match

    // validasi prov
    if (empty($var_prov)) {
      $var_messagep = "We need your province.";
      $var_init = false;
    } else

    // validasi region
    if (empty($var_reg)) {
      $var_messagep = "We need your region.";
      $var_init = false;
    } else

    // validasi postcode
    if (empty($var_postcode)) {
      $var_messagep = "We need your postcode.";
      $var_init = false;
    } else

    if (!is_numeric($var_postcode)) {
      $var_messagep = "Your postcode is not number.";
      $var_init = false;
    } else

    if (strlen($var_postcode) < 5) {
      $var_messagep = "Postcode must be more than 5.";
      $var_init = false;
    } else

    // validasi address
    if (empty($var_address)) {
      $var_messagep = "We need your address.";
      $var_init = false;
    } else

    if (strlen($var_address) > 250) {
      $var_messagep = "Address must be less than 250 Char.";
      $var_init = false;
    } else

    // validasi phone
    if (empty($var_phone)) {
      $var_messagep = "We need your phone.";
      $var_init = false;
    } else

    if (strlen($var_phone) < 13 && strlen($var_phone) > 14) {
      $var_messagep = "Phone must be more than 12 Digits and maximum 14 digit";
      $var_init = false;
    } else

    if (!is_numeric($var_phone)) {
      $var_messagep = "Phone must be numeric.";
      $var_init = false;
    } else

    //validasi nation
    if (empty($var_nation)) {
      $var_messagep = "We need your nation.";
      $var_init = false;
    } else

    // valisai username
    if (empty($var_username)) {
      $var_messagep = "We need your username.";
      $var_init = false;
    } else

    if (strlen($var_username) < 7) {
      $var_messagep = "Username need 6 minimum char.";
      $var_init = false;
    } else

    if (strlen($var_username) > 32) {
      $var_messagep = "Username's maximum is 32 char.";
      $var_init = false;
    } else

    //validasi password
    if (empty($var_password)) {
      $var_messagep = "We need your password.";
      $var_init = false;
    } else

    if (strlen($var_password) < 6) {
      $var_messagep = "Password need 6 minimum char.";
      $var_init = false;
    } else

    if (strlen($var_password) > 32) {
      $var_messagep = "Password's maximum is 32 char.";
      $var_init = false;
    } else

    if ($var_init == true) {
      $var_dataregister = array(
        'customer_name' => $var_name,
        'customer_mail' => $var_email,
        'customer_address' => $var_address,
        'customer_region' => $var_reg,
        'customer_province' => $var_prov,
        'customer_pos' => $var_postcode,
        'customer_nation' => $var_nation,
        'customer_telp' => $var_phone,
        'customer_status' => 1,
        'customer_added' => $var_date,
        'customer_username' => $var_username,
        'customer_password' => $var_password
      );
      insert($var_con, "oc_customer", $var_dataregister);
      $var_success = "Your member registration is created. Go to your cart". "<small><a href=\"detail_cart.php\"></small>";
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
        <h2>Account Page</h2>
        <ol class="breadcrumb">
          <li><a href="../index.php">Home</a></li>
          <li class="active">Customer login</li>
        </ol>
      </div>
     </div>
   </div>
  </section>
  <!-- / catg header banner section -->

  <!-- Cart view section -->
 <section id="aa-myaccount">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
        <div class="aa-myaccount-area">
            <div class="row">
              <div class="col-md-6">
                <div class="aa-myaccount-login">
                <h4>Login</h4>
                <!--pesan eror  -->
                <?php if ( isset($var_message) ) : ?>
                  <div class="alert alert-danger">
                    <i class="fa fa-key fa-lg"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong><?= $var_message; ?></strong>
                  </div>
                <?php endif; ?>
                <!-- /pesan error -->

                <!-- pesan success -->
                <?php if ( !empty($var_messagelogin) ) :  ?>
                  <div class="alert alert-info">
                    <i class="fa fa-key fa-lg"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong><?= $var_messagelogin; ?></strong>
                  </div>
                <?php  endif; ?>
                <!-- pesan success -->
                 <form action="" class="aa-login-form" method="post">
                  <label for="frm_member_username">Username or Email address<span>*</span></label>
                   <input type="text" placeholder="Username or email" name="frm_member_username" id="frm_member_username" required="required">
                   <label for="frm_member_password">Password<span>*</span></label>
                    <input type="password" placeholder="Password" name="frm_member_password" id="frm_member_password" required="required">
                    <button type="submit" class="aa-browse-btn" name="frm_btn_member">Login</button>
                    <p class="aa-lost-password"><a href="forgot_password.php">Lost your password?</a></p>
                  </form>
                </div>
              </div>
              <!-- /login -->
              <div class="col-md-6">
                <div class="aa-myaccount-register">
                 <h4>Register</h4>
                 <!--pesan eror  -->
                 <?php if ( !empty($var_messagep) ) : ?>
                   <div class="alert alert-danger">
                     <i class="fa fa-key fa-lg"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                     <strong><?= $var_messagep; ?></strong>
                   </div>
                 <?php endif; ?>
                 <!-- /pesan error -->

                 <!-- pesan success -->
                <?php if ( !empty($var_success) ) : ?>
                  <div class="alert alert-info" role="alert">
                    <i class="fa fa-tags fa-lg"></i>
                    <strong><?php echo "Your account created. login to your account. <a href=\"login_member.php\">Here>></a>" ?></strong>
                  </div>
                <?php endif; ?>
                 <!-- /pesan success -->
                 <form action="" class="aa-login-form" method="post">
                   <label for="frm_customer_name">Fullname<span>*</span></label>
                   <input type="text" placeholder="Username" id="frm_customer_name" name="frm_customer_name" required="required" value="<?php if(isset($_POST['frm_customer_name'])) echo $_POST['frm_customer_name'];?>">

                   <label for="frm_customer_email">Email<span>*</span></label>
                   <input type="email" class="form-control" placeholder="Your email" id="frm_customer_email" name="frm_customer_email" required="required" value="<?php if(isset($_POST['frm_customer_email'])) echo $_POST['frm_customer_email'];?>">

                   <label for="frm_customer_prov">Province<span>*</span></label>
                   <input type="text" placeholder="Your province" id="frm_customer_prov" name="frm_customer_prov" required="required" value="<?php if(isset($_POST['frm_customer_prov'])) echo $_POST['frm_customer_prov'];?>">

                   <label for="frm_customer_region">Region<span>*</span></label>
                   <input type="text" placeholder="Your region" id="frm_customer_region" name="frm_customer_region" required="required" value="<?php if(isset($_POST['frm_customer_region'])) echo $_POST['frm_customer_region'];?>">

                   <label for="frm_customer_postcode">Postcode<span>*</span></label>
                   <input type="text" placeholder="Your postcode" id="frm_customer_postcode" name="frm_customer_postcode" required="required" value="<?php if(isset($_POST['frm_customer_postcode'])) echo $_POST['frm_customer_postcode'];?>">

                   <label for="frm_customer_address">Address<span>*</span></label>
                   <textarea class="form-control" name="frm_customer_address" id="frm_customer_address" rows="4" cols="40" placeholder="Address" required="required"><?php if(isset($_POST['frm_customer_address'])) echo $_POST['frm_customer_address'];?></textarea>

                   <label for="frm_customer_phone">Phone<span>*</span></label>
                   <input type="text" id="frm_customer_phone" name="frm_customer_phone" placeholder="Phone" required="required" value="<?php if(isset($_POST['frm_customer_phone'])) echo $_POST['frm_customer_phone'];?>">

                   <label for="frm_customer_nation">Nation<span>*</span></label>
                   <select class="form-control" name="frm_customer_nation" id="frm_customer_nation" required="required">
                     <option value="">None</option>
                     <option value="1">Indonesia</option>
                   </select>

                   <label for="frm_customer_username">Username<span>*</span></label>
                   <input type="text" placeholder="Username or email" id="frm_customer_username" name="frm_customer_username" required="required" value="<?php if(isset($_POST['frm_customer_username'])) echo $_POST['frm_customer_username'];?>">

                   <label for="frm_customer_password">Password<span>*</span></label>
                   <input type="password" placeholder="Password" id="frm_customer_password" name="frm_customer_password" required="required" value="<?php if(isset($_POST['frm_customer_password'])) echo $_POST['frm_customer_password'];?>">
                    <button type="submit" class="aa-browse-btn" name="frm_btn_register">Register</button>
                  </form>
                </div>
              </div>
            </div>
         </div>
       </div>
     </div>
   </div>
 </section>
 <!-- / Cart view section -->

<!-- /end content -->

<?php include 'layout/footer.php'; ?>
