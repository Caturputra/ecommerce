<?php
  // operasi php
  require '../config.php';
  if(isset($_POST['btn_delete'])) {
    if (isset($_POST['frm_checkboxId'])) {
      $idArr = $_POST['frm_checkboxId'];
          foreach($idArr as $id){
              mysqli_query($var_con,"DELETE FROM oc_category WHERE category_id=".$id);
          }
          $var_message = "Data deleted!";
    } else {
      $var_message = "No Data to delete!";
    }

  }
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
          <li class="active">Category</li>
        </ol>
      </small>
    </h1>

  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Your Page Content Here -->
    <div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title"><i class="fa fa-th-list fa-lg"></i> Category List</h3>
    </div>
    <div class="panel-body">
      <div clas="row">
        <div class="col-sm-12">
          <?php if ( isset($var_message) ) : ?>
            <div class="callout callout-danger">
              <i class="fa fa-warning fa-lg"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <strong><?= $var_message; ?></strong>
            </div>
          <?php endif; ?>
          <form name="tableCategory" action="" method="post" onsubmit="return deleteConfirm();">
          <div class="align-right">
            <a href="?page=category_add" class="btn btn-primary"><i class="fa fa-plus"> Category</i></a>
            <button type="submit" class="btn btn-danger" name="btn_delete"><i class="fa fa-trash"> Delete</i></button>
          </div>
          <br>
          <?php

            /*
            ** Untuk menampilkn category ke dalam table
            */
            $var_sql = "SELECT * FROM oc_category";
            $var_query = mysqli_query($var_con, $var_sql);
          ?>
          <div class="table-responsive">
            <table class="table table-bordered table-hover" id="tableCategory">
              <thead>
                <tr>
                  <th style="width: 1px;"> <input type="checkbox" name="frm_checkboxAll" id="frm_checkboxAll"> </th>
                  <th>Category Name</th>
                  <th>Sort Order</th>
                  <th>Action</th>
                </tr>
              </thead>

              <tbody>
                <?php

                  while ($var_data = mysqli_fetch_array($var_query)) {
                ?>
                <tr>
                  <td class="text-center"> <input type="checkbox" class="frm_checkboxId" id="frm_checkboxId[]" name="frm_checkboxId[]"  value="<?= $var_data['category_id'] ?>"> </td> <!-- Valuenya dari database> -->
                  <td class="text-left"><?= $var_data['category_name'] ?></td>
                  <td class="text-right"><?= $var_data['sort_order'] ?></td>
                  <td class="text-right"><a href="?page=category_update&cat_id=<?= $var_data['category_id']?>" class="btn btn-primary"><i class="fa fa-edit fa-lg"></i></a></td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
