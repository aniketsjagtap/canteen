<script>
 $(document).ready(function(){
		/*******************************Product Index***********************************************/
		
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
				total_salary = api.column( 2 ).data().reduce( function (a, b) {
					return intVal(a) + intVal(b);
				},0 );
				
				// total_page_salary over this page
				total_page_salary = api.column( 2, { page: 'current'} ).data().reduce( function (a, b) {
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
					null,
					{ type: "text" },
					null,
					null,
					null,
					
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
                <h3 class="box-title">Product Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('product/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
              <!-- <input type="text"  id="search" placeholder="Enter keyword here..." title="Type in a name"/>-->
                <table  id="data_tbl" class="table table-striped text-center table-bordered " >
		
			<thead>
				<tr>
					<th>Sr. No.</th>
					<th>Name</th>
					<th>Price</th>
					<th>Raw Material</th>
					<th>Cash Formula</th>
					<th>Party Orders Formula</th>
					<th>Mess Formula</th>
					<th>Actions</th>
                   		</tr>
                   		<tr>
					<th></th>
					<th></th>
					<th id="totalPrice"></th>
					<th></th>
					<th></th>
					<th></th>
					<th></th>
					<th></th>
                   		</tr>
                   	</thead>
                    <?php //print '<pre>';
							// echo "Product Raw Material: ";print_r($productRawMaterial);
							// echo"<br><br>";
							// echo"Product: ";print_r($product);
							// echo"<br><br>";
							// echo"Raw Material: ";print_r($rawmaterial);
						// print'</pre>';
						// return true;
						$i=1;foreach($product as $p){ ?>
                    <tr>
						<td><?php echo $i; ?></td>
						<td><?php echo $p['name']; ?></td>
						<td><?php echo $p['price']; ?></td>
						<td>
						<?php foreach($rawmaterial as $r){ ?>
								<?php if($r['product_id']==$p['id']){?>
								
									<table >
										<tr>
											<td><?php echo $r['name']; ?></td>
										</tr>
									</table>
								
							<?php }} ?>
						</td>
						<td>
						<?php foreach($rawmaterial as $r){ ?>
								<?php if($r['product_id']==$p['id']){?>
								
									<table>
										<tr>
											<td><?php echo $r['formula']; ?></td>
										</tr>
									</table>
								
							<?php }}?>
						</td>
						<td>
						<?php foreach($rawmaterial as $r){ ?>
								<?php if($r['product_id']==$p['id']){?>
								
									<table>
										<tr>
											<td><?php echo $r['partyFormula']; ?></td>
										</tr>
									</table>
								
							<?php }}?>
						</td>
						<td>
						<?php foreach($rawmaterial as $r){ ?>
								<?php if($r['product_id']==$p['id']){?>
								
									<table>
										<tr>
											<td><?php echo $r['messFormula']; ?></td>
										</tr>
									</table>
								
							<?php }}?>
						</td>
						<td>
                            <a href="<?php echo site_url('product/edit/'.$p['id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <?php if($p_role['role_id']==1){?>
									<a href="<?php echo site_url('product/remove/'.$p['id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
								<?php }?>
                        </td>
                    </tr>
                    <?php $i++;  } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
