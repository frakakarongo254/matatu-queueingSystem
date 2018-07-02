<?php
include('config.php');
  $id = $_POST['id'];
 //$id = "1";
$result_array = array();

		$result=mysqli_query($conn,"DELETE FROM matatu WHERE `no_plate`='".$id."' ");
if ($result) {
//	header("Refresh:0; url=http://localhost/hardware/user.php");
	echo '<script> window.location="matatu.php?delete=True" </script>';
	
	}
	
 else {
    echo  "No Match"; 
}

?>