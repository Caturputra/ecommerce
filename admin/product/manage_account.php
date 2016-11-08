<?php require '../config.php'; ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Category
      <small>
        <ol class="breadcrumb">
          <li><a href="?page=home"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Accounts</li>
        </ol>
      </small>
    </h1>

  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Your Page Content Here -->
    <div class="col-sm-4">
      <div class="panel panel-info">
        <div class="panel-heading">
          <h3 class="panel-title"><i class="fa fa-user fa-lg"></i> DETAIL USER ADMIN</h3>
        </div>
        <div class="panel-body">
          <?php
            // untuk menampilkan user admin
            $var_sqladmin = "SELECT * FROM oc_user";
            $var_queryadmin = mysqli_query($var_con, $var_sqladmin);
            while ($dataadmin = mysqli_fetch_array($var_queryadmin)) {
          ?>
          <div class="img-responsive">
            <div class="img-rounded">
              <img src="../../images/avatar5.png" alt="" />
            </div>
            <!-- /image rounded -->
          </div>
          <!-- /img-responsive -->

          <div class="detailAdmin" style="text-transform: uppercase;">
            <p><?= $dataadmin['username'] ?></p>
            <p><?= $dataadmin['name'] ?></p>
          </div>
          <!-- /.detail-admin -->

          <div class="actionUpdate">
            <div class="link">
              <p><a href="">Change username</a></p>
              <p><a href="">Change fullname</a></p>
              <p><a href="">Change Password</a></p>
            </div>
          </div>
        </div>
        <!-- /panel-body -->
        <?php } ?>
      </div>
      <!-- /panel panel-info detail user admin -->
    </div>
    <!-- /col info -->

  <div class="col-sm-8">
    <div class="panel panel-info">
      <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-user fa-lg"></i> DETAIL USER CUSTOMER</h3>
      </div>
      <?php
        // untuk menampilkan user
        $var_userc = "SELECT * FROM oc_customer WHERE customer_status = 1 ";
        $var_query = mysqli_query($var_con, $var_userc);
        $var_count = "SELECT COUNT(*) as tot_customer FROM oc_customer WHERE customer_status = 1";
        $var_qcount = mysqli_query($var_con, $var_count);
        $var_datacount =mysqli_fetch_array($var_qcount);
      ?>
      <div class="panel-body">
        <span class="pull-right">ahsdkj</span><p>Total customer registered : <?= $var_datacount['tot_customer']; ?></p>
        <form class="" action="" method="post">
          <div class="table-responsive">
            <table id="detailCustomer" class="table table-bordered">
              <tr>
              <thead>
                <th>Username</th>
                <th>Namer</th>
                <th>Email</th>
                <th>Address</th>
                <th>Action</th><th></th><th></th>
              </thead>
            </tr>
              <tbody>
                <?php
                  while ($var_data = mysqli_fetch_array($var_query)) {
                ?>
                <tr>
                  <td class="text-left"><?= $var_data['customer_username'] ?></td>
                  <td class="text-left"><?= $var_data['customer_name'] ?></td>
                  <td class="text-left"><?= $var_data['customer_mail'] ?></td>
                  <td class="text-left"><?= $var_data['customer_address'] ?></td>
                  <td class="text-right" title="Edit Customer"><a href="" class="btn btn-primary"><i class="fa fa-edit"></i></a></td>
                  <td class="text-right" title="Delete Customer"><a href="" class="btn btn-primary"><i class="fa fa-trash"></i></a></td>
                  <td class="text-right" title="Validate Customer"><a href="" class="btn btn-primary"><i class="fa fa-check"></i></a></td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
        </form>
        <!-- /form manage account -->
      </div>
      <!-- /table-responsive -->
    </div>
    <!-- /panel-body -->
  </div>
  <!-- /panel panel-info detail user admin -->
</div>
<!-- /col info -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
