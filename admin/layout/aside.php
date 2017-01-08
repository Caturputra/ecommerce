<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">

    <!-- Sidebar user panel (optional) -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="../images/avatar5.png" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p>  <?php /*Echo nama admin*/ if(isset($_SESSION['username'])) echo $_SESSION['username']; ?></p>
        <!-- Status -->
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <ul class="sidebar-menu">
      <li class="header">MENU NAVIGATION</li>
      <!-- Optionally, you can add icons to the links -->
      <?php
        /* Display menu dari database*/

        $var_sqlcat = "SELECT * FROM oc_menu WHERE menu_parent = 0 ORDER BY  menu_order ASC";
        $var_querycat = mysqli_query($var_con, $var_sqlcat);
        foreach ($var_querycat as $var_data) {
          $var_subdata = $var_data['menu_id'];
          if (mysqli_num_rows($var_querycat) < 0) {
            echo "<li class=\"treeview\"> ";
              echo "<a href=\"?page=" . urlencode($var_data['menu_link']) . " \">";
                echo "<i class=\"fa fa-link\"></i> <span>" . $var_data['menu_name'] . "</span>";
                  echo "<span class=\"pull-right-container\"><i class=\"fa fa-angle-left pull-right\"></i></span>";
              echo "</a>";
          } else {
            echo "<li class=\"treeview\"> ";
              echo "<a href=\"?page=" . urlencode($var_data['menu_link']) . " \">";
                echo "<i class=\"fa fa-link\"></i> <span>" . $var_data['menu_name'] . "</span>";
              echo "</a>";
          }



            $var_sqlcat2 = "SELECT * FROM oc_menu WHERE menu_parent = '{$var_subdata}'";
            $var_querycat2 = mysqli_query($var_con, $var_sqlcat2);
            echo "<ul class=\"treeview-menu\">";
            while ($var_data2 = mysqli_fetch_array($var_querycat2)) {
              $var_subdata2 = $var_data2['menu_id'];
                echo "<li class=\"cute\">";
                  echo "<a href=\"?page=" . urlencode($var_data2['menu_link']) . " \">";
                    echo $var_data2['menu_name'];
                  echo "</a>";

                  $var_sqlcat3 = "SELECT * FROM oc_menu WHERE menu_parent = '{$var_subdata2}'";
                  $var_querycat3 = mysqli_query($var_con, $var_sqlcat3);
                  echo "<ul class=\"kid-menu\">";

                  while ($var_data3 = mysqli_fetch_array($var_querycat3)) {
                    echo "<li class=\"cute\">";
                        echo "<a href=\"?page=" . urlencode($var_data3['menu_link']) . " \">";
                        echo "<i class=\"fa fa-link\"></i> " . $var_data3['menu_name'];
                      echo "</a>";

                  }
                echo "</ul>";
              echo "</li>";
            }
              echo "</ul>";
            echo "</li>";
        }

        /* End display menu dari database */
      ?>
    </ul>
    <!-- /.sidebar-menu -->
  </section>
  <!-- /.sidebar -->
</aside>
