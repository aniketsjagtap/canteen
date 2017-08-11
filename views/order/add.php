<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Order Add</h3>
            </div>
			 
            <?php echo form_open('order/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-4">
						<label for="rawMaterial_id" class="control-label">Raw Material</label>
						<div class="form-group">
							<select required name="rawMaterial_id" class="form-control" id="rawMaterial_id" > 
								<option value="">Select Raw Material</Option>
								<?php foreach($rawmaterial as $key => $value){ ?>
												<option value="<?php echo $value['id'];?>"><?php echo $value['name'];?></option> 
								<?php } ?>
							</select> 
						</div>
					</div>
					<div class="col-md-4">
						<label for="quantity" class="control-label">Quantity</label>
						<div class="form-group">
							<input required type="number" step="0.1" name="quantity" value="" class="form-control" id="quantity" />
						</div>
					</div>
					<div class="col-md-4">
						<label for="unit_id" class="control-label">Unit</label>
						<div class="form-group">
							<select required name="unit_id" class="form-control" id="unit_id" > 
								<option value="">Select unit</Option>
								<?php foreach($units as $key => $value){ ?>
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