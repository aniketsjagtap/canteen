<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Type Edit</h3>
            </div>
			 
			<?php echo form_open('type/edit/'.$type['id']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="name" class="control-label">Name</label>
						<div class="form-group">
							<input type="text" name="name" value="<?php echo ($this->input->post('name') ? $this->input->post('name') : $type['name']); ?>" class="form-control" id="name" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="description" class="control-label">Description</label>
						<div class="form-group">
							<input type="text" name="description" value="<?php echo ($this->input->post('description') ? $this->input->post('description') : $type['description']); ?>" class="form-control" id="description" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="category_id" class="control-label">Category</label>
						<div class="form-group">
							<select name="category_id" class="form-control" id="category_id" > 
								<option value=" ">Select Category</Option>
								<?php foreach($category as $key => $value){ ?>
									<option value="<?php echo $value['id'];?>"><?php echo $value['name'];?></option> 
								<?php } ?>
							</select> 
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