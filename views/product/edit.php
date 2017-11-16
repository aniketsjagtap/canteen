<script type="text/javascript">
$(document).ready(function(){
	var maxField = 30; //Input fields increment limitation
	var addButton = $('.add_row'); //Add button selector
	var removeButton1 = $('.remove_row'); //remove button selector
	
	var wrapper = $('.field_wrapper'); //Input field wrapper
	var formulaWrapper = $('.formula_wrapper'); //Input field wrapper
	var messformulaWrapper = $('.messformula_wrapper'); //Input field wrapper
	var selectWrapper = $('.select_wrapper'); //Input field wrapper
	
	var fieldHTML = '<div><input required type="number" step="0.1" name="field_name[]" value="" class="form-control"/></div>'; //New input field html 
	var formulaFieldHTML = '<div><input required type="number" step="0.1" name="formula_name[]" value="" class="form-control"/></div>'; //New input field html 
	var messformulaFieldHTML = '<div><input required type="number" step="0.1" name="messformula_num[]" value="" class="form-control"/></div>'; //New input field html 
	var selectHTML = '<div><select required name="rawMaterial_id[]" class="form-control"><option value="">Select Raw Material</Option><?php foreach($rawmaterial as $key => $value){ ?><option value="<?php echo $value['id'];?>"><?php echo $value['name'];?></option> <?php } ?></select></div>';
	
	var x = 1; //Initial field counter is 1
	$(addButton).click(function(){ //Once add button is clicked
		if(x < maxField){ //Check maximum number of input fields
			x++; //Increment field counter
			$(wrapper).append(fieldHTML); // Add field html
			$(formulaWrapper).append(formulaFieldHTML); // Add field html
			$(messformulaWrapper).append(messformulaFieldHTML); // Add field html
			$(selectWrapper).append(selectHTML); // Add field html
			
		}
	});
	
	$(removeButton1).click( function(e){ //Once remove button is clicked
		e.preventDefault();
		
		if(x>1){
			 var r = confirm("Do you want to remove Last Row?");
			if (r == true) {
			
			  	$(wrapper).children().last().remove(); // Add field html
				$(formulaWrapper).children().last().remove(); // Add field html
				$(messformulaWrapper).children().last().remove(); // Add field html
				$(selectWrapper).children().last().remove(); // Add field html
				
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
              	<h3 class="box-title">Product Edit</h3>
            </div>
			 
			<?php echo form_open('product/edit/'.$product['id']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="name" class="control-label">Name</label>
						<div class="form-group">
							<input type="text" name="name" value="<?php echo ($this->input->post('name') ? $this->input->post('name') : $product['name']); ?>" class="form-control" id="name" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="price" class="control-label">Price (in Rs.)</label>
						<div class="form-group">
							<input type="text" name="price" value="<?php echo ($this->input->post('price') ? $this->input->post('price') : $product['price']); ?>" class="form-control" id="price" />
						</div>
					</div>
				<div class="col-md-3">
						<label for="raw_material_id" class="control-label">Raw Material</label>
						<div class="form-group">
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
					</div>
					<div class="col-md-3">
						<label for="formula" class="control-label">Cash Formula *</label>
						<div class="form-group">
							<div class="field_wrapper">
								<div>
									<input required type="number" step="0.001" name="field_name[]" value="" class="form-control"/>
								</div>
							</div>
							<!--<input type="text" name="formula" value="<?php //echo $this->input->post('formula'); ?>" class="form-control" id="formula" />	-->
						</div>
					</div>
					<div class="col-md-3">
						<label for="partyFormula" class="control-label">Party Orders Formula</label>
						<div class="form-group">
							<div class="formula_wrapper">
								<div>
									<input  type="number" step="0.001" name="formula_name[]" value="" class="form-control"/>
									
								</div>
							</div>
							<!--<input type="text" name="formula" value="<?php //echo $this->input->post('formula'); ?>" class="form-control" id="formula" />	-->
						</div>
					</div>
					<div class="col-md-3">
						<label for="messFormula" class="control-label">Mess Formula</label>
						<div class="form-group">
							<div class="messformula_wrapper">
								<div>
									<input  type="number" step="0.00001" name="messformula_num[]" value="" class="form-control"/>
									
								</div>
							</div>
							<!--<input type="text" name="formula" value="<?php //echo $this->input->post('formula'); ?>" class="form-control" id="formula" />	-->
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