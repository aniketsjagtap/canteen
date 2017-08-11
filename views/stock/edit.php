<script type='text/javascript'> 
	// var r = confirm('Stock location will change!!!\n\n Do you really want to edit the stock record?');
	// if (r == true) {
	// //	alert("Proceeding will change the location.");
	// } 
	// else{
		// var base_url = window.location.origin;
		// var pathArray = window.location.pathname.split( '/' );
		// window.location = base_url+"/"+pathArray[1]+"/"+pathArray[2]+"/"+pathArray[3];
	// }
</script>
<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Stock Edit</h3>
            </div>
			
			<?php echo form_open('stock/edit/'.$stock['id']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-4">
						<label for="rawMaterial_id" class="control-label">Raw Material</label>
						<div class="form-group">
							<?php foreach($rawMaterial as $r){
								if($r['id']== $stock['rawMaterial_id']){?>
									<input readonly hidden type="text" name="rawMaterial_id" value="<?php echo ($this->input->post('rawMaterial_id') ? $this->input->post('rawMaterial_id') : $stock['rawMaterial_id']); ?>" id="rawMaterial_id"/>
									<input type="text" name="rawMaterial" value="<?php echo ($r['name']); ?>" class="form-control" id="rawMaterial_id" />
							<?php }} ?>
						</div>
					</div>
					<div class="col-md-4">
						<label for="quantity" class="control-label">Closing Stock</label>
						<div class="form-group">
							<input required type="number" step="0.001" name="quantity" value="<?php echo ($this->input->post('quantity') ? $this->input->post('quantity') : $stock['quantity']); ?>" class="form-control" id="quantity" />
						</div>
					</div>
					<div class="col-md-4">
						<label for="unit_id" class="control-label">Unit</label>
						<div class="form-group">
							<select required name="unit_id" class="form-control" id="unit_id" > 
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