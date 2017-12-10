<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Sale Edit</h3>
            </div>
			 
			<?php echo form_open('sale/edit/'.$sale['id']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-4">
						<label for="product_id" class="control-label">Product</label>
						<div class="form-group">
							<?php foreach($product as $p){
								if($p['id']==$sale['product_id']){
								?>
								<input required readonly type="text" value="<?php echo $p['name']; ?>" class="form-control"/>
							<?php }}?>
						</div>
					</div>
					<div class="col-md-4">
						<label for="quantity" class="control-label">Quantity</label>
						<div class="form-group">
							<input required type="number" step="1" name="quantity" value="<?php echo ($this->input->post('quantity') ? $this->input->post('quantity') : $sale['quantity']); ?>" class="form-control" id="quantity" />
						</div>
					</div>
					<div class="col-md-4">
						<label for="unit_id" class="control-label">Unit</label>
						<div class="form-group">
							<select required name="unit_id" class="form-control"> 
										<option value="">Select Unit</Option>
										<?php foreach($unit as $key => $value){ ?>
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