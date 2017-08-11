<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Supplier Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('supplier/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <input type="text"  id="search" placeholder="Enter keyword here..." title="Type in a name"/>
                <table  id="tblData" class="table table-striped ">
                    <tr>
						<th>Sr. No.</th>
						<th>Name</th>
						<th>Address</th>
						<th>Registration Date</th>
						<!--<th>Contract Expiry</th>-->
						<th>Status</th>
						<th>Actions</th>
                    </tr>
                    <?php $i=1; foreach($supplier as $s){ ?>
                    <tr>
						<td><?php echo $i; ?></td>
						<td><?php echo $s['name']; ?></td>
						<td><?php echo $s['address']; ?></td>
						<td><?php $registered = date( 'd-m-Y H:i:s', $s['Created']); echo $registered;  ?></td>
						<!--<td><?php //if(isset($s['Expire'])){$expire = date( 'd-m-Y H:i:s', $s['Expire']); echo $expire;} ?></td>-->
						<td><?php foreach($status as $st){
								if($st['id']==$s['status_id'])
									echo $st['name']; }?></td>
						<td>
                            <a href="<?php echo site_url('supplier/edit/'.$s['id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <?php if($p_role['role_id']==1){?>
									<a href="<?php echo site_url('supplier/remove/'.$s['id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
								<?php }?>
                        </td>
                    </tr>
                    <?php $i++;} ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
