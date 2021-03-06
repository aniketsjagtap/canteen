<script type="text/javascript">
$(document).ready(function(){
	var maxField = 30; //Input fields increment limitation
	var addButton1 = $('.add_row'); //Add button selector
	var removeButton1 = $('.remove_row'); //Add button selector
	
	var salesWrapper1 = $('.SaleType_wrapper');
	var amountWrapper1 = $('.description_wrapper');
	
	
	// var fieldHTML = '<div><input required type="number" step="0.1" name="price[]" value="" class="form-control"/></div>'; //New input field html 
	
	var salesHTML1 = '<div><input type="text" maxlength="100"  name="SaleType[]" value="" id="SaleType" class="form-control"  required/></div>';
	var  amountHTML1= '<div><input type="text" maxlength="400"  name="SaleDescription[]" value="" id="SaleDescription" class="form-control"  /></div>';
	
	
	
	
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
              	<h3 class="box-title">Account Sale Types Add</h3>
            </div>
			
            <?php echo form_open('Acc_master_sale_types/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					
					<div class="col-md-6">
						<label for="saleType" class="control-label">Sale Type *</label>
						<div class="form-group SaleType_wrapper">
							<div>
								<input type="text" maxlength="100"  name="saleType[]" value="" id="saleType" class="form-control"  required/>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<label for="saleDescription" class="control-label">Sale Description</label>
						<div class="form-group description_wrapper">
							<div>
								<input type="text" maxlength="400"  name="saleDescription[]" value="" id="saleDescription" class="form-control"  />
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