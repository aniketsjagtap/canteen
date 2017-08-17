<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Order Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('order/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
               <input type="text"  id="search" placeholder="Enter keyword here..." title="Type in a name"/>
                <table  id="tblData" class="table table-striped ">
                    <tr>
						<th>Sr.No.</th>
						<th>Location</th>
						<th>Date</th>
						<th>Order Number</th>
						<th>RawMaterial</th>
						<th>Quantity</th>
						<th>Unit</th>
						
						<th>Actions</th>
                    </tr>
                    <?php $i=1;foreach($order as $o){ ?>
                    <tr>
						<td><?php echo $i; ?></td>
						<td><?php foreach($location as $l){
								if($l['id']==$o['location_id'])
									echo "<b>".$l['address']."</b><br>".$l['name']; }?>
						</td>
						<td><?php $registered = date( 'd-m-Y H:i:s', $o['date']); echo $registered; ?></td>
						<td><?php echo $o['id']; ?></td>
						<td><?php foreach($rawMaterial as $rm){
								if($rm['id'] == $o['rawMaterial_id'])
									echo $rm['name']; } ?></td>
						<td><?php echo $o['quantity']; ?></td>
						
						<td><?php foreach($unit as $u){
								if($u['id']==$o['unit_id'])
									echo $u['name']; }?></td>
						
						<td>
                            <a href="<?php echo site_url('order/edit/'.$o['id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <?php if($p_role['role_id']==1){?>
									<a href="<?php echo site_url('order/remove/'.$o['id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
								<?php }?>
                        </td>
                    </tr>
                    <?php $i++;} ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
