<?/*php
	$db_host = "localhost";
	$db_user = "root";
	$db_pass = "";
	$db_name = "manumlm";
	
	$con =  mysqli_connect($db_host,$db_user,$db_pass,$db_name);
	if(mysqli_connect_error()){
		echo 'connect to database failed';
	}*/
?>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "manumlm";
// Create connection
$con = new mysqli($servername, $username, $password, $database);

// Check connection
if ($con->connect_error) {
  die("Connection failed: " . $con->connect_error);
}

?>