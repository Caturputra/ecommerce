<?php
  session_start();

  $var_host = 'localhost';
  $var_user = 'root';
  $var_pass = 'caturputra';
  $var_name = 'opencartdb';

  $var_con = mysqli_connect($var_host, $var_user, $var_pass, $var_name);

  if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    die();
  }
?>
