<?php include('menu.php'); 
if(isset($_POST['activate'])){
	$pins = $_POST['pins'];
    $users = $_POST['users'];

    $checkActive = getUnderId($users);
    if($checkActive == 'active'){
        echo '<script>alert("user Already active")</script>';
    }
    $pinActive = pin_check($pins);
    if($pinActive == false){
        echo '<script>alert("Invalid Pin")</script>';
    }else{
        mysqli_query($con, "UPDATE `pin_list` SET `status` = 'close' WHERE `pin` = '$pins'");
        echo '<script>window.location.replace("http://akshaya.asia/userdash/activate.php"); </script>';
    }
}

function getUnderId($userid)
{
    global $con;
    $query = mysqli_query($con, "select * from user where email='$userid'");
    $result = mysqli_fetch_array($query);
    return $result['status'];
}

function pin_check($pin)
{
    global $con, $userid;

    $query = mysqli_query($con, "select * from pin_list where pin='$pin' and userid='$userid' and status='open'");
    if (mysqli_num_rows($query) > 0) {
        return true;
    } else {
        return false;
    }
}
?>

<section class="content">
    <div class="container-fluid">
        <h1 style="text-align: center">Actiavte My Profile</h1>
        <!-- Card -->
<div class="card">


<!-- Card content -->
<div class="card-body" style="padding: 20px">

  <!-- Title -->
  <h4 class="card-title"><a>Enter the pin provided to you</a></h4>
  <!-- Text -->
  <form method="post">
  <div class="form-group">
  <input type="hidden" class="form-control" name="users" value="<?php echo $userid?>">
    <input type="text" class="form-control" id="exampleInputEmail1" name="pins" aria-describedby="emailHelp" placeholder="Enter Available Pin Here">
  </div>
  <!-- Button -->
  <button type="submit" name="activate" class="btn btn-primary">Button</button>
  </form>
</div>

</div>
<!-- Card -->
        <?php include('flinks.php'); ?>