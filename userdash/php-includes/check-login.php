<?php
session_start();
if(isset($_SESSION['id']) && $_SESSION['login_type']=='user'){

}
else{
	echo '<script>alert("Access denied");window.location.assign("index.php");</script>';
}
/*session_start();
if (isset($_SESSION['login_type']) && $_SESSION['login_type'] == 'user') {
    echo "Welcome to the member's area, " . $_SESSION['userid'] . "!";
} else {
    echo "Please log in first to see this page.";
}*/
?>