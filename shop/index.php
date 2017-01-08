<?php
  /* Memanggil database*/
  require '../config.php';

  // validasi untuk detail produk harus sudah ada pilihan
  // if (!isset($_SESSION['items'])) {
  //   header('location: index.php');
  // }

  if($_POST['product_id']) {
    $id = $_POST['product_id']; //escape string
    $var_sqlimg = "SELECT distinct * FROM oc_product_image i JOIN oc_product p on p.product_id = i.product_id JOIN oc_product_desc d on d.product_id = i.product_id WHERE i.product_id = '{$id}' GROUP by i.product_id";
    $var_queryimg = mysqli_query($var_con, $var_sqlimg);
    $var_data = mysqli_fetch_array($var_queryimg);
    echo $var_data['product_id'];
 }
?>

<!-- halaman utama shopping activity -->

<?php include 'layout/header.php'; ?>

<?php include 'layout/main-header.php'; ?>

<!-- begin content -->
<!-- catg header banner section -->
  <section id="aa-catg-head-banner">
   <img src="../images/page-top.jpg" alt="product img">
   <div class="aa-catg-head-banner-area">
     <div class="container">
      <div class="aa-catg-head-banner-content">
        <h2>Product</h2>
        <ol class="breadcrumb">
          <li><a href="../index.php">Home</a></li>
          <li class="active">Product</li>
        </ol>
      </div>
     </div>
   </div>
  </section>
  <!-- / catg header banner section -->
  <!-- product category -->
   <section id="aa-product-category">
     <div class="container">
       <div class="row">
         <div class="col-lg-9 col-md-9 col-sm-8 col-md-push-3">
           <div class="aa-product-catg-content">
             <div class="aa-product-catg-head">
               <div class="aa-product-catg-head-left">
                 <form action="" class="aa-sort-form" method="post">
                   <label for="">Sort by</label>
                   <select name="frm_sort">
                     <option value="1" selected="Default">Default</option>
                     <option value="2">Name</option>
                     <option value="3">Price</option>
                     <option value="4">Date</option>
                   </select>
                 </form>
                 <form action="frm_show" class="aa-show-form" method="post">
                   <label for="">Show</label>
                   <select name="">
                     <option value="1" selected="12">12</option>
                     <option value="2">24</option>
                     <option value="3">36</option>
                   </select>
                 </form>
               </div>
               <div class="aa-product-catg-head-right">
                 <a id="grid-catg" href="#"><span class="fa fa-th"></span></a>
                 <a id="list-catg" href="#"><span class="fa fa-list"></span></a>
               </div>
             </div>
             <div class="aa-product-catg-body">
               <ul class="aa-product-catg">
                 <!-- start single product item -->
                 <?php
                    /*
                    ** Menampilkan product
                    */
                    $var_cat_id = isset($_GET['cat_id']) ? $_GET['cat_id'] : "";
                    $var_product_sort = isset($_POST['frm_sort']) ? $_POST['frm_sort'] : "";
                    $var_product_show = isset($_POST['frm_show']) ? $_POST['frm_show'] : "";
                    $var_id_mark = mysqli_fetch_array(mysqli_query($var_con, "SELECT category_id FROM oc_category WHERE category_id = '{$var_cat_id}' "));
                    if ($var_id_mark['category_id'] === $var_cat_id && $var_product_sort) {
                      $var_sqlimg = "SELECT * FROM oc_product_image i
                                        JOIN oc_product p on p.product_id = i.product_id
                                        JOIN oc_product_desc d on d.product_id = i.product_id
                                        WHERE i.product_id = p.product_id and i.product_id = d.product_id and p.category_id IN
                                        (SELECT category_parent FROM oc_category WHERE category_parent = '{$var_cat_id}' ) GROUP by i.product_id ORDER BY '{$var_product_sort}' ASC";
                      $var_queryimg = mysqli_query($var_con, $var_sqlimg);
                    } else  {
                      $var_sqlimg = "SELECT * FROM oc_product_image i JOIN oc_product p on p.product_id = i.product_id JOIN oc_product_desc d on d.product_id = i.product_id WHERE i.product_id = p.product_id and i.product_id = d.product_id GROUP by i.product_id";
                      $var_queryimg = mysqli_query($var_con, $var_sqlimg);
                    }
                    while ($var_img = mysqli_fetch_array($var_queryimg)) {
                ?>
                 <li>
                   <figure>
                     <a class="aa-product-img" href="#"><img class="img-responsive " src="../admin/<?= $var_img['product_image_path']?>" alt="<?= $var_img['product_image_name']?>"></a>
                     <a class="aa-add-card-btn"href="cart.php?act=add&amp;product_id=<?php echo $var_img['product_id']; ?>&amp;ref=index.php?id=<?php echo $var_img['product_id'];?>"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                     <figcaption>
                       <h4 class="aa-product-title"><a href="#"><?= $var_img['product_name'] ?></a></h4>
                       <span class="aa-product-price">Rp <?= number_format($var_img['product_price'],2,",","."); ?></span>
                       <p class="aa-product-descrip"><?= $var_img['product_desc'] ?>.</p>
                     </figcaption>
                   </figure>
                   <div class="aa-product-hvr-content">
                     <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                     <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>
                     <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-id="<?= $var_img['product_id']; ?>" data-target="#quick-view-modal" class="edit-record"><span class="fa fa-search"></span></a>
                   </div>
                   <!-- product badge -->
                   <!-- <span class="aa-badge aa-sale" href="#">SALE!</span> -->
                 </li>
                 <?php } /* akhir looping*/ ?>
                 <!-- /end product-view -->
               </ul>
               <!-- /container product -->
               <!-- quick view modal -->
               <div class="modal fade" id="quick-view-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                 <div class="modal-dialog">
                   <div class="modal-content">
                     <div class="modal-body">
                     <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                       <div class="row">
                         <?php
                           /*
                           ** Menampilkan product
                           */
                          //  $var_pid = $_GET['product_id'];
                          //  $var_pdid = $_GET['id'];
                           //
                           //
                          //  $var_sqlimg = "SELECT * FROM oc_product_image i JOIN oc_product p on p.product_id = i.product_id JOIN oc_product_desc d on d.product_id = i.product_id WHERE i.product_id = p.product_id and i.product_id = d.product_id WHERE p.product_id = '{$var_pdid}'";
                          //  $var_queryimg = mysqli_query($var_con, $var_sqlimg);
                         ?>
                         <!-- Modal view slider -->
                         <div class="col-md-6 col-sm-6 col-xs-12">
                           <div class="aa-product-view-slider">
                             <div class="simpleLens-gallery-container" id="demo-1">
                               <div class="simpleLens-container">
                                  <?php
                                    $var_pid = $_GET['product_id'];
                                    $var_pdid = $_GET['id'];
                                    var_dump($var_pdid);


                                    $var_sqlimg = "SELECT * FROM oc_product_image WHERE product_id = '{$var_pid}' or product_id = '{$var_pdid}'";
                                    $var_queryimg = mysqli_query($var_con, $var_sqlimg);
                                    while($var_dataimg = mysqli_fetch_array($var_queryimg)) {
                                  ?>
                                   <div class="simpleLens-big-image-container">
                                       <a class="simpleLens-lens-image" data-lens-image="../admin/uploaded/avatar5.png">
                                           <img src="../admin/uploaded/avatar5.png" class="simpleLens-big-image">
                                       </a>
                                   </div>
                                   <?php } ?>
                               </div>
                               <?php while($var_dataimg = mysqli_fetch_array($var_queryimg)) { ?>
                               <div class="simpleLens-thumbnails-container">
                                   <a href="#" class="simpleLens-thumbnail-wrapper"
                                      data-lens-image="img/view-slider/large/polo-shirt-1.png"
                                      data-big-image="img/view-slider/medium/polo-shirt-1.png">
                                       <img src="img/view-slider/thumbnail/polo-shirt-1.png">
                                   </a>
                               </div>
                               <?php } ?>
                               <!-- /thumbnail image -->
                             </div>
                           </div>
                         </div>
                         <!-- Modal view content -->
                         <div class="col-md-6 col-sm-6 col-xs-12">
                           <div class="aa-product-view-content">
                             <h3>T-asd</h3>
                             <div class="aa-price-block">
                               <span class="aa-product-view-price fetched-data">$34.99</span>
                               <p class="aa-product-avilability">Avilability: <span>In stock</span></p>
                             </div>
                             <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis animi, veritatis quae repudiandae quod nulla porro quidem, itaque quis quaerat!</p>
                             <h4>Size</h4>
                             <div class="aa-prod-view-size">
                               <a href="#">S</a>
                               <a href="#">M</a>
                               <a href="#">L</a>
                               <a href="#">XL</a>
                             </div>
                             <div class="aa-prod-quantity">
                               <form action="">
                                 <select name="" id="">
                                   <option value="0" selected="1">1</option>
                                   <option value="1">2</option>
                                   <option value="2">3</option>
                                   <option value="3">4</option>
                                   <option value="4">5</option>
                                   <option value="5">6</option>
                                 </select>
                               </form>
                               <p class="aa-prod-category">
                                 Category: <a href="#">Polo T-Shirt</a>
                               </p>
                             </div>
                             <div class="aa-prod-view-bottom">
                               <a href="cart.php?act=add&amp;product_id=<?php echo $var_img['product_id']; ?>&amp;ref=index.php?id=<?php echo $var_img['product_id'];?>" class="aa-add-to-cart-btn"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                               <a href="product_view.php?id=<?= urldecode($var_img['product_id']); ?>" class="aa-add-to-cart-btn">View Details</a>
                             </div>
                           </div>
                         </div>
                       </div>
                     </div>
                   </div><!-- /.modal-content -->
                 </div><!-- /.modal-dialog -->
               </div>
               <!-- / quick view modal -->
             </div>
             <div class="aa-product-catg-pagination">
               <nav>
                 <ul class="pagination">
                   <li>
                     <a href="#" aria-label="Previous">
                       <span aria-hidden="true">&laquo;</span>
                     </a>
                   </li>
                   <li><a href="#">1</a></li>
                   <li><a href="#">2</a></li>
                   <li><a href="#">3</a></li>
                   <li><a href="#">4</a></li>
                   <li><a href="#">5</a></li>
                   <li>
                     <a href="#" aria-label="Next">
                       <span aria-hidden="true">&raquo;</span>
                     </a>
                   </li>
                 </ul>
               </nav>
             </div>
           </div>
         </div>

        <div class="col-lg-3 col-md-3 col-sm-4 col-md-pull-9">
         <?php /*sidebar*/ include 'layout/sidebar.php'; ?>
       </div>
       <!-- /col-sidebar -->


       </div>
       <!-- /.row -->
     </div>
     <!-- .container -->
   </section>
   <!-- / product category -->

   <!-- Client Brand -->
    <section id="aa-client-brand">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="aa-client-brand-area">
              <ul class="aa-client-brand-slider">
                <li><a href="#"><img src="../images/brand1.png" alt="Samsung img"></a></li>
                <li><a href="#"><img src="../images/brand2.png" alt="Epson img"></a></li>
                <li><a href="#"><img src="../images/brand3.png" alt="Caonon img"></a></li>
                <li><a href="#"><img src="../images/brand4.png" alt="HP img"></a></li>
                <li><a href="#"><img src="../images/brand5.png" alt="Brother img"></a></li>
                <li><a href="#"><img src="../images/brand6.png" alt="Kingston img"></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- / Client Brand -->

    <script type="text/javascript">
      $(document).ready(function(){
        $(".edit-record").click(function(e) {
          var m = $(this).attr("data-id");
         $.ajax({
              url: "hasil.php",
              type: "GET",
              data : {product_id: m,},
              success: function (ajaxData){
                $("#quick-view-modal").html(ajaxData);
                $("#quick-view-modal").modal('show',{backdrop: 'true'});
               }
             });
            });
          });
      });
    </script>

<!-- /end content -->

<?php include 'layout/footer.php'; ?>
