<script>
$(document).ready(function(){
/********************Sales Report Index*******************************/			
	$("#sales_report").dataTable({	
	responsive: true,
	"dom": 'Bfrtip',
			"lengthMenu": [
							[ 30, 50, 100, -1 ],
							[ '30 rows', '50 rows', '100 rows', 'Show all' ]
						],
			"buttons": [
						'pageLength', 'excel', 'pdf', 'print' , 
						],
		"sPaginationType": "full_numbers",
			
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
				<h5><?php
						echo "<b>".$location['name']."</b><br>".$location['address'];
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
							<th>Type</th>
							<th>Amount</th>
					</thead>
					
							
					<tbody>	
					
                    <?php $i=1;  //echo"<pre>"; print_r($expense_report);echo"</pre>";
							$sale=0; $Exp=0; $bal=0;
							foreach($saleType as $st){ 
							
								
							?>
								<tr>
									
									<td><?php echo  $i; ?></td>
									<td><?php echo  $st['name'].' Sale'; ?></td>
									
									
									<td><?php foreach($sales_report as $sr){
											if($sr['acc_salesType_id'] == $st['id']){
												$sale += $sr['sale'];
												echo $sr['sale']; 
											}
										}
										?></td>
								</tr>
					<?php $i++; } ?>
							<tr>
								<td><?php echo $i;?></td>
								<td><b>Total Sale</b></td>
								<td><?php echo "<b>".$sale."</b>"; ?></td>
							</tr>
						<?php  foreach($expenseTypes as $et) { 
							?>
							<tr>
									<td><?php $i++; echo $i;?></td>
									<td><?php echo "<h3>". $et['name'].' Expense</h3>'; ?></td>
									
									<td><?php echo ' '; ?></td>
							</tr>
							<?php 
									foreach($expenseSubtypes as $est) { 
							?>
							
							
									
									<?php if($est['acc_expense_type_id'] == $et['id']){
										
										echo "<tr>";
										
										echo "<td>";
										$i++;
										echo $i;
										echo "</td>";
										echo "<td>";
										echo  "<b>".$est['name'].' Sub Expense </b>'; 
										echo "</td>";
								
										echo "<td>";
										echo "  "; 
										echo "</td>";
											
										echo "</tr>";
										
										?>
							
										<?php  foreach($expenseItems as $ei){
										?>
							
										<?php 
												if($ei['acc_expense_sub_type_id'] == $est['id']){
												
													echo "<tr>";
													echo "<td>";
													$i++;
													echo $i;
													echo "</td>";
													echo "<td>";
													echo  $ei['name']; 
													echo "</td>";
													
													echo "<td>";
													foreach($expense_report as $exr){
														if($exr['acc_expense_item_id']==$ei['id']){
															$Exp += $exr['expense'];
															echo $exr['expense']; 
															
															}
														}
													echo "</td>";
													echo "</tr>";
												}
												
												?>
							
										<?php
												
											}
										} 
										
										?>
									
									
									
							
					<?php 	
						//	$i++;
						}
							
						//$i++;
						}
					?>
					<tr>
						<td><?php $i++; echo $i;?></td>
						<td><b>Total Expenses</b></td>
						<td><?php echo "<b>".$Exp."</b>"; ?></td>
					</tr>
					<tr>
						<td><?php $i++; echo $i;?></td>
						<td><b>Balance</b></td>
						<td><?php $bal = $sale-$Exp; echo "<b>".$bal."</b>";?></td>
					</tr>
					<tr>
						<td><?php $i++; echo $i;?></td>
						<td><b>Closing Stock</b></td>
						<td><?php echo $closingStock; ?></td>
					</tr>
					<tr>
						<td><?php $i++; echo $i;?></td>
						<td><b>Opening Stock</b></td>
						<td><?php echo $openingStock; ?></td>
					</tr>
					<tr>
						<td><?php $i++; echo $i;?></td>
						<td><b>Net Balance</b></td>
						<td><?php echo "<b>".($bal+$closingStock-$openingStock)."</b>"; ?></td>
					</tr>
					</tbody>
                </table>
                 			


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
