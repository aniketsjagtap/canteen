<script>
$(document).ready(function(){
/********************Sales Report Index*******************************/			
	$("#sales_report").dataTable({	
	responsive: true,
	"dom": 'Bfrtip',
			"lengthMenu": [
							[ 5, 25, 50, -1 ],
							[ '5 rows', '25 rows', '50 rows', 'Show all' ]
						],
			"buttons": [
						'pageLength', 'excel', 'pdf', 'print' , 
						],
		"sPaginationType": "full_numbers",
		"footerCallback": function ( row, data, start, end, display ) {
				var api = this.api(), data;	 
				// Remove the formatting to get integer data for summation
				var intVal = function ( i ) {
					
					//return typeof i === 'string' ? i.replace(/[\$,]/g, '')*1 : typeof i === 'number' ?	i : 0;
					return typeof i === 'string' ? i.replace(/[^\d.-]/g, '')*1 : typeof i === 'number' ?	i : 0;
				};
				// var intVal = function (i) {
				  // if(typeof i === 'string') {
					// let multiplier = /[\(\)]/g.test(i) ? -1 : 1;
					
					// return (i.replace(/[\$,\(\)]/g, '') * multiplier)
				  // }
				  
				  // return typeof i === 'number' ?
					// i : 0;
				// };
	 
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
				$('#totalSale').html("Total:<br>"+total_page_salary.toFixed(2)+"/"+total_salary.toFixed(2));		
				},		
		});
		
	/********************Expenses Report Index*******************************/			
	$("#expenses_report").dataTable({	
	responsive: true,
	"dom": 'Bfrtip',
			
			"lengthMenu": [
							[ 5, 25, 50, -1 ],
							[ '5 rows', '25 rows', '50 rows', 'Show all' ]
						],
			"buttons": [
						'pageLength', 'excel', 'pdf', 'print' , 
						],
		"sPaginationType": "full_numbers",
		"footerCallback": function ( row, data, start, end, display ) {
				var api = this.api(), data;	 
				// Remove the formatting to get integer data for summation
				var intVal = function ( i ) {
					
					//return typeof i === 'string' ? i.replace(/[\$,]/g, '')*1 : typeof i === 'number' ?	i : 0;
					return typeof i === 'string' ? i.replace(/[^\d.-]/g, '')*1 : typeof i === 'number' ?	i : 0;
				};
				// var intVal = function (i) {
				  // if(typeof i === 'string') {
					// let multiplier = /[\(\)]/g.test(i) ? -1 : 1;
					
					// return (i.replace(/[\$,\(\)]/g, '') * multiplier)
				  // }
				  
				  // return typeof i === 'number' ?
					// i : 0;
				// };
	 
				// total_salary over all pages
				total_salary = api.column( 4 ).data().reduce( function (a, b) {
					return intVal(a) + intVal(b);
				},0 );
				
				// total_page_salary over this page
				total_page_salary = api.column( 4, { page: 'current'} ).data().reduce( function (a, b) {
					
					return intVal(a) + intVal(b);
					
				}, 0 );
				
				total_page_salary = parseFloat(total_page_salary);
				total_salary = parseFloat(total_salary);
								// Update footer
				$('#totalExpanse').html("Total:<br>"+total_page_salary.toFixed(2)+"/"+total_salary.toFixed(2));		
				},		
		});
		
		/********************Stock Report Index*******************************/			
	$("#stock_tbl").dataTable({	
	responsive: true,
	"dom": 'Bfrtip',
			"lengthMenu": [
							[ 5, 25, 50, -1 ],
							[ '5 rows', '25 rows', '50 rows', 'Show all' ]
						],
			"buttons": [
						'pageLength', 'excel', 'pdf', 'print' , 
						],
		"sPaginationType": "full_numbers",
		"footerCallback": function ( row, data, start, end, display ) {
				var api = this.api(), data;	 
				// Remove the formatting to get integer data for summation
				var intVal = function ( i ) {
					
					//return typeof i === 'string' ? i.replace(/[\$,]/g, '')*1 : typeof i === 'number' ?	i : 0;
					return typeof i === 'string' ? i.replace(/[^\d.-]/g, '')*1 : typeof i === 'number' ?	i : 0;
				};
				// var intVal = function (i) {
				  // if(typeof i === 'string') {
					// let multiplier = /[\(\)]/g.test(i) ? -1 : 1;
					
					// return (i.replace(/[\$,\(\)]/g, '') * multiplier)
				  // }
				  
				  // return typeof i === 'number' ?
					// i : 0;
				// };
	 
				// total_salary over all pages
				total_salary = api.column( 5 ).data().reduce( function (a, b) {
					return intVal(a) + intVal(b);
				},0 );
				
				// total_page_salary over this page
				total_page_salary = api.column( 5, { page: 'current'} ).data().reduce( function (a, b) {
					
					return intVal(a) + intVal(b);
					
				}, 0 );
				
				total_page_salary = parseFloat(total_page_salary);
				total_salary = parseFloat(total_salary);
								// Update footer
				$('#totalPrice').html("Total:<br>"+total_page_salary.toFixed(2)+"/"+total_salary.toFixed(2));		
				},		
		});
		
		
		
});
</script>
<div class="wrapper">
      <!-- Main content -->
      <section class="invoice">
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header ">
                <h3 class="box-title">Accounts Report</h3>
				<h5><?php foreach ($location as $l){
								if($l['id']==$loc_id)
									echo "<b>".$l['name']."</b><br>".$l['address'];
							}
							echo "<br><b>Period: </b>".date( 'd/m/Y', $open_date )." <b>to</b> ".date( 'd/m/Y', $close_date ); 
				?></h5>
				
            	
            </div>
				
			
            <div class="box-body">
                 
				<!--Start Date: <input type="text" id="dateStart" name="dateStart" size="30">
				End Date: <input type="text" id="dateend" name="dateend" size="30">-->
				
