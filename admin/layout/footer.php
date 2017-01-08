<!-- Main Footer -->
<footer class="main-footer">
  <!-- To the right -->
  <div class="pull-right hidden-xs">
    OurStore - Online Shop
  </div>
  <!-- Default to the left -->
  <strong>Copyright &copy; 2016 <a href="#">Company</a>.</strong> All rights reserved.
</footer>

  <!-- External script javascript -->
  <script type="text/javascript" src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
  <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
  <script type="text/javascript" src="../assets/plugins/datatables/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="../assets/plugins/datatables/dataTables.bootstrap.min.js"></script>
  <script type="text/javascript" src="../assets/plugins/slimScroll/jquery.slimscroll.min.jss"></script>
  <script type="text/javascript" src="../assets/plugins/select2/select2.full.min.js"></script>
  <script type="text/javascript" src="../assets/plugins/iCheck/icheck.min.js"></script>
  <script type="text/javascript" src="../assets/al/dist/js/app.min.js"></script>
  <script type="text/javascript">
  $(function () {
    //Initialize Select2 Elements
    $(".select2").select2();

    // DataTable
    $("#tableCategory").DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": false,
      "info": true,
      "autoWidth": true
    });


    $("#tableProduct").DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": false,
      "info": true,
      "autoWidth": true
    });
  });
  </script>

  </body>
  <!-- /body header.php -->
</html>
<!--/html header.php  -->
