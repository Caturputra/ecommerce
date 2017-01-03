<?php
  /* Memanggil fungsi untuk login dan register */
  include 'login_member_process.php';
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
                   <!--konfirmasi captcha  -->
                   <div class="g-recaptcha" data-sitekey="6Ld5fAwUAAAAAMfBqE7eQUU-9fMTfUU5wXWj5YKY"></div>
                   <!-- /.recaptcha google -->
                   <button type="submit" class="aa-browse-btn" name="frm_btn_register">Register</button>
                  </form>
                  <!-- /register -->
                </div>
                <!-- /.register -->
              </div>
              <!-- /.row col-md-6 register -->
            </div>
            <!-- /.row pembagian halaman -->
         </div>
         <!-- /.aa-myaccount-area -->
       </div>
       <!-- /.col-md-12 -->
     </div>
     <!--/.row account area  -->
   </div>
   <!-- /.container -->
 </section>
 <!-- /#account-page  -->

<!-- /end content -->

<?php include 'layout/footer.php'; ?>
