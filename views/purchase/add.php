<script type="text/javascript">
$(document).ready(function(){
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
	var addButton = $('.add_button'); //Add button selector
	var removeButton = $('.remove_button'); //Add button selector
	
	var wrapper = $('.field_wrapper'); //Input field wrapper
	var selectWrapper = $('.select_wrapper'); //Input field wrapper
	var unitWrapper = $('.unit_wrapper'); //Input field wrapper
	var quantityWrapper = $('.quantity_wrapper');
	
	var fieldHTML = '<div><input required type="number" step="0.01" name="price[]" value="" class="form-control"/></div>'; //New input field html 
	var selectHTML = '<div><select required name="rawMaterial_id[]" class="form-control"><option value="">Select Raw Material</Option><?php foreach($rawmaterial as $key => $value){ ?><option value="<?php echo $value['id'];?>"><?php echo $value['name'];?></option> <?php } ?></select></div>';
	var unitHTML = '<div><select required name="unit_id[]" class="form-control"><option value="">Select Unit</Option><?php foreach($unit as $key => $value){ ?><option value="<?php echo $value['id'];?>"><?php echo $value['name'];?></option><?php } ?></select></div>';
	var quantityHTML = '<div><input required type="number"  step="0.001" name="quantity[]" value="" id="quantity" class="form-control" /></div>';
	
	
	
	var x = 1; //Initial field counter is 1
	$(addButton).click(function(){ //Once add button is clicked
		if(x < maxField){ //Check maximum number of input fields
			x++; //Increment field counter
			$(wrapper).append(fieldHTML); // Add field html
			$(selectWrapper).append(selectHTML); // Add field html
			
				$(unitWrapper).append(unitHTML); // Add field html
				$(quantityWrapper).append(quantityHTML); // Add field html
			//alert( $("quantityWrapper:last-child").val());
			
		}
	});
	$(removeButton).click( function(e){ //Once remove button is clicked
		e.preventDefault();
		
		if(x>1){
			 var r = confirm("Do you want to remove Last Row?");
			if (r == true) {
			   // $(this).parent('div').remove(); //Remove field html
				$(wrapper).children().last().remove(); //Remove field html
				$(selectWrapper).children().last().remove(); //Remove field html
				$(unitWrapper).children().last().remove(); //Remove field html
				$(quantityWrapper).children().last().remove(); //Remove field html
				x--; //Decrement field counter
			}
			
		}else{
			alert("Can not Remove Last Row!!!");
		}
	});
	
	
	/*$('.total_amount').click(function(){
			
		var test_qty = 0
		$("input[name^='price']").each(function() { 
			
		    test_qty +=parseInt($(this).val(), 10) ;
		    
		});
		alert(test_qty);
	});
	
	 $("#price").change(function(){
        alert("The text has been changed.");
    });*/
});
</script>
<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Purchase Add</h3>
              	<button type="reset" class="btn btn-danger pull-right">
				<i class="fa fa-refresh"></i> Reset All Fields
		</button>
            </div>
			 
            <?php echo form_open('purchase/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
          		<div class='col-md-12'>
				  
					<label for="dtp_input2" class="col-md-2 control-label">Date :</label>
					<div class="form-group">
						<div class="input-group date form_date col-md-6" data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
							<input required name="dtp_input2" class="form-control" size="16" type="text" value="" readonly>
							<span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
							<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
						</div>
						<!--<input required type="hidden" id="dtp_input2" value="" /><br/>-->
					</div>
				</div>
					<div class="col-md-6">
						<label for="purchaseNumber" class="control-label">Invoice / Bill Number</label>
						<div class="form-group">
							<input required type="text" name="purchaseNumber" value="" class="form-control" id="purchaseNumber" />
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
							<div class="select_wrapper">
								<div>
									<select required name="rawMaterial_id[]" class="form-control"> 
										<option value="">Select Raw Material</Option>
										<?php foreach($rawmaterial as $key => $value){ ?>
											<option value="<?php echo $value['id'];?>"><?php echo $value['name'];?></option> 
										<?php } ?>
									</select>
								</div>
							</div>
						</div>
					</div>
					
					<div class="col-md-3">
						<label for="quantity" class="control-label">Quantity</label>
						<div class="form-group quantity_wrapper">
							<div>
								<input required type="number"  step="0.001" name="quantity[]" value="" id="quantity" class="form-control" />
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<label for="unit_id" class="control-label">Unit</label>
						<div class="form-group unit_wrapper">
							<div>
								<select required name="unit_id[]" class="form-control"> 
										<option value="">Select Unit</Option>
										<?php foreach($unit as $key => $value){ ?>
											<option value="<?php echo $value['id'];?>"><?php echo $value['name'];?></option> 
										<?php } ?>
								</select> 
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<label for="price" class="control-label">Amount</label>
						<div class="form-group">
							<div class="field_wrapper">
								<div>
									<input required type="number" step="0.01" name="price[]" value="" class="form-control"/>
									
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--<div class="row clearfix">
					<div class="col-md-12">
						
						 <a href="javascript:void(0);" class=" pull-right" title="Add field"><img src="<?=base_url('themes/dist/img/add-icon.png');?>"/>Add New Row</a><br>
						 <a href="javascript:void(0);" class="remove_button pull-right" title="Remove field"><img src="<?=base_url('themes/dist/img/remove-icon.png');?>"/>Remove Last Row</a>
						
					</div>
				</div>-->
          	<div class="box-footer">
				
            	
				<button class="add_button btn btn-info pull-left">
					<i class="fa fa-plus-square"></i> Add Row
				</button>&nbsp
				<button class="remove_button btn btn-warning">
					<i class="fa fa-minus-square"></i> Remove Row
				</button>
				<button type="submit" class="btn btn-success">
            		<i class="fa fa-check"></i> Save
            	</button>
            			<!--<button  class="total_amount btn btn-info pull-right">
						<i class="fa fa-thumbs-up"></i> Verify Total Amount
				</button>-->
				
          	</div>
            <?php echo form_close(); ?>
      	</div>
    </div>
</div>