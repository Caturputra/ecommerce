<?php
  // operasi
  if (isset($_POST['btn_update_cat'])) {
    $var_cat_name = validateSecurity($_POST['frm_cat_name']);
    $var_cat_desc = validateSecurity($_POST['frm_cat_desc']);
    $var_cat_parent = validateSecurity($_POST['frm_cat_parent']);
    $var_cat_order = validateSecurity($_POST['frm_cat_order']);

    if (empty($var_cat_name)) {
      $var_message = "Name of category cannot Blank!";
    }

    $cat_id = $_GET['cat_id'];

    if (!empty($var_cat_name)) {
      $var_update = array(
        'category_name' => $var_cat_name,
        'category_parent' => $var_cat_parent,
        'category_desc' => $var_cat_desc,
        'sort_order' => $var_cat_order
      );
      $var_update_id = array('category_id' => $cat_id);
      if (update($var_con, "oc_category", $var_update, $var_update_id)) {
        $var_message = "Data not updated.";
      } else {
        echo '<script>
        var conn=confirm("Data is updated.");
        if(conn==true){
             window.location.assign("?page=category");
        }
        </script>';
      }
    }
  }
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Update Category
      <small>
        <ol class="breadcrumb">
          <li><a href="?page=home"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="?page=category"> Category</a></li>
          <li class="active"> Update Category</li>
        </ol>
      </small>
    </h1>

  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Your Page Content Here -->
    <div class="panel panel-warning">
        <div class="panel-heading">
          <h3 class="panel-title"><i class="fa fa-edit fa-lg"></i> Update Category</h3>
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

              <form action="" class="form-horizontal" method="POST">
                <?php
              $cat_id = $_GET['cat_id'];
              if (isset($cat_id)) {
                $var_sql = "SELECT * FROM oc_category WHERE category_id = '{$cat_id}'";
                $var_query = mysqli_query($var_con, $var_sql);
                while ($var_data = mysqli_fetch_array($var_query)) {
              ?>
                <div class="form-group">
                  <label for="frm_cat_name" class="control-label col-sm-2"><i class="fa fa-share-square-o"></i>Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="frm_cat_name" name="frm_cat_name" value="<?= $var_data['category_name']; ?>">
                  </div>
                </div>

                <div class="form-group">
                  <label for="frm_cat_desc" class="control-label col-sm-2">Description</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" name="frm_cat_desc" id="frm_cat_desc" rows="8" cols="40"><?= $var_data['category_desc'];?></textarea>
                  </div>
                </div>

                <div class="form-group">
                  <label for="frm_cat_parent" class="control-label col-sm-2">Parent</label>
                  <div class="col-sm-10">
                    <select class="form-control" name="frm_cat_parent" id="frm_cat_parent">
                      <option value="<?= $var_data['category_parent']; ?>"><?= $var_data['category_name']; ?></option>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label for="frm_cat_parent" class="control-label col-sm-2">Sort Order</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" name="frm_cat_order" value="<?= $var_data['sort_order']; ?>">
                  </div>
                </div>

            </div> <!-- end panel body -->
          </div>
        </div>
        <div class="panel-footer">
          <div class="row">
            <div class="col-sm-12 col-sm-push-2">
              <button type="submit" class="btn btn-primary col-sm-2" name="btn_update_cat">Update</button>
              &nbsp;
              <a href="?page=category" class="btn btn-default" name="btn_cancel_cat">Cancel</a>
            </div>
          </div>
          <?php }} ?>
        </form>
        </div>
      </div>

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
