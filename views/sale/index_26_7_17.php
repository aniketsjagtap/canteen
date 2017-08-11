<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Sales Report</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('sale/add'); ?>" class="btn btn-success btn-sm">Add</a> 
					
                </div>
            </div>
            <div class="box-body">
                 <input type="text"  id="search" placeholder="Enter keyword here..." title="Type in a name"/>
				<!--Start Date: <input type="text" id="dateStart" name="dateStart" size="30">
				End Date: <input type="text" id="dateend" name="dateend" size="30">-->
                <table  id="tblData" class="table table-striped ">
                    <tr>
						<th>Sr. No.</th>
						
						<th>Location</th>
						
						<th>Product</th>
						<th>Raw Material Type</th>
						<th>Quantity</th>
						<th>Unit</th>
						<th>Remark</th>
						<th>Date</th>
						<th>Actions</th>
                    </tr>
                    <?php $i=1;  	foreach($sales as $s){ ?>
                    <tr>
						<td><?php echo $i; $i++; ?></td>
						
						<td> 
							<?php foreach($location as $l){
										if($s['location_id']==$l['id']){
											echo "<b>".$l['address']."</b><br>".$l['name'];
										}
									} ?>
						</td>
						
						<td><?php foreach($product as $p){
								if($s['product_id']== $p['id'])
									echo $p['name'];}  ?></td>
						<td><?php foreach($saleType as $st){
								if($s['salesType_id']== $st['id'])
							echo $st['name'];} ?></td>
						<td><?php echo $s['quantity']; ?></td>
						<td><?php foreach($unit as $u){
								if($s['unit_id']== $u['id'])
							echo $u['name'];} ?></td>
							
						<td><?php echo $s['remark']; ?></td>
						<td><?php $registered = date( 'Y-m-d', $s['date'] );
								echo $registered; ?></td>
						<td>
                            <a href="<?php echo site_url('sale/edit/'.$s['id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <?php if($p_role['role_id']==1){?>
								<a href="<?php echo site_url('sale/remove/'.$s['id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
							<?php } ?>
					   </td>
                    </tr>
                    <?php } ?>
                </table>
                <div class="row no-print">
					<div class="col-xs-12">
					<button class="btn btn-info pull-left" onclick="window.print();">
							<i class="fa fa-print"></i> print
						</button>
					 <!-- <a  class="btn btn-default"><i class="fa fa-print" ></i> Print</a>-->
					</div>
				  </div>           
            </div>
        </div>
    </div>
	
</div>

