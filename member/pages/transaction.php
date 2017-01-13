<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Transaction
            <small>
                <ol class="breadcrumb">
                    <li><a href="?page=home"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active"><a href=""><i class="fa fa-dashboard"></i> Transaction</a></li>
                </ol>
            </small>
        </h1>

    </section>

    <!-- Your Page Content Here -->
    <!-- Main content -->
    <section class="content">
        <?php
        //koneksi db
        require_once '../config.php';
        ?>
        <!-- Your Page Content Here -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-th-list fa-lg"></i> Transaction Data</h3>
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
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover" id="tableTrans">
                                <thead>
                                    <tr>
                                        <th><center>Nama Barang</center></th>
                                        <th><center>Jumlah Barang</center></th>
                                        <th><center>Harga Satuan</center></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    $var_sqlTrans = "SELECT t.trans_id, t.trans_total, td.trans_product_id, td.trans_qty, pd.product_name, p.product_price
                                        FROM oc_trans t
                                        JOIN oc_trans_detail td ON t.trans_id = td.trans_id
                                        JOIN oc_product p ON p.product_id = td.trans_product_id
                                        JOIN oc_product_desc pd ON p.product_id = pd.product_id
                                        WHERE t.trans_customer='{$_SESSION['customer']}'
                                        GROUP BY pd.product_name";
                                    $var_queryTrans = mysqli_query($var_con, $var_sqlTrans);
                                    $var_dataTransFetch = mysqli_fetch_array($var_queryTrans);
                                    while ($var_dataTrans = mysqli_fetch_array($var_queryTrans)) {
                                        ?>
                                        <tr>
                                            <td class="text-left"><?php echo $var_dataTrans['product_name']; ?></td>
                                            <td class="text-right"><?php echo number_format($var_dataTrans['trans_qty']); ?></td>
                                            <td class="text-right"><?php echo number_format($var_dataTrans['product_price']); ?></td>
                                        </tr>

                                        <?php
                                        var_dump($var_dataTrans);
                                        } ?>
                                        <tr>
                                            <td></td>
                                            <td class="text-right">Total pay:</td>
                                            <td class="text-right"><?php echo number_format($var_dataTransFetch['trans_total']); ?></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td class="text-right"><a href="" class="btn btn-sm btn-warning">Pay</a></td>
                                        </tr>
                                    </tbody>
                                </table> <!-- /.table -->
                            </div> <!-- /.table-responsive -->
                        </div> <!-- /.col-sm-12 -->
                    </div> <!-- /.row -->
                </div> <!-- /.panel-body -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
