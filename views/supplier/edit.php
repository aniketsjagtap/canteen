<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Supplier Edit</h3>
            </div>
			 
			<?php echo form_open('supplier/edit/'.$supplier['id']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-4">
						<label for="name" class="control-label">Name</label>
						<div class="form-group">
							<input required type="text" name="name" value="<?php echo ($this->input->post('name') ? $this->input->post('name') : $supplier['name']); ?>" class="form-control" id="name" />
						</div>
					</div>
					<div class="col-md-4">
						<label for="address" class="control-label">Address</label>
						<div class="form-group">
							<input required type="textbox" name="address" value="<?php echo ($this->input->post('address') ? $this->input->post('address') : $supplier['address']);?>" class="form-control" id="address" />
						</div>
					</div>
					<div class="col-md-4">
						<label for="status_id" class="control-label">Status</label>
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