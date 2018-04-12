<script>
$(document).ready(function(){
/********************Sales Report Index*******************************/			
	$("#sales_report").dataTable({	
	responsive: true,
	"dom": 'Bfrtip',
			"lengthMenu": [
							[ 100, 150, 200, -1 ],
							[ '100 rows', '150 rows', '200 rows', 'Show all' ]
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
							<th>Percentage (WRT Sale)</th>
					</thead>
					
							
					<tbody>	
					
                    <?php $i=1;  //echo"<pre>"; print_r($expense_report);echo"</pre>";
							$sale=0; $Exp=0; $bal=0; $tsale=1;$netbal = 0;
							foreach($sales_report as $sr){
											//if($sr['acc_salesType_id'] == $st['id'])
											{
												$sale += $sr['sale'];
												$tsale = $sale;
											}
										}
							foreach($saleType as $st){ 
							
								
							?>
								<tr>
									
									<td><?php echo  $i; ?></td>
									<td><?php echo  $st['name'].' Sale'; ?></td>
									
									
									<td><?php foreach($sales_report as $sr){
											if($sr['acc_salesType_id'] == $st['id']){
												//$sale += $sr['sale'];
												echo $sr['sale']; 
											}
										}
										?></td>
									<td>
										<?php foreach($sales_report as $sr){
											if(($sr['acc_salesType_id'] == $st['id'])&&($tsale>0)){
												
												echo round((($sr['sale']*100)/$tsale),2)." %";	
											}
											}
										?>
									</td>
								</tr>
					<?php $i++; } ?>
							<tr>
								<td><?php echo $i;?></td>
								<td><b>Total Sale</b></td>
								<td><?php $tsale = $sale;
										echo "<b>".$sale."</b>"; 
									?></td>
								<td>
										<?php if($tsale>0)
												echo "<b>".(($sale*100)/$tsale)." % </b>";	
											else
												echo "-";
										?>
									</td>
							</tr>
							
						<?php  foreach($expenseTypes as $et) { 
							?>
							<tr>
									<td><?php $i++; echo $i;?></td>
									<td><?php echo "<h3>". $et['name'].' Expense</h3>'; ?></td>
									
									<td><?php echo ' '; ?></td>
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
													?>
													<td>
														<?php 
															foreach($expense_report as $exr){
														if($exr['acc_expense_item_id']==$ei['id']){
															
															echo round((($exr['expense']*100)/$tsale),2)." %";	
															
															}
														}
															
																		
														?>
													</td>
													
													<?php
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
						<td>
							<?php if($Exp >0 && $tsale >0) 
								echo round((($Exp*100)/$tsale),2)." %";	
											
							?>
						</td>
					</tr>
					<tr>
						<td><?php $i++; echo $i;?></td>
						<td><b>Balance</b></td>
						<td><?php $bal = $sale-$Exp; echo "<b>".$bal."</b>";?></td>
						<td>
							<?php if($bal >0 && $tsale >0) 
							echo round((($bal*100)/$tsale),2)." %";	
											
							?>
						</td>
					</tr>
					<tr>
						<td><?php $i++; echo $i;?></td>
						<td><b>Closing Stock</b></td>
						<td><?php echo $closingStock; ?></td>
						<td><?php echo " "; ?></td>
						
					</tr>
					<tr>
						<td><?php $i++; echo $i;?></td>
						<td><b>Opening Stock</b></td>
						<td><?php echo $openingStock; ?></td>
						<td><?php echo " "; ?></td>
					</tr>
					<tr>
						<td><?php $i++; echo $i;?></td>
						<td><b>Net Balance</b></td>
						<td><?php $netbal = ($bal+$closingStock-$openingStock); 
								if($netbal<0)
								{
									echo "<font color='red'><b>".$netbal."</b></font>";	
									
								}
								else {
									echo "<b>".$netbal."</b>"; 
									}
							?></td>
									
						<td>
							<?php if($netbal >0 && $tsale >0) 
									echo round((($netbal*100)/$tsale),2)." %";	
								if($netbal<0 && $tsale >0)
								{	
									$loss = round((($netbal*100)/$tsale),2);
									echo "<font color='red'>".$loss." %</font>";	
									echo "<script>alert('Profit is $loss % !');</script>";
								}
											
							?>
						</td>
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
