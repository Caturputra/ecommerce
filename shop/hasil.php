<?php require '../config.php'; ?>

<?php
  $var_id = $_GET['product_id'];
  $var_sql = "select * from product where product_id='{$var_id}'";
  $var_query = mysqli_query($var_sql);
  while($r=mysqli_fetch_array($var_queryl)){
?>
