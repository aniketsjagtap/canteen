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
	
	//var wrapper = $('.field_wrapper'); //Input field wrapper
	var selectWrapper1 = $('.select_wrapper'); //Input field wrapper
	var salesWrapper1 = $('.sales_wrapper'); //Input field wrapper
	var amountWrapper1 = $('.amount_wrapper');
	var remarkWrapper1 = $('.remark_wrapper');
	
	// var fieldHTML = '<div><input required type="number" step="0.1" name="price[]" value="" class="form-control"/></div>'; //New input field html 
	var selectHTML1 = '<div><select required name="location_id[]" class="form-control"><option value="">Select Product</Option><?php foreach($location as $key => $value){ ?><option value="<?php echo $value['id'];?>"><?php echo $value['name'];?></option> <?php } ?></select></div>';
	var salesHTML1 = '<div><select required name="salesType_id[]" class="form-control"><option value="">Select Sales Type</Option><?php foreach($saleType as $key => $value){ ?><option value="<?php echo $value['id'];?>"><?php echo $value['name'];?></option> <?php } ?></select> </div>';
	
	var amountHTML1 = '<div><input required type="number"  step="0.001" name="amount[]" value="" id="amount" class="form-control" /></div>';
	var remarkHTML1 = '<div><input  type="text" maxlength="500"  name="remark[]" value="" id="remark" class="form-control" /></div>';
	
	
	
	var x = 1; //Initial field counter is 1
	$(addButton1).click(function(){ //Once add button is clicked
		if(x < maxField){ //Check maximum number of input fields
			x++; //Increment field counter
			//$(wrapper).append(fieldHTML); // Add field html
			$(selectWrapper1).append(selectHTML1); // Add field html
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
				$(selectWrapper1).children().last().remove(); //Remove field html
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
              	<h3 class="box-title">Account Sale Add</h3>
            </div>
			
            <?php echo form_open('acc_sales/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
				<div class='col-md-12'>
				   <!--<div class="form-group">
						<label for="dtp_input1" class="col-md-3 control-label">DateTime Picking</label>
						<div class="input-group date form_datetime col-md-5" data-date="1979-09-16T05:25:07Z" data-date-format="dd MM yyyy - HH:ii p" data-link-field="dtp_input1">
							<input class="form-control" size="16" type="text" value="" readonly>
							<span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
							<span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
						</div>
						<input type="hidden" id="dtp_input1" value="" /><br/>
					</div>-->
					<label for="dtp_input2" class="col-md-3 control-label">Date :</label>
					<div class="form-group">
						<div class="input-group date form_date col-md-6" data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
							<input required name="dtp_input2" class="form-control" size="16" type="text" value="" readonly>
							<span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
							<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
						</div>
						<!--<input required type="hidden" id="dtp_input2" value="" /><br/>-->
					</div>
				</div>
				
				<div class="col-md-3">
						<label for="location_id" class="control-label">Location *</label>
						<div class="form-group">
							<div class="select_wrapper">
								<div>
									<select required name="location_id[]" class="form-control"> 
										<option value="">Select Location</Option>
										<?php foreach($location as $key => $value){ ?>
											<option value="<?php echo $value['id'];?>"><?php echo $value['name'];?></option> 
										<?php } ?>
									</select>
								</div>
							</div>
						</div>
					</div>
					<!--<div class="col-md-3">
						<label for="location_id" class="control-label">Product</label>
						<div class="form-group">
							<input required type="text" name="location_id" value="<?php echo $this->input->post('location_id'); ?>" class="form-control" id="location_id" />
						</div>
					</div>-->
					
					<div class="col-md-3">
						<label for="salesType" class="control-label">Sales Type *</label>
						<div class="form-group sales_wrapper">
							<div>
								<select required name="salesType_id[]" class="form-control"> 
										<option value="">Select Sales Type</Option>
										<?php foreach($saleType as $key => $value){ ?>
											<option value="<?php echo $value['id'];?>"><?php echo $value['name'];?></option> 
										<?php } ?>
								</select> 
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<label for="amount" class="control-label">Amount(in INR) *</label>
						<div class="form-group amount_wrapper">
							<div>
								<input required type="number"  step="0.001" name="amount[]" value="" id="amount" class="form-control" />
							</div>
						</div>
					</div>
					
					<div class="col-md-3">
						<label for="remark" class="control-label">Remark </label>
						<div class="form-group remark_wrapper">
							<div>
								<input type="text" maxlength="500"  name="remark[]" value="" id="remark" class="form-control" />
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