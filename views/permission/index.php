<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Permission Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('permission/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Permission Id</th>
						<th>Permission Description</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($permission as $p){ ?>
                    <tr>
						<td><?php echo $p['permission_id']; ?></td>
						<td><?php echo $p['permission_description']; ?></td>
						<td>
                            <a href="<?php echo site_url('permission/edit/'.$p['permission_id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('permission/remove/'.$p['permission_id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
