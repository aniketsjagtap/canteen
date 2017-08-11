<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Person Add</h3>
            </div>
			 
            <?php echo form_open('person/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-3">
						<label for="username" class="control-label">User Name *</label>
						<div class="form-group">
							<input required type="text" name="username" value="<?php echo $this->input->post('username'); ?>" class="form-control" id="username" />
						</div>
					</div>
					<div class="col-md-3">
						<label for="first_name" class="control-label">First Name *</label>
						<div class="form-group">
							<input required type="text" name="first_name" value="<?php echo $this->input->post('first_name'); ?>" class="form-control" id="first_name" />
						</div>
					</div>
					<div class="col-md-3">
						<label for="middle_name" class="control-label">Middle Name</label>
						<div class="form-group">
							<input type="text" name="middle_name" value="<?php echo $this->input->post('middle_name'); ?>" class="form-control" id="middle_name" />
						</div>
					</div>
					<div class="col-md-3">
						<label for="Last_name" class="control-label">Last Name *</label>
						<div class="form-group">
							<input required type="text" name="Last_name" value="<?php echo $this->input->post('Last_name'); ?>" class="form-control" id="Last_name" />
						</div>
					</div>
					
					<div class="col-md-3">
						<label for="password" class="control-label">Password *</label>
						<div class="form-group">
							<input required type="password" name="password" value="<?php echo $this->input->post('password'); ?>" class="form-control" id="password" />
						</div>
					</div>
					
					
					<div class="col-md-3">
						<label for="gender" class="control-label">Gender *</label>
						<div class="form-group">
							<input type="radio" name="gender" value="male" <?php echo ($gender=='male' ? '' : '');?> />Male
							<input type="radio" name="gender" value="female" <?php echo ($gender=='female' ? '' : '');?> />Female									
						</div>
					</div>
					<div class="col-md-3">
						<label for="mobile" class="control-label">Mobile Number *</label>
						<div class="form-group">
							<input required type="text" name="mobile" value="<?php echo $this->input->post('mobile'); ?>" class="form-control" id="mobile" />
						</div>
					</div>
					<div class="col-md-3">
						<label for="email" class="control-label">email</label>
						<div class="form-group">
							<input type="email" name="email" value="<?php echo $this->input->post('email'); ?>" class="form-control" id="email" />
						</div>
					</div>
					<div class="col-md-3">
						<label for="role_id" class="control-label">Role *</label>
						<div class="form-group">
							<select required name="role_id" class="form-control" id="role_id" > 
									<option value="">Select User Role</Option>
									<?php foreach($role as $key => $value){ ?>
										<option value="<?php echo $value['role_id'];?>"><?php echo $value['role_description'];?></option> 
									<?php } ?>
								</select> 
						</div>
					</div>
					<div class="col-md-3">
						<label for="location_id" class="control-label">Location *</label>
						<div class="form-group">
							<select required name="location_id" class="form-control" id="location_id" > 
									<option value="">Select Working Location</Option>
									<?php foreach($location as $key => $value){ ?>
										<option value="<?php echo $value['id'];?>"><?php echo $value['address']." ---- ".$value['name'];?></option> 
									<?php } ?>
								</select> 
						</div>
					</div>
					<div class="col-md-4">
						<label for="status_id" class="control-label">Status *</label>
						<div class="form-group">
							<select required name="status_id" class="form-control" id="status_id" > 
									<option value="">Select Supplier Status</Option>
									<?php foreach($status as $key => $value){ ?>
										<option value="<?php echo $value['id'];?>"><?php echo $value['name'];?></option> 
									<?php } ?>
							</select>
						</div>
					</div>
					
				</div>
			</div>
          	<div class="box-footer">
            	<button type="submit" class="btn btn-success">
            		<i class="fa fa-check"></i> Save
            	</button>
          	</div>
            <?php echo form_close(); ?>
      	</div>
    </div>
</div>