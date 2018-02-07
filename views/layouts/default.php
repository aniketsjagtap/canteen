<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $template['title'];?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.5 -->
  <link rel="stylesheet" href="<?=base_url('themes/bootstrap/css/bootstrap.min.css');?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url('themes/dist/css/AdminLTE.min.css');?>">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?=base_url('themes/dist/css/skins/_all-skins.min.css');?>">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?=base_url('themes/plugins/iCheck/flat/blue.css');?>">
  <!-- Morris chart -->
  <link rel="stylesheet" href="<?=base_url('themes/plugins/morris/morris.css');?>">
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?=base_url('themes/plugins/jvectormap/jquery-jvectormap-1.2.2.css');?>">
  <!-- Date Picker -->
  <link rel="stylesheet" href="<?=base_url('themes/plugins/datepicker/datepicker3.css');?>">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?=base_url('themes/plugins/daterangepicker/daterangepicker-bs3.css');?>">

	<!--My Calender Events -->
  <link rel="stylesheet" href="<?=base_url('themes/plugins/mycalender/fullcalendar.min.css');?>">
 <!-- <link rel="stylesheet" href="<?=base_url('themes/plugins/mycalender/fullcalendar.print.css');?>">-->
 

 <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?=base_url('themes/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css');?>">
 <!-- <link href="<?=base_url('themes/plugins/bootstrap/css/bootstrap.min.css');?>" rel="stylesheet" media="screen">-->
  <link href="<?=base_url('themes/plugins/bootstrap/css/bootstrap-datetimepicker.min.css');?>" rel="stylesheet" media="screen">

   <!--<link rel="stylesheet" href="<?=base_url('themes/plugins/datatables/css/dataTables.jqueryui.css');?>" rel="stylesheet" media="screen">-->
  <!-- <link rel="stylesheet" href="<?=base_url('themes/plugins/datatables/css/jquery-ui.css');?>" rel="stylesheet" media="screen">-->
  
   <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" rel="stylesheet" media="screen">
   <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.jqueryui.min.css" rel="stylesheet" media="screen">
   <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.1/css/responsive.jqueryui.min.css" rel="stylesheet" media="screen">
   <link rel="stylesheet" href="<?=base_url('themes/plugins/datatables/buttons.dataTables.min.css');?>" rel="stylesheet" media="screen">
   <link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
 
<!-- jQuery 2.1.4 -->
<!--<script src="<?=base_url('themes/plugins/jQuery/jQuery-2.1.4.min.js');?>"></script>-->
<!-- jQuery UI 1.11.4 -->
<!--<script src="<?=base_url('themes/plugins/jQueryUI/jquery-ui.min.js');?>"></script>-->


<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/rowreorder/1.2.3/js/dataTables.rowReorder.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.1/js/dataTables.responsive.min.js"></script>
<script src="<?=base_url('themes/plugins/datatables/jquery.dataTables.min.js');?>"></script>
<script src="<?=base_url('themes/plugins/datatables/jquery.dataTables.columnFilter.js');?>"></script>


 <script>
 // $(document).ready(function()
// {
	 // // $('#purchase').dataTable()
		  // // .columnFilter({
			// // aoColumns: [ null,
					// // // { type: "select", values: [ '','Gecko', 'Trident', 'KHTML', 'Misc', 'Presto', 'Webkit', 'Tasman']  },
				     // // { type: "text" },
				     // // { type: "text" },
				     // // { type: "text" },
				     // // // { type: "number" },
				    // // null,
				    // // null,
					// // null,
					// // null,
					// // { type: "text" },
				     // // // { type: "select", values: [ 'A', 'C', 'U', 'X']  }
				// // ]

		// // });
		
		
		
	// // $('#search').keyup(function()
	// // {
		// // //alert($(this).val());
		// // searchTable($(this).val());
		
		
	// // });
	
	
		
// });
 $(document).ready(function(){
                // $.datepicker.regional[""].dateFormat = 'dd/mm/yy';
                // $.datepicker.setDefaults($.datepicker.regional['']);
	
		// $('.date_range_filter').attr("type","date" );
		// $('.date_range_filter').attr(" data-date","");
		// $('.date_range_filter').attr("data-date-format","dd MM yyyy");
		
	
	
		
		
	/***********************Single Search box on Index**********************************/
	
	$('#search').keyup(function()
	{
		//alert($(this).val());
		searchTable($(this).val());
		
		
	});
	$('#search').addClass("no-print");
	$('.btn').addClass("no-print");
	// $('a').addClass("no-print");
});
 
 </script>
 <script>
