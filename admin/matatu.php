<?php
   include('session.php');
   
   
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Matatu Queueing System</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
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
          <a class="nav-link" href="sacco.php" style="color:white;">
            <i class="fa fa-fw fa-folder"></i>
            <span class="nav-link-text">SACCO</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
          <a class="nav-link" href="matatu.php" style="color:white;">
            <i class="fa fa-fw fa-folder-open"></i>
            <span class="nav-link-text">MATATU</span>
          </a>
        </li> 
		
       
		
		<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
          <a class="nav-link" href="user.php" style="color:white;">
            <i class="fa fa-fw fa fa-users"></i>
            <span class="nav-link-text">Users</span>
          </a>
        </li>
		<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
          <a class="nav-link" href="route.php" style="color:white;">
            <i class="fa fa-fw  fa-area-chart"></i>
            <span class="nav-link-text">Report</span>
          </a>
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
        <?php
	   include('config.php');
	  // include('config2.php');
	   if(isset($_GET['insert'])){
		 echo' <div class="alert alert-success alert-dismissable">
 <button type="button" class="close" data-dismiss="alert"
 aria-hidden="true">
 &times;
 </button>
 Success! You have added successfully.
</div>';   
	   } 
	   if(isset($_GET['delete'])){
		 echo' <div class="alert alert-success alert-dismissable">
 <button type="button" class="close" data-dismiss="alert"
 aria-hidden="true">
 &times;
 </button>
 You have successfully deleted an item.
</div>';
	   }
	  
	  if ( isset($_POST['addMatatuButton'])){
   // Do Stuff
echo "fraka";
	    if( isset($_POST['addMatatuButton'])){
			
			 $sacco_name=$_POST['sacco_name'];
			 $matatu_no_plate=$_POST['matatu_no_plate'];
			 $matatu_route=$_POST['matatu_route'];
			 $matatu_status=$_POST['matatu_status'];
			
			$d=strtotime("today");
	   $dateEntered = date("Y-m-d", $d);
		$similarityResult=mysqli_query($conn,"select * from `matatu` where `no_plate`='". $matatu_no_plate."'  ");
if ($similarityResult->num_rows >0) {
		echo' <div class="alert alert-danger alert-dismissable">
 <button type="button" class="close" data-dismiss="alert"
 aria-hidden="true">
 &times;
 </button>
 <b>Matatu with the same Number plate  exist.</b>
</div>';
}else	 {
	$result=mysqli_query($conn,"insert into `matatu` (no_plate,route,status,sacco) values('$matatu_no_plate','$matatu_route','$matatu_status','$sacco_name')");
	//header('Location: '.$_SERVER['PHP_SELF'].'?success');
//exit;

if ($result) {
	echo '<script> window.location="matatu.php?insert=True" </script>';
    // output data of each row
  
//header('Location: '.$_SERVER['PHP_SELF'].'?success');
//exit;
 

	//echo json_encode("New user Added successfully");
} else {
    //echo  json_encode("Sorry! something went wrong.Please try again."); 
	echo' <div class="alert alert-success alert-dismissable">
 <button type="button" class="close" data-dismiss="alert"
 aria-hidden="true">
 &times;
 </button>
 Sorry! something went wrong.Please try again.
</div>';
}
}    
			
			
			
				
}}
 
	if( isset($_POST['editMatatuButton']) and isset($_POST['editMatatu_no_plate']) and isset($_POST['editMatatu_route'])){
			echo $editMatatu_no_plate=$_POST['editMatatu_no_plate'];
			echo $editMatatu_route=$_POST['editMatatu_route'];
			echo $editMatatu_status=$_POST['editMatatu_status'];
	
	$result=mysqli_query($conn,"update `matatu` SET route= '".$editMatatu_route."',status= '".$editMatatu_status."' where `no_plate`='".$editMatatu_no_plate."' ");
if ($result) {
    // output data of each row
  echo' <div class="alert alert-success alert-dismissable">
 <button type="button" class="close" data-dismiss="alert"
 aria-hidden="true">
 &times;
 </button>
 You have  updated successfully.
</div>';
	//echo json_encode("New user Added successfully");
} else {
    echo  json_encode("Sorry! something went wrong.Please try again."); 
}
    
				
			
			
				
			}
			
	  
	    
	   ?>
	   <script>
	   
		   function deleteFunc(id){
			   
			   var id = id;
			   var updiv = document.getElementById("message"); //document.getElementById("highodds-details");
			   //alert(id);
			  var details= '&id='+ id;
			$.ajax({
						type: "POST",
                                url: "deletematatu.php",
                                data: details,
                                cache: false,
                                success: function(rsp) {
				//location.reload();
              //then append the result where ever you want like
             // $("#datahere").html(rsp); //data will be containing the vote count which you have echoed from the controller
			// var updiv = document.getElementById("message"); //document.getElementById("highodds-details");
           //updiv.innerHTML =rsp;
		    window.location="matatu.php?delete=True" 
		   
                }

				
            });
			 
		   }
		  </script>
	   <div id="message"></div>
      
      <!-- Icon Cards-->
            <div class="card mb-3">
        <div class="card-header bg-default" style="text-align:">
		<div class="row">
		  <div class="col-md-8"><b> List</b></div>
		  <div class="col-md-4 col-pull-right" style="text-align:right"><a class="btn btn-primary" href="login.html" data-toggle="modal" data-target="#brand_modal"><i class="fa fa-plus"></i><b> New </b></a></div>
		</div>
		
          </div>
        <div class="card-body">
          <?php
		
		include('config.php');
		
		$result_array = array();

		$result=mysqli_query($conn,"select * from `matatu` where `no_plate` !='' ORDER BY id ASC ");
