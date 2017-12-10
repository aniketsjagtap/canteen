<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Account Sale Type Edit</h3>
            </div>
			 
			<?php echo form_open('acc_sales/edit/'.$sale['id']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-3">
						<label for="location_id" class="control-label">Location *</label>
						<div class="form-group">
							<?php foreach($location as $p){
								if($p['id']==$sale['location_id']){
								?>
								<input required readonly type="text" value="<?php echo $p['name']; ?>" class="form-control"/>
							<?php }}?>
						</div>
					</div>
					<div class="col-md-3">
						<label for="salesType" class="control-label">Sales Type *</label>
						<div class="form-group sales_wrapper">
							<div>
								<select required name="salesType_id" class="form-control"> 
										<option value="">Select Sales Type</Option>
										<?php foreach($saleType as $key => $value){ ?>
											<option value="<?php echo $value['id'];?>"><?php echo $value['name'];?></option> 
										<?php } ?>
								</select> 
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<label for="amount" class="control-label">Amount *</label>
						<div class="form-group">
							<input required type="number" step="0.001" name="amount" value="<?php echo ($this->input->post('sale') ? $this->input->post('sale') : $sale['sale']); ?>" class="form-control" id="amount" />
						</div>
					</div>
					
					<div class="col-md-3">
						<label for="remark" class="control-label">Remark </label>
						<div class="form-group remark_wrapper">
							<div>
								<input type="text" maxlength="500"  name="remark" value="<?php echo ($this->input->post('remark') ? $this->input->post('remark') : $sale['remark']); ?>" id="remark" class="form-control" />
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