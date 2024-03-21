<?php
include('php-includes/connect.php');
include('php-includes/check-login.php');
$use = $_SESSION['userid'];
if( isset( $_POST['submit'] ) )
{

$name = $_POST['newPassword'];


$insertdata=" UPDATE `user` SET `password` = '$name' WHERE `user`.`email` = '$use'";
mysqli_query($con, $insertdata);

echo '<script type="text/javascript">';
echo ' if (window.confirm("Do you really want to change password?")) { 
  window.open("password.php", "Successfully changed!");
}';  //not showing an alert box.
echo '</script>';

}
?>