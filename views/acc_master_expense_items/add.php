<script type="text/javascript">
$(document).ready(function(){
/*$('.form_datetime').datetimepicker({
        //language:  'fr',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		forceParse: 0,
        showMeridian: 1,
		startDate: '-2d'
    });*/
	$('.form_date').datetimepicker({
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		minView: 2,
		forceParse: 0,
		startDate: '-30d'
    });
	var maxField = 30; //Input fields increment limitation
	var addButton1 = $('.add_row'); //Add button selector
	var removeButton1 = $('.remove_row'); //Add button selector
	
	var salesWrapper1 = $('.expenseItem_wrapper'); //Input field wrapper
	var amountWrapper1 = $('.expenseSubtype_wrapper');
	var remarkWrapper1 = $('.expenseDescription_wrapper');
	
	// var fieldHTML = '<div><input required type="number" step="0.1" name="price[]" value="" class="form-control"/></div>'; //New input field html 
	var salesHTML1 = '<div><input type="text" maxlength="100"  name="expenseItem[]" value="" id="expenseItem" class="form-control"  required/></div>';
	var amountHTML1 = '<div><select required name="expenseSubtype_id[]" class="form-control"> <option value="">Select Expense Subtype</Option><?php foreach($expenseSubtype as $key => $value){ ?><option value="<?php echo $value['id'];?>"><?php echo $value['name'];?></option><?php } ?></select></div>';
	var remarkHTML1 = '<div><input type="text" maxlength="400" name="expenseDescription[]" value="" id="amount" class="form-control" /></div>';
	
	
	
	var x = 1; //Initial field counter is 1
	$(addButton1).click(function(){ //Once add button is clicked
		if(x < maxField){ //Check maximum number of input fields
			x++; //Increment field counter
			//$(wrapper).append(fieldHTML); // Add field html
			$(salesWrapper1).append(salesHTML1); // Add field html
				$(amountWrapper1).append(amountHTML1); // Add field html
				$(remarkWrapper1).append(remarkHTML1); // Add field html
			
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
				$(remarkWrapper1).children().last().remove(); //Remove field html
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
              	<h3 class="box-title">Account Expense Item Add</h3>
            </div>
			
            <?php echo form_open('acc_master_expense_items/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-4">
						<label for="expenseItem" class="control-label">Name *</label>
						<div class="form-group expenseItem_wrapper">
							<div>
								<input type="text" maxlength="100"  name="expenseItem[]" value="" id="expenseItem" class="form-control"  required/>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<label for="expenseSubtype" class="control-label">Expense Subtype *</label>
						<div class="form-group expenseSubtype_wrapper">
							<div>
								<select required name="expenseSubtype_id[]" class="form-control"> 
										<option value="">Select Expense Subtype</Option>
										<?php foreach($expenseSubtype as $key => $value){ ?>
											<option value="<?php echo $value['id'];?>"><?php echo $value['name'];?></option> 
										<?php } ?>
								</select> 
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<label for="expenseDescription" class="control-label">Description</label>
						<div class="form-group expenseDescription_wrapper">
							<div>
								<input type="text" maxlength="400" name="expenseDescription[]" value="" id="amount" class="form-control" />
							</div>
						</div>
					</div>
					
					
				</div>
					
					
			</div>
		</div>
		<div class="box-footer">
			
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