if ($result->num_rows > 0) {
    // output data of each row
    
		?>
		
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  
                  <th>MATATU</th>
                  <th>SACCO</th>                 
                  <th>Route</th>                 
                  <th>Status</th>                 
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>MATATU</th>
                  <th>SACCO</th>                 
                  <th>Route</th>                 
                  <th>Status</th>                 
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
              </tfoot>
              <tbody>
			  
			  <?php
			  while($row = $result->fetch_assoc()) {
				  $no_plate=$row["no_plate"];
		echo '<form method="POST" action="matatu.php" role="form"><tr>
		 <td>';
		  echo $id= $row["no_plate"].
		  '</td><td><span class="badge btn-success">'
		  .$row["sacco"].
		   '</td><td>'.$row["route"].'</span></td><td>'.$row["status"].'</span></td>';
		   
		   
		   // delete and edit category button
		 echo"<td>	 <button class='btn btn-info' href='' data-toggle='modal' type='submit' data-target='#update_brand_modal' value='' name='updateid' id='".$no_plate."' onclick='editMatatuFunc(this.id)' ><i class='fa fa-edit'></i></button>";
		  
		 echo "</td><td><button class='btn btn-danger' href='' data-toggle='modal' type='submit' data-target='#delete_brand_modal'id='".$no_plate."' value='' name='deleteMatatuButton'  onclick='deleteMatatuFunc(this.id)' ><i class='fa fa-trash'></i></button>";
		  //echo "<button class='btn btn-warning' href='' data-toggle='modal' type='submit' data-target='#delete_user' value='' name='updateid'  onclick='editUserFunc(" ; echo $id .")' >Delete</button>";
		 echo '</td>
		</tr></form>';
		
		//array_push($result_array, $row);
		


    }
	
} else {
    echo  json_encode("No Match"); 
}
			  ?>
              </tbody>
            </table>
          </div>
        </div>
      
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
	<!-- update Modal-->
    <div class="modal fade" id="update_brand_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Matatu?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
		  <div id="datahere"></div>
		  <script>
		  
		   function editMatatuFunc(id){
			   alert(id);
			   var updiv = document.getElementById("datahere"); //document.getElementById("highodds-details");
			   alert(id);
			  var details= '&id='+ id;
			$.ajax({
						type: "POST",
                                url: "editmatatu.php",
                                data: details,
                                cache: false,
                                success: function(rsp) {
				
              //then append the result where ever you want like
             // $("#datahere").html(rsp); //data will be containing the vote count which you have echoed from the controller
           updiv.innerHTML =rsp;
		     
                }
            });
		   }
		  </script>
		  
        </div>
      </div>
    </div>
    </div>
	<!-- Delete category Modal-->
    <div class="modal fade" id="delete_brand_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Delete Brand?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
		  
		  Are you sure you want to delete this item?.<br>
		  <div id="deletedata"></div>
		  </div>
          
		  <script>
		   function deleteMatatuFunc(id){
			  alert(id);
			   var id = id;
			   var updiv = document.getElementById("deletedata"); //document.getElementById("highodds-details");
			    updiv.innerHTML ='<form method="POST" action="brand"><div class="modal-footer"><button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button><button class="btn btn-danger" name="deletebuttonFunc" id="'+ id +'" type="submit" data-dismiss="modal" onclick="deleteFunc(this.id)">Delete</button></form></div>';
		     
		   }
		  </script>
		  
            
          
        </div>
      </div>
    </div>
    <!-- Add category list Modal-->
    <div class="modal fade" id="brand_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Matatu</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
		  <?php
		  //include()
		  $resultCategory=mysqli_query($conn,"select * from `sacco` where `status` !='Inactive' ORDER BY id DESC ");
			if ($resultCategory->num_rows > 0) {
				echo '<form method="POST" action="matatu.php"><div class="form-group"><label for="SACOO:"><b>Select SACCO</b></label><select name="sacco_name" class="form-control">';
				while($row = $resultCategory->fetch_assoc()) {
				 echo $sacco_name =$row['sacco_name'];
				//echo $categoryName$row['category_name'];
					
					 echo '<option value="'.$sacco_name.'">'.$sacco_name.'</option>';
				}?>
				
				</select></div>
				
				
			  <div class="form-group">            
                <label for="date"><b>Enter Matatu:</b></label>
                <input type="text" name="matatu_no_plate" class="form-control" placeholder="Enter Matatu Number plate">
			  </div> 
			  <div class="form-group">            
                <label for="date"><b>Enter Matatu Route:</b></label>
                <input type="text" name="matatu_route" class="form-control" placeholder="Enter Matatu Route">
			  </div>
			 
			   <div class="form-group">
              <select name="matatu_status" class="form-control" required>
			  <option value="Active">Active</option>
			  <option value="Inactive">Inactive</option>
			  </select>
           
          </div>
          
		  </div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <button class="btn btn-primary" name="addMatatuButton" type="submit" >Add </button>
          </div></form>
			<?php
			;}else{
				echo "No available Animal to select";
			}
		  
		  ?>
		
        </div>
      </div>
    </div>
	
	
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
  </div>
</body>

</html>
