<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Person Listing</h3>
				
				<?php if($p_role['role_id']==1){?>
            	<div class="box-tools">
					
                    <a href="<?php echo site_url('person/add'); ?>" class="btn btn-success btn-sm">Add</a> 
					
                </div>
				<?php } ?>
            </div>
            <div class="box-body">
               <input type="text"  id="search" placeholder="Enter keyword here..." title="Type in a name"/>
                <table  id="tblData" class="table table-striped ">
                    <tr>
						
						<th>Location</th>							
						<th>Role</th>
						<?php if($p_role['role_id']==1||$p_role['role_id']==2){?>
							<th>Username</th>
						<?php } ?>
						<th>First Name</th>
						<th>Last Name</th>
						<th>Email</th>
						<?php if($p_role['role_id']==1||$p_role['role_id']==2){?>
						<th>Mobile</th>	
						<th>Gender</th>
						<th>Registered /<br>Last Updated</th>	
						<th>Status</th>
						<th>Actions</th>
						<?php } ?>
                    </tr>
                    <?php foreach($person as $p){ ?>
                    <tr>
						
							<td><?php foreach($location as $l){
								if($p['location_id']==$l['id'])
							echo "<b>".$l['address']."</b><br>".$l['name']; }?></td>	
							
							<td><?php foreach($role as $r){
								if($p['role_id']==$r['role_id'])
							echo $r['role_description']; }?></td>	
							
						<?php if($p_role['role_id']==1||$p_role['role_id']==2){?>
							<td><?php echo $p['username']; ?></td>
						<?php } ?>
						<td><?php echo $p['first_name']; ?></td>
						<td><?php echo $p['Last_name']; ?></td>
						<td><?php echo $p['email']; ?></td>
						<?php if($p_role['role_id']==1||$p_role['role_id']==2){?>
							
							<td><?php echo $p['mobile']; ?></td>
							<td><?php echo $p['gender']; ?></td>
							<td><?php $registered = date( 'Y-m-d H:i:s', $p['registered'] );
								echo $registered; ?>
							</td>
							<td><?php foreach($status as $s){
								if($p['status_id']==$s['id'])
									echo $s['name']; } ?></td>
								
							<td>
								<a href="<?php echo site_url('person/edit/'.$p['person_id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
								<?php if($p_role['role_id']==1){?>
									<a href="<?php echo site_url('person/remove/'.$p['person_id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
								<?php }?>
							</td>
						<?php } ?>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