// function searchByDate() {
  // var input, filter, table, tr, td, i;
  // input = document.getElementById("searchByBillNumber");
  // filter = input.value.toUpperCase();
  // table = document.getElementById("myTable");
  // tr = table.getElementsByTagName("tr");
  // for (i = 0; i < tr.length; i++) {
    // td = tr[i].getElementsByTagName("td")[9];
    // if (td) {
      // if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        // tr[i].style.display = "";
      // } else {
        // tr[i].style.display = "none";
      // }
    // }       
  // }
// }
// function searchByBill() {
  // var input, filter, table, tr, td, i;
  // input = document.getElementById("searchByBill");
  // filter = input.value.toUpperCase();
  // table = document.getElementById("tblData");
  // tr = table.getElementsByTagName("tr");
  // for (i = 0; i < tr.length; i++) {
    // td = tr[i].getElementsByTagName("td")[1];
    // if (td) {
      // if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        // tr[i].style.display = "";
      // } else {
        // tr[i].style.display = "none";
      // }
    // }       
  // }
// }

function searchTable(inputVal)
{
//alert(inputVal);
	var table = $('#tblData');
	table.find('tr').each(function(index, row)
	{
		var allCells = $(row).find('td');
		if(allCells.length > 0)
		{
			var found = false;
			allCells.each(function(index, td)
			{
				var regExp = new RegExp(inputVal, 'i');
				if(regExp.test($(td).text()))
				{
					found = true;
					return false;
				}
			});
			if(found == true)$(row).show();else $(row).hide();
		}
	});
}

// function searchBySupplier() {
  // var input, filter, table, tr, td, i;
  // input = document.getElementById("searchBySupplier");
  // filter = input.value.toUpperCase();
  // table = document.getElementById("tblData");
  // tr = table.getElementsByTagName("tr");
  // for (i = 0; i < tr.length; i++) {
    // td = tr[i].getElementsByTagName("td")[3];
    // if (td) {
      // if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        // tr[i].style.display = "";
      // } else {
        // tr[i].style.display = "none";
      // }
    // }       
  // }
// }
</script>
<style type="text/css">
#search {
    background-image: url('/css/searchicon.png'); /* Add a search icon to input */
    background-position: 10px 12px; /* Position the search icon */
    background-repeat: no-repeat; /* Do not repeat the icon image */
    width: 100%; /* Full-width */
    font-size: 16px; /* Increase font-size */
    padding: 12px 20px 12px 40px; /* Add some padding */
    border: 1px solid #ddd; /* Add a grey border */
    margin-bottom: 12px; /* Add some space below the input */
}

.field_wrapper div{ margin-bottom:10px;}
.formula_wrapper div,.messformula_wrapper div{ margin-bottom:10px;}
.select_wrapper div{ margin-bottom:10px;}
.sales_wrapper div,.expenses_wrapper div,.expenses_wrapper div{ margin-bottom:10px;}
.expense_wrapper div,.expenseType_wrapper div,.description_wrapper div{ margin-bottom:10px;}
.expenseItem_wrapper div,.expenseSubtype_wrapper div,.expenseDescription_wrapper div{ margin-bottom:10px;}
.quantity_wrapper div,.order_quantity_wrapper div{ margin-bottom:10px;}
.amount_wrapper div,.order_quantity_wrapper div{ margin-bottom:10px;}
.remark_wrapper div,.ExpenseSubtype_wrapper div{ margin-bottom:10px;}
.unit_wrapper div{ margin-bottom:10px;}
/*.add_button{ margin-top:10px; margin-left:10px;vertical-align: text-bottom;}
.remove_button{ margin-top:10px; margin-left:10px;vertical-align: text-bottom;}*/

.date_range_filter , .text_filter{
	width:100px;
}
tfoot {
    display: table-header-group;
}
table.dataTable thead .sorting { background: url("<?=base_url('themes/plugins/datatables/images/sort_both.png');?>") no-repeat center right; }
table.dataTable thead .sorting_asc { background: url("<?=base_url('themes/plugins/datatables/images/sort_asc.png');?>") no-repeat center right; }
table.dataTable thead .sorting_desc { background: url("<?=base_url('themes/plugins/datatables/images/sort_desc.png');?>") no-repeat center right; }

