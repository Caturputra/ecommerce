<?php
/* Memanggil database */
require '../config.php';

//
// /* Memanggil fungsi pada folder inc/function */
// require '../inc/function.php';

/* Fungsi untuk insert product */
if (isset($_POST['btn_insert_product'])) {
  $var_name = validateSecurity($_POST['frm_product_name']);
  $var_desc = validateSecurity($_POST['frm_product_desc']);
  $var_height = validateSecurity($_POST['frm_product_height']);
  $var_weight = validateSecurity($_POST['frm_product_weight']);
  $var_price = validateSecurity($_POST['frm_product_price']);
  $var_qty = validateSecurity($_POST['frm_product_qty']);
  $var_cat = validateSecurity($_POST['frm_product_category']);

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

  if (empty($var_cat)) {
    $var_message = "We need category name.";
    $var_init = false;
  } else

  if (!isset($_FILES['frm_img']['name'])) {
    $var_message = "Select image before!";
    $var_init = false;
  }  else {

    if (isset($_FILES['frm_img']['name'])) {
      /*
      ** Untuk multiple upload
      ** Proses data ke product
      */
      $var_product = array(
        'product_id' => null,
        'product_price' => $var_price,
        'product_height' => $var_height,
        'product_weight' => $var_weight,
        'qty' => $var_qty,
        'category_id' => $var_cat
      );

      if(insert($var_con, "oc_product", $var_product)){
        // $var_message = "Data not uploaded.";
      } else {
        // echo '<script>
        // var conn=confirm("Data is inserted.");
        // if(conn==true){
        //      window.location.assign("?page=product");
        // }
        // </script>';
      }

      /*
      ** Proses untuk memasukkan data ke deskripsi produk
      */
      $var_get_id = mysqli_insert_id($var_con);
      $var_product_desc = array(
        'product_name' => $var_name,
        'product_desc' => $var_desc,
        'product_id' => $var_get_id
      );
      insert($var_con, "oc_product_desc", $var_product_desc);

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
                'product_id' => $var_get_id
              );
              if(insert($var_con, "oc_product_image", $var_data)){
                $var_message = "Data not uploaded.";
              } else {
                echo '<script>
                var conn=confirm("Data is inserted.");
                if(conn==true){
                  window.location.assign("?page=product");
                }
                </script>';
              }

            }
            /* end of uploaded */
          }
          /* end of cek type */
        }
        /* end jika validate = true*/
      }
      /* end of perulangan insert gambar */
    }
    /* end of pengecekan gambar */
  }
  /* end of semua form terisi */
}
/* end of button insert product */
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
        <h3 class="panel-title"><i class="fa fa-edit fa-lg"></i>Add Product</h3>
      </div>
      <div class="panel-body">
        <div clas="row">
          <div class="col-sm-12">
            <?php if ( isset($var_message) ) : ?>
              <div class="alert alert-warning">
                <i class="fa fa-warning fa-lg"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong><?= $var_message; ?></strong>
              </div>
            <?php endif; ?>
            <form action="" class="form-horizontal" method="POST" enctype="multipart/form-data">
              <div class="form-group">
                <label for="frm_product_name" class="control-label col-sm-1">Name</label>
                <div class="col-sm-11">
                  <input type="text" class="form-control" id="frm_product_name" name="frm_product_name">
                </div>
              </div>

              <div class="form-group">
                <label for="frm_product_desc" class="control-label col-sm-1">Descripton</label>
                <div class="col-sm-11">
                  <textarea class="form-control" name="frm_product_desc" rows="8" cols="40"></textarea>
                </div>
              </div>

              <div class="form-group">
                <label for="frm_product_height" class="control-label col-sm-1">Height</label>
                <div class="col-sm-11">
                  <input type="text" class="form-control" id="frm_product_height" name="frm_product_height">
                </div>
              </div>

              <div class="form-group">
                <label for="frm_product_weight" class="control-label col-sm-1">Weight</label>
                <div class="col-sm-11">
                  <input type="text" class="form-control" id="frm_product_weight" name="frm_product_weight">
                </div>
              </div>

              <div class="form-group">
                <label for="frm_product_price" class="control-label col-sm-1">Price</label>
                <div class="col-sm-11">
                  <input type="text" class="form-control" id="frm_product_price" name="frm_product_price">
                </div>
              </div>

              <div class="form-group">
                <label for="frm_product_qty" class="control-label col-sm-1">Quantity</label>
                <div class="col-sm-11">
                  <input type="number" class="form-control" id="frm_product_qty" name="frm_product_qty">
                </div>
              </div>

              <div class="form-group">
                <label for="frm_img" class="control-label col-sm-1">File input</label>
                <div class="col-sm-11">
                  <input type="file" id="frm_img" class="form-control" name="frm_img[]" multiple="multiple"><br/>
                  <img src="" id="frm_preview" weight="100" height="100"/>
                  <span class="help-block">Bisa memilih lebih dari satu gambar</span>
                </div>
              </div>

              <div class="form-group">
                <label for="frm_product_desc" class="control-label col-sm-1">Category</label>
                <div class="col-sm-11">
                  <select class="form-control select2" style="width: 100%;" name="frm_product_category">
                    <option value="0" selected="selected">Choose Category</option>
                    <?php
                    $var_sqlcat = "SELECT category_parent, category_name, category_id FROM oc_category";
                    $var_querycat = mysqli_query($var_con, $var_sqlcat);
                    while ($var_data = mysqli_fetch_array($var_querycat)) {
                      ?>
                      <option value="<?= $var_data['category_id']?>"><?= $var_data['category_name']?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <!-- /.form-group -->
              </div>
              <!-- /.col-sm-12 -->
            </div>
            <!-- /,row -->
          </div>
          <!-- /.panel-body -->
          <div class="panel-footer">
            <button type="submit" class="btn btn-primary" name="btn_insert_product">Insert</button>
            <a href="?page=product" class="btn btn-default" name="btn_cancel_cat">Cancel</a>
          </div>
        </form>
      </div>
      <!-- /.panel panel-default -->
    </section>
    <!-- /.main content -->
  </div>
  <!-- /.content-wrapper -->
