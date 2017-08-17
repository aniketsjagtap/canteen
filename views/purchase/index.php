<script>
 $(document).ready(function(){
		/*******************************Purchase Index***********************************************/
		
		$('#data_tbl').dataTable({	
		"lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ],
		"sPaginationType": "full_numbers",
		"footerCallback": function ( row, data, start, end, display ) {
				var api = this.api(), data;	 
				// Remove the formatting to get integer data for summation
				var intVal = function ( i ) {
					return typeof i === 'string' ? i.replace(/[\$,]/g, '')*1 : typeof i === 'number' ?	i : 0;
				};
	 
				// total_salary over all pages
				total_salary = api.column( 7 ).data().reduce( function (a, b) {
					return intVal(a) + intVal(b);
				},0 );
				
				// total_page_salary over this page
				total_page_salary = api.column( 7, { page: 'current'} ).data().reduce( function (a, b) {
					return intVal(a) + intVal(b);
				}, 0 );
				
				total_page_salary = parseFloat(total_page_salary);
				total_salary = parseFloat(total_salary);
								// Update footer
				$('#totalPrice').html(total_page_salary.toFixed(2)+"/"+total_salary.toFixed(2));		
				//$('#totalPrice').html("Total:<br>"+total_page_salary.toFixed(2));		
				},		
		})
		  .columnFilter({ sPlaceHolder: "head:after",
			aoColumns: [ null,	
					{ type: "text" },
					{ type: "text" },
					{ type: "text" },
					{ type: "text" },
					
					null,
					null,
					null,
					
					//null,
					{ type: "date-range", sRangeFormat: "Start:{from} End:{to}"},
					null
				]
		});
		
		$('#data_tbl_length').addClass("no-print");
		$('#data_tbl_filter').addClass("no-print");
}
);
</script>
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
			
                <table  id="data_tbl" class="table table-striped text-center table-bordered " >
				
					<thead>
						<tr>
							<th>Sr. No.</th>
							<th>Location</th>
							<th>Invoice/Bill Number</th>
							<th>Supplier</th>
							
							<th>RawMaterial</th>
							<th>Quantity</th>
							<th>Unit</th>
							<th>Amount</th>
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
							<th id="totalPrice"></th>
							<th ></th>
							<th></th>
						</tr>
						
					</thead>
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
									echo $r['name']; } ?>
						</td>
						
						<td><?php echo $p['quantity']; ?></td>
						
						<td><?php foreach($unit as $u){ 
								if($u['id']==$p['unit_id']) 
									echo $u['name']; } ?>
						</td>
						
						<td><?php echo $p['price']; ?></td>
						
						<td><?php $registered = date( 'm/d/Y', $p['date']); echo $registered; ?></td>
						<td>
                            <a href="<?php echo site_url('purchase/edit/'.$p['id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <?php if($p_role['role_id']==1){?>
									<a href="<?php echo site_url('purchase/remove/'.$p['id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
								<?php } ?>
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
