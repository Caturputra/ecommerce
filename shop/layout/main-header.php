  <!-- SCROLL TOP BUTTON -->
    <a class="scrollToTop" href="#"><i class="fa fa-chevron-up"></i></a>
  <!-- END SCROLL TOP BUTTON -->


  <!-- Start header section -->
  <header id="aa-header">
    <!-- start header top  -->
    <div class="aa-header-top">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="aa-header-top-area">
              <!-- start header top left -->
              <div class="aa-header-top-left">
                <!-- start language -->
                <div class="aa-language">
                  <div class="dropdown">
                    <a class="btn dropdown-toggle" href="#" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                      <img src="img/flag/english.jpg" alt="english flag">English
                      <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                      <li><a href="#"><img src="img/flag/id.jpg" alt="">Indonesia</a></li>
                      <li><a href="#"><img src="img/flag/english.jpg" alt="">English</a></li>
                    </ul>
                  </div>
                </div>
                <!-- / language -->

                <!-- start currency -->
                <div class="aa-currency">
                  <div class="dropdown">
                    <a class="btn dropdown-toggle" href="#" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                      <i class="fa fa-idr"></i>Rp
                      <span class="caret"></span>
                    </a>
                  </div>
                </div>
                <!-- / currency -->
                <!-- start cellphone -->
                <div class="cellphone hidden-xs">
                  <p><span class="fa fa-phone"></span>XXXXXXXX</p>
                </div>
                <!-- / cellphone -->
              </div>
              <!-- / header top left -->
              <div class="aa-header-top-right">
                <ul class="aa-head-top-nav-right">
                  <li><a href="login_member.php">My Account</a></li>
                  <li class="hidden-xs"><a href="wishlist.php">Wishlist</a></li>
                  <li class="hidden-xs"><a href="cart.php">My Cart</a></li>
                  <li class="hidden-xs"><a href="checkout.php">Checkout</a></li>
                  <?php if(empty($_SESSION['customer'])){ ?>
                    <li><a href="" data-toggle="modal" data-target="#login-modal">Login</a></li>
                  <?php } ?>
                  <script type="text/javascript">
                  function myFunction() {
                      alert("Now, you have been logout.");
                    }
                  </script>
                  <?php if(!empty($_SESSION['customer'])){ ?>
                    <li><a href="logout.php" onclick="myFunction();"></i>Logout</a></li>
                    <li><a href="../member/index.php"></i>Go to Dashboard</a></li>
                  <?php } ?>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- / header top  -->

    <!-- start header bottom  -->
    <div class="aa-header-bottom">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="aa-header-bottom-area">
              <!-- logo  -->
              <div class="aa-logo">
                <!-- Text based logo -->
                <a href="index.html">
                  <span class="fa fa-shopping-cart"></span>
                  <p><strong>Our</strong>shop <span>Your Shopping Partner</span></p>
                </a>
                <!-- img based logo -->
                <!-- <a href="index.html"><img src="img/logo.jpg" alt="logo img"></a> -->
              </div>
              <!-- / logo  -->
               <!-- cart box -->
              <div class="aa-cartbox">
                <a class="aa-cart-link" href="#">
                  <span class="fa fa-shopping-basket"></span>
                  <span class="aa-cart-title">SHOPPING CART</span>
                  <!-- <span class="aa-cart-notify"><?php echo $val; ?></span> -->
                </a>
                <div class="aa-cartbox-summary">
                  <ul>
                    <!-- cart detail -->
                    <?php
                      //MENAMPILKAN DETAIL KERANJANG BELANJA//
                      $total = 0;
                      //mysql_select_db($database_conn, $conn);
                      if (isset($_SESSION['items'])) {
                        foreach ($_SESSION['items'] as $key => $val) {
                          $query = mysqli_query($var_con, "SELECT * FROM oc_product p JOIN oc_product_desc d ON d.product_id = p.product_id WHERE p.product_id = '$key'");
                          $data = mysqli_fetch_array($query);
                          $jumlah_harga = $data['product_price'] * $val;
                          $total += $jumlah_harga;
                    ?>
                    <li>
                      <a class="aa-cartbox-img" href="#"><img src="img/woman-small-2.jpg" alt="img"></a>
                      <div class="aa-cartbox-info">
                        <h4><a href="#"><?php echo $data['product_name']; ?></a></h4>
                        <p><?php echo number_format($val); ?> x <?php echo number_format($data['product_price']); ?></p>
                      </div>
                      <a class="aa-remove-product" href="cart.php?act=del&amp;product_id=<?php echo $key; ?>&amp;ref=cart.php"><span class="fa fa-times"></span></a>
                    </li>
                    <?php
                        }
                      }
                    ?>
                    <!-- /cart detail -->
                    <!-- view total cart  -->
                    <li>
                      <span class="aa-cartbox-total-title">
                        Total
                      </span>
                      <span class="aa-cartbox-total-price">
                        <?php echo number_format($total); ?>
                      </span>
                    </li>
                    <!-- /view total -->
                  </ul>
                  <div class="row">
                    <?php

                      if($total > 0){
                    ?>
                    <div class="col-md-7 pull-right"><a class="aa-cartbox-checkout aa-primary-btn" href="checkout.php?total=<?= $total; ?>">Checkout</a></div>
                    <div class="col-md-2 pull-left"><a class="aa-cartbox-checkout aa-primary-btn" href="cart.php">Details</a></div>
                    <?php } ?>
                  </div>
                  <!-- /.row -->
                </div>
              </div>
              <!-- / cart box -->
              <!-- search box -->
              <div class="aa-search-box">
                <form action="">
                  <input type="text" name="" id="" placeholder="Search here ex. 'man' ">
                  <button type="submit"><span class="fa fa-search"></span></button>
                </form>
              </div>
              <!-- / search box -->
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- / header bottom  -->
  </header>
  <!-- / header section -->
  <!-- menu -->
  <section id="menu">
    <div class="container">
      <div class="menu-area">
        <!-- Navbar -->
        <div class="navbar navbar-default" role="navigation">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
          </div>
          <div class="navbar-collapse collapse">
            <!-- Left nav -->
            <ul class="nav navbar-nav">
              <li><a href="../index.php">Home</a></li>
              <?php
              require '../config.php';
              $var_sqlcat = "SELECT * FROM oc_category WHERE category_parent = 0";
              $var_querycat = mysqli_query($var_con, $var_sqlcat);
              foreach ($var_querycat as $var_data) {
                $var_subdata = $var_data['category_id'];
                echo "<li><a href=\"\">$var_data[category_name] <span class=\"caret\"></span></a>";


                  $var_sqlcat2 = "SELECT * FROM oc_category WHERE category_parent = '{$var_subdata}'";
                  $var_querycat2 = mysqli_query($var_con, $var_sqlcat2);
                  echo "<ul class=\"dropdown-menu\">";
                  while ($var_data2 = mysqli_fetch_array($var_querycat2)) {
                    $var_subdata2 = $var_data2['category_id'];
                      echo "<li class=\"cute\">";
                        echo "<a href=\"?cat_id=" . urlencode($var_data2['category_id']) . " \"><span class=\"caret\"></span>";
                          echo $var_data2['category_name'];
                        echo "</a>";

                        $var_sqlcat3 = "SELECT * FROM oc_category WHERE category_parent = '{$var_subdata2}'";
                        $var_querycat3 = mysqli_query($var_con, $var_sqlcat3);
                        echo "<ul class=\"dropdown-menu\">";

                        while ($var_data3 = mysqli_fetch_array($var_querycat3)) {
                          echo "<li class=\"\">";
                              echo "<a href=\"?cat_id=" . urlencode($var_data3['category_id']) . " \">";
                              echo "<i class=\"fa fa-link\"></i> " . $var_data3['category_name'];
                            echo "</a>";

                        }
                      echo "</ul>";
                    echo "</li>";
                  }
                    echo "</ul>";
                  echo "</li>";
                echo "</li>";
              }
            ?>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
  </section>
  <!-- / menu -->

  <!-- modal untuk login register -->
  <!-- Login Modal -->
  <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4>Login or Register</h4>
          <!--pesan eror  -->
          <?php if ( isset($var_message) ) : ?>
            <div class="alert alert-danger">
              <i class="fa fa-key fa-lg"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <strong><?= $var_message; ?></strong>
            </div>
          <?php endif; ?>
          <!-- /pesan error -->

          <!-- pesan success -->
          <?php if ( !empty($var_messagelogin) ) :  ?>
            <div class="alert alert-info">
              <i class="fa fa-key fa-lg"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <strong><?= $var_messagelogin; ?></strong>
            </div>
          <?php  endif; ?>
          <!-- pesan success -->

          <?php include_once "login_member_process.php"; ?>
           <form action="" class="aa-login-form" method="post">
            <label for="frm_member_username">Username or Email address<span>*</span></label>
             <input type="text" placeholder="Username or email" name="frm_member_username" id="frm_member_username" required="required">
             <label for="frm_member_password">Password<span>*</span></label>
              <input type="password" placeholder="Password" name="frm_member_password" id="frm_member_password" required="required">
              <button type="submit" class="aa-browse-btn" name="frm_btn_member">Login</button>
              <p class="aa-lost-password"><a href="forgot_password.php">Lost your password?</a></p>
            <div class="aa-register-now">
              Don't have an account?<a href="login_member.php">Register now!</a>
            </div>
          </form>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div>
