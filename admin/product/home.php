<?php
// ambil config koenksi db
require '../config.php';

// untuk menampilkan product detail
$var_sqlproduct = "SELECT * FROM oc_product p JOIN oc_product_desc d on d.product_id = p.product_id JOIN oc_product_image i ON i.product_id = p.product_id GROUP BY i.product_id ORDER BY p.product_id DESC";
$var_queryproduct = mysqli_query($var_con, $var_sqlproduct);
$var_countp = "SELECT COUNT(*) as product_all FROM oc_product";
$var_countpa = mysqli_fetch_array(mysqli_query($var_con, $var_countp));

// untuk menampilkan member
$var_sqlc = "SELECT * FROM oc_customer WHERE customer_status = 1 ORDER BY customer_id DESC limit 0,8";
$var_queryc = mysqli_query($var_con, $var_sqlc);

// jumlah member terdaftar
$var_count = "SELECT COUNT(*) as tot_customer FROM oc_customer WHERE customer_status = 1";
$var_qcount = mysqli_query($var_con, $var_count);
$var_datacount =mysqli_fetch_array($var_qcount);
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Dashboard
      <small>
        <ol class="breadcrumb">
          <li><a href="?page=home"><i class="fa fa-dashboard"></i> Home</a></li>
        </ol>
      </small>
    </h1>

  </section>

    <!-- Your Page Content Here -->
    <!-- Main content -->
    <section class="content">
      <!-- Info boxes -->
      <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="ion ion-ios-gear-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">CPU Traffic</span>
              <span class="info-box-number">90<small>%</small></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-google-plus"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Likes</span>
              <span class="info-box-number">41,410</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="ion ion-ios-cart-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">All Products</span>
              <span class="info-box-number"><?= $var_countpa['product_all']?> Products</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Registered</span>
              <span class="info-box-number"> <?= $var_datacount['tot_customer'];?> Customer</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      <div class="row">
        <div class="col-md-6">
          <!-- USERS LIST -->
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Latest Members</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                </button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <ul class="users-list clearfix">
                <?php
                // ekseskusi perulangan sql member
                while ($var_datam = mysqli_fetch_array($var_queryc)) {
                  ?>
                  <li>
                    <img src="../images/avatar5.png" alt="User Image">
                    <a class="users-list-name" href="#"><?= $var_datam['customer_name']; ?></a>
                    <span class="users-list-date"><?= $var_datam['customer_added']; ?></span>
                  </li>
                  <?php } ?>
                </ul>
                <!-- /.users-list -->
              </div>
              <!-- /.box-body -->
              <div class="box-footer text-center">
                <a href="?page=manage_account" class="uppercase">View All Users</a>
              </div>
              <!-- /.box-footer -->
            </div>
            <!--/.box -->
          </div>
          <!-- /.col -->

          <div class="col-md-6">
            <!-- PRODUCT LIST -->
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">Recently Added Products</h3>

                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <ul class="products-list product-list-in-box">
                  <?php
                  // ekseskusi query product
                  while ($var_datap = mysqli_fetch_array($var_queryproduct)) {
                    ?>
                    <li class="item">
                      <div class="product-img">
                        <img src="../admin/<?= $var_datap['product_image_path']; ?>" alt="<?= $var_datap['product_image_name']; ?>">
                      </div>
                      <div class="product-info">
                        <a href="javascript:void(0)" class="product-title"><?= $var_datap['product_name']; ?>
                          <span class="label label-warning pull-right">Rp <?= number_format($var_datap['product_price'],0,",","."); ?></span></a>
                          <span class="product-description">
                            <?= $var_datap['product_desc']; ?>
                          </span>
                        </div>
                      </li>
                      <!-- /.item -->
                      <?php } ?>
                    </ul>
                  </div>
                  <!-- /.box-body -->
                  <div class="box-footer text-center">
                    <a href="?page=product" class="uppercase">View All Products</a>
                  </div>
                  <!-- /.box-footer -->
                </div>
                <!-- /.box -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
