<?php
  /* Memanggil database */
  require '../config.php';
?>
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
      <div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title"><i class="fa fa-user fa-lg"></i> DETAIL USER ADMIN</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
          <!-- /.box-tools -->
        </div>
        <div class="box-body">
          <?php
            // untuk menampilkan user admin
            $var_sqladmin = "SELECT * FROM oc_user";
            $var_queryadmin = mysqli_query($var_con, $var_sqladmin);
            while ($dataadmin = mysqli_fetch_array($var_queryadmin)) {
          ?>
          <div class="img-responsive">
            <center>
              <img src="../images/avatar5.png" alt="" class="img-rounded" width="200"/>
            </center>
          </div>
          <!-- /img-responsive -->
          <style media="screen">
            .detailAdmin {
              text-transform: uppercase;
              margin-top:7px;
              text-align:center;
            }

            .actionUpdate {
              display: block;
              background-color: #00a65a;
              color: white;
              padding: 2px 10px 0.5px;
            }


            .link a:link {
              color: red;
            }

            .link a:visited {
              color: white;
            }

            .link a:hover {
              color: white;
            }

            .link a:active {
              color: cyan;
            }

          </style>
          <div class="detailAdmin" style="">
            <p><?= $dataadmin['username'] ?></p>
            <p><?= $dataadmin['name'] ?></p>
          </div>
          <!-- /.detail-admin -->

          <div class="actionUpdate">
            <div class="link">
              <p><a href="">Change Username</a></p>
              <p><a href="">Change Avatar</a></p>
              <p><a href="">Change Fullname</a></p>
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

    <div class="col-lg-6">
      operasi crud admin
    </div>
    <!-- /col info -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