table.dataTable thead .sorting_asc_disabled { background: url("<?=base_url('themes/plugins/datatables/images/sort_asc_disabled.png');?>") no-repeat center right; }
table.dataTable thead .sorting_desc_disabled { background: url("<?=base_url('themes/plugins/datatables/images/sort_desc_disabled.png');?>") no-repeat center right; }

.table-striped>tbody>tr:nth-child(odd)>td{
   background-color: #eeeeee; // Choose your own color here
 }
 .table-striped>tbody>tr:nth-child(odd)>th {
   background-color: #e0e0e0; // Choose your own color here
 }
}

</style>
</head>
<!--fixed left side bar-->
 <body class="skin-blue fixed sidebar-collapse sidebar-mini">
 <!--<body class="hold-transition skin-blue fixed sidebar-mini">-->
 <!--<body class="hold-transition skin-blue sidebar-mini">-->
<div class="wrapper">
  <header class="main-header">
    <!-- Logo -->
    <a href="<?php echo site_url('User/redi')?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>SE</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>SymbiEat</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <!-- Notifications: style can be found in dropdown.less -->
          <!-- Tasks: style can be found in dropdown.less -->
                  <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?=base_url('themes/dist/img/user2-160x160.jpg');?>" class="user-image" alt="User Image">
              <span class="hidden-xs"><?=$user;?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?=base_url('themes/dist/img/user2-160x160.jpg');?>" class="img-circle" alt="User Image">

                <p>
                  <?=$user;?>
                </p>
              </li>
              <!-- Menu Body
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                  </div>
                </div>
                /.row 
              </li>-->
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="<?php echo site_url('User/edituser');?>" class="btn btn-default btn-flat">Edit Profile</a>
                </div>
                <div class="pull-right">
                  <a href="<?php echo site_url('User/logout');?>" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
 <!--         <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>  -->
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?=base_url('themes/dist/img/user2-160x160.jpg');?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?=$user;?></p>
          <!--<a href="#"><i class="fa fa-circle text-success"></i> Online</a>-->
        </div>
      </div>
      <!-- search form 
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>-->
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
		<li class="treeview">
          <a href="<?php echo site_url('User/redi');?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <!--<li class="active treeview">
            <i class="fa fa-dashboard"></i>
			<form   method="post" action="<?php// echo site_url('User/redi');?>" enctype="multipart/form-data">
			<button type="submit" class="btn btn-flat">Dashboard</button>
			</form>
			<i class="fa fa-angle-left pull-right"></i>
        </li>-->
		<?php if($p_role['role_id']==1||$p_role['role_id']==2||$p_role['role_id']==7){?>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Inventory</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
		
            <li><a href="<?php echo site_url('Category/index');?>"><i class="fa  fa-caret-right"></i> Category</a></li>
			
            <li><a href="<?php echo site_url('Type/index');?>"><i class="fa  fa-caret-right"></i> Raw Material Types</a></li>
			
            <li><a href="<?php echo site_url('Rawmaterial/index');?>"><i class="fa  fa-caret-right"></i> Raw Material</a></li>
			
            <li><a href="<?php echo site_url('Product/index');?>"><i class="fa  fa-caret-right"></i>Product</a></li>
			
          </ul>
        </li>
		<?php }?>
		
			<li class="treeview">
			  <a href="#">
				<i class="fa  fa-users"></i>
				<span>Users, Events, Locations</span>
				<i class="fa fa-angle-left pull-right"></i>
			  </a>
			  <ul class="treeview-menu">
				
				<li><a href="<?php echo site_url('Person/index');?>"><i class="fa  fa-caret-right"></i> Users</a></li>
				<?php if($p_role['role_id']==1||$p_role['role_id']==2||$p_role['role_id']==7){?>
				<li><a href="<?php echo site_url('Location/index');?>"><i class="fa  fa-caret-right"></i> Locations</a></li>
				<li><a href="<?php echo site_url('MyCalender/index');?>"><i class="fa  fa-caret-right"></i> Events</a></li>
				<?php }?>
			  </ul>
			</li>
		
		
			<li class="treeview">
			  <a href="#">
				<i class="fa fa-shopping-cart"></i>
				<span>Sales,Stock,Orders,Purchase</span>
				<i class="fa fa-angle-left pull-right"></i>
			  </a>
			  <ul class="treeview-menu">
				<?php if($p_role['role_id']==1||$p_role['role_id']==2||$p_role['role_id']==5||$p_role['role_id']==6||$p_role['role_id']==7){ ?>
				<li><a href="<?php echo site_url('Sale/index');?>"><i class="fa  fa-caret-right"></i> Sales</a>	</li>
				<?php } ?>
				<?php if($p_role['role_id']==1||$p_role['role_id']==2||$p_role['role_id']==4||$p_role['role_id']==5||$p_role['role_id']==7){ ?>
					<li><a href="<?php echo site_url('Stock/index');?>"><i class="fa  fa-caret-right"></i> Stock</a></li>
				<?php } ?>
				<?php if($p_role['role_id']==1||$p_role['role_id']==2||$p_role['role_id']==4||$p_role['role_id']==5||$p_role['role_id']==7){ ?>
				<li><a href="<?php echo site_url('Order/index');?>"><i class="fa  fa-caret-right"></i> Orders</a></li>
				<?php } ?>
				<?php if($p_role['role_id']==1||$p_role['role_id']==2||$p_role['role_id']==4||$p_role['role_id']==5||$p_role['role_id']==7){ ?>
				<li><a href="<?php echo site_url('Purchase/index');?>"><i class="fa  fa-caret-right"></i> Purchases</a></li>
				<?php } ?>
			  </ul>
			</li>
		
		<?php if($p_role['role_id']==1||$p_role['role_id']==2||$p_role['role_id']==7){?>
			<li class="treeview">
			  <a href="#">
				<i class="fa fa-car"></i>
				<span>Suppliers</span>
				<i class="fa fa-angle-left pull-right"></i>
			  </a>
			  <ul class="treeview-menu">
			
				<li><a href="<?php echo site_url('Supplier/index');?>"><i class="fa  fa-caret-right"></i>List</a></li>
			  </ul>
			</li>
		<?php }?>
		<?php if($p_role['role_id']==1||$p_role['role_id']==2||$p_role['role_id']==7){?>
			<li class="treeview">
			  <a href="#">
				<i class="fa fa-line-chart"></i>
				<span>Reports</span>
				<i class="fa fa-angle-left pull-right"></i>
			  </a>
			  <ul class="treeview-menu">
			
				<li><a href="<?php echo site_url('Report/index');?>"><i class="fa  fa-caret-right"></i>Inventory</a></li>
			  </ul>
			</li>
		<?php }?>
		<?php if($p_role['role_id']==1||$p_role['role_id']==2||$p_role['role_id']==7){?>
			<li class="treeview">
			  <a href="#">
				<i class="fa fa-inr"></i>
				<span>Accounts</span>
				<i class="fa fa-angle-left pull-right"></i>
			  </a>
			  <ul class="treeview-menu">
				<li><a href="<?php echo site_url('Acc_sales/index');?>"><i class="fa  fa-caret-right"></i>Sales</a></li>
				<li><a href="<?php echo site_url('Acc_expenses/index');?>"><i class="fa  fa-caret-right"></i>Expenses</a></li>
			  
				<!--<li>
					<a href="#">
						<i class="fa fa-caret-right"></i>
						<span>Expenses</span>
						<i class="fa fa-angle-left pull-right"></i>
					</a>
					<ul class="treeview-menu">
						<li><a href="<?php// echo site_url('Acc_expenses/index');?>"><i class="fa  fa-caret-right"></i>Direct</a></li>
						<li><a href="<?php// echo site_url('Acc_expenses/index');?>"><i class="fa  fa-caret-right"></i>Indirect</a></li>
					</ul>
				</li>-->
			 
				<li><a href="<?php echo site_url('Acc_report/index');?>"><i class="fa  fa-caret-right"></i>Report</a></li>
			 
				<li>
					<a href="#">
						<i class="fa fa-caret-right"></i>
						<span>Master</span>
						<i class="fa fa-angle-left pull-right"></i>
					</a>
					<ul class="treeview-menu">
						<li><a href="<?php echo site_url('Acc_master_sale_types/index');?>"><i class="fa  fa-caret-right"></i>Sale Type</a></li>
						<li>
							<a href="#">
								<i class="fa fa-caret-right"></i>
								<span>Expense</span>
								<i class="fa fa-angle-left pull-right"></i>
							</a>
							<ul class="treeview-menu">
								<li><a href="<?php echo site_url('Acc_master_expense_types/index');?>"><i class="fa  fa-caret-right"></i>Expense Types</a></li>
								<li><a href="<?php echo site_url('Acc_master_expense_sub_types/index');?>"><i class="fa  fa-caret-right"></i>Expense Sub-Types</a></li>
								<li><a href="<?php echo site_url('Acc_master_expense_items/index');?>"><i class="fa  fa-caret-right"></i>Expense Items</a></li>
							</ul>
					</ul>
				</li>
			  </ul>
			</li>
		<?php }?>
 <!--         <a href="pages/widgets.html">
            <i class="fa fa-th"></i> <span>Widgets</span>
            <small class="label pull-right bg-green">new</small>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Charts</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/charts/chartjs.html"><i class="fa fa-circle-o"></i> ChartJS</a></li>
            <li><a href="pages/charts/morris.html"><i class="fa fa-circle-o"></i> Morris</a></li>
            <li><a href="pages/charts/flot.html"><i class="fa fa-circle-o"></i> Flot</a></li>
            <li><a href="pages/charts/inline.html"><i class="fa fa-circle-o"></i> Inline charts</a></li>
          </ul>
        </li> 
        <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>UI Elements</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/UI/general.html"><i class="fa fa-circle-o"></i> General</a></li>
            <li><a href="pages/UI/icons.html"><i class="fa fa-circle-o"></i> Icons</a></li>
            <li><a href="pages/UI/buttons.html"><i class="fa fa-circle-o"></i> Buttons</a></li>
            <li><a href="pages/UI/sliders.html"><i class="fa fa-circle-o"></i> Sliders</a></li>
            <li><a href="pages/UI/timeline.html"><i class="fa fa-circle-o"></i> Timeline</a></li>
            <li><a href="pages/UI/modals.html"><i class="fa fa-circle-o"></i> Modals</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Forms</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/forms/general.html"><i class="fa fa-circle-o"></i> General Elements</a></li>
            <li><a href="pages/forms/advanced.html"><i class="fa fa-circle-o"></i> Advanced Elements</a></li>
            <li><a href="pages/forms/editors.html"><i class="fa fa-circle-o"></i> Editors</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-table"></i> <span>Tables</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/tables/simple.html"><i class="fa fa-circle-o"></i> Simple tables</a></li>
            <li><a href="pages/tables/data.html"><i class="fa fa-circle-o"></i> Data tables</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-calendar"></i> <span>Time Table</span>
			<i class="fa fa-angle-left pull-right"></i>
          </a>
		  <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-circle-o"></i> View time tables</a></li>
			<?php
				//$rol = $this->user->urole();
				//if($rol=="owner"):
			?>
            <li><a href="#"><i class="fa fa-circle-o"></i> Edit time tables</a></li>
			<?php //endif; ?>
          </ul>
        </li>
        <li>
          <a href="pages/mailbox/mailbox.html">
            <i class="fa fa-envelope"></i> <span>Mailbox</span>
            <small class="label pull-right bg-yellow">12</small>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-folder"></i> <span>Examples</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/examples/invoice.html"><i class="fa fa-circle-o"></i> Invoice</a></li>
            <li><a href="pages/examples/profile.html"><i class="fa fa-circle-o"></i> Profile</a></li>
            <li><a href="pages/examples/login.html"><i class="fa fa-circle-o"></i> Login</a></li>
            <li><a href="pages/examples/register.html"><i class="fa fa-circle-o"></i> Register</a></li>
            <li><a href="pages/examples/lockscreen.html"><i class="fa fa-circle-o"></i> Lockscreen</a></li>
            <li><a href="pages/examples/404.html"><i class="fa fa-circle-o"></i> 404 Error</a></li>
            <li><a href="pages/examples/500.html"><i class="fa fa-circle-o"></i> 500 Error</a></li>
            <li><a href="pages/examples/blank.html"><i class="fa fa-circle-o"></i> Blank Page</a></li>
            <li><a href="pages/examples/pace.html"><i class="fa fa-circle-o"></i> Pace Page</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-share"></i> <span>Multilevel</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
            <li>
              <a href="#"><i class="fa fa-circle-o"></i> Level One <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="#"><i class="fa fa-circle-o"></i> Level Two</a></li>
                <li>
                  <a href="#"><i class="fa fa-circle-o"></i> Level Two <i class="fa fa-angle-left pull-right"></i></a>
                  <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                  </ul>
                </li>
              </ul>
            </li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
          </ul>
        </li>
        <li><a href="documentation/index.html"><i class="fa fa-book"></i> <span>Documentation</span></a></li>
        <li class="header">LABELS</li>
        <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>
      </ul>
    </section>-->
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
   <!-- <section class="content-header">
		  <?php if(!validation_errors()){?>
			  <div class="callout callout-info">
				<h4>Info!</h4>
				<p><?php echo "Hello ".$user .","; ?></p>
			</div>
		<?php }?>-->
		
      
	 
	  
		  <?php if(validation_errors()){?>
			  <div class="alert alert-danger alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				<h4>Error!</h4>
				<p><?php echo validation_errors(); ?></p>
			</div>
		<?php }?>
		
		<?php echo $template['body']; ?>
       </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right idden-xs">
      <b>Version</b> 1.6.2
    </div>
   <small> Designed & Developed by: </small> <strong><a href="http://jagtechno.com" target="_blank">JagTechno</a></strong> 
  </footer>

 </div>
