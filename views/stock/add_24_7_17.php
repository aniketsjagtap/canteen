<script type="text/javascript">
$(document).ready(function(){
	var maxField = 30; //Input fields increment limitation
	var addButton1 = $('.add_row'); //Add button selector
	var removeButton1 = $('.remove_row'); //Add button selector
	
	//var wrapper = $('.field_wrapper'); //Input field wrapper
	var selectWrapper1 = $('.select_wrapper'); //Input field wrapper
	var unitWrapper1 = $('.unit_wrapper'); //Input field wrapper
	var quantityWrapper1 = $('.quantity_wrapper');
	
	// var fieldHTML = '<div><input required type="number" step="0.1" name="price[]" value="" class="form-control"/></div>'; //New input field html 
	var selectHTML1 = '<div><select required name="rawMaterial_id[]" class="form-control" id="rawMaterial_id" > <option value="">Select Raw Material</Option><?php foreach($rawMaterial as $key => $value){ ?><option value="<?php echo $value['id'];?>"><?php echo $value['name'];?></option> <?php } ?></select></div>';
	var unitHTML1 = '<div><select required name="unit_id[]" class="form-control"><option value="">Select Unit</Option><?php foreach($unit as $key => $value){ ?><option value="<?php echo $value['id'];?>"><?php echo $value['name'];?></option><?php } ?></select></div>';
	var quantityHTML1 = '<div><input required type="number"  step="1" name="quantity[]" value="" id="quantity" class="form-control" /></div>';
	
	
	
	
	var x = 1; //Initial field counter is 1
	$(addButton1).click(function(){ //Once add button is clicked
		if(x < maxField){ //Check maximum number of input fields
			x++; //Increment field counter
			//$(wrapper).append(fieldHTML); // Add field html
			$(selectWrapper1).append(selectHTML1); // Add field html
			
				$(unitWrapper1).append(unitHTML1); // Add field html
				$(quantityWrapper1).append(quantityHTML1); // Add field html
			
		}
	});
	$(removeButton1).click( function(e){ //Once remove button is clicked
		e.preventDefault();
		
		if(x>1){
			 var r = confirm("Do you want to remove Last Row?");
			if (r == true) {
			   // $(this).parent('div').remove(); //Remove field html
			//	$(wrapper).children().last().remove(); //Remove field html
				$(selectWrapper1).children().last().remove(); //Remove field html
			
				$(unitWrapper1).children().last().remove(); //Remove field html
				$(quantityWrapper1).children().last().remove(); //Remove field html
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
              	<h3 class="box-title">Stock Add</h3>
            </div>
			 
            <?php echo form_open('stock/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-4">
						<label for="rawMaterial_id" class="control-label">Raw Material</label>
						<div class="form-group">
							<div class="select_wrapper">
								<div>
									<select required name="rawMaterial_id[]" class="form-control" id="rawMaterial_id" > 
											<option value="">Select Raw Material</Option>
											<?php foreach($rawMaterial as $key => $value){ ?>
												<option value="<?php echo $value['id'];?>"><?php echo $value['name'];?></option> 
											<?php } ?>
									</select>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<label for="quantity" class="control-label">Closing Stock</label>
						<div class="form-group quantity_wrapper">
							<div>
								<input required type="number" step="0.1" name="quantity[]" value="" class="form-control" id="quantity" />
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<label for="unit_id" class="control-label">Unit</label>
						<div class="form-group unit_wrapper">
							<div>
								<select required name="unit_id[]" class="form-control" id="unit_id" > 
										<option value="">Select Unit</Option>
										<?php foreach($unit as $key => $value){ ?>
											<option value="<?php echo $value['id'];?>"><?php echo $value['name'];?></option> 
										<?php } ?>
								</select>
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
</div>