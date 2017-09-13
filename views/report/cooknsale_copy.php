 <!--<link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">-->
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.4.1/css/buttons.dataTables.min.css">

<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.4.1/js/dataTables.buttons.min.js"></script>
<script src="httPs://cdn.datatables.net/buttons/1.4.1/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.4.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.4.1/js/buttons.print.min.js"></script>
<script>
$(document).ready(function(){
/********************Sales Report Index*******************************/			
	$('#sales_report').dataTable({
			 dom: 'Bfrtip',
			buttons: [
				'copy', 'csv', 'excel', 'pdf', 'print'
			]
		
		});
		  // var table_length = $("#sales_report tbody tr").length;
  
  // for (var i = 0; i< table_length; i++){
    // var tr = $('.sales_report').parents('tr').eq(i);
    // var row = table.row(tr);
    // row.child('Example Child Info').show();
    // tr.addClass('shown');
  // }
		
		$('#sales_report_length').addClass("no-print");
		$('#sales_report_filter').addClass("no-print");
		 $("table").addClass("shown");
		 $("td").addClass("shown");
		 $("tr").addClass("shown");
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
						<tr>
							<th>Sr. No.</th>
							
							<th>Raw Material</th>
							<th width="200">Product</th>
							<th>Rate</th>
							
							
							<th>Op. Stock</th>
							<th>Purchase</th>
							<th>Cl. Stock</th>
							<th>Product Sale</th>
							<th>Consume</th>
							<th>Party Consume</th>
							<th>Total Consume</th>
							
							<th>Difference</th>
							
							<th>Amount</th>
					</thead>
					<tbody>
                    <?php $i=1;
					// echo "<pre>";
						// print_r($product_rawMaterial);
					// echo "</pre>";
				 // return true;	
					foreach($product_rawMaterial as $prm){
						$quantity = 0; $open=0; $close=0; $purchase=0; $consume = NULL; $partyConsume=NULL; $totalConsume=NULL; $difference=0; $total=0;
						echo "<tr>";
							
							echo "<td>";
								echo $i;
							echo "</td>";echo "<td>";
								echo $prm['name'];
							echo "</td>";
							echo "<td>";
									
							foreach($prm['product'] as $key=>$val){
								echo "<table>";
									echo "<tr>";
										echo "<td>";
											foreach($product as $p){
												if($val['product_id']== $p['id'])
													echo $p['name'];} 
										echo "</td>";
										
									echo "</tr>";
								echo "</table>";	
							}
							echo "</td>";
							echo "<td>";
							foreach($prm['product'] as $key=>$val){
								echo "<table>";
									echo "<tr>";
										
										echo "<td>";
											foreach($product as $p){
												if($p['id']== $val['product_id'])
													echo $p['price'];} 
										echo "</td>";
									echo "</tr>";
								echo "</table>";	
							}
								
							echo "</td>";
							
							echo "<td>";
							 foreach($opening as $o){
										if($prm['id']==$o['rawMaterial_id'])
										{
											$open = $o['quantity'];
											echo $open;
										}
									} 
							echo "</td>";
							echo "<td>";
							
							foreach($purchase_report as $pr){
										if($prm['id']==$pr['rawMaterial_id'])
										{
											$purchase = $pr['quantity'];
											echo $purchase;
										}
									}
								
							echo "</td>";
							
							echo "<td>";
							
							 foreach($closing as $c){
										if($prm['id']==$pr['rawMaterial_id'])
										{	
											$close =  $c['quantity'];
											echo $close;
										}
									}
								
							echo "</td>";
							echo "<td>";
							foreach($prm['product'] as $key=>$val){
								echo "<table>";
									echo "<tr>";
										
										echo "<td>";
											$quantity = $val['quantity'];
											echo($quantity);
										echo "</td>";
									echo "</tr>";
								echo "</table>";	
							}
								
							echo "</td>";
							echo "<td>";
							
							 // $consume = $open+$purchase-$close;
										
											// echo $consume;
							$item = 0;
							foreach($prm['product'] as $key=>$val){
								if( $val['salesType_id'] == 1)	{
									$consume[$item] = round(($val['quantity']/$val['formula']),2);
								}
								else{
									
									$consume[$item] = 0;
								}
							
								echo "<table>";
										echo "<tr>";
											echo "<td>";
													
														echo $consume[$item];
														$item++;
											echo "</td>";
											
										echo "</tr>";
									echo "</table>";
							}
							echo "</td>";
							
							echo "<td>";
							$item = 0;
							foreach($prm['product'] as $key=>$val){
								if( $val['salesType_id'] == 2)	{
													$partyConsume[$item] = round(($val['quantity']/$val['partyFormula']),2);
								}		
								else{
													$partyConsume[$item] = 0;
								}
								echo "<table>";
										echo "<tr>";
											echo "<td>";
													$partyConsume[$item] = 0;
														echo $partyConsume[$item];
														$item++;
											echo "</td>";
											
										echo "</tr>";
									echo "</table>";
							}
								
							echo "</td>";
							echo "<td>";
							//$item = 0;
							for($item=0; $item<sizeof($consume);$item++){
									echo "<table>";
										echo "<tr>";
											echo "<td>";
												$totalConsume[$item] = $consume[$item]+$partyConsume[$item];
												echo $totalConsume[$item];
											echo "</td>";
											
										echo "</tr>";
									echo "</table>";
																
							}
								
							echo "</td>";
							
							
							echo "<td>";
							 $difference = $open+$purchase-$close - array_sum($totalConsume); 
								if($difference>0){
									echo "<font color='red'>";
								}
									echo $difference;
									
								if($difference>0){
									echo "</font>";
								}
								
							echo "</td>";
							
							echo "<td>";
							foreach($prm['product'] as $key=>$val){
								
											foreach($product as $p){
												if($val['product_id']== $p['id'])
													$total =  ($p['price']*$difference);
													$total = round($total,2);
													//echo $p['price'];
													} 
											
							
							// foreach($product as $p){
								// if($val['product_id']== $p['id']){
									// $total =  ($p['price']*$difference);
									echo "<table>";
									echo "<tr>";
										echo "<td>";
									if($total>0){
											echo "<font color='red'>";
										}
											echo $total;
											
										if($total>0){
											echo "</font>";
										}
									echo "</td>";
										
									echo "</tr>";
								echo "</table>";
									// ;} }
								}
							echo "</td>";
							
						echo "</tr>";
						$i++;
						
						}
					?>
					</tbody>
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
