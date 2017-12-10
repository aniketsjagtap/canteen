<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Account Sale Types Listing</h3>
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
							<th>Name</th>
							<th>Description</th>
							<th>Actions</th>
						</tr>
						<tr>
							<th></th>
							<th></th>
							<th></th>
							<th></th>
						</tr>
					</thead>
                    <?php $i=1; foreach($saleType as $st){ ?>
                    <tr>
						<td><?php echo $i; ?></td>
						<td><?php echo $st['name']; ?></td>
						<td><?php echo $st['description']; ?></td>
						
						<td>
                            <a href="<?php echo site_url('Acc_sales/edit/'.$st['id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <?php if($p_role['role_id']==1){?>
								<a href="<?php echo site_url('Acc_sales/remove/'.$st['id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
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

