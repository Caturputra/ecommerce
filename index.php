<?php /* require database */ require 'config.php'; ?>

<?php include 'layout/header.php'; ?>

<?php include 'layout/main-header.php'; ?>

<!--  Your Content-->
    <header>
        <div class="container">
            <div class="row">
                <div class="col-sm-7">
                    <div class="header-content">
                        <div class="header-content-inner">
                            <h1>Happy Shopping With OurStore Shop, We give you comfortable to shop anything about Computer</h1>
                            <a href="shop/index.php" class="btn btn-outline btn-xl page-scroll">Start Now for Happy Shopping!</a>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
                <div class="col-sm-5">
                    <div class="device-container">
                      <br><br><br><br>
                        <div class="device-mockup macbook_2015 portrait white">
                            <div class="device">
                                <div class="screen">
                                    <!-- Demo image for screen mockup, you can put an image here, some HTML, an animation, video, or anything else! -->
                                    <img src="images/banner.jpg" class="img-responsive" alt="">
                                </div>
                                <div class="button">
                                    <!-- You can hook the "home button" to some JavaScript events or just remove it -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </header>
    <!-- /header -->

    <section id="features" class="features">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="container-fluid">
                      <h4>Desktop and Laptops</h4><br>
                        <div class="row">
                          <!-- product-list -->
                          <?php
                            $var_sql1 = "SELECT * FROM oc_product_image i JOIN oc_product p on p.product_id = i.product_id JOIN oc_product_desc d on d.product_id = i.product_id WHERE p.category_id = 1 GROUP BY i.product_id ORDER BY i.product_id DESC LIMIT 0,3";
                            $var_query1 = mysqli_query($var_con, $var_sql1);
                            $var_row = mysqli_num_rows($var_query1);
                            if ($var_row > 0) {
                              while ($var_data = mysqli_fetch_array($var_query1)) {
                          ?>
                            <div class="col-md-6">
                                <div class="feature-item">
                                    <img src="admin/<?= $var_data['product_image_path']; ?>" class="img-responsive" alt="<?= $var_data['product_image_name'];?>" width="600"/>
                                    <p class="text-muted"><?= $var_data['product_desc']; ?></p>
                                    <p class="text-muted">Price : <?= number_format($var_data['product_price'],0,",","."); ?></p>
                                    <a class="btn btn-primary" href="product_view.php?id=<?= urldecode($var_data['product_id'])?>"> DETAIL</a>
                                    <a class="btn btn-primary" href="cart.php?act=add&amp;product_id=<?php echo $var_data['product_id']; ?>&amp;ref=index.php?id=<?php echo $var_data['product_id'];?>">ADD TO CART</a>
                                </div>
                            </div>
                            <?php
                              }
                            } else {
                              echo "<div class=\"col-md-6\"><div class=\"featured-item\"><p class=\"text-muted\">No Record.</p></div></div>";
                            }
                            ?>
                            <!-- /product-list  -->
                        </div>
                        <!-- /.row (first) -->

                        <h4>Peripherals</h4><br>
                        <div class="row">
                          <?php
                            $var_sql1 = "SELECT * FROM oc_product_image i JOIN oc_product p on p.product_id = i.product_id JOIN oc_product_desc d on d.product_id = i.product_id WHERE p.category_id = 3 GROUP BY i.product_id ORDER BY i.product_id DESC LIMIT 0,3";
                            $var_query1 = mysqli_query($var_con, $var_sql1);
                            $var_row = mysqli_num_rows($var_query1);
                            if ($var_row > 0) {
                            while ($var_data = mysqli_fetch_array($var_query1)) {
                          ?>
                            <div class="col-md-6">
                                <div class="feature-item">
                                    <i class="icon-present text-primary"></i>
                                    <h3>Free to Use</h3>
                                    <p class="text-muted">As always, this theme is free to download and use for any purpose!</p>
                                </div>
                            </div>
                            <?php
                              }
                            } else {
                              echo "<div class=\"col-md-6\"><div class=\"featured-item\"><p class=\"text-muted\">No Record.</p></div></div>";
                            }
                            ?>
                        </div>
                        <!-- /.row (second) -->

                        <h4>Random Access Memory</h4><br>
                        <div class="row">
                          <?php
                            $var_sql1 = "SELECT * FROM oc_product_image i JOIN oc_product p on p.product_id = i.product_id JOIN oc_product_desc d on d.product_id = i.product_id WHERE p.category_id = 3 GROUP BY i.product_id ORDER BY i.product_id DESC LIMIT 0,3";
                            $var_query1 = mysqli_query($var_con, $var_sql1);
                            $var_row = mysqli_num_rows($var_query1);
                            if ($var_row > 0) {
                            while ($var_data = mysqli_fetch_array($var_query1)) {
                          ?>
                            <div class="col-md-6">
                                <div class="feature-item">
                                    <i class="icon-present text-primary"></i>
                                    <h3>Free to Use</h3>
                                    <p class="text-muted">As always, this theme is free to download and use for any purpose!</p>
                                </div>
                            </div>
                            <?php
                              }
                            } else {
                              echo "<div class=\"col-md-6\"><div class=\"featured-item\"><p class=\"text-muted\">No Record.</p></div></div>";
                            }
                            ?>
                        </div>
                        <!-- /.row (third) -->

                        <h4>Printer</h4><br>
                        <div class="row">
                          <?php
                            $var_sql1 = "SELECT * FROM oc_product_image i JOIN oc_product p on p.product_id = i.product_id JOIN oc_product_desc d on d.product_id = i.product_id WHERE p.category_id = 4 GROUP BY i.product_id ORDER BY i.product_id DESC LIMIT 0,3";
                            $var_query1 = mysqli_query($var_con, $var_sql1);
                            $var_row = mysqli_num_rows($var_query1);
                            if ($var_row > 0) {
                              while ($var_data = mysqli_fetch_array($var_query1)) {
                          ?>
                            <div class="col-md-6">
                                <div class="feature-item">
                                    <i class="icon-present text-primary"></i>
                                    <h3>Free to Use</h3>
                                    <p class="text-muted">As always, this theme is free to download and use for any purpose!</p>
                                </div>
                            </div>
                            <?php
                              }
                            } else {
                              echo "<div class=\"col-md-6\"><div class=\"featured-item\"><p class=\"text-muted\">No Record.</p></div></div>";
                            }
                            ?>
                        </div>
                        <!-- /.row (third) -->
                    </div>
                    <!-- /.container-fluid -->
                </div>
                <!-- /.col-md-8 -->
            </div>
            <!-- /.row -->
          </div>
          <!-- /.container -->
    </section>
    <!-- /..feature -->

    <section class="cta">
        <div class="cta-content">
            <div class="container">
                <h2>Stop waiting.<br>Start Shopping with us.</h2>
                <a href="#contact" class="btn btn-outline btn-xl page-scroll">Let's Get Shop!</a>
            </div>
        </div>
        <div class="overlay"></div>
    </section>

    <section id="contact" class="contact bg-primary">
        <div class="container">
            <h2>We <i class="fa fa-heart"></i> all our Customer!</h2>
            <ul class="list-inline list-social">
                <li class="social-twitter">
                    <a href="#"><i class="fa fa-twitter"></i></a>
                </li>
                <li class="social-facebook">
                    <a href="#"><i class="fa fa-facebook"></i></a>
                </li>
                <li class="social-google-plus">
                    <a href="#"><i class="fa fa-mail-reply"></i></a>
                </li>
                <li class="social-twitter">
                    <a href="#"><i class="fa fa-weibo"></i></a>
                </li>
                <li class="social-google-plus">
                    <a href="#"><i class="fa fa-instagram"></i></a>
                </li>
                <li class="social-facebook">
                    <a href="#"><i class="fa fa-linkedin"></i></a>
                </li>
            </ul>
        </div>
    </section>

<?php include 'layout/footer.php'; ?>
