 <ol class="breadcrumb">
        <li><a href="http://isolveit.in/docman/index.php/User/redi"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Users</li>
      </ol>
    </section>
	<section class="content">
	<div class="modal fade bs-example-modal-lg" id="compose-modal" role="dialog">
			<div class="modal-dialog modal-lg">
			  <!-- Modal content-->
			  <div class="modal-content">
				<div class="modal-header">
				  <button type="button" class="close" data-dismiss="modal">&times;</button>
				  <h4 class="modal-title" id="mh"><strong>Edit User Profile :</strong></h4>
				</div>
				<div class="modal-body" id="mod">
		<!-- Profile Image -->
		<form method="post" action="saveUser" enctype="multipart/form-data">
            <div class="col-md-6 offset-md-3">
              <!-- Profile Image -->
              <div class="box box-primary">
                <div class="box-body box-profile">
				  <div class="form-group">
					<input id="pid" type="hidden" name="pid">
					<label for="username">Username</label>
                    <input id="username" type="text" name="username" class="form-control">
				  </div>
                  <div class="form-group">
					<label for="first_name">First Name</label>
                    <input id="fname" type="text" name="first_name" class="form-control">
				  </div>
					<label for="last_name">Last Name</label>
                    <input id="lname" type="text" name="last_name" class="form-control"><br>
				  <div class="form-group">
						<label for="gender">Gender</label>
							<input id="gen1" type="radio" name="gender"/>Male
							<input id="gen2" type="radio" name="gender"/>Female									
					</div>
					<div class="form-group">
					  <label for="suffix">Suffix</label>
						<input id="suffix" type="text" name="suffix" class="form-control">
						<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
					 </div>
					 <div class="form-group">
					  <label for="prefix">Prefix</label>
						<input id="prefix" type="text" name="prefix" class="form-control">
						<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
					 </div>
					 <div class="form-group">
					  <label for="email">Email</label>
						<input id="email" type="email" name="email" class="form-control" />
						<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
					 </div>
					 <div class="box-footer">
						<button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-save"> Save</i></button>
					</div>

				  </div>
				</div>
			</div>
		</form>
		<div class="col-md-6 offset-md-3" >
			<div class="box box-primary" >
				<div class="box-body box-profile" id="contact_details">
				<form method="post" action="saveDepartment"  enctype="multipart/form-data">
					  <label for="department">Department</label>
					<input type="hidden" id="personID" name="personID">
					<div class="form-group">
						<select id='dep' name='dep'>
							<option  value='account'>account</option>
							<option  value='IT'>IT</option>
							<option  value='environment'>enviornment</option>
							<option  value='production'>production</option>
							<option  value='HR'>HR</option>
							<option  value='marketing'>marketing</option>
							<option  value='super_admin'>super_admin</option>
						</select>
					</div>
					 <div class="box-footer">
						<button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-save"> Save</i></button>
					</div>
				</form>
				</div>
			</div>
		</div>
		<div class="col-md-6 offset-md-3" >
			<div class="box box-primary" >
				<div class="box-body box-profile" id="contact_details">
				<form method="post" action="savePosition"  enctype="multipart/form-data">
					  <label for="role">Position</label>
					<input type="hidden" id="personiD" name="personiD">
					<div class="form-group">
						<select name ='prole' id='prole'>
							<option value='employee'>employee</option>
							<option value='manager'>manager</option>
							<option value='admin'>admin</option>
							<option value='super_admin'>super_admin</option>
						</select>
					</div>
					 <div class="box-footer">
						<button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-save"> Save</i></button>
					</div>
				</form>
				</div>
			</div>
		</div><br><br>
		<div class="col-md-6 offset-md-3" >
			<div class="box box-primary" >
				<div class="box-body box-profile" id="contact_details">
				<form method="post" action="savePermission"  enctype="multipart/form-data">
					  <label for="permission">Special Permission</label>
					<input type="hidden" id="personid" name="personid">
						<div class="form-group">
							<input type="checkbox" id="permission1" name="permission[]" value="read" />read
							<input type="checkbox" id="permission2" name="permission[]" value="insert" />insert
							<input type="checkbox" id="permission3" name="permission[]" value="delete"  />delete
							<input type="checkbox" id="permission4" name="permission[]" value="update"  />update
							
					</div>
					 <div class="box-footer">
						<button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-save"> Save</i></button>
					</div>
				</form>
				</div>
			</div>
		</div>
		<!--/Profile-->
				</div>
			  </div>
			</div>
		</div>
		
	<div class="menu-info">
        <h3 class="box-header">User Information:</h3>
             <!-- <i class="menu-icon fa fa-file-code-o bg-green"></i><br>-->
	<div class="box-body table-responsive no-padding bg-gray">
    <table class="table table-hover"><tr><th>Edit</th><th>Username</th><th>First Name</th><th>Last Name</th><th>Department</th></tr><tr>
	<?php $i=0;
					foreach($uifo as $x_key => $x_value)
					{
						foreach($x_value as $y_key => $y_value)
						{
							if($y_key == 'person_id')
								echo "<td><button id='".$y_value."' class='btn btn-primary' data-toggle='modal' data-target='#compose-modal' onclick='doProfile(this.id)'><i class='fa fa-edit'> Edit</i></button></td>";
								//echo "<td><a href='http://localhost/CodeIgniter3/index.php/User/editProfile?profile=".$y_value."'>Edit</a></td>";
							if($y_key == 'username' || $y_key == 'first_name' || $y_key == 'Last_name')
								echo "<td>".$y_value."</td>";
						} ?><td><?php echo $depart[$i]; $i++; ?></td>
		</tr><?php  } ?>
	</table>
	</div>
	</div>
	
