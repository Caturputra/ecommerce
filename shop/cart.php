<?php
  require '../config.php';

  if (!isset($_SESSION)) {
      session_start();
  }

  if (isset($_GET['act']) && isset($_GET['ref'])) {
      $act = $_GET['act'];
      $ref = $_GET['ref'];

      if ($act == "add") {
          if (isset($_GET['product_id'])) {
              $product_id = $_GET['product_id'];
              if (isset($_SESSION['items'][$product_id])) {
                  $_SESSION['items'][$product_id] += 1;
              } else {
                  $_SESSION['items'][$product_id] = 1;
              }
          }
      } elseif ($act == "plus") {
          if (isset($_GET['product_id'])) {
              $product_id = $_GET['product_id'];
              if (isset($_SESSION['items'][$product_id])) {
                  $_SESSION['items'][$product_id] += 1;
              }
          }
      } elseif ($act == "min") {
          if (isset($_GET['product_id'])) {
              $product_id = $_GET['product_id'];
              if (isset($_SESSION['items'][$product_id])) {
                  $_SESSION['items'][$product_id] -= 1;
              }
          }
      } elseif ($act == "del") {
          if (isset($_GET['product_id'])) {
              $product_id = $_GET['product_id'];
              if (isset($_SESSION['items'][$product_id])) {
                  unset($_SESSION['items'][$product_id]);
              }
          }
      } elseif ($act == "clear") {
          if (isset($_SESSION['items'])) {
              foreach ($_SESSION['items'] as $key => $val) {
                  unset($_SESSION['items'][$key]);
              }
              unset($_SESSION['items']);
          }
      }

      header ("location:" . $ref);
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
        <h2>Cart</h2>
        <ol class="breadcrumb">
          <li><a href="../index.php">Home</a></li>
          <li class="active">Cart</li>
        </ol>
      </div>
     </div>
   </div>
  </section>
  <!-- / catg header banner section -->

  <!-- Cart view section -->
  <section id="cart-view">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="cart-view-area">
            <div class="cart-view-table">
              <form action="">
                <div class="table-responsive">
                   <table class="table">
                     <thead>
                       <tr>
                        <th><center>Kode Barang</center></th>
              					<th><center>Nama Barang</center></th>
              					<th><center>Harga Satuan</center></th>
              					<th><center>Jumlah</center></th>
              					<th><center>Opsi</center></th>
                       </tr>
                     </thead>
                     <tbody>
                     <?php
                			  //MENAMPILKAN DETAIL KERANJANG BELANJA//
                        $total = 0;

                        if (isset($_SESSION['items'])) {
                          foreach ($_SESSION['items'] as $key => $val) {
                            $query = mysqli_query($var_con, "SELECT * FROM oc_product p JOIN oc_product_desc d ON d.product_id = p.product_id WHERE p.product_id = '$key'");
                            $data = mysqli_fetch_array($query);

                            $jumlah_harga = $data['product_price'] * $val;
                            $total += $jumlah_harga;
                            $no = 1;
                        ?>
                       <tr>
                         <td><a class="aa-cart-title" href=""><?php echo $data['product_id']; ?></a></td>
                         <td><a class="aa-cart-title" href=""><?php echo $data['product_name']; ?></a></td>
                         <td><a class="aa-cart-title" href=""><?php echo number_format($data['product_price']); ?></a></td>
                         <td><a class="aa-cart-title" href=""><?php echo number_format($val); ?></a></td>
                         <td>
                           <center>
                             <a href="cart.php?act=plus&amp;product_id=<?php echo $key; ?>&amp;ref=cart.php" class="btn btn-sm   btn-success">Tambah</a>
                             <a href="cart.php?act=min&amp;product_id=<?php echo $key; ?>&amp;ref=cart.php" class="btn btn-sm btn-warning">Kurang</a>
                             <a href="cart.php?act=del&amp;product_id=<?php echo $key; ?>&amp;ref=cart.php" class="btn btn-sm btn-danger">Hapus</a>
                           </center>
                         </td>
                       </tr>
                			<?php
                						}
                					}
                      ?>
                      <?php
                				if($total == 0){
                					echo '<tr><td colspan="5" align="center">Ups, Keranjang kosong!</td></tr></table>';
                					echo '<p><div align="right">
                						<a href="index.php" class="aa-cart-view-btn">&laquo; Continue Shopping</a>
                						</div></p>';
                				} else {
                					echo '
                            </table>
                						<p><div align="right">
                						<a href="index.php" class="aa-cart-view-btn">&laquo; CONTINUE SHOPPING</a>
                					';
                				}
                				?>
                     </tbody>
                   </table>
                 </div>
              </form>
              <br><br><br>
              <!-- Cart Total view -->
              <div class="cart-view-total">
                <h4>Cart Totals</h4>
                <table class="aa-totals-table">
                  <tbody>
                    <th>Total</th>
                    <?php
                       //MENAMPILKAN DETAIL KERANJANG BELANJA//
                       $total = 0;

                       if (isset($_SESSION['items'])) {
                         foreach ($_SESSION['items'] as $key => $val) {
                           $query = mysqli_query($var_con, "SELECT * FROM oc_product p JOIN oc_product_desc d ON d.product_id = p.product_id WHERE p.product_id = '$key'");
                           $data = mysqli_fetch_array($query);

                           $jumlah_harga = $data['product_price'] * $val;
                           $total += $jumlah_harga;
                           $no = 1;
                       ?>
                    <tr>
                      <td><?php echo number_format($jumlah_harga); ?></td>
                    </tr>
                    <?php
                          }
                        }
                    ?>
                  </tbody>
                </table>
                <a href="checkout.php?total='.$total.'" class="aa-cart-view-btn">Proced to Checkout</a>
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
