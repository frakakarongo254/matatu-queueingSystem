<?php
   include('session.php');
    
   if (!isConductor()) {
	$_SESSION['msg'] = "You must log in first";
	header('location: ../index.php');
}
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
  <script>
   function check() {
            var pass1 = document.getElementById("pass1").value;
            var pass2 = document.getElementById("pass2").value;
            var det = document.getElementById("passwordDetails");

            if(pass1 !=pass2){

                det.innerHTML="<b style='color:red;'>Password Mismatch...</b>"    
            }
            else{

              det.innerHTML="<b style='color:green;'>passwords correct</b>"    
            }
        }

  </script>
</head>

<body class="" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="dashboard.php">Dashboard</a>
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
          
		  <ul class="navbar-nav ml-auto">
          <li class="nav-item">
               <a class="navbar-brand" href="dashboard.php" style="color:;font-size:20px;"><span class="glyphicon glyphicon-user"></span><i class="fa fa-fw fa-user"></i><b><?php echo $login_session;?></b></a>
            </li> 
			<li class="nav-item">
              <a class="nav-link" href="editprofile.php" style="color:white">Settings</a>
            </li>
        <li class="nav-item">
		
          <a class="nav-link" href="#" data-toggle="modal" data-target="#exampleModal" style="color:white">
            <i class="fa fa-fw fa-sign-out"></i>Logout</a>
        </li>
      </ul>
         
        </div>
      </nav>
 
  
    <div class="container-fluid">
      <br>
      <br>
      <br>

      <div class="row">
        <div class="col-md-3 ">
          
        </div>
		<div class="col-md-6">
		<ol class="breadcrumb bg-info">
        
        <li class="breadcrumb-item "><b>Edit Profile </b></li>
      </ol>
		<?php
		if(isset($_GET['success'])){
		 echo' <div class="alert alert-success alert-dismissable">
		 <button type="button" class="close" data-dismiss="alert"
		 aria-hidden="true">
		 &times;
		 </button>
		 Success! You have made changes in your profile .
		</div>';   
	   } 
		 if(isset($_POST['editProfile'])){
			 $name=$_POST['name'];
			 $mobileNo=$_POST['mobileNo'];
			echo $previousPass=$_POST['previousPass'];
			echo $login_session_password;
			 $pass1=$_POST['pass1'];
			 $pass2=$_POST['pass2'];
			 if($previousPass !==$login_session_password){
				 echo "Invalid previous password";
			 }else{
				 if($pass1 ==$pass2){
				 $result=mysqli_query($conn,"update `user` SET username= '".$name."',password= '".$pass1."',mobile= '".$mobileNo."' where `password`='".$login_session_password."' and `username`='".$login_session."' ");
				 
				 if($result){
					
					 echo '<script> window.location="editprofile.php?success=True" </script>';
				 }else{
					 
					  echo' <div class="alert alert-danger alert-dismissable">
						 <button type="button" class="close" data-dismiss="alert"
						 aria-hidden="true">
						 &times;
						 </button>
						 Sorry! something went wrong.Please try again.
						</div>'; 
				 }
				 }else{
					 
					  echo' <div class="alert alert-warning alert-dismissable">
						 <button type="button" class="close" data-dismiss="alert"
						 aria-hidden="true">
						 &times;
						 </button>
						 Your password is not matching.
						</div>';   
				 }
			 }
			 
		 }
		?>
          <form method="POST" action="editprofile.php">
		   <div class="form-group">
		     <label><b>Name</b></label>
			 <input class="form-control" name="name" value="<?php echo $login_session;?>" required>
		   </div>
		   <div class="form-group">
		     <label><b>Mobile No</b></label>
			 <input class="form-control" name="mobileNo" type="text" value="<?php echo $login_session_mobile;?>" required>
		   </div>
		   <div class="form-group">
		     <label><b>Previous Password</b></label>
			 <input class="form-control" type="password" name="previousPass" id="previousPass" required>
		   </div>
		   <div class="form-group">
		     <label><b>New Password</b></label>
			 <input class="form-control" type="password" name="pass1" id="pass1" required>
		   </div>
		   <div id="passwordDetails"></div>
		   <div class="form-group">
		     <label><b>Re-enter Password</b></label>
			 <input class="form-control" type="password" name="pass2" id="pass2" onkeyup="check()" required>
		   </div>
		   <div class="form-group">
		    
			 <input class="form-control btn-primary col-md-2" type="submit" value="Edit" name="editProfile">
		   </div>
		  </form>
		 
        </div>
		<div class="col-md-4 ">
          
        </div>
      
      </div>
      
           
     
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    
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
  </div>
</body>

</html>
