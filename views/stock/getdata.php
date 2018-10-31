<script type="text/javascript">
$(document).ready(function(){
	$('.form_date').datetimepicker({
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		minView: 2,
		forceParse: 0
    });

	
	
});
</script>

<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Stock Listing</h3>
				<div class="box-tools">
                    <a href="<?php echo site_url('stock/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
			 
            <?php echo form_open('stock/getData'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
				<div class='col-md-6'>
				 
					<label for="dtp_input1" class="col-md-4 control-label">* Opening Stock Date</label>
					<div class="form-group">
						<div class="input-group date form_date col-md-6" data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input1" data-link-format="yyyy-mm-dd">
							<input required name="dtp_input1" class="form-control" size="16" type="text" value="" readonly>
							<span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
							<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
						</div>
						<!--<input required type="hidden" id="dtp_input2" value="" /><br/>-->
					</div>
				</div>
				<div class='col-md-6'>
				 
					<label for="dtp_input2" class="col-md-4 control-label">* Closing Stock Date</label>
					<div class="form-group">
						<div class="input-group date form_date col-md-6" data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
							<input required name="dtp_input2" class="form-control" size="16" type="text" value="" readonly>
							<span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
							<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
						</div>
						<!--<input required type="hidden" id="dtp_input2" value="" /><br/>-->
					</div>
				</div>
				
				<div class="col-md-12">
					<label for="location_id" class="control-label">Location *</label>
					<div class="form-group">
						
							<div>
								<select required name="location_id" class="form-control"> 
									<option value="">Select Location</Option>
									<?php 
									var_dump($location);
									foreach($location as $key => $value){ ?>
										<option value="<?php echo $value['id'];?>"><?php echo $value['name']." : ".$value['address'];?></option> 
									<?php } ?>
								</select>
							</div>
						
					</div>
				</div>
				
					
					
				</div>
			</div>
          	<div class="box-footer">
            	<!--<a href="javascript:void(0);" class="add_row " title="Add field"><img src="<?=base_url('themes/dist/img/add-icon.png');?>"/></a><br>
				 <a href="javascript:void(0);" class="remove_row " title="Remove field"><img src="<?=base_url('themes/dist/img/remove-icon.png');?>"/></a>
					-->	
				
				<button type="submit" class="btn btn-success">
            		<i class="fa fa-check"></i> Get Stock
            	</button>
				<button type="reset" class="btn btn-danger pull-right" onclick="location.reload(); ">
						<i class="fa fa-refresh"></i> Reset
				</button>
          	</div>
            <?php echo form_close(); ?>
      	</div>
    </div>
</div>