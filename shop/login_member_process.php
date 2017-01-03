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
  $var_captcha = isset($_POST['g-recaptcha-response']) ? $_POST['g-recaptcha-response']:'';
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
    /* Validasi config recaptcha */
    $var_url = "https://www.google.com/recaptcha/api/siteverify";
    $var_secret = "6Ld5fAwUAAAAAEXO6B5KieoVIrHX8swLu2OJDISR";
    $var_response = file_get_contents($var_url . '?secret=' . urlencode($var_secret) . '&response=' . $var_captcha . '&remoteip=' . $_SERVER['REMOTE_ADDR']);
    $var_data = json_decode($var_response);
    if ($var_data->success == true) {
      $var_dataregister = array(
        'customer_name' => $var_name,
        'customer_mail' => $var_email,
        'customer_address' => $var_address,
        'customer_region' => $var_reg,
        'customer_province' => $var_prov,
        'customer_pos' => $var_postcode,
        'customer_nation' => $var_nation,
        'customer_telp' => $var_phone,
        'customer_status' => 0,
        'customer_added' => $var_date,
        'customer_username' => $var_username,
        'customer_password' => $var_password
      );
      insert($var_con, "oc_customer", $var_dataregister);
        $var_success = "Your member registration is created. See Your email to confirm your account.";
        /* Kirim email konfirmasi*/
        $var_host = "mail.caturputra.dev.php.or.id";
        $var_port = 587;
        $var_emailusername = "info@caturputra.dev.php.or.id";
        $var_emailpassword = "batangkauman00";
        $var_emailname = "OurStore";
        $var_idUser = $var_username;
        $var_emailaddress = $var_email;
        $var_nameAddr = $var_name;
        sendEmail($var_host, $var_port, $var_emailusername, $var_emailpassword, $var_emailname, $var_idUser, $var_emailaddress, $var_nameAddr);

    } else {
      $var_messagep = "Confirm that your are <strong>Human</strong>.";
    }
  }
}
?>
