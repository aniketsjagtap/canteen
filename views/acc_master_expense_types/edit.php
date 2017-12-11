<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Account Expense Type Edit</h3>
            </div>
			 
			<?php echo form_open('acc_master_expense_types/edit/'.$expenseType['id']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="ExpenseType" class="control-label">Name*</label>
						<div class="form-group ExpenseType_wrapper">
							<div>
								<input type="text" name="expenseType" value="<?php echo ($this->input->post('name') ? $this->input->post('name') : $expenseType['name']); ?>" class="form-control" id="expenseType" required/>
							</div>
						</div>
					</div>
									
					<div class="col-md-6">
						<label for="ExpenseDescription" class="control-label">Description</label>
						<div class="form-group description_wrapper">
							<div>
								<input type="text" name="expenseDescription" value="<?php echo ($this->input->post('name') ? $this->input->post('description') : $expenseType['description']); ?>" class="form-control" id="expenseDescription" />
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