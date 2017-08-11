<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Raw Material Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('rawmaterial/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
               <input type="text"  id="search" placeholder="Enter keyword here..." title="Type in a name"/>
                <table  id="tblData" class="table table-striped ">
                    <tr>
						<th>Sr. No.</th>
						<th>Name</th>
						<th>Type of Raw Material</th>
						<th>Actions</th>
                    </tr>
                    <?php $i=1; foreach($rawmaterial as $r){ ?>
                    <tr>
						<td><?php echo $i; ?></td>
						<td><?php echo $r['name']; ?></td>
						<?php foreach($type as $t){ ?>
								<?php if($t['id']===$r['type_id']){?>
									<td><?php echo $t['name']; ?></td>
							<?php }}$i++; ?>
						<td>
                            <a href="<?php echo site_url('rawmaterial/edit/'.$r['id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <?php if($p_role['role_id']==1){?>
									<a href="<?php echo site_url('rawmaterial/remove/'.$r['id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
								<?php }?>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
