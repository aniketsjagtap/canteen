<script>
 $(document).ready(function(){
/*******************************Stock Index***********************************************/
		
		$('#stock_tbl').dataTable({	
		"lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ] ,
		"sPaginationType": "full_numbers",
		"footerCallback": function ( row, data, start, end, display ) {
				var api = this.api(), data;	 
				// Remove the formatting to get integer data for summation
				var intVal = function ( i ) {
					return typeof i === 'string' ? i.replace(/[\$,]/g, '')*1 : typeof i === 'number' ?	i : 0;
				};
	 
				// total_salary over all pages
				total_salary = api.column( 6 ).data().reduce( function (a, b) {
					return intVal(a) + intVal(b);
				},0 );
				
				// total_page_salary over this page
				total_page_salary = api.column( 6, { page: 'current'} ).data().reduce( function (a, b) {
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
					 null,
					 null,
					null,
					null,
					null,
					//{ type: "date-range", sRangeFormat: "Start:{from} End:{to}"},
					null
				]
		});
		
		$('#stock_tbl_length').addClass("no-print");
		$('#stock_tbl_filter').addClass("no-print");
		
		  $("#min").datepicker(
				{  
					// changeMonth: true, 
					// changeYear: true , 
					 autoclose: true,
					// dateFormat:"d/m/Y",
					//format: "yy-mm-dd" ,
					

				}
			);
		var table = $('#stock_tbl').DataTable();
 
			// #column3_search is a <input type="text"> element
			$('#min').on( 'change', function () {
				//alert(this.value);
				table
					.columns( 7 )
					.search( this.value )
					.draw();
			} );
});
</script>

<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Stock Listing</h3>
				<h5><?php echo "<b>Period: </b>".date( 'd-M-Y', $open_date )." <b>to</b> ".date( 'd-M-Y', $close_date ); 
				?></h5>
            	<div class="box-tools">
                    <a href="<?php echo site_url('stock/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                 
                <table  id="stock_tbl" class="table table-striped text-center table-bordered " >
					<thead>
						<tr>
							<th>Sr. No.</th>
							<th>Location</th>
							<th>RowMaterial</th>
							<th>Quantity</th>
							<th>Unit</th>
							<th>Rate(per unit)</th>
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
							<th id="totalPrice"></th>
							<th><input name="min" id="min" type="text"></th>
							<th></th>
						</tr>
					</thead>
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
						<td><?php $flag_rate=0; foreach($rawMaterialRate as $rm){
								if($rm['rawMaterial_id']==$s['rawMaterial_id']&&($flag_rate===0)){
									echo number_format(($rm['price'])/($rm['quantity']),2); $flag_rate++;}} ?></td>
						<td><?php $flag_price=0; foreach($rawMaterialRate as $rm){
								if($rm['rawMaterial_id']==$s['rawMaterial_id']&&($flag_price===0)){
									echo number_format(($s['quantity']*($rm['price'])/($rm['quantity'])),2); $flag_price++;}}?></td>
						
						<td><?php $registered = date( 'm/d/Y', $s['date']); echo $registered; ?></td>
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
