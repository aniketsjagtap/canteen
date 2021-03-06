<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Person Role Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('person_role/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Person Id</th>
						<th>Role Id</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($person_role as $p){ ?>
                    <tr>
						<td><?php echo $p['person_id']; ?></td>
						<td><?php echo $p['role_id']; ?></td>
						<td>
                            <a href="<?php echo site_url('person_role/edit/'.$p['']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('person_role/remove/'.$p['']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
