<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Person Edit</h3>
            </div>
			 
			<?php echo form_open('person/edit/'.$person['person_id']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-3">
						<label for="username" class="control-label">User Name *</label>
						<div class="form-group">
							<input required type="text" name="username" value="<?php echo ($this->input->post('username') ? $this->input->post('username') : $person['username']); ?>" class="form-control" id="first_name" />
						</div>
					</div>
					<div class="col-md-3">
						<label for="password" class="control-label">Password</label>
						<div class="form-group">
							<input type="password" name="password" value="<?php echo $this->input->post('password');?>" class="form-control" id="password" />
						</div>
					</div>
					<div class="col-md-3">
						<label for="first_name" class="control-label">First Name *</label>
						<div class="form-group">
							<input required type="text" name="first_name" value="<?php echo ($this->input->post('first_name') ? $this->input->post('first_name') : $person['first_name']); ?>" class="form-control" id="first_name" />
						</div>
					</div>
					<div class="col-md-3">
						<label for="middle_name" class="control-label">Middle Name</label>
						<div class="form-group">
							<input type="text" name="middle_name" value="<?php echo ($this->input->post('middle_name') ? $this->input->post('middle_name') : $person['middle_name']); ?>" class="form-control" id="middle_name" />
						</div>
					</div>
					<div class="col-md-3">
						<label for="Last_name" class="control-label">Last Name *</label>
						<div class="form-group">
							<input required type="text" name="Last_name" value="<?php echo ($this->input->post('Last_name') ? $this->input->post('Last_name') : $person['Last_name']); ?>" class="form-control" id="Last_name" />
						</div>
					</div>
					<div class="col-md-3">
						<label for="gender" class="control-label">Gender *</label>
						<div class="form-group">
							<input type="radio" name="gender" value="male" <?php echo ($person['gender']=='male' ? 'checked' : '');?> />Male
							<input type="radio" name="gender" value="female" <?php echo ($person['gender']=='female' ? 'checked' : '');?> />Female									
						</div>
					</div>
					<div class="col-md-3">
						<label for="mobile" class="control-label">Mobile Number *</label>
						<div class="form-group">
							<input required type="text" name="mobile" value="<?php echo ($this->input->post('mobile') ? $this->input->post('mobile') : $person['mobile']); ?>" class="form-control" id="first_name" />
						</div>
					</div>
					<div class="col-md-3">
						<label for="email" class="control-label">Email</label>
						<div class="form-group">
							<input type="text" name="email" value="<?php echo ($this->input->post('email') ? $this->input->post('email') : $person['email']); ?>" class="form-control" id="email" />
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