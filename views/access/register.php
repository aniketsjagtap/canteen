<div class="register-box">
  <div class="register-logo text-center">
	<a href="<?=site_url('User/login');?>"><img src="<?=base_url('themes/dist/img/user2-160x160.jpg');?>" height="100" width="300" class="img-rounded" alt="Symbi Eat"/></a>
  </div>

  <div class="register-box-body">
    <p class="login-box-msg">Register a new membership</p>

    <!--<form action="	method="POST">-->
	<?php echo validation_errors(); ?>
	<?php echo form_open('User/do_register');?>
      <div class="form-group has-feedback">
        <input name="username" type="text" class="form-control" placeholder="Full name">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input name="email" type="email" class="form-control" placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input name="password" type="password" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input name="passconf" type="password" class="form-control" placeholder="Retype password">
        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
      </div>
	<!--  <div class="form-group has-feedback">
		<select name="department">
		<option value="Account">Account</option>
		<option value="IT">IT</option>
		<option value="Enviornment">Enviornment</option>
		<option value="Production">Production</option>
		<option value="HR">HR</option>
		<option value="Marketing">Marketing</option>
		</select>
        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
      </div> -->
      <div class="row">
      <!--  <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input name="cb" type="checkbox"> I agree to the <a href="#">terms</a>
            </label>
          </div>
        </div> -->
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

   <!-- <div class="social-auth-links text-center">
      <p>- OR -</p>
      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign up using
        Facebook</a>
      <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign up using
        Google+</a>
    </div>
-->
    <a href="<?=site_url('User/login');?>" class="text-center">I already have a account</a>
  </div>
  <!-- /.form-box -->
</div>
<!-- /.register-box -->