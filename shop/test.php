<?php
  /* Memanggil database*/
  require '../config.php';

  // validasi untuk detail produk harus sudah ada pilihan
  // if (!isset($_SESSION['items'])) {
  //   header('location: index.php');
  // }

  if($_POST['product_id']) {
    $id = $_POST['product_id']; //escape string
    $var_sqlimg = "SELECT distinct * FROM oc_product_image i JOIN oc_product p on p.product_id = i.product_id JOIN oc_product_desc d on d.product_id = i.product_id WHERE i.product_id = '{$id}' GROUP by i.product_id";
    $var_queryimg = mysqli_query($var_con, $var_sqlimg);
    $var_data = mysqli_fetch_array($var_queryimg);
    echo $var_data['product_id'];
 }
?>

<!-- halaman utama shopping activity -->

<?php include 'layout/header.php'; ?>

<?php include 'layout/main-header.php'; ?>

<!-- begin content -->
  <!-- product category -->
      <div class="container">
        <?php
          require '../inc/function.php';
          // function sendEmail($host, $port, $username, $password, $name, $idUser, $address, $nameAddr) {
          $var_host = "mail.caturputra.dev.php.or.id";
          $var_port = 587;
          $var_username = "info@caturputra.dev.php.or.id";
          $var_password = "batangkauman00";
          $var_name = "OurStore";
          $var_idUser = session_id();
          $var_address = isset($_POST['name']) ? $_POST['name'] : "";
          $var_nameAddr = "Test";
          sendEmail($var_host, $var_port, $var_username, $var_password, $var_name, $var_idUser, $var_address, $var_nameAddr);
        ?>
        <br>
        <form class="" action="" method="post">
          <input type="text" name="name" value="">
          <input type="submit" name="submit" value="Submit">
        </form>
      </div>
     <!-- .container -->
   </section>
   <!-- / product category -->

    <script type="text/javascript">
    $(document).ready(function(){
  $('#quick-view-modal').on('show.bs.modal', function (e) {
      var rowid = $(e.relatedTarget).data('id');
      $.ajax({
          type : 'post',
          url : 'index.php', //Here you will fetch records
          data :  'rowid='+ product_id, //Pass $id
          success : function(data){
          $('.fetched-data').html(data);//Show fetched data from database
          }
      });
   });
});
    </script>

<!-- /end content -->

<?php include 'layout/footer.php'; ?>
