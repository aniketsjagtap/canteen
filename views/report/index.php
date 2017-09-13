<script>
$(document).ready(function(){
/********************Sales Report Index*******************************/			
	$('#sales_report').dataTable({	
	"dom": 'Bfrtip',
			"lengthMenu": [
							[ 10, 25, 50, -1 ],
							[ '10 rows', '25 rows', '50 rows', 'Show all' ]
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
				total_salary = api.column( 9 ).data().reduce( function (a, b) {
					return intVal(a) + intVal(b);
				},0 );
				
				// total_page_salary over this page
				total_page_salary = api.column( 9, { page: 'current'} ).data().reduce( function (a, b) {
					
					return intVal(a) + intVal(b);
					
				}, 0 );
				
				total_page_salary = parseFloat(total_page_salary);
				total_salary = parseFloat(total_salary);
								// Update footer
				$('#totalPrice').html("Total:<br>"+total_page_salary.toFixed(2));		
				},		
		})
		  .columnFilter({ 
			aoColumns: [ null,	
					null,
					null,
					null,
					null,
					null,
					null,
					null,
					null
					//{ type: "date-range", sRangeFormat: "Start:{from} End:{to}"}
				]
		});
		
		$('#sales_report_length').addClass("no-print");
		$('#sales_report_filter').addClass("no-print");
		
		// $('.date_range_filter').attr("type","date" );
		// $('.date_range_filter').attr(" data-date","");
		// $('.date_range_filter').attr("data-date-format","dd MM yyyy");
});
</script>
<div class="wrapper">
      <!-- Main content -->
      <section class="invoice">
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header ">
                <h3 class="box-title"><?php if(! empty($categoryType)){
											foreach($categoryType as $ct){ 
												if($ct['id']==$cat_id){
													echo $ct['name'];
												}
												break;
											} 
										}else echo "Sales "?> Report 
				</h3>
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
                  <table  id="sales_report" class="table table-striped text-center table-bordered" >
				<!--<table class="table table-striped " id="example">-->
					<thead>
							<th>Sr. No.</th>
							
							<th>Product</th>
							<th>Rate</th>
							
							<th>Op. Stock</th>
							<th>Purchase</th>
							<th>Cl. Stock</th>
							<th>Consume</th>
							
							<th>Sale</th>
							<th>Difference</th>
							
							<th>Amount</th>
						</thead>
						
							
						
					
                    <?php $i=1; // echo"<pre>"; print_r($purchase_report);echo"</pre>";	
							foreach($sales_report as $s){ 
							if($s['categoryType']== $cat_id)
							{
								$open=0; $close=0; $purchase=0; $consume=0; $difference=0; $total=0;
							?>
                    <tr>
						<td><?php echo $i; ?></td>
						
						<td><?php foreach($product as $p){
								if($s['product_id']== $p['id'])
									echo $p['name'];}  ?></td>
						<td><?php foreach($product as $p){
								if($s['product_id']== $p['id'])
									echo $p['price'];}  ?></td>
						
							
							<td><?php foreach($opening as $o){
										if($s['rawMaterial']['rawMaterial_id']==$o['rawMaterial_id'])
										{
											$open = $o['quantity'];
											echo $open;
										}
									} ?></td>	
							<td><?php foreach($purchase_report as $pr){
										if($s['rawMaterial']['rawMaterial_id']==$pr['rawMaterial_id'])
										{
											$purchase = $pr['quantity'];
											echo $purchase;
										}
									} ?></td>
							<td><?php foreach($closing as $c){
										if($s['rawMaterial']['rawMaterial_id']==$c['rawMaterial_id'])
										{	
											$close =  $c['quantity'];
											echo $close;
										}
									} ?></td>
																
								<td><?php $consume = $open+$purchase-$close;
										
											echo $consume;
										
									?></td>
						
						
						
						
						<td><?php echo $s['quantity']; ?></td>
						
						<td><?php $difference = $consume - $s['quantity']; 
								if($difference>0){
									echo "<font color='red'>";
								}
									echo $difference;
									
								if($difference>0){
									echo "</font>";
								}
									
									?></td>
						
						<td><?php foreach($product as $p){
								if($s['product_id']== $p['id']){
									$total =  ($p['price']*$difference);
									if($total>0){
											echo "<font color='red'>";
										}
											echo $total;
											
										if($total>0){
											echo "</font>";
										}
									;} }  ?></td>
						
                    </tr>
                    <?php $i++; }} ?>
					<tfoot>
						<th></th>
						<th></th>
						<th></th>
						<th></th>
						<th></th>
						<th></th>
						<th></th>
						<th></th>
						<th></th>
						<th id="totalPrice"></th>
								
					</tfoot>
                </table>
                                
            </div>
        </div>
    </div>
</div>
 <div class="row no-print">
            <div class="col-xs-12">
			<button class="btn btn-info pull-left" onclick="window.print();">
					<i class="fa fa-print"></i> Print
				</button>
             <!-- <a  class="btn btn-default"><i class="fa fa-print" ></i> Print</a>-->
            </div>
          </div>
</section><!-- /.content -->
    </div>
