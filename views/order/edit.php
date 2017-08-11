<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Order Edit</h3>
            </div>
			 
			<?php echo form_open('order/edit/'.$order['id']); ?>
			<div class="box-body">
				<div class="row clearfix">
					
					<div class="col-md-4">
						<label for="rawMaterial_id" class="control-label">Raw Material</label>
						<div class="form-group">
							<?php foreach($rawMaterial as $r){
								if($r['id']==$order['rawMaterial_id']){
								?>
								<input required readonly type="text" value="<?php echo $r['name']; ?>" class="form-control"/>
								<input required readonly  hidden type="number" step="0.5" name="rawMaterial_id" value="<?php echo ($this->input->post('rawMaterial_id') ? $this->input->post('rawMaterial_id') : $order['rawMaterial_id']); ?>" id="rawMaterial_id" />
							<?php }}?>
							
						</div>
					</div>
					<div class="col-md-4">
						<label for="quantity" class="control-label">Quantity</label>
						<div class="form-group">
							<input required type="number" step="0.1" name="quantity" value="<?php echo ($this->input->post('quantity') ? $this->input->post('quantity') : $order['quantity']); ?>" class="form-control" id="quantity" />
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