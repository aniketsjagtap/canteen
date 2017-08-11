<div class="login-box">
  <div class="login-logo text-center">
	    <a href="<?=site_url('User/login');?>"><img src="<?=base_url('themes/dist/img/user2-160x160.jpg');?>" height="100" width="300" class="img-rounded" alt="Symbi Eat"/></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>

    <!--<form action="../../index2.html" method="post">-->
	<?php echo validation_errors(); ?>
	<?php echo form_open('User/login');?>
      <div class="form-group has-feedback">
        <input name="rusername" type="text" class="form-control" placeholder="User Name">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input name="rpassword" type="password" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
		  <?php if(isset($error)): ?>
						<div style="color: red">
							<?php print_r($error); ?>
						</div>
					<?php endif; ?>
          <!--<div class="checkbox icheck">
            <label>
              <input type="checkbox"> Remember Me
            </label>
          </div>-->
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>

    <div class="social-auth-links text-center">
      <!--<p>- OR -</p>
      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using
        Facebook</a>
      <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using
        Google+</a>-->
    </div>
    <!-- /.social-auth-links -->

    <!--<a href="#">I forgot my password</a><br>-->
   <!-- <a href="<?//echo site_url('User/register');?>" class="text-center">Register a new membership</a>-->

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
