<?php
// operasi php
require '../config.php';
if(isset($_POST['btn_delete'])) {
  if (isset($_POST['frm_checkboxId'])) {
    $idArr = $_POST['frm_checkboxId'];
        foreach($idArr as $id){
            mysqli_query($var_con,"DELETE FROM oc_product, oc_product_desc, oc_product_image WHERE product_id={$id}");
            mysqli_query($var_con,"DELETE FROM oc_product_desc WHERE product_id={$id}");
            mysqli_query($var_con,"DELETE FROM oc_product_image WHERE product_id={$id}");
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
      Product
      <small>
        <ol class="breadcrumb">
          <li><a href="?page=home"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Product</li>
        </ol>
      </small>
    </h1>

  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Your Page Content Here -->
    <div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title"><i class="fa fa-th-list fa-lg"></i> Product List</h3>
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
          <form name="table_product" action="" method="post" onsubmit="return deleteConfirm();">
          <div class="align-right">
            <a href="?page=product_add" class="btn btn-primary"><i class="fa fa-plus"> Product</i></a>
            <button type="submit" class="btn btn-danger" name="btn_delete"><i class="fa fa-trash"> Delete</i></button>
          </div>
          <br>
          <?php
          /*
          ** Untuk menampilkn product ke dalam table
          */
          $var_sql = "SELECT * FROM oc_product p JOIN oc_product_desc d on d.product_id = p.product_id JOIN oc_product_image i ON i.product_id = p.product_id GROUP BY i.product_id ORDER BY p.product_id ASC ";
          $var_query = mysqli_query($var_con, $var_sql);
          ?>
          <div class="table-responsive">
            <table class="table table-bordered table-hover" id="tableProduct">
              <thead class="align-center">
                <th style="width: 1px;"> <input type="checkbox" name="frm_checkboxAll" id="frm_checkboxAll"> </th>
                <th>Image</th>
                <th>Product Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Action</th>
              </thead>
              <tbody>
                <?php
                  while ($var_data = mysqli_fetch_array($var_query)) {
                ?>
                <tr>
                  <td class="text-center"> <input type="checkbox" class="frm_checkboxId" id="frm_checkboxId[]" name="frm_checkboxId[]"  value="<?= $var_data['product_id']; ?>"></td> <!-- Valuenya dari database> -->
                  <td class="text-left"><img class="img-responsive" width="50" height="100" src="../admin/<?= $var_data['product_image_path']; ?>" alt="<?= $var_data['product_image_name']; ?>" /></td>
                  <td><?= $var_data['product_name']; ?></td>
                  <td class="text-right"><?= number_format($var_data['product_price'],0,",","."); ?></td>
                  <td class="text-right"><?= $var_data['qty']; ?></td>
                  <td class="text-right"><a href="?page=product_update&product_id=<?= $var_data['product_id']; ?>" class="btn btn-primary"><i class="fa fa-edit"></i></a></td>
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
