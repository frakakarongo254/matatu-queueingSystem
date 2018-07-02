<?php
   include('session.php');
   
    include("fusioncharts.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Hardware Manegement System</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
  <script type="text/javascript" src="js/fusioncharts.js"></script>
  <script type="text/javascript" src="js/fusioncharts.theme.ocean.js"></script>
  <script src="js/fusioncharts.js"></script>
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav" style="color:white">
    <a class="navbar-brand" href="dashboard.php" style="color:;font-size:20px;"><span class="glyphicon glyphicon-user"></span><i class="fa fa-fw fa-user"></i><b><?php echo $login_session;?></b></a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
	<hr>
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion" style="color:white">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="dashboard.php" style="color:white;">
		  
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Dashboard</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
          <a class="nav-link" href="category.php" style="color:white;">
            <i class="fa fa-fw fa-folder"></i>
            <span class="nav-link-text">Category</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
          <a class="nav-link" href="brand.php" style="color:white;">
            <i class="fa fa-fw fa-folder-open"></i>
            <span class="nav-link-text">Brand</span>
          </a>
        </li>
		
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="order">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" style="color:white;" href="#collapseOrder" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-shopping-cart"></i>
            <span class="nav-link-text">Order</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseOrder">
            <li>
              <a href="createorder.php" style="color:white;"><i class="fa fa-cart-arrow-down"></i> Create Order</a>
            </li>
            <li>
              <a href="order.php" style="color:white;"><i class="fa fa-list-alt"></i> Manage Order</a>
            </li>
          </ul>
        </li>
      
       
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
          <a class="nav-link" href="product.php" style="color:white;">
            <i class="fa fa-fw fa-list-alt"></i>
            <span class="nav-link-text">Product</span>
          </a>
        </li> 
		<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
          <a class="nav-link" href="supplier.php" style="color:white;">
            <i class="fa fa-fw fa fa-vcard-o"></i>
            <span class="nav-link-text">Supplier</span>
          </a>
        </li>
		<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
          <a class="nav-link" href="customer.php" style="color:white;">
            <i class="fa fa-fw fa-address-book-o"></i>
            <span class="nav-link-text">Customer</span>
          </a>
        </li>
		<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
          <a class="nav-link" href="user.php" style="color:white;">
            <i class="fa fa-fw fa fa-users"></i>
            <span class="nav-link-text">Users</span>
          </a>
        </li>
		<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
          <a class="nav-link" href="reports.php" style="color:white;">
            <i class="fa fa-fw  fa-area-chart"></i>
            <span class="nav-link-text">Report</span>
          </a>
        </li>
		 <li class="nav-item" data-toggle="tooltip" data-placement="right" title="setting">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" style="color:white;" href="#collapseSetting" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-cog"></i>
            <span class="nav-link-text">Setting</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseSetting">
            <li>
              <a href="editprofile.php" style="color:white;"><i class="fa fa-fw fa-pencil"></i> Edit Profile</a>
            </li>
            <li>
              <a href="companysetup.php" style="color:white;"><i class="fa fa-fw fa-institution"></i> Company </a>
            </li>
          </ul>
        </li>
      </ul>
      
      <ul class="navbar-nav ml-auto">
        
       
        <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#exampleModal" style="color:white;">
            <i class="fa fa-fw fa-sign-out"></i>Logout</a>
        </li>
      </ul>
    </div>
  </nav>
  <div class="content-wrapper">
    <div class="container-fluid">
     <hr>
      <!-- Icon Cards-->
      <div class="row">
	    <div class="col-md-2"></div>
	    <div class="col-md-8">
		   <div class="row">
		   <script>
		     function showSalesReport(){
				
				 var startDate= document.getElementById("startSalesDate").value;
				 var endDate= document.getElementById("endSalesDate").value;
				 var divMessage= document.getElementById("reportMessage");
				 if(startDate =='' && endDate ==''){
					 alert('All fields are required');
				 }else{
					
				 var data= '&startDate='+ startDate +'&endDate='+ endDate ;
				 	$.ajax({
						type: "POST",
                                url: "salesreport.php",
                                data:data,
                                cache: false,
                                success: function(rsp) {
				
				   divMessage.innerHTML=rsp;
					}

					
				});
					 }
					 
				 }
				 function showScheduleReport(){
				
				 var startDate= document.getElementById("startSlaughterDate").value;
				 var endDate= document.getElementById("endSlaughterDate").value;
				 var divMessage= document.getElementById("reportMessage");
				 if(startDate =='' && endDate ==''){
					 alert('All fields are required');
				 }else{
					
				 var data= '&startDate='+ startDate +'&endDate='+ endDate ;
				 	$.ajax({
						type: "POST",
                                url: "slaughter_schedule_report.php",
                                data:data,
                                cache: false,
                                success: function(rsp) {
				
				   divMessage.innerHTML=rsp;
					}

					
				});
					 }
					 
				 }
		   </script>
		     
		   
		 <div class="table-responsive">
				 <table class="table">
				 
				 <thead>
				 <tr>
				 <th>Report</th>
				 <th>From</th>
				 <th>To</th>
				 </tr>
				 </thead>
				 <tbody>
				 <form method="POST" action="reports.php">
				 <tr>
				 <td><b>Sales Report</b></td>
				 <td><input class="form-control" type="date" id="startSalesDate" name="startSalesDate"></td>
				 <td><input class="form-control" type="date" id="endSalesDate" name="endSalesDate"></td>
				 <td><button class="button btn-primary form-control" type="button" id="salesButton" onclick="showSalesReport()">Show</button></td>
				 </tr>
				 
				<tr type="hidden">
				 <td ><b>Slaughter Report</b></td>
				 <td><input class="form-control" type="date" id="startSlaughterDate" name="startSlaughterDate"></td>
				 <td><input class="form-control" type="date" id="endSlaughterDate" name="endSlaughterDate"></td>
				 <td><button class="button btn-primary form-control" type="button" id="slaughterReportButton" onclick="showScheduleReport()">Show</button></td>
				 </tr> 
				 	</form>			
				 </tbody>
				 </table>
				</div> 
				
	  </div>
     </div>
     </div>
	 <div id="reportMessage"></div>
     </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright © 2018</small>
        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="logout.php">Logout</a>
			
          </div>
        </div>
      </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="js/sb-admin-datatables.min.js"></script>
    <script src="js/sb-admin-charts.min.js"></script>
	<script type="text/javascript" src="js/fusioncharts.js"></script>
  </div>
</body>

</html>
