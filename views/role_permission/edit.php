<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Role Permission Edit</h3>
            </div>
			 
			<?php echo form_open('role_permission/edit/'.$role_permission['']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="role_id" class="control-label">Role Id</label>
						<div class="form-group">
							<input type="text" name="role_id" value="<?php echo ($this->input->post('role_id') ? $this->input->post('role_id') : $role_permission['role_id']); ?>" class="form-control" id="role_id" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="permission_id" class="control-label">Permission Id</label>
						<div class="form-group">
							<input type="text" name="permission_id" value="<?php echo ($this->input->post('permission_id') ? $this->input->post('permission_id') : $role_permission['permission_id']); ?>" class="form-control" id="permission_id" />
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