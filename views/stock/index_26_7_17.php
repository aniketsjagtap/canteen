<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Stock Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('stock/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                 <input type="text"  id="search" placeholder="Enter keyword here..." title="Type in a name"/>
                <table  id="tblData" class="table table-striped ">
                    <tr>
						<th>Sr. No.</th>
						<th>Location</th>
						<th>RowMaterial</th>
						<th>Quantity</th>
						<th>Unit</th>
						<th>Rate(per unit)</th>
						<th>Price</th>
						<th>Date</th>
						<th>Actions</th>
                    </tr>
                    <?php $i=1; foreach($stock as $s){ ?>
                    <tr>
						<td><?=$i;?></td>
						<td><?php foreach($location as $l){
								if($l['id']==$s['location_id'])
									echo "<b>".$l['address']."</b><br>".$l['name']; }?></td>
									
						<td><?php foreach($rawMaterial as $r){
								if($r['id']==$s['rawMaterial_id'])
									echo $r['name']; }?>
						</td>
						<td><?php echo $s['quantity']; ?></td>
						<td><?php foreach($unit as $u){
								if($u['id']==$s['unit_id'])
									echo $u['name']; }?>
						</td>
						<td><?php foreach($rawMaterialRate as $rm){
								if($rm['rawMaterial_id']==$s['rawMaterial_id'])
									echo number_format(($rm['price'])/($rm['quantity']),2); }?></td>
						<td><?php foreach($rawMaterialRate as $rm){
								if($rm['rawMaterial_id']==$s['rawMaterial_id'])
									echo number_format(($s['quantity']*($rm['price'])/($rm['quantity'])),2); }?></td>
						
						<td><?php $registered = date( 'd-m-Y', $s['date']); echo $registered; ?></td>
						<td>
                            <a href="<?php echo site_url('stock/edit/'.$s['id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <?php if($p_role['role_id']==1){?>
									<a href="<?php echo site_url('stock/remove/'.$s['id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
								<?php }?>
                        </td>
                    </tr>
                    <?php $i++;} ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