<!---------------         Sales Report                                    --------------------------->
<h2>Sales Report</h2>
                  <table  id="sales_report" class="table table-striped text-center table-bordered " >
				<!--<table class="table table-striped " id="example">-->
					<thead>
							<th>Sr. No.</th>
							<th>Sales Type</th>
							<th>Amount</th>
					</thead>
					<tfoot>
						
						<th></th>
						<th></th>
						<th id="totalSale"></th>
								
					</tfoot>
							
						
					
                    <?php $i=1; // echo"<pre>"; print_r($purchase_report);echo"</pre>";	
							foreach($sales_report as $s){ 
							
								$open=0; $close=0; $purchase=0; $consume=0; $difference=0; $total=0;
							?>
								<tr>
									<td><?php echo $i; ?></td>
									
									<td><?php foreach($saleType as $st){
											if($s['acc_salesType_id']== $st['id'])
												echo $st['name'];}  ?></td>
									<td><?php echo $s['sale']; ?></td>
								</tr>
                    <?php $i++; } ?>
					
                </table>
                 			


<!---------------         Expenses Report                                    --------------------------->
<h2>Expenses Report</h2>
				 <table  id="expenses_report" class="table table-striped text-center table-bordered" >
				<!--<table class="table table-striped " id="example">-->
					<thead>
							<th>Sr. No.</th>
							
							<th>Expense Type</th>
							<th>Expense Subtype</th>
							
							<th>Item</th>
							<th>Expense</th>
						</thead>
						<tfoot>
						
						<th></th>
						<th></th>
						<th></th>
						<th></th>
						<th id="totalExpanse"></th>
								
					</tfoot>
							
						
					
                     <?php $i=1;  //echo"<pre>";
									// // print_r($expense_report); 
									// echo $expense_report[0]['expense_type_id']; 
								// echo"</pre>";
							// return true;
							
							
							foreach($expenseTypes as $et){ 
								
								foreach($expenseSubtypes as $es){ 
									
									for($j=0;$j<sizeof($expense_report);$j++){
										if(($expense_report[$j]['expense_type_id'] ==  $et['id'])&&($expense_report[$j]['expense_sub_type_id'] ==  $es['id'])){
										
								$open=0; $close=0; $purchase=0; $consume=0; $difference=0; $total=0;
							?>
                    <tr>
						<td><?php echo $i; ?></td>
						
						<td><?php 
									echo $expense_report[$j]['expense_type_name'];  ?></td>
						<td><?php 
									echo $expense_report[$j]['expense_sub_type_name'];  ?></td>
						<td><?php 
									echo $expense_report[$j]['expense_item_name'];  ?></td>
						<td><?php 
									echo $expense_report[$j]['expense'];  ?></td>
                    </tr>
                    <?php $i++; } }}} ?>
					
                </table>
<!---------------         Stock Report                                    --------------------------->
<h2>Stock Report</h2>
				<table  id="stock_tbl" class="table table-striped text-center table-bordered " >
					<thead>
						<tr>
							<th>Sr. No.</th>
							<th>RawMaterial</th>
							<th>Quantity</th>
							<th>Unit</th>
							<th>Rate(per unit)</th>
							<th>Amount</th>
						</tr>
					</thead>
					<tfoot>
						<tr>
							<th></th>
							<th></th>
							<th></th>
							<th></th>
							<th></th>
							<th id="totalPrice"></th>
						</tr>
					</tfoot>
                    <?php
						// echo "<pre>";
							// print_r($rawMaterialRate);
							// echo "</pre>";
					$i=1; foreach($stock as $s){ ?>
                    <tr>
						<td><?=$i;?></td>
						
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
                    </tr>
                    <?php $i++;} ?>
					
                </table>
                				  
            </div>
        </div>
    </div>
</div>
 <div class="row no-print">
            <div class="col-xs-12">
			<!--<button class="btn btn-info pull-left" onclick="window.print();">
					<i class="fa fa-print"></i> Print
				</button>-->
             <!-- <a  class="btn btn-default"><i class="fa fa-print" ></i> Print</a>-->
            </div>
          </div>
</section><!-- /.content -->
    </div>
