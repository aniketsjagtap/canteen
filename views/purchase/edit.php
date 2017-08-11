<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Purchase Edit</h3>
            </div>
			 
			<?php echo form_open('purchase/edit/'.$purchase['id']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="purchaseNumber" class="control-label">Invoice / Bill Number</label>
						<div class="form-group">
							<input required type="text" name="purchaseNumber" value="<?php echo ($this->input->post('purchaseNumber') ? $this->input->post('purchaseNumber') : $purchase['purchaseNumber']);?>" class="form-control" id="purchaseNumber" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="supplier_id" class="control-label">Supplier</label>
						<div class="form-group">
							<select required name="supplier_id" class="form-control" id="supplier_id" > 
									<option value="">Select Supplier</Option>
									<?php foreach($supplier as $key => $value){ ?>
										<option value="<?php echo $value['id'];?>"><?php echo $value['name'];?></option> 
									<?php } ?>
							</select> 
						</div>
					</div>
					<div class="col-md-3">
						<label for="rawMaterial_id" class="control-label">RawMaterial</label>
						<div class="form-group">
							<?php foreach($rawMaterial as $r){
								if($r['id']==$purchase['rawMaterial_id']){
								?>
								<input required readonly type="text" value="<?php echo $r['name']; ?>" class="form-control"/>
								<input required readonly  hidden type="number" step="0.5" name="rawMaterial_id" value="<?php echo ($this->input->post('rawMaterial_id') ? $this->input->post('rawMaterial_id') : $purchase['rawMaterial_id']); ?>" id="rawMaterial_id" />
							<?php }}?>
						</div>
					</div>
					
					<div class="col-md-3">
						<label for="quantity" class="control-label">Quantity</label>
						<div class="form-group quantity_wrapper">
							<div>
								<input required type="number"  step="0.1" name="quantity" class="form-control" value="<?php echo ($this->input->post('quantity') ? $this->input->post('quantity') : $purchase['quantity']); ?>" id="quantity" />
							</div>
						</div>
					</div>
					<div class="col-md-3">
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
					<div class="col-md-3">
						<label for="price" class="control-label">Amount</label>
						<div class="form-group">
							<div class="field_wrapper">
								<div>
									<input required type="number" step="1" name="price" value="<?php echo ($this->input->post('price') ? $this->input->post('price') : $purchase['price']); ?>" class="form-control"/>
									
								</div>
							</div>
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