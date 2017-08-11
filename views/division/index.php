<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Division Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('division/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>ID</th>
						<th>Name</th>
						<th>Description</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($division as $d){ ?>
                    <tr>
						<td><?php echo $d['id']; ?></td>
						<td><?php echo $d['name']; ?></td>
						<td><?php echo $d['description']; ?></td>
						<td>
                            <a href="<?php echo site_url('division/edit/'.$d['id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                           <?php if($p_role['role_id']==1){?>
									<a href="<?php echo site_url('division/remove/'.$d['id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
								<?php }?>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
