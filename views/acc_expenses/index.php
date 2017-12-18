<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/rowreorder/1.2.3/js/dataTables.rowReorder.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.1/js/dataTables.responsive.min.js"></script>
<script>

 $(document).ready(function(){
		/*******************************expense Index***********************************************/
		
		$('#data_tbl1').dataTable({	
		responsive: true,
		"lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ],
		"sPaginationType": "full_numbers",
		"footerCallback": function ( row, data, start, end, display ) {
				var api = this.api(), data;	 
				// Remove the formatting to get integer data for summation
				var intVal = function ( i ) {
					return typeof i === 'string' ? i.replace(/[\$,]/g, '')*1 : typeof i === 'number' ?	i : 0;
				};
	 
				// total_salary over all pages
				total_salary = api.column( 3 ).data().reduce( function (a, b) {
					return intVal(a) + intVal(b);
				},0 );
				
				// total_page_salary over this page
				total_page_salary = api.column( 3, { page: 'current'} ).data().reduce( function (a, b) {
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
					{ type: "text" },
					
					
					
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
					.columns( 4 )
					.search( this.value )
					.draw();
			} );
       
});
</script>
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Account Expense Report</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('acc_expenses/add');?>" class="btn btn-success btn-sm">Add</a> 
					
                </div>
            </div>
            <div class="box-body">
                 <!--<input type="text"  id="search" placeholder="Enter keyword here..." title="Type in a name"/>-->
				<!--Start Date: <input type="text" id="dateStart" name="dateStart" size="30">
				End Date: <input type="text" id="dateend" name="dateend" size="30">-->
                <table  id="data_tbl1" class="table table-striped text-center table-bordered display nowrap" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>Sr. No.</th>
							
							<th>Location</th>
							<th>expense Type</th>
							<th>Amount</th>
							
							<th style="width:300px">Date</th>
							<th>Remark</th>
							<th>Actions</th>
						</tr>
						<tr>
							<th></th>
							
							<th></th>
							<th></th>
							<th id="totalPrice"></th>
							<th><input name="min" id="min" type="text"></th>
							<th></th>
							<th></th>
						</tr>
					</thead>
                    <?php $i=1; foreach($expenses as $s){ ?>
                    <tr>
						<td><?php echo $i; ?></td>
						
						<td> 
							<?php foreach($location as $l){
										if($s['location_id']==$l['id']){
											echo "<b>".$l['address']."</b><br>".$l['name'];
										}
									} ?>
						</td>
						
					
							<td><?php foreach($expenseItem as $et){
								if($s['acc_expense_item_id']== $et['id'])
							echo $et['name'];} ?></td>
						
						
						<td><?php echo $s['expense']; ?></td>

						<td><?php $registered = date( 'm/d/Y', $s['date'] );
								echo $registered; ?></td>
						<td><?php echo $s['remark']; ?></td>
						<td>
						
                            <a href="<?php echo site_url('Acc_expenses/edit/'.$s['id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <?php if($p_role['role_id']==1){?>
								<a href="<?php echo site_url('Acc_expense/remove/'.$s['id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
							<?php } ?>
					   </td>
                    </tr>
                    <?php   $i++; } ?>
                </table>
                <!--<div class="row no-print">
					<div class="col-xs-12">
					<button class="btn btn-info pull-left" onclick="window.print();">
							<i class="fa fa-print"></i> print
						</button>
					  <a  class="btn btn-default"><i class="fa fa-print" ></i> Print</a>
					</div>-->
				  </div>           
            </div>
        </div>
    </div>
	
</div>

