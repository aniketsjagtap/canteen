<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Types of Raw Material Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('type/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Sr. No.</th>
						<th>Name</th>
						<th>Description</th>
						<th>Category</th>
						<th>Actions</th>
                    </tr>
                    <?php $i=1;foreach($type as $t){ ?>
                    <tr>
						<td><?php echo $i; ?></td>
						<td><?php echo $t['name']; ?></td>
						<td><?php echo $t['description']; ?></td>
						<?php foreach($category as $c){ ?>
								<?php if($c['id']===$t['category_id']){?>
									<td><?php echo $c['name']; ?></td>
							<?php }}$i++; ?>
						<td>
                            <a href="<?php echo site_url('type/edit/'.$t['id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <?php if($p_role['role_id']==1){?>
									<a href="<?php echo site_url('type/remove/'.$t['id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
								<?php }?>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
