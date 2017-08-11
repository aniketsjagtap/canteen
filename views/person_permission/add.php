<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Person Permission Add</h3>
            </div>
			 
            <?php echo form_open('person_permission/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-6">
						<label for="person_id" class="control-label">Person Id</label>
						<div class="form-group">
							<input type="text" name="person_id" value="<?php echo $this->input->post('person_id'); ?>" class="form-control" id="person_id" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="permission_id" class="control-label">Permission Id</label>
						<div class="form-group">
							<input type="text" name="permission_id" value="<?php echo $this->input->post('permission_id'); ?>" class="form-control" id="permission_id" />
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