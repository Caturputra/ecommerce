<?php
  //operasi php add product
  if (isset($_POST['btn_update_product'])) {
    $var_name = validateSecurity($_POST['frm_product_name']);
    $var_desc = validateSecurity($_POST['frm_product_desc']);
    $var_height = validateSecurity($_POST['frm_product_height']);
    $var_weight = validateSecurity($_POST['frm_product_weight']);
    $var_price = validateSecurity($_POST['frm_product_price']);
    $var_qty = validateSecurity($_POST['frm_product_qty']);
    $var_cat = validateSecurity($_POST['frm_product_category']);

    /*Ambil id dari product*/
    $product_id = $_GET['product_id'];

    if (empty($var_name)) {
      $var_message = "We need product name.";
      $var_init = false;
    } else

    if (empty($var_desc)) {
      $var_message = "We need product description.";
      $var_init = false;
    } else

    if (empty($var_height)) {
      $var_message = "We need product Height.";
      $var_init = false;
    } else

    if (!is_numeric($var_height) || !is_numeric($var_weight) || !is_numeric($var_price)) {
      $var_message = "Height and weight must be number!";
      $var_init = false;
    } else

    if (empty($var_weight)) {
      $var_message = "We need product weight.";
      $var_init = false;
    } else

    if (empty($var_price)) {
      $var_message = "We need product price.";
      $var_init = false;
    } else

    if (empty($var_qty)) {
      $var_message = "We need product quantity.";
      $var_init = false;
    } else

    if (!isset($_FILES['frm_img']['name'])) {
        $var_message = "Select image before!";
        $var_init = false;
    }  else {

      if (isset($_FILES['frm_img']['name'])) {
        // Untuk multiple upload
        /*
        ** Proses update data ke product
        */
        $var_pid = array('product_id' => $product_id);
        $var_product = array(
          'product_id' => $product_id,
          'product_price' => $var_price,
          'product_height' => $var_height,
          'product_weight' => $var_weight,
          'qty' => $var_qty
        );
        if(update($var_con, "oc_product", $var_product, $var_pid)){
          $var_message = "Data not uploaded.";
        } else {
          echo '<script>
          var conn=confirm("Data is updated.");
          if(conn==true){
               window.location.assign("?page=product");
          }
          </script>';
        }

        /*
        ** Proses untuk memasukkan data ke deskripsi produk
        */
        $var_get_id = mysqli_insert_id($var_con);
        $var_product_desc = array(
          'product_name' => $var_name,
          'product_desc' => $var_desc,
          'product_id' => $product_id
        );
        update($var_con, "oc_product_desc", $var_product_desc, $var_pid);

        foreach ($_FILES['frm_img']['tmp_name'] as $key => $tmp_name) {

        $var_img_name = addslashes($_FILES['frm_img']['name'][$key]);
        $var_img_temp = addslashes($_FILES['frm_img']['tmp_name'][$key]);
        $var_img_size = $_FILES['frm_img']['size'][$key];
        $var_img_type = strtolower(pathinfo($var_img_name, PATHINFO_EXTENSION));
        //$var_validate = getimagesize($var_img_size);
        $var_ext = array("jpeg", "png", "jpg");
        $var_dir = "uploaded/";
        $validate = true;

        if ($var_img_size > 2048000) {
          $var_message = "frm_image is bigger than 2 MB";
          $validate = false;
        } else

        if ($validate = false) {
          $var_message = "Operation to upload frm_image failure";
        } else {
          if (in_array($var_img_type, $var_ext) === true) {
            $var_new_name = "img-". rand(10000, 100000) . substr($var_frm_image_name, 0, -4) . '.' . $var_img_type;
            /* Proses upload ke gambar */
            if(move_uploaded_file($var_img_temp, $var_dir.$var_new_name)){

              /*
              ** Proses upload gambar ke database image
              */
              $var_data = array(
                'product_image_id' => null,
                'product_image_name' => $var_new_name,
                'product_image_path' => $var_dir.$var_new_name,
                'product_id' => $product_id
              );
              if(update($var_con, "oc_product_image", $var_data, $var_pid)) {
                $var_message = "Data is not updated.";
              } else {
                echo '<script>
                var conn=confirm("Data is updated.");
                if(conn==true){
                     window.location.assign("?page=product");
                }
                </script>';
              }
          }
        }
      }
    }
    }
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
          <li><a href="?page=product"> Product</a></li>
          <li class="active"> Update Product</li>
        </ol>
      </small>
    </h1>

  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Your Page Content Here -->
    <div class="panel panel-warning">
      <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-edit fa-lg"></i> Update Product</h3>
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
            <form action="" class="form-horizontal" method="POST" enctype="multipart/form-data">
              <?php
            $product_id = $_GET['product_id'];
            if (isset($product_id)) {
              /*
              ** Untuk menampilkn product ke dalam table
              */
              $var_sql = "SELECT * FROM oc_product p JOIN oc_product_desc d on d.product_id = p.product_id JOIN oc_product_image i ON i.product_id = p.product_id WHERE p.product_id = '{$product_id}' GROUP BY i.product_id ORDER BY p.product_id ASC ";
              $var_query = mysqli_query($var_con, $var_sql);
              while ($var_data = mysqli_fetch_array($var_query)) {
          ?>
              <div class="form-group">
                <label for="frm_product_name" class="control-label col-sm-2">Name</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="frm_product_name" name="frm_product_name" value="<?= $var_data['product_name']; ?>">
                </div>
              </div>

              <div class="form-group">
                <label for="frm_product_desc" class="control-label col-sm-2">Descripton</label>
                <div class="col-sm-10">
                  <textarea class="form-control" name="frm_product_desc" rows="8" cols="40"><?= $var_data['product_desc']; ?></textarea>
                </div>
              </div>

              <div class="form-group">
                <label for="frm_product_height" class="control-label col-sm-2">Height</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="frm_product_height" name="frm_product_height" value="<?= $var_data['product_height']; ?>">
                </div>
              </div>

              <div class="form-group">
                <label for="frm_product_weight" class="control-label col-sm-2">Weight</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="frm_product_weight" name="frm_product_weight" value="<?= $var_data['product_weight']; ?>">
                </div>
              </div>

              <div class="form-group">
                <label for="frm_product_price" class="control-label col-sm-2">Price</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="frm_product_price" name="frm_product_price" value="<?= $var_data['product_price']; ?>">
                </div>
              </div>

              <div class="form-group">
                <label for="frm_product_qty" class="control-label col-sm-2">Quantity</label>
                <div class="col-sm-10">
                  <input type="number" class="form-control" id="frm_product_qty" name="frm_product_qty" value="<?= $var_data['qty']; ?>">
                </div>
              </div>

              <div class="form-group">
                <label for="frm_img" class="control-label col-sm-2">File input</label>
                <div class="col-sm-10">
                  <input type="file" id="frm_img" class="form-control" name="frm_img[]" multiple="multiple"><br/>
                  <img src="../admin/<?= $var_data['product_image_path']; ?>" id="frm_preview" weight="100" height="100"/>
                  <span class="help-block">Bisa memilih lebih dari satu gambar</span>
                </div>
              </div>

              <div class="form-group">
                <label for="frm_product_desc" class="control-label col-sm-2">Category</label>
                <div class="col-sm-10">
                  <select class="form-control" name="frm_product_category">
                      <option value="<?= $var_data['category_id'];?>"><?= $var_data['category_name'];?></option>
                    </select>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="panel-footer">
            <div class="row">
              <div class="col-sm-12 col-sm-push-2">
                <button type="submit" class="btn btn-primary col-sm-2" name="btn_update_product">Update</button>
                &nbsp;
                <a href="?page=product" class="btn btn-default" name="btn_cancel_product">Cancel</a>
              </div>
            </div>
          </form>
        </div>
        <!-- /panel-footer -->
        <?php }} ?>
      </form>
    </div>

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