<script>

	$('#compose-modal').modal({ show: false});
	function doProfile(id){
       $.ajax({
          type    :   "POST",
          url :       "http://isolveit.in/docman/index.php/User/editProfile",
          data    :   {profile:id},
          success: function(data){
				response = JSON.parse(data);
				$('#pid').val(response.profile.person_id);
				$('#username').val(response.profile.username);
				$('#fname').val(response.profile.first_name);
				$('#lname').val(response.profile.Last_name);
				$('#suffix').val(response.profile.suffix);
				$('#prefix').val(response.profile.prefix);
				$('#email').val(response.profile.email);
				if(response.profile.gender == "male")
					$("#gen1").attr("checked", true);
				else if(response.profile.gender == "female")
					$("#gen2").attr("checked", true);
				else{
					$("#gen1").attr("checked", false);
					$("#gen2").attr("checked", false);
				}
				
				
				$('#personID').val(response.profile.person_id);
					$('select[name^="dep"] option:selected').attr("selected",null);
				if(response.dep == "account")
					$("#dep").val("account");
					//$('select[name^="dep"] option[value="account"]').attr("selected","selected");
				else if(response.dep == "IT")
					$("#dep").val("IT");
					//$('select[name^="dep"] option[value="IT"]').attr("selected","selected");
				else if(response.dep == "environment")
					$("#dep").val("enviornment");
					//$('select[name^="dep"] option[value="environment"]').attr("selected","selected");
				else if(response.dep == "production")
					$("#dep").val("production");
					//$('select[name^="dep"] option[value="production"]').attr("selected","selected");
				else if(response.dep == "HR")
					$("#dep").val("HR");
					//$('select[name^="dep"] option[value="HR"]').attr("selected","selected");
				else if(response.dep == "marketing")
					$("#dep").val("marketing");
					//$('select[name^="dep"] option[value="marketing"]').attr("selected","selected");
				else if(response.dep == "super_admin")
					$("#dep").val("super_admin");
					//$('select[name^="dep"] option[value="super_admin"]').attr("selected","selected");
				else
					$('select[name^="dep"] option:selected').attr("selected",null);
				
				
				$('#personiD').val(response.profile.person_id);
				var a = $.map(response.pr, function(value, index) {
						return [index];
					});
					//$('select[name^="dep"] option:selected').attr("selected",null);
				if(a == "employee")
					$("#prole").val("employee");
					//$('select[name^="prole"] option[value="employee"]').attr("selected","selected");
				else if(a == "manager")
					$("#prole").val("manager");
					//$('select[name^="prole"] option[value="manager"]').attr("selected","selected");
				else if(a == "admin")
					$("#prole").val("admin");
					//$('select[name^="prole"] option[value="admin"]').attr("selected","selected");
				else if(a == "super_admin")
					$("#prole").val("super_admin");
					//$('select[name^="prole"] option[value="super_admin"]').attr("selected","selected");
					
				$('#personid').val(response.profile.person_id);
				if(typeof(response.pp[0]) == 'undefined')
				{
					$('#permission1').prop('checked', false);
					$('#permission2').prop('checked', false);
					$('#permission3').prop('checked', false);
					$('#permission4').prop('checked', false);
				}
				else{
					if(response.pp[0].permission_id == 1)
						$('#permission1').prop('checked', true);
					if(response.pp[0].permission_id == 2)
						$('#permission2').prop('checked', true);
					if(response.pp[0].permission_id == 3)
						$('#permission3').prop('checked', true);
					if(response.pp[0].permission_id == 4)
						$('#permission4').prop('checked', true);
					
				}
		
		
        $('#compose-modal').show();
		
           },

    });

 }
</script>