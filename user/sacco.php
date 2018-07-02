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
  <title>Hardware Manegement System</title>
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
            <span class="nav-link-text">Matatu</span>
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
      <?php
	   include('config.php');
	   //include('config2.php');
	  if(isset($_GET['insert'])){
		 echo' <div class="alert alert-success alert-dismissable">
 <button type="button" class="close" data-dismiss="alert"
 aria-hidden="true">
 &times;
 </button>
 Success! You have added  new category.
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
	  if ( isset($_POST['addSaccoButton'])){
   // Do Stuff

	    if( isset($_POST['sacco_name'])and isset($_POST['sacco_status'])and isset($_POST['saccoLocation'])){
			echo $sacco_name=$_POST['sacco_name'];
			echo $sacco_status=$_POST['sacco_status'];
			echo $saccoLocation=$_POST['saccoLocation'];
			 
			 $d=strtotime("today");
	   $dateEntered = date("Y-m-d", $d);
			$similarityResult=mysqli_query($conn,"select * from `sacco` where `sacco_name`='".$sacco_name."'");
			if($similarityResult){
				echo "connected";
			}else{
				echo "not yet";
			}
		if($similarityResult-> num_rows > 0) {
				echo' <div class="alert alert-danger alert-dismissable">
		 <button type="button" class="close" data-dismiss="alert"
		 aria-hidden="true">
		 &times;
		 </button>
		 <b>Sacco with the same name already exist in the database.</b>
		</div>';
		}else	 {
			

	$result=mysqli_query($conn,"insert into `sacco` (sacco_name,status,county) values('$sacco_name','$sacco_status','$saccoLocation') ");
		//header('Location: '.$_SERVER['PHP_SELF'].'?success');
	//exit;

	if ($result) {
		// output data of each row
	  
	echo '<script> window.location="sacco.php?insert=True" </script>';

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

	if( isset($_POST['editSaccoButton']) and isset($_POST['edit_sacco_name']) and isset($_POST['edit_sacco_status']) and isset($_POST['editSaccoId'])){
			echo "hello";
			echo $editSaccoName=$_POST['edit_sacco_name'];
			 $editSaccoStatus=$_POST['edit_sacco_status'];
			 $editSaccoId=$_POST['editSaccoId'];
			 $editLocation=$_POST['editLocation'];
			 
			 
	$result=mysqli_query($conn,"update `sacco` SET sacco_name= '".$editSaccoName."', county= '". $editLocation."',status= '".$editSaccoStatus."' where `id`='".$editSaccoId."' ");
if ($result) {
    // output data of each row
  echo' <div class="alert alert-success alert-dismissable">
 <button type="button" class="close" data-dismiss="alert"
 aria-hidden="true">
 &times;
 </button>
 Success !ID '.$editSaccoId.'  updated successfully.
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
			   //var updiv = document.getElementById("message"); //document.getElementById("highodds-details");
			   //alert(id);
			  var details= '&id='+ id;
			$.ajax({
						type: "POST",
                                url: "deletecategory.php",
                                data: details,
                                cache: false,
                                success: function(rsp) {
				//location.reload();
              //then append the result where ever you want like
             // $("#datahere").html(rsp); //data will be containing the vote count which you have echoed from the controller
			// var updiv = document.getElementById("message"); //document.getElementById("highodds-details");
           //updiv.innerHTML =rsp;
		   //location.reload(); // refleshing page
		    window.location="category.php?delete=True" ;
		    
				
		   
                }

				
            });
			 
		   }
		  </script>
	   <div id="message"></div>
	   
      
      <!-- Icon Cards-->
            <div class="card mb-3">
        <div class="card-header bg-default" style="text-align:">
		<div class="row">
		  <div class="col-md-8"><b>Category List</b></div>
		  <div class="col-md-4 col-pull-right" style="text-align:right"><a class="btn btn-primary" href="login.html" data-toggle="modal" data-target="#category_modal"><i class="fa fa-plus"></i> <b>New Category</b></a></div>
		</div>
		
          </div>
        <div class="card-body">
          <?php
		
		include('config.php');
		$result_array = array();

		$result=mysqli_query($conn,"select * from `sacco` where `id`!=' ' ORDER BY id DESC ");
if ($result->num_rows > 0) {
    // output data of each row
    
		?>
		
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>SACCO</th>
                  <th>Location</th>
                  <th>Status</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>ID</th>
                  <th>SACCO</th>
                  <th>Location</th>
                  <th>Status</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
              </tfoot>
              <tbody>
			  
			  <?php
			  while($row = $result->fetch_assoc()) {
				  $id=$row["id"];
		echo '<form method="POST" action="sacco.php" role="form"><tr>
		 <td>';
		  echo $id= $row["id"].
		  '</td><td>'
		  .$row["sacco_name"].
		   '</td><td>'.$row["county"].'</td>
		   <td><span class="badge btn-success">'.$row["status"].'</span>' ;
		   // delete and edit category button
		 echo"</td><td>	 <button class='btn btn-info' href='' data-toggle='modal' type='submit' data-target='#update_category_modal' value='' name='updateid'  onclick='editSaccoFunc(".$row["id"].")' ><i class='fa fa-edit'></i></button>";
		  
		 echo "</td><td><button class='btn btn-danger' href='' data-toggle='modal' type='submit' data-target='#delete_category_modal' value='' name='deleteCategorybutton'  onclick='deleteCategoryFunc(".$row["id"].")' ><i class='fa fa-trash'></i></button>";
		  //echo "<button class='btn btn-warning' href='' data-toggle='modal' type='submit' data-target='#delete_user' value='' name='updateid'  onclick='editUserFunc(" ; echo $id .")' >Delete</button>";
		 echo '</td>
		</tr></form>';
		
		array_push($result_array, $row);
		


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
    <!-- Add category list Modal-->
    <div class="modal fade" id="category_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add New Sacco</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
		  <form method="POST" action="sacco.php">
          <div class="form-group">
          
                <label for="exampleInputName"><b>Sacco Name</b></label>
                <input class="form-control" id="sacco_name" name="sacco_name" type="text" aria-describedby="nameHelp" placeholder="Enter Sacco name" required>
             </div>
			 <div class="form-group">
          
                <label for="exampleInputName"><b>County:</b></label>
                <input class="form-control" id="saccoLocation" name="saccoLocation" type="text" aria-describedby="nameHelp" placeholder="Enter Sacco Location" required>
             </div> 
			
			   <div class="form-group">
              <select name="sacco_status" class="form-control" required>
			  <option value="Active">Active</option>
			  <option value="Inactive">Inactive</option>
			  </select>
           
          </div>
          
          
       
		  </div>
          <div class="modal-footer">
            
			<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <button class="btn btn-primary" name="addSaccoButton" type="submit" >Add Sacco</button>
          </div>
		   </form>
		 
        </div>
      </div>
    </div>
	<!-- update Modal-->
    <div class="modal fade" id="update_category_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Sacco</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
		  <div id="datahere">karongo</div>
		  <script>
		  
		   function editSaccoFunc(id){
			   
			   var updiv = document.getElementById("datahere"); //document.getElementById("highodds-details");
			   //alert(id);
			  var details= '&id='+ id;
			$.ajax({
						type: "POST",
                                url: "editsacco.php",
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
    <div class="modal fade" id="delete_category_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Delete Category?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
		  
		  Are you sure you want to delete this item?.<br>
		  <div id="deletedata"></div>
		  </div>
          
		  <script>
		   function deleteCategoryFunc(id){
			  
			   var id = id;
			   var updiv = document.getElementById("deletedata"); //document.getElementById("highodds-details");
			   //alert(id);
			  var details= '&id='+ id;
			$.ajax({
						type: "POST",
                                url: "deletecategory.php",
                                data: details,
                                cache: false,
                                success: function(rsp) {
				
              //then append the result where ever you want like
             // $("#datahere").html(rsp); //data will be containing the vote count which you have echoed from the controller
           updiv.innerHTML ='<form method="POST"><div class="modal-footer"><button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button><button class="btn btn-danger" id="'+ id +'" type="button" data-dismiss="modal" onclick="deleteFunc(this.id)">Delete</button></form></div>';
		     
                }
            });
		   }
		  </script>
		  
            
          
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
