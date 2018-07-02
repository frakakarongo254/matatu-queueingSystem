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

<body class=" " id="page-top">
  <!-- Navigation-->
 <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="dashboard.php">Dashboard</a>
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="product.php"><i class="fa fa-eye"></i> Product <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="createorder.php" style="color:white" ><i class="fa fa-shopping-cart"></i> New Order </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="order.php" style="color:white"><i class="fa fa-list"></i> My order</a>
            </li>
           
          </ul>
		  <ul class="navbar-nav ml-auto">
          <li class="nav-item">
               <a class="navbar-brand" href="dashboard.php" style="color:;font-size:20px;"><span class="glyphicon glyphicon-user"></span><i class="fa fa-fw fa-user"></i><b><?php echo $login_session;?></b></a>
            </li> 
			<li class="nav-item">
              <a class="nav-link" href="editprofile.php" style="color:white">Settings</a>
            </li>
        <li class="nav-item">
		
          <a class="nav-link" data-toggle="modal" data-target="#exampleModal" style="color:white">
            <i class="fa fa-fw fa-sign-out"></i>Logout</a>
        </li>
      </ul>
         
        </div>
      </nav>
 
    <div class="container-fluid">
	<br>
	<br>
	<br>
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
			
			// $sacco_name=$_POST['sacco_name'];
			 $matatu_no_plate=$_POST['matatu_name'];
			 $matatu_route=$_POST['matatu_route'];
			 //$matatu_status=$_POST['matatu_status'];
			 $d=strtotime("today");
			$start  = date_create('2010-06-30');
$end 	= date_create(); // Current time and date
$diff  	= date_diff( $start, $end );

echo 'The difference is ';
echo  $diff->y . ' years, ';
echo  $diff->m . ' months, ';
echo  $diff->d . ' days, ';
echo  $diff->h . ' hours, ';
echo  $diff->i . ' minutes, ';
echo  $diff->s . ' seconds';
// Output: The difference is 28 years, 5 months, 19 days, 20 hours, 34 minutes, 36 seconds

echo 'The difference in days : ' . $diff->days;
// Output: The difference in days : 10398
			$d=strtotime("today");
			 $time= date("h:i:sa");
	   echo $dateEntered = date("Y-m-d " .$time, $d);
	    $time= date("h:i:sa");
	   // echo $daytime=$dateEntered."".$time;

	$result=mysqli_query($conn,"insert into `trips` (matatu,route,login_time,entered_by) values('$matatu_no_plate','$matatu_route','$dateEntered','$login_session')");
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
   
			
			
			
				
}}
 
	if( isset($_POST['editMatatuButton']) and isset($_POST['editMatatu_no_plate']) and isset($_POST['editMatatu_route'])){
			echo $editMatatu_no_plate=$_POST['editMatatu_no_plate'];
			echo $editMatatu_route=$_POST['editMatatu_route'];
			//echo $editMatatu_status=$_POST['editMatatu_status'];
	
	$result=mysqli_query($conn,"update `trips` SET route= '".$editMatatu_route."' where `id`='".$editMatatu_no_plate."' ");
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
		  <div class="col-md-4 col-pull-right" style="text-align:right"><a class="btn btn-primary" href="login.html" data-toggle="modal" data-target="#brand_modal"><i class="fa fa-plus"></i><b> Register Route </b></a></div>
		</div>
		
          </div>
        <div class="card-body">
          <?php
		
		include('config.php');
		
		$result_array = array();

		$result=mysqli_query($conn,"select * from `trips` where `entered_by` ='".$login_session."' ORDER BY id ASC ");
if ($result->num_rows > 0) {
    // output data of each row
    
		?>
		
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  
                  <th>ID</th>                              
                  <th>MATATU</th>                              
                  <th>Route</th>                 
                  <th>Time Registered</th>                 
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                   <th>ID</th>                              
                   <th>MATATU</th>                              
                  <th>Route</th>                 
                  <th>Time Registered</th>                 
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
              </tfoot>
              <tbody>
			  
			  <?php
			  while($row = $result->fetch_assoc()) {
				  $trip_id=$row["id"];
		echo '<form method="POST" action="matatu.php" role="form"><tr>
		 <td>'.$row["id"].'</td><td>';
		  echo $id= $row["matatu"].
		  '</td><td><span class="badge btn-success">'
		  .$row["route"].
		   '</td><td>'.$row["login_time"].'</span></td>';
		   
		   
		   // delete and edit category button
		 echo"<td>	 <button class='btn btn-info' href='' data-toggle='modal' type='submit' data-target='#update_brand_modal' value='' name='updateid' id='". $trip_id."' onclick='editMatatuFunc(this.id)' ><i class='fa fa-edit'></i></button>";
		  
		 echo "</td><td><button class='btn btn-danger' href='' data-toggle='modal' type='submit' data-target='#delete_brand_modal'id='". $trip_id."' value='' name='deleteMatatuButton'  onclick='deleteMatatuFunc(this.id)' ><i class='fa fa-trash'></i></button>";
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
            <h5 class="modal-title" id="exampleModalLabel">Edit Matatu Route?</h5>
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
            <h5 class="modal-title" id="exampleModalLabel">Register with Route</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
		  <?php
		  //include()
		  $resultCategory=mysqli_query($conn,"select * from `matatu` where `no_plate` ='".$login_session_matatu."' ORDER BY id DESC ");
			if ($resultCategory->num_rows > 0) {
				echo '<form method="POST" action="matatu.php"><div class="form-group"><label for="SACOO:"><b>Select Matatu</b></label><select name="matatu_name" class="form-control">';
				while($row = $resultCategory->fetch_assoc()) {
				 echo $no_plate =$row['no_plate'];
				//echo $categoryName$row['category_name'];
					
					 echo '<option value="'.$no_plate.'">'.$no_plate.'</option>';
				}?>
				
				</select></div>
				
			
			  <div class="form-group">            
                <label for="date"><b>Enter Matatu Route:</b></label>
                <input type="text" name="matatu_route" class="form-control" placeholder="Enter Matatu Route">
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
