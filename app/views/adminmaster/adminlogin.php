<?php require APPROOT . '/views/admininc/adminheader.php'; ?>

  <div class="login-wrapper">
        <div class="container-center">
            <div class="panel panel-bd">
                <div class="panel-heading">
                    <div class="view-header">
                        <div class="header-icon">
                            <i class="pe-7s-unlock"></i>
                        </div>
                        <div class="header-title">
                            <h3>Login</h3>
                            <small><strong>Please enter your credentials to login.</strong></small>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <form action="<?php echo URLROOT; ?>/adminmaster/adminlogin" method="post" id="loginForm" novalidate>
                        <div class="form-group">
                            <label class="control-label" for="username">Username</label>
                            <input id="username" type="text" name="username" class="form-control <?php echo (!empty($data['username_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['username']; ?>">
                            <span class="invalid-feedback" style="color: red;"><?php echo $data['username_err']; ?></span>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="password">Password</label>
                            <input type="password" name="password" class="form-control form-control-lg <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['password']; ?>">
                            <span class="invalid-feedback" style="color: red;"><?php echo $data['password_err']; ?></span>
                        </div>
                        <div>
                            <input type="submit" value="Login" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content-wrapper -->

<?php //require APPROOT . '/views/admininc/adminfooter.php'; ?>