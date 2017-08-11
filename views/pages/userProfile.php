<h3 class="box-header">Edit User Profile:</h3>
      <ol class="breadcrumb">
        <li><a href="<?php echo site_url('User/redi')?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Profile</li>
        <!--<li class="active">Dashboard</li>-->
      </ol>
    </section>

    <!-- Main content -->
<section class="content">
    <div class="row">
		<form method="post" action="saveLoggedInUser" enctype="multipart/form-data">
            <div class="col-md-6 offset-md-3">
              <!-- Profile Image -->
              <div class="box box-primary">
                <div class="box-body box-profile">
				  <div class="form-group">
					<input type="hidden" name="personID" value="<?php echo $uinfo['person_id']; ?>">
					<label for="username">Username</label>
                    <input type="text" name="username" class="form-control" value="<?php echo $uinfo['username']; ?>">
				  </div>
				  <div>
						<label for="password" class="control-label">Password</label>
						<div class="form-group">
							<input type="password" name="password" value="<?php echo $this->input->post('password');?>" class="form-control" id="password" />
						</div>
					</div>
                  <div class="form-group">
					<label for="first_name">First Name</label>
                    <input type="text" name="first_name" class="form-control" value="<?php echo $uinfo['first_name']; ?>">
				  </div>
					<label for="last_name">Last Name</label>
                    <input type="text" name="last_name" class="form-control" value="<?php echo $uinfo['Last_name']; ?>"><br>
				  <div class="form-group">
						<label for="gender">Gender</label>
							<input type="radio" name="gender" value="male" <?php echo ($uinfo['gender']=='male' ? 'checked' : '');?> />Male
							<input type="radio" name="gender" value="female" <?php echo ($uinfo['gender']=='female' ? 'checked' : '');?> />Female									
					</div>
					<div class="form-group">
					  <label for="mobile">Mobile Number</label>
						<input type="text" name="mobile" class="form-control" value="<?php echo $uinfo['mobile']; ?>">
						<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
					 </div>
					 <div class="form-group">
					  <label for="email">Email</label>
						<input type="email" name="email" class="form-control" value="<?php echo $uinfo['email']; ?>" />
						<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
					 </div>
					 <div class="box-footer">
						<button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-save"> Save</i></button>
					</div>

				  </div>
				</div>
			</div>
		</form>
	</div>