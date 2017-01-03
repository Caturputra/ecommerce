<?php
  /*
  ** Fungsi untuk validasi form input
  */
  function validateSecurity($var_data) {
    //$data = mysqli_escape_string($var_con, $var_data);
    $data = addslashes($var_data);
    $data = htmlentities($var_data);
    $data = strip_tags($var_data);
    $data = trim($var_data);
    return $data;
  }

  /*
  ** Fungsi untuk input data
  */
  function insert($connection, $tblname, array $val_cols){

		$keysString = implode(", ", array_keys($val_cols));

		// print key and value for the array
		$i=0;
		foreach($val_cols as $key=>$value) {
			$StValue[$i] = "'".$value."'";
		    $i++;
		}

		$StValues = implode(", ",$StValue);

		if (mysqli_connect_errno()) {
		  $var_message =  "Failed to connect to MySQL: " . mysqli_connect_error();
		}

		if(mysqli_query($connection,"INSERT INTO $tblname ($keysString) VALUES ($StValues)"))
		{
			$var_message =  "Successfully Inserted data<br>";
		}
		else{
			$var_message =  "Data not Inserted";
		}
	}

  /*
  ** Fungsi untuk update data
  */
  function update($connection, $tblname, array $set_val_cols, array $cod_val_cols){

		$i=0;
		foreach($set_val_cols as $key=>$value) {
			$set[$i] = $key." = '".$value."'";
		    $i++;
		}

		$Stset = implode(", ",$set);

		$i=0;
		foreach($cod_val_cols as $key=>$value) {
			$cod[$i] = $key." = '".$value."'";
		    $i++;
		}

		$Stcod = implode(" AND ",$cod);

		if(mysqli_query($connection,"UPDATE $tblname SET $Stset WHERE $Stcod")){
			if(mysqli_affected_rows($connection)){
				$var_message =  "Data updated successfully<br>";
			}
			else{
				$var_message =  "The data you want to updated is no loger exists<br>";
			}
		}
		else{
			$var_message =  "Error updating record: " . mysqli_error($conn);
		}
	}

  /*
  ** Fungsi untuk hapus data
  */
  function delete($connection, $tblname, array $val_cols){

    $i=0;
    foreach($val_cols as $key=>$value) {
        $exp[$i] = $key." = '".$value."'";
        $i++;
    }

    $Stexp = implode(" AND ",$exp);

    if(mysqli_query($connection,"DELETE FROM $tblname WHERE $Stexp")){
        if(mysqli_affected_rows($connection)){
            $var_message =  "Data has been deleted successfully<br>";
        }
        else{
            $var_message =  "The data you want to delete is no loger exists<br>";
        }
    }
    else{
        $var_message =  "Error deleting data: " . mysqli_error($connection);
    }
  }

  /*
  ** Fungsi untuk ambil data
  */
  function fetch($connection, $table, array $columns){
    $columns = implode(",",$columns);
    $result = mysqli_query($connection, "SELECT $columns FROM $table");

    if(mysqli_connect_errno())
    {
      $var_message =  "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    //return tow dimentional array as required columns result
    return mysqli_fetch_all($result,MYSQLI_ASSOC);
  }

  /*
  ** Fungsi untuk random string
  */
  function randpass($length){
    //    karakter yang bisa dipakai sebagai password
    $string = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
    $len = strlen($string);

    //    mengenerate password
    for($i=1;$i<=$length; $i++){
      $start = rand(0, $len);
      $pass .= substr($string, $start, 1);
    }

    return $pass;
  }

  /*
  ** Fungsi untuk mengirim email
  */
  function sendEmail($host, $port, $username, $password, $name, $idUser, $address, $nameAddr) {
    require __DIR__ . '/phpmailer/PHPMailerAutoload.php';

    //Create a new PHPMailer instance
    $mail = new PHPMailer;

    //Tell PHPMailer to use SMTP
    $mail->isSMTP();

    //Enable SMTP debugging
    // 0 = off (for production use)
    // 1 = client messages
    // 2 = client and server messages
    $mail->SMTPDebug = 0;

    //Ask for HTML-friendly debug output
    $mail->Debugoutput = 'html';

    //Set the hostname of the mail server
    $mail->Host = $host;
    // $mail->Host = gethostbyname('smtp.gmail.com');
    // if your network does not support SMTP over IPv6

    //Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
    $mail->Port = $port;

    //Set the encryption system to use - ssl (deprecated) or tls
    $mail->SMTPSecure = 'tls';

    //Whether to use SMTP authentication
    $mail->SMTPAuth = true;

    //Username to use for SMTP authentication - use full email address for gmail
    $mail->Username = $username;

    //Password to use for SMTP authentication
    $mail->Password = $password;

    //Set who the message is to be sent from
    $mail->setFrom($username, $name);

    //Set who the message is to be sent to
    $var_address = $address;
    $mail->addAddress($var_address, $nameAddr);

    //Set the subject line
    $mail->Subject = 'Account confirmation';

    //Read an HTML message body from an external file, convert referenced images to embedded,
    //convert HTML into a basic plain-text alternative body
    $body = <<<IOT
      <!DOCTYPE html>
      <html>
      <head>
      <meta charset="utf-8">
      <title>Email Confirmation</title>
      </head>
      <body>
      <p>
      Terima kasih telah menjadi Member OurStore Shop,<br>Silahkan lakukan
      konfirmasi member <a href="localhost/ecommerce/shop/confirm.php?idUserReg=$idUser">berikut</a>
      </p>
      </body>
      </html>
IOT;
    $mail->msgHTML($body);

    //Replace the plain text body with one created manually
    $altbody = <<<IOT
      Terima kasih telah menjadi Member OurStore Shop,<br>Silahkan lakukan
      konfirmasi member <a href="<?php $_SERVER[REMOTE_ADDR]; ?>?idUserReg=$idUser">berikut</a>
IOT;
    $mail->AltBody = $altbody;

    //send the message, check for errors
    if (!$mail->send()) {
      //echo "Mailer Error: " . $mail->ErrorInfo;
    } else {
      echo "Message sent!";
    }
  }
?>
