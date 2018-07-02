<?php
include("config.php");
   

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>SB Admin - Start Bootstrap Template</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
</head>

<body class="bg-blue">
  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Login<img src="admin/img/meat.jpg" height="100px" width="200px"></div>
      <div class="card-body">
	 
	  <?php
   
   
   if($_SERVER["REQUEST_METHOD"] == "POST" and isset($_POST['login'])) {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($conn,$_POST['username']);
       $mypassword = mysqli_real_escape_string($conn,$_POST['password']); 
      $result=mysqli_query($conn,"select * from `user` where `email`='".$myusername."' and `password`='".$mypassword."' and `status`='Active' ORDER BY id DESC ");
if ($result->num_rows > 0) {
	
				while($row = $result->fetch_assoc()) {
				echo $myusername=$row['email'];
				  session_start();
         $_SESSION['login_user'] = $myusername;
         
         header("location: dashboard.php");
				}
				//echo $data;
				
} else {
    
echo' <div class="alert alert-warning alert-dismissable">
 <button type="button" class="close" data-dismiss="alert"
 aria-hidden="true">
 &times;
 </button>
 Your Login Name or Password is invalid.
</div>';	
}

    
   }
?>
        <form method="POST" action="index.php">
          <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input class="form-control" id="exampleInputEmail1" name="username" type="email" aria-describedby="emailHelp" placeholder="Enter email">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input class="form-control" id="exampleInputPassword1" name="password" type="password" placeholder="Password">
          </div>
          <div class="form-group">
            <div class="form-check">
              <label class="form-check-label">
                <input class="form-check-input" type="checkbox"> Remember Password</label>
            </div>
          </div>
          <button class="btn btn-primary btn-block" name="login" type="submit">Login</button>
		  
        </form>
       
      </div>
    </div>
  </div>
  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
</body>

</html>
