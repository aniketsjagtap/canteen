<script>
 $(document).ready(function(){
		/*******************************Sales Index***********************************************/
		
		$('#data_tbl1').dataTable({	
		"lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ],
		"sPaginationType": "full_numbers",
		"footerCallback": function ( row, data, start, end, display ) {
				var api = this.api(), data;	 
				// Remove the formatting to get integer data for summation
				var intVal = function ( i ) {
					return typeof i === 'string' ? i.replace(/[\$,]/g, '')*1 : typeof i === 'number' ?	i : 0;
				};
	 
				// total_salary over all pages
				total_salary = api.column( 8 ).data().reduce( function (a, b) {
					return intVal(a) + intVal(b);
				},0 );
				
				// total_page_salary over this page
				total_page_salary = api.column( 8, { page: 'current'} ).data().reduce( function (a, b) {
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
					null,
					null,
					null,
					// {
            // sClass: 'dateField' 
        // },
					//{ type:"text"},
					null
				]
		});
		
		$('#data_tbl1_length').addClass("no-print");
		$('#data_tbl1_filter').addClass("no-print");
		
		   
      
            $("#min").datepicker(
				{  
					// changeMonth: true, 
					// changeYear: true , 
					 autoclose: true,
					// dateFormat:"d/m/Y",
					//format: "yy-mm-dd" ,
					

				}
			);
           
			
			var table = $('#data_tbl1').DataTable();
 
			// #column3_search is a <input type="text"> element
			$('#min').on( 'change', function () {
				//alert(this.value);
				table
					.columns( 10 )
					.search( this.value )
					.draw();
			} );
       
});
</script>
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Account Sales Report</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('acc_sales/add');?>" class="btn btn-success btn-sm">Add</a> 
					
                </div>
            </div>
            <div class="box-body">
                 <!--<input type="text"  id="search" placeholder="Enter keyword here..." title="Type in a name"/>-->
				<!--Start Date: <input type="text" id="dateStart" name="dateStart" size="30">
				End Date: <input type="text" id="dateend" name="dateend" size="30">-->
                <table  id="data_tbl1" class="table table-striped text-center table-bordered">
					<thead>
						<tr>
							<th>Sr. No.</th>
							
							<th>Location</th>
							
							<th>Product</th>
							<th>Raw Material Type</th>
							<th>Sales Type</th>
							<th>Rate</th>
							<th>Quantity</th>
							<th>Unit</th>
							<th>Amount</th>
							<th>Remark</th>
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
							<th id="totalPrice"></th>
							<th></th>
							<th><input name="min" id="min" type="text"></th>
							<th></th>
						</tr>
					</thead>
                    <?php $i=1; foreach($sales as $s){ ?>
                    <tr>
						<td><?php echo $i; ?></td>
						
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
						<td><?php foreach($Type as $t){
								if($s['rawMaterialType']== $t['id'])
									echo $t['name'];} ?></td>
							<td><?php foreach($saleType as $st){
								if($s['salesType_id']== $st['id'])
							echo $st['name'];} ?></td>
						<td><?php foreach($product as $p){
								if($s['product_id']== $p['id'])
									echo $p['price'];}  ?></td>
						<td><?php echo $s['quantity']; ?></td>
						<td><?php foreach($unit as $u){
								if($s['unit_id']== $u['id'])
							echo $u['name'];} ?></td>
						<td><?php foreach($product as $p){
								if($s['product_id']== $p['id'])
									echo ($p['price']*$s['quantity']);}  ?></td>
						<td><?php echo $s['remark']; ?></td>
						<td><?php $registered = date( 'm/d/Y', $s['date'] );
								echo $registered; ?></td>
						<td>
                            <a href="<?php echo site_url('sale/edit/'.$s['id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <?php if($p_role['role_id']==1){?>
								<a href="<?php echo site_url('sale/remove/'.$s['id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
							<?php } ?>
					   </td>
                    </tr>
                    <?php   $i++; } ?>
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

