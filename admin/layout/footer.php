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
  <script type="text/javascript" src="../assets/al/dist/js/app.min.js"></script>
  <script type="text/javascript" src="../assets/al/dist/js/dashboard2.js"></script>
  <script type="text/javascript" src="../assets/plugins/datatables/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="../assets/plugins/datatables/dataTables.bootstrap.min.js"></script>
  <script type="text/javascript" src=""></script>
  <script type="text/javascript">
  $(function () {
    $('#category').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });

  $(function () {
    $('#detailCustomer').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
  </script>

  </body>
  <!-- /body header.php -->
</html>
<!--/html header.php  -->
