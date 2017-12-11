<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Account Expense Subtype Edit</h3>
            </div>
			 
			<?php echo form_open('acc_master_expense_sub_types/edit/'.$expenseSubtype['id']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-4">
						<label for="expenseSubtype" class="control-label">Name*</label>
						<div class="form-group expenseSubtype_wrapper">
							<div>
								<input type="text" name="expenseSubtype" value="<?php echo ($this->input->post('name') ? $this->input->post('name') : $expenseSubtype['name']); ?>" class="form-control" id="expenseSubtype" required/>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<label for="salesType" class="control-label">Expense Type *</label>
						<div class="form-group expenseType_wrapper">
							<div>
								<select required name="expenseType_id" class="form-control"> 
										<option value="">Select Expense Type</Option>
										<?php foreach($expenseType as $key => $value){ ?>
											<option value="<?php echo $value['id'];?>"><?php echo $value['name'];?></option> 
										<?php } ?>
								</select> 
							</div>
						</div>
					</div>
					
					<div class="col-md-4">
						<label for="ExpenseDescription" class="control-label">Description</label>
						<div class="form-group description_wrapper">
							<div>
								<input type="text" name="expenseDescription" value="<?php echo ($this->input->post('name') ? $this->input->post('name') : $expenseSubtype['description']); ?>" class="form-control" id="expenseDescription"/>
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