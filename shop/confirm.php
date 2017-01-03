<?php
  require '../config.php';

  $confirm = $_GET['idUserReg'];
if (isset($confirm)) {
	$var_sql = "SELECT customer_username FROM oc_customer WHERE customer_username='{$confirm}'";
	$find = mysqli_query($var_con, $var_sql);

	if (mysqli_num_rows($find) > 0) {
		$update = "UPDATE oc_customer SET customer_status = '1' WHERE customer_username = '{$confirm}'";
		$set = mysqli_query($var_con, $update);
		if ($set) {
			echo "Konfirmasi sukses";
		}
	} else {
		echo "ID tidak dikenali";
	}
} else {
	echo "Nothing to do";
}
?>
