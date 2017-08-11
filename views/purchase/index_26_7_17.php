<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Purchase Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('purchase/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
				<!--<input type="text"  id="search" placeholder="Enter keyword here..." title="Type in a name"/>-->
			   
			   
                <table  id="purchase" class="table table-striped text-center" >
				<!--<table class="table table-striped " id="example">-->
					<thead>
						<tr>
							<th>Sr. No.</th>
							<th>Location</th>
							<th>Invoice/Bill Number</th>
							<th>Supplier</th>
							<!--<th>Order Id</th>-->
							<th>RawMaterial</th>
							<th>Quantity</th>
							<th>Unit</th>
							<th>Price</th>
							<th style="width:300px">Date</th>
							<th>Actions</th>
						</tr>
						<tr>
							<th></th>
							<th></th>
							<th></th>
							<th></th>
							
							<th></th>
							<th></th>
							<th></th>
							<th></th>
							<th ></th>
							<th></th>
						</tr>
						
					</thead>
					<!--<tfoot>
						<tr>
							<th>Search: </th>
							<th></th>
							<th></th>
							<th></th>
							<th></th>
							<th></th>
							<th></th>
							<th></th>
							<th></th>
							
						</tr>
					</tfoot>-->
                    <?php $i=1; foreach($purchase as $p){ ?>
					
                    <tr>
						<td><?php echo $i; ?></td>
						<td><?php foreach($location as $l){ 
								if($l['id']==$p['location_id']) 
									echo "<b>".$l['address']."</b><br>".$l['name'];} ?></td>
									
						<td><?php echo $p['purchaseNumber']; ?></td>
						
						<td><?php foreach($supplier as $s){ 
								if($s['id']==$p['supplier_id']) 
									echo "<b>".$s['name']."</b><br>".$s['address']; }?>
						</td>
						<!--<td><?php //echo $p['order_id']; ?></td>-->
						
						<td><?php foreach($rawMaterial as $r){ 
								if($r['id']==$p['rawMaterial_id'])
									echo $r['name']; }?>
						</td>
						
						<td><?php echo $p['quantity']; ?></td>
						
						<td><?php foreach($unit as $u){ 
								if($u['id']==$p['unit_id']) 
									echo $u['name']; }?>
						</td>
						
						<td><?php echo $p['price']; ?></td>
						
						<!--<td><?php //$registered = date( 'm/d/Y H:i:s', $p['date']); //echo $registered; ?></td>-->
						<td><?php $registered = date( 'm/d/Y', $p['date']); echo $registered; ?></td>
						<td>
                            <a href="<?php echo site_url('purchase/edit/'.$p['id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <?php if($p_role['role_id']==1){?>
									<a href="<?php echo site_url('purchase/remove/'.$p['id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
								<?php }?>
                        </td>
                    </tr>
                    <?php $i++;} ?>
                </table>
				<!--<div class="row no-print">
					<div class="col-xs-12"> 
					  <button class="btn btn-success pull-right" onclick="window.print();"><i class="fa fa-credit-card"></i> print</button>
					 
					</div>
				</div>-->
                               
            </div>
        </div>
    </div>
</div>
