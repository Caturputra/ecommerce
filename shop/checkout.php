<?php
  session_start();
  /* Memanggil database*/
  require '../config.php';

  $sid = session_id();
  $init = true;
  $var_sesiuser = $_SESSION['customer'];

  if (empty($_SESSION['customer'])) {
    $init = false;
    echo '<script>
    var conn=confirm("Please login to checkout.");
    if(conn==true){
      window.location.assign("login_member.php");
    } else {
      window.location.assign("index.php");
    }
    </script>';
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
        <h2>Checkout</h2>
        <ol class="breadcrumb">
          <li><a href="../index.php">Home</a></li>
          <li class="active">Checkout</li>
        </ol>
      </div>
     </div>
   </div>
  </section>
  <!-- / catg header banner section -->

  <!-- Cart view section -->
   <section id="checkout">
     <div class="container">
       <div class="row">
         <div class="col-md-12">
          <div class="checkout-area">
            <form action="">
              <div class="row">
                <div class="col-md-8">
                  <div class="checkout-left">
                    <div class="panel-group" id="accordion">
                      <!-- Login section -->
                      <div class="panel panel-default aa-checkout-login">
                        <div class="panel-heading">
                          <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                              Client Login
                            </a>
                          </h4>
                        </div>
                        <div id="collapseTwo" class="panel-collapse collapse">
                          <div class="panel-body">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quaerat voluptatibus modi pariatur qui reprehenderit asperiores fugiat deleniti praesentium enim incidunt.</p>
                            <input type="text" placeholder="Username or email">
                            <input type="password" placeholder="Password">
                            <button type="submit" class="aa-browse-btn">Login</button>
                            <p class="aa-lost-password"><a href="#">Lost your password?</a></p>
                          </div>
                        </div>
                      </div>
                      <!-- Billing Details -->
                      <div class="panel panel-default aa-checkout-billaddress">
                        <div class="panel-heading">
                          <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                              Billing Details
                            </a>
                          </h4>
                        </div>
                        <div id="collapseThree" class="panel-collapse collapse">
                          <div class="panel-body">
                            <div class="row">
                              <div class="col-md-6">
                                <div class="aa-checkout-single-bill">
                                  <input type="text" placeholder="First Name*">
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="aa-checkout-single-bill">
                                  <input type="text" placeholder="Last Name*">
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-12">
                                <div class="aa-checkout-single-bill">
                                  <input type="text" placeholder="Company name">
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-6">
                                <div class="aa-checkout-single-bill">
                                  <input type="email" placeholder="Email Address*">
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="aa-checkout-single-bill">
                                  <input type="tel" placeholder="Phone*">
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-12">
                                <div class="aa-checkout-single-bill">
                                  <textarea cols="8" rows="3">Address*</textarea>
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-12">
                                <div class="aa-checkout-single-bill">
                                  <select>
                                    <option value="0">Select Your Country</option>
                                    <option value="1">Australia</option>
                                    <option value="2">Afganistan</option>
                                    <option value="3">Bangladesh</option>
                                    <option value="4">Belgium</option>
                                    <option value="5">Brazil</option>
                                    <option value="6">Canada</option>
                                    <option value="7">China</option>
                                    <option value="8">Denmark</option>
                                    <option value="9">Egypt</option>
                                    <option value="10">India</option>
                                    <option value="11">Iran</option>
                                    <option value="12">Israel</option>
                                    <option value="13">Mexico</option>
                                    <option value="14">UAE</option>
                                    <option value="15">UK</option>
                                    <option value="16">USA</option>
                                  </select>
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-6">
                                <div class="aa-checkout-single-bill">
                                  <input type="text" placeholder="Appartment, Suite etc.">
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="aa-checkout-single-bill">
                                  <input type="text" placeholder="City / Town*">
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-6">
                                <div class="aa-checkout-single-bill">
                                  <input type="text" placeholder="District*">
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="aa-checkout-single-bill">
                                  <input type="text" placeholder="Postcode / ZIP*">
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- Shipping Address -->
                      <div class="panel panel-default aa-checkout-billaddress">
                        <div class="panel-heading">
                          <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
                              Shippping Address
                            </a>
                          </h4>
                        </div>
                        <div id="collapseFour" class="panel-collapse collapse">
                          <div class="panel-body">
                           <div class="row">
                              <div class="col-md-6">
                                <div class="aa-checkout-single-bill">
                                  <input type="text" placeholder="First Name*">
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="aa-checkout-single-bill">
                                  <input type="text" placeholder="Last Name*">
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-12">
                                <div class="aa-checkout-single-bill">
                                  <input type="text" placeholder="Company name">
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-6">
                                <div class="aa-checkout-single-bill">
                                  <input type="email" placeholder="Email Address*">
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="aa-checkout-single-bill">
                                  <input type="tel" placeholder="Phone*">
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-12">
                                <div class="aa-checkout-single-bill">
                                  <textarea cols="8" rows="3">Address*</textarea>
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-12">
                                <div class="aa-checkout-single-bill">
                                  <select>
                                    <option value="0">Select Your Country</option>
                                    <option value="1">Australia</option>
                                    <option value="2">Afganistan</option>
                                    <option value="3">Bangladesh</option>
                                    <option value="4">Belgium</option>
                                    <option value="5">Brazil</option>
                                    <option value="6">Canada</option>
                                    <option value="7">China</option>
                                    <option value="8">Denmark</option>
                                    <option value="9">Egypt</option>
                                    <option value="10">India</option>
                                    <option value="11">Iran</option>
                                    <option value="12">Israel</option>
                                    <option value="13">Mexico</option>
                                    <option value="14">UAE</option>
                                    <option value="15">UK</option>
                                    <option value="16">USA</option>
                                  </select>
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-6">
                                <div class="aa-checkout-single-bill">
                                  <input type="text" placeholder="Appartment, Suite etc.">
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="aa-checkout-single-bill">
                                  <input type="text" placeholder="City / Town*">
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-6">
                                <div class="aa-checkout-single-bill">
                                  <input type="text" placeholder="District*">
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="aa-checkout-single-bill">
                                  <input type="text" placeholder="Postcode / ZIP*">
                                </div>
                              </div>
                            </div>
                             <div class="row">
                              <div class="col-md-12">
                                <div class="aa-checkout-single-bill">
                                  <textarea cols="8" rows="3">Special Notes</textarea>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="checkout-right">
                    <h4>Order Summary</h4>
                    <div class="aa-order-summary-area">
                      <table class="table table-responsive">
                        <thead>
                          <tr>
                            <th>Product</th>
                            <th>Total</th>
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
                            <td><?php echo $data['product_name']; ?><strong> x <?php echo number_format($val); ?></strong></td>
                            <td><?php echo number_format($data['product_price']); ?></td>
                          </tr>
                          <?php
                              }
                            }
                          ?>
                        </tbody>
                        <tfoot>
                           <tr>
                            <th>Total</th>
                            <td><?php echo number_format($jumlah_harga); ?></td>
                          </tr>
                        </tfoot>
                      </table>
                    </div>

                    <!-- /tampil detail product -->
                    <h4>Payment Method</h4>
                    <div class="aa-payment-method">
                      <label for="cashdelivery"><input type="radio" id="cashdelivery" name="optionsRadios"> Cash on Delivery </label>
                      <label for="paypal"><input type="radio" id="paypal" name="optionsRadios" checked> Via Paypal </label>
                      <img src="https://www.paypalobjects.com/webstatic/mktg/logo/AM_mc_vs_dc_ae.jpg" border="0" alt="PayPal Acceptance Mark">
                      <input type="submit" value="Place Order" class="aa-browse-btn">
                    </div>
                  </div>
                </div>
              </div>
            </form>
           </div>
         </div>
       </div>
     </div>
   </section>
   <!-- / Cart view section -->

<!-- /end content -->

<?php include 'layout/footer.php'; ?>
