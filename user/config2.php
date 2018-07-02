<?php
 $servername = "localhost";
$dbusername =  'slaughterHouse';
$dbpassword = "a1b2c3d4e5.com";
$db = "slaughter_house";

		// Create connection
		$condb = mysqli_connect($servername, $dbusername, $dbpassword,$db);

// Check connection
if (!$condb) {
    die("Connection failed: " . mysqli_connect_error());
}
?>