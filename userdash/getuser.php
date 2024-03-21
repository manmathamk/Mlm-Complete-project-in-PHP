<?php 
error_reporting(E_ALL ^ E_NOTICE);
include('php-includes/connect.php');
$entry = $_POST['userids'];

$query = mysqli_query($con, "SELECT * FROM user WHERE email='$entry'");
    $result = mysqli_fetch_array($query);
    echo $result['name'] != '' ? '<h4 id="kind" style="color: #03c903">'.$result['name'].'</h4>' : '<h4 id="kind" style="color: red">No Match</h4>';



