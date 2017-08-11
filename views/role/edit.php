<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Role Edit</h3>
            </div>
			 
			<?php echo form_open('role/edit/'.$role['role_id']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="role_description" class="control-label">Role Description</label>
						<div class="form-group">
							<input type="text" name="role_description" value="<?php echo ($this->input->post('role_description') ? $this->input->post('role_description') : $role['role_description']); ?>" class="form-control" id="role_description" />
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