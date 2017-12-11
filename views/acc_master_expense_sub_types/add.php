<script type="text/javascript">
$(document).ready(function(){
	var maxField = 30; //Input fields increment limitation
	var addButton1 = $('.add_row'); //Add button selector
	var removeButton1 = $('.remove_row'); //Add button selector
	
	var salesWrapper1 = $('.ExpenseSubtype_wrapper'); //Input field wrapper
	var amountWrapper1 = $('.expense_wrapper');
	var descriptionWrapper1 = $('.description_wrapper');
	
	
	// var fieldHTML = '<div><input required type="number" step="0.1" name="price[]" value="" class="form-control"/></div>'; //New input field html 
	
	var amountHTML1 = '<div><select required name="ExpenseType_id[]" class="form-control" required><option value="">Select Expense Type</Option><?php foreach($expenseType as $key => $value){ ?><option value="<?php echo $value['id'];?>"><?php echo $value['name'];?></option> <?php } ?></select></div>';
	var salesHTML1 = '<div><input type="text" maxlength="100"  name="ExpenseSubtype[]" value="" id="ExpenseSubtype" class="form-control"  required/></div>';
	
	
	
	
	var x = 1; //Initial field counter is 1
	$(addButton1).click(function(){ //Once add button is clicked
		if(x < maxField){ //Check maximum number of input fields
			x++; //Increment field counter
				$(salesWrapper1).append(salesHTML1); // Add field html
				$(amountWrapper1).append(amountHTML1); // Add field html
				
		}
	});
	$(removeButton1).click( function(e){ //Once remove button is clicked
		e.preventDefault();
		
		if(x>1){
			 var r = confirm("Do you want to remove Last Row?");
			if (r == true) {
			   // $(this).parent('div').remove(); //Remove field html
			//	$(wrapper).children().last().remove(); //Remove field html
				$(salesWrapper1).children().last().remove(); //Remove field html
				$(amountWrapper1).children().last().remove(); //Remove field html
				x--; //Decrement field counter
			}
			
		}else{
			alert("Can not Remove Last Row!!!");
		}
	});
	
	
});
</script>
<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Account Expense Subtypes Add</h3>
            </div>
			
            <?php echo form_open('acc_master_expense_sub_types/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					
					<div class="col-md-6">
						<label for="ExpenseType" class="control-label">Expense Type *</label>
						<div class="form-group expense_wrapper">
							<div>
								<select required name="ExpenseType_id[]" class="form-control" required> 
										<option value="">Select Expense Type</Option>
										<?php foreach($expenseType as $key => $value){ ?>
											<option value="<?php echo $value['id'];?>"><?php echo $value['name'];?></option> 
										<?php } ?>
								</select> 
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<label for="ExpenseSubtype" class="control-label">Expense Subtype *</label>
						<div class="form-group ExpenseSubtype_wrapper">
							<div>
								<input type="text" maxlength="100"  name="ExpenseSubtype[]" value="" id="ExpenseSubtype" class="form-control"  required/>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<label for="ExpenseDescription" class="control-label">Expense Description</label>
						<div class="form-group description_wrapper">
							<div>
								<input type="text" maxlength="400"  name="ExpenseDescription[]" value="" id="ExpenseDescription" class="form-control"  />
							</div>
						</div>
					</div>
				
				</div>
					
					
				</div>
		</div>
          	<div class="box-footer">
            	<!--<a href="javascript:void(0);" class="add_row " title="Add field"><img src="<?=base_url('themes/dist/img/add-icon.png');?>"/></a><br>
				 <a href="javascript:void(0);" class="remove_row " title="Remove field"><img src="<?=base_url('themes/dist/img/remove-icon.png');?>"/></a>
					-->	
				<button class="add_row btn btn-info pull-left">
					<i class="fa fa-plus-square"></i> Add Row
				</button>&nbsp
				<button class="remove_row btn btn-warning">
					<i class="fa fa-minus-square"></i> Remove Row
				</button>
				<button type="submit" class="btn btn-success">
            		<i class="fa fa-check"></i> Save
            	</button>
				<button type="reset" class="btn btn-danger pull-right" onclick="location.reload(); ">
						<i class="fa fa-refresh"></i> Reset
				</button>
          	</div>
            <?php echo form_close(); ?>
	</div>
</div>