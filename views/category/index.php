<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Category Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('category/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Sr.No.</th>
						<th>Name</th>
						<th>Division</th>
						<th>Actions</th>
                    </tr>
                    <?php $i=1;foreach($category as $c){ ?>
                    <tr>
						
						<td><?php echo $i; ?></td>
						<td><?php echo $c['name']; ?></td>
						<?php foreach($division as $d){ ?>
								<?php if($d['id']===$c['division_id']){?>
									<td><?php echo $d['name']; ?></td>
							<?php }}$i++; ?>
						<td>
                            <a href="<?php echo site_url('category/edit/'.$c['id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <?php if($p_role['role_id']==1){?>
									<a href="<?php echo site_url('category/remove/'.$c['id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
								<?php }?>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
