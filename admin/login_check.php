<?php
  // memanggil database dan fungsi
  require '../config.php';
  require '../inc/function.php';

  if (isset($_POST['btn_login'])) {
    $var_username = validateSecurity($_POST['frm_username']);
    $var_password = validateSecurity($_POST['frm_password']);
    $var_message = '';
    $var_init = true;

    if(empty($var_username)) {
      $var_message = 'Username cannot blank!';
      $var_init = false;
    }

    if(empty($var_password)) {
      $var_init = false;
      $var_message = 'Password cannot blank!';
    }

    if(empty($var_username) && empty($var_password)) {
      $var_message = 'Both of username and password empty!';
    }

    if ($var_init = true) {
      if(!empty($var_password) && !empty($var_username)) {
        $var_sqllogin = "SELECT *  FROM oc_user WHERE username = '$var_username' and password = '$var_password'";
        $var_querylogin = mysqli_query($var_con, $var_sqllogin) or die("Error: ".mysqli_error($var_con));;
        $var_data = mysqli_fetch_array($var_querylogin);
        $var_status = 0;

        if (($var_username == $var_data['username']) && ($var_password == $var_data['password'])) {
          $_SESSION['username'] = $var_username;
          $_SESSION['level'] = $var_status;
          header('location: index.php?page=home');
        } else if ($var_username !== $var_data['username'] || $var_password !== $var_data['password']) {
          $var_message = 'Check your username and password';
        }

      }
    }
  }
?>
