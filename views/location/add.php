<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Location Add</h3>
            </div>
			 
            <?php echo form_open('location/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-4">
						<label for="name" class="control-label">Name</label>
						<div class="form-group">
							<input type="text" name="name" value="<?php echo $this->input->post('name'); ?>" class="form-control" id="name" />
						</div>
					</div>
					<div class="col-md-4">
						<label for="address" class="control-label">Address</label>
						<div class="form-group">
							<input type="text" name="address" value="<?php echo $this->input->post('address'); ?>" class="form-control" id="address" />
						</div>
					</div>
					<div class="col-md-4">
						<label for="division_id" class="control-label">Division</label>
						<div class="form-group">
							<select name="division_id" class="form-control" id="division_id" > 
								<option value=" ">Select Division</Option>
								<?php foreach($division as $key => $value){ ?>
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