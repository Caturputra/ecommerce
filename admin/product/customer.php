<?php
  /* Memanggil database */
  require '../config.php';

  /* Fungsi add new customer melalu modal */
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
      $var_success = "Succes to add new customer.";
    }
  }

  /*  */
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Customer
      <small>
        <ol class="breadcrumb">
          <li><a href="?page=home"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Accounts</li>
        </ol>
      </small>
    </h1>

  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Your Page Content Here -->
  <div class="col-sm-12">
    <div class="box box-solid box-info">
      <div class="box-header with-border">
        <h3 class="box-title"><i class="fa fa-user fa-lg"></i> DETAIL USER CUSTOMER</h3>
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
            <i class="fa fa-minus"></i></button>
          <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
            <i class="fa fa-times"></i></button>
        </div>
        <!-- /.box-tools -->
      </div>
      <?php
        // untuk menampilkan user
        $var_userc = "SELECT * FROM oc_customer WHERE customer_status = 1 ";
        $var_query = mysqli_query($var_con, $var_userc);
        $var_count = "SELECT COUNT(*) as tot_customer FROM oc_customer WHERE customer_status = 1";
        $var_qcount = mysqli_query($var_con, $var_count);
        $var_datacount =mysqli_fetch_array($var_qcount);
      ?>
      <div class="panel-body">
        <span class="pull-right"><a href="#" class="btn btn-primary btn-xs btn-flat" data-toggle="modal" data-target="#newCustomerModal">Add New Customer</a></span><p>Total customer registered : <?= $var_datacount['tot_customer']; ?></p>
        <form class="" action="" method="post">
          <div class="table-responsive">
            <table id="detailCustomer" class="table table-bordered">
              <tr>
              <thead>
                <th>Username</th>
                <th>Namer</th>
                <th>Email</th>
                <th>Address</th>
                <th>Action</th><th></th><th></th>
              </thead>
            </tr>
              <tbody>
                <?php
                  while ($var_data = mysqli_fetch_array($var_query)) {
                ?>
                <tr>
                  <td class="text-left"><?= $var_data['customer_username'] ?></td>
                  <td class="text-left"><?= $var_data['customer_name'] ?></td>
                  <td class="text-left"><?= $var_data['customer_mail'] ?></td>
                  <td class="text-left"><?= $var_data['customer_address'] ?></td>
                  <td class="text-right" title="Edit Customer"><a href="" class="btn btn-primary"><i class="fa fa-edit"></i></a></td>
                  <td class="text-right" title="Delete Customer"><a href="" class="btn btn-primary"><i class="fa fa-trash"></i></a></td>
                  <td class="text-right" title="Validate Customer"><a href="" class="btn btn-primary"><i class="fa fa-check"></i></a></td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
        </form>
        <!-- /form manage account -->
      </div>
      <!-- /table-responsive -->
    </div>
    <!-- /panel-body -->
  </div>
  <!-- /panel panel-info detail user admin -->
</div>
<!-- /col info -->
  </section>
  <!-- /.content -->

  <!-- Modal add new customer -->
  <div class="modal fade" id="newCustomerModal" tabindex="-1" role="dialog" aria-labelledby="addCustomer">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="addCustomerLabel">Add Customer</h4>
        </div>
        <div class="modal-body">
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
          <!-- Form isian new customer -->
          <form action="" class="aa-login-form" method="post">
            <label for="frm_customer_name" class="control-label col-sm-2">Fullname<span>*</span></label>
            <div class="col-sm-10">
              <input type="text" class="form-control" placeholder="Username" id="frm_customer_name" name="frm_customer_name" required="required" value="<?php if(isset($_POST['frm_customer_name'])) echo $_POST['frm_customer_name'];?>">
            </div>
            <label for="frm_customer_email" class="control-label col-sm-2">Email<span>*</span></label>
            <div class="col-sm-10">
              <input type="email" class="form-control" class="form-control" placeholder="Your email" id="frm_customer_email" name="frm_customer_email" required="required" value="<?php if(isset($_POST['frm_customer_email'])) echo $_POST['frm_customer_email'];?>">
            </div>
            <label for="frm_customer_prov" class="control-label col-sm-2">Province<span>*</span></label>
            <div class="col-sm-10">
              <input type="text" class="form-control" placeholder="Your province" id="frm_customer_prov" name="frm_customer_prov" required="required" value="<?php if(isset($_POST['frm_customer_prov'])) echo $_POST['frm_customer_prov'];?>">
            </div>
            <label for="frm_customer_region" class="control-label col-sm-2">Region<span>*</span></label>
            <div class="col-sm-10">
              <input type="text" class="form-control" placeholder="Your region" id="frm_customer_region" name="frm_customer_region" required="required" value="<?php if(isset($_POST['frm_customer_region'])) echo $_POST['frm_customer_region'];?>">
            </div>
            <label for="frm_customer_postcode" class="control-label col-sm-2">Postcode<span>*</span></label>
            <div class="col-sm-10">
              <input type="text" class="form-control" placeholder="Your postcode" id="frm_customer_postcode" name="frm_customer_postcode" required="required" value="<?php if(isset($_POST['frm_customer_postcode'])) echo $_POST['frm_customer_postcode'];?>">
            </div>
            <label for="frm_customer_address" class="control-label col-sm-2">Address<span>*</span></label>
            <div class="col-sm-10">
              <textarea class="form-control" name="frm_customer_address" id="frm_customer_address" rows="4" cols="40" placeholder="Address" required="required"><?php if(isset($_POST['frm_customer_address'])) echo $_POST['frm_customer_address'];?></textarea>
            </div>
            <label for="frm_customer_phone" class="control-label col-sm-2">Phone<span>*</span></label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="frm_customer_phone" name="frm_customer_phone" placeholder="Phone" required="required" value="<?php if(isset($_POST['frm_customer_phone'])) echo $_POST['frm_customer_phone'];?>">
            </div>
            <label for="frm_customer_nation" class="control-label col-sm-2">Nation<span>*</span></label>
            <div class="col-sm-10">
              <select class="form-control" name="frm_customer_nation" id="frm_customer_nation" required="required">
                <option value="">None</option>
                <option value="1">Indonesia</option>
              </select>
            </div>
            <label for="frm_customer_username" class="control-label col-sm-2">Username<span>*</span></label>
            <div class="col-sm-10">
              <input type="text" class="form-control" placeholder="Username or email" id="frm_customer_username" name="frm_customer_username" required="required" value="<?php if(isset($_POST['frm_customer_username'])) echo $_POST['frm_customer_username'];?>">
            </div>
            <label for="frm_customer_password" class="control-label col-sm-2">Password<span>*</span></label>
            <div class="col-sm-10">
              <input type="password" class="form-control" placeholder="Password" id="frm_customer_password" name="frm_customer_password" required="required" value="<?php if(isset($_POST['frm_customer_password'])) echo $_POST['frm_customer_password'];?>">
            </div>
            <!-- /form isian new customer -->
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary btn-flat" name="frm_btn_register">Save changes</button>
        </div>
      </form> <!-- /end form new customer -->
      </div>
    </div>
  </div>
  <!--/modal add new customer  -->
</div>
<!-- /.content-wrapper -->
