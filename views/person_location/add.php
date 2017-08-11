<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Person Location Add</h3>
            </div>
            <?php echo form_open('person_location/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-6">
						<label for="person_id" class="control-label">Person</label>
						<div class="form-group">
							<select name="person_id" class="form-control">
								<option value="">select person</option>
								<?php 
								foreach($all_person as $person)
								{
									$selected = ($person['person_id'] == $this->input->post('person_id')) ? ' selected="selected"' : "";

									echo '<option value="'.$person['person_id'].'" '.$selected.'>'.$person['person_id'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="location_id" class="control-label">Location</label>
						<div class="form-group">
							<select name="location_id" class="form-control">
								<option value="">select location</option>
								<?php 
								foreach($all_location as $location)
								{
									$selected = ($location['id'] == $this->input->post('location_id')) ? ' selected="selected"' : "";

									echo '<option value="'.$location['id'].'" '.$selected.'>'.$location['id'].'</option>';
								} 
								?>
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