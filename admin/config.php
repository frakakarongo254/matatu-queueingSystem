<?php
 $servername = "localhost";
$dbusername = "matatu";
$dbpassword = "12345678";
$db = "matatu_queueing_system";

		// Create connection
		$conn = mysqli_connect($servername, $dbusername, $dbpassword,$db);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>