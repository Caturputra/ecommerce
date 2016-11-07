<?php require 'login_check.php'; include 'layout/header.php'; ?>
<div id="container">
  <header id="header" class="navbar navbar-static-top">
    <div class="navbar-header">
      <a href="" class="navbar-brand">OurStore</a>
    </div>
  </header><br><br>
  <div id="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-offset-4 col-sm-4">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h1 class="panel-title"><i class="fa fa-lock"></i> Please enter your login details.</h1>
            </div>
            <div class="panel-body">
              <?php if ( isset($var_message) ) : ?>
                <div class="alert alert-danger">
                  <i class="fa fa-key fa-lg"></i><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <strong><?= $var_message; ?></strong>
                </div>
              <?php endif; ?>
              <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="input-username">Username</label>
                  <div class="input-group"><span class="input-group-addon"><i class="fa fa-user"></i></span>
                    <input type="text" name="frm_username" value="" placeholder="Username" id="input-username" class="form-control" />
                  </div>
                </div>
                <div class="form-group">
                  <label for="input-password">Password</label>
                  <div class="input-group"><span class="input-group-addon"><i class="fa fa-lock"></i></span>
                    <input type="password" name="frm_password" value="" placeholder="Password" id="input-password" class="form-control" />
                  </div>
                </div>
                <div class="text-right">
                  <button type="submit" class="btn btn-primary" name="btn_login"><i class="fa fa-key"></i> Login</button>
                </div>
              </form>
            </div>
          </div>
          <!--/panel  -->
        </div>
        <!-- col -->
      </div>
      <!-- /row -->
    </div>
    <!-- /container-fluid -->
  </div>
  <!-- /container -->
</div>
<!-- /content -->