<!-- ./wrapper -->

<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<!-- <script>
  // $.widget.bridge('uibutton', $.ui.button);
 </script>-->
<!-- Bootstrap 3.3.5 -->
<!--<script src="<?=base_url('themes/bootstrap/js/bootstrap.min.js');?>"></script>-->
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="<?=base_url('themes/plugins/morris/morris.min.js');?>"></script>
<!-- Sparkline -->
<script src="<?=base_url('themes/plugins/sparkline/jquery.sparkline.min.js');?>"></script>
<!-- jvectormap -->
<script src="<?=base_url('themes/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js');?>"></script>
<script src="<?=base_url('themes/plugins/jvectormap/jquery-jvectormap-world-mill-en.js');?>"></script>
<!-- jQuery Knob Chart -->
<script src="<?=base_url('themes/plugins/knob/jquery.knob.js');?>"></script>
<!-- daterangepicker -->
<script src="<?=base_url('themes/plugins/daterangepicker/moment.min.js');?>"></script>
<script src="<?=base_url('themes/plugins/daterangepicker/daterangepicker.js');?>"></script>
<!-- datepicker -->
<script src="<?=base_url('themes/plugins/datepicker/bootstrap-datepicker.js');?>"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?=base_url('themes/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js');?>"></script>
<!-- Slimscroll -->
<script src="<?=base_url('themes/plugins/slimScroll/jquery.slimscroll.min.js');?>"></script>
<!-- FastClick -->
<script src="<?=base_url('themes/plugins/fastclick/fastclick.js');?>"></script>
<!-- AdminLTE App -->
<script src="<?=base_url('themes/dist/js/app.min.js');?>"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?=base_url('themes/dist/js/pages/dashboard.js');?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?=base_url('themes/dist/js/demo.js');?>"></script>
<!--Data tables-->
<script src="<?=base_url('themes/plugins/bootstrap/js/bootstrap.min.js');?>"></script>
<script src="<?=base_url('themes/plugins/bootstrap/js/bootstrap-datetimepicker.js');?>" charset="UTF-8"></script>
<!--My Calender Events-->
<script src="<?=base_url('themes/plugins/mycalender/jquery-ui.custom.min.js');?>"></script>
<script src="<?=base_url('themes/plugins/mycalender/fullcalendar.min.js');?>"></script>

<script src="<?=base_url('themes/plugins/yadcf/jquery.dataTables.yadcf.js');?>"></script>
<script src="<?=base_url('themes/plugins/datatables/dataTables.buttons.min.js');?>"></script>
<script src="<?=base_url('themes/plugins/datatables/buttons.flash.min.js');?>"></script>
<script src="<?=base_url('themes/plugins/datatables/jszip.min.js');?>"></script>
<script src="<?=base_url('themes/plugins/datatables/pdfmake.min.js');?>"></script>
<script src="<?=base_url('themes/plugins/datatables/vfs_fonts.js');?>"></script>
<script src="<?=base_url('themes/plugins/datatables/buttons.html5.min.js');?>"></script>
<script src="<?=base_url('themes/plugins/datatables/buttons.print.min.js');?>"></script>
<script src="<?=base_url('themes/plugins/datatables/dataTables.jqueryui.js');?>"></script>
<script>

</script>
</body>
</html>
