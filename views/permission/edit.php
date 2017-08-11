<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Permission Edit</h3>
            </div>
			 
			<?php echo form_open('permission/edit/'.$permission['permission_id']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="permission_description" class="control-label">Permission Description</label>
						<div class="form-group">
							<input type="text" name="permission_description" value="<?php echo ($this->input->post('permission_description') ? $this->input->post('permission_description') : $permission['permission_description']); ?>" class="form-control" id="permission_description" />
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