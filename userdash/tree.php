<?php include('menu.php');
error_reporting(E_ALL ^ E_NOTICE);
?>

<section class="content">
        <div class="container-fluid">
            <div class="align-center m-t-15 font-bold"><h3>Tree View</h3></div>
                            <ol class="breadcrumb breadcrumb-bg-cyan align-center">
                                <li><a href="javascript:void(0);"><i class="material-icons">home</i> Home</a></li>
                                <li><a href="javascript:void(0);"><i class="material-icons">library_books</i> Geneology</a></li>
                                <li class="active"><i class="material-icons">archive</i> TreeView</li>
                            </ol>

<?php
$search = $userid;
if (isset($_POST['subm'])) {
    $search = $_POST['search'];
}
?>
<?php
function tree_data($userid)
{
    global $con;
    $data = array();
    $query = mysqli_query($con, "select * from tree where userid='$userid'");
    $result = mysqli_fetch_array($query);
    $data['left'] = $result['left'];
    $data['center'] = $result['center'];
    $data['right'] = $result['right'];
    $data['leftcount'] = $result['leftcount'];
    $data['centercount'] = $result['centercount'];
    $data['rightcount'] = $result['rightcount'];
    return $data;
}
?>
<?php
if (isset($_GET['search-id'])) {
    $search_id = mysqli_real_escape_string($con, $_GET['search-id']);
    if ($search_id != "") {
        $query_check = mysqli_query($con, "select * from user where email='$search_id'");
        if (mysqli_num_rows($query_check) > 0) {
            $search = $search_id;
        } else {
            echo '<script>alert("Access Denied");window.location.assign("test.php");</script>';
        }
    } else {
        echo '<script>alert("Access Denied");window.location.assign("test.php");</script>';
    }
}
?>

<?php
$data = tree_data($search);
?>

<?php
$first_left_user = $data['left'];
$first_center_user = $data['center'];
$first_right_user = $data['right'];
?>
<?php
$data_first_left_user = tree_data($first_left_user);
$second_left_user = $data_first_left_user['left'];
$second_center_user = $data_first_left_user['center'];
$second_right_user = $data_first_left_user['right'];

$data_first_center_user = tree_data($first_center_user);
$third_left_user = $data_first_center_user['left'];
$third_center_user = $data_first_center_user['center'];
$third_right_user = $data_first_center_user['right'];

$data_first_right_user = tree_data($first_right_user);
$fourth_left_user = $data_first_right_user['left'];
$fourth_center_user = $data_first_right_user['center'];
$fourth_right_user = $data_first_right_user['right'];

$data_second_left_user = tree_data($second_left_user);
$fifth_left_user = $data_second_left_user['left'];
$fifth_center_user = $data_second_left_user['center'];
$fifth_right_user = $data_second_left_user['right'];

$data_second_center_user = tree_data($second_center_user);
$sixth_left_user = $data_second_center_user['left'];
$sixth_center_user = $data_second_center_user['center'];
$sixth_right_user = $data_second_center_user['right'];

$data_second_right_user = tree_data($second_right_user);
$seventh_left_user = $data_second_right_user['left'];
$seventh_center_user = $data_second_right_user['center'];
$seventh_right_user = $data_second_right_user['right'];

$data_third_left_user = tree_data($third_left_user);
$eight_left_user = $data_third_left_user['left'];
$eight_center_user = $data_third_left_user['center'];
$eight_right_user = $data_third_left_user['right'];

$data_third_center_user = tree_data($third_center_user);
$nine_left_user = $data_third_center_user['left'];
$nine_center_user = $data_third_center_user['center'];
$nine_right_user = $data_third_center_user['right'];

$data_third_right_user = tree_data($third_right_user);
$ten_left_user = $data_third_right_user['left'];
$ten_center_user = $data_third_right_user['center'];
$ten_right_user = $data_third_right_user['right'];

$data_fourth_left_user = tree_data($fourth_left_user);
$eleven_left_user = $data_fourth_left_user['left'];
$eleven_center_user = $data_fourth_left_user['center'];
$eleven_right_user = $data_fourth_left_user['right'];

$data_fourth_center_user = tree_data($fourth_center_user);
$twelve_left_user = $data_fourth_center_user['left'];
$twelve_center_user = $data_fourth_center_user['center'];
$twelve_right_user = $data_fourth_center_user['right'];

$data_fourth_right_user = tree_data($fourth_right_user);
$thirteen_left_user = $data_fourth_right_user['left'];
$thirteen_center_user = $data_fourth_right_user['center'];
$thirteen_right_user = $data_fourth_right_user['right'];

?>

<!-------------------------------------------->
<?php

?>

<!DOCTYPE html>
<html>
<head>
    <!-- <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script> -->
    <style type="text/css">
    /*----------------genealogy-scroll----------*/

.genealogy-scroll::-webkit-scrollbar {
    width: 5px;
    height: 8px;
}
.genealogy-scroll::-webkit-scrollbar-track {
    border-radius: 10px;
    background-color: #e4e4e4;
}
.genealogy-scroll::-webkit-scrollbar-thumb {
    background: #212121;
    border-radius: 10px;
    transition: 0.5s;
}
.genealogy-scroll::-webkit-scrollbar-thumb:hover {
    background: #d5b14c;
    transition: 0.5s;
}


/*----------------genealogy-tree----------*/
.genealogy-body{
    white-space: nowrap;
    overflow-y: hidden;
    padding: 50px;
    min-height: 500px;
    padding-top: 10px;
}
.genealogy-tree ul {
    padding-top: 20px; 
    position: relative;
    padding-left: 0px;
    display: flex;
}
.genealogy-tree li {
    float: left; text-align: center;
    list-style-type: none;
    position: relative;
    padding: 20px 5px 0 5px;
}
.genealogy-tree li::before, .genealogy-tree li::after{
    content: '';
    position: absolute; 
  top: 0; 
  right: 50%;
    border-top: 2px solid #ccc;
    width: 50%; 
  height: 18px;
}
.genealogy-tree li::after{
    right: auto; left: 50%;
    border-left: 2px solid #ccc;
}
.genealogy-tree li:only-child::after, .genealogy-tree li:only-child::before {
    display: none;
}
.genealogy-tree li:only-child{ 
    padding-top: 0;
}
.genealogy-tree li:first-child::before, .genealogy-tree li:last-child::after{
    border: 0 none;
}
.genealogy-tree li:last-child::before{
    border-right: 2px solid #ccc;
    border-radius: 0 5px 0 0;
    -webkit-border-radius: 0 5px 0 0;
    -moz-border-radius: 0 5px 0 0;
}
.genealogy-tree li:first-child::after{
    border-radius: 5px 0 0 0;
    -webkit-border-radius: 5px 0 0 0;
    -moz-border-radius: 5px 0 0 0;
}
.genealogy-tree ul ul::before{
    content: '';
    position: absolute; top: 0; left: 50%;
    border-left: 2px solid #ccc;
    width: 0; height: 20px;
}
.genealogy-tree li a{
    text-decoration: none;
    color: #666;
    font-family: arial, verdana, tahoma;
    font-size: 11px;
    display: inline-block;
    border-radius: 5px;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
}

.genealogy-tree li a:hover+ul li::after, 
.genealogy-tree li a:hover+ul li::before, 
.genealogy-tree li a:hover+ul::before, 
.genealogy-tree li a:hover+ul ul::before{
    border-color:  #fbba00;
}

/*--------------memeber-card-design----------*/
.member-view-box{
    padding:0px 20px;
    text-align: center;
    border-radius: 4px;
    position: relative;
}
.member-image{
    width: 60px;
    position: relative;
}
.member-image img{
    width: 60px;
    height: 60px;
    border-radius: 6px;
  /* background-color :#000; */
  z-index: 1;
}

</style>



<script type="text/javascript">
$(function () {
    $('.genealogy-tree ul').hide();
    $('.genealogy-tree>ul').show();
    $('.genealogy-tree ul.active').show();
    $('.genealogy-tree li').on('click', function (e) {
        var children = $(this).find('> ul');
        if (children.is(":visible")) children.hide('fast').removeClass('active');
        else children.show('fast').addClass('active');
        e.stopPropagation();
    });
});
</script>
<?php include('menu.php'); ?>
<!-- Page Content -->

</div>

<!-- /.col-lg-12 -->
</div>
<style type="text/css">
    #hover {
    display: none;
}
  .genealogy-tree li a:hover #hover{
    background-color: #fc5296;
background-image: linear-gradient(315deg, #fc5296 0%, #f67062 74%); 
color: white;
    display: block;
    position: absolute;
    z-index: 1000;
  }
  #over {
    display: none;
}
  .genealogy-tree li a:hover #over{
  
    display: none;
  
  }
</style>

<div class="body genealogy-body genealogy-scroll">
    <div class="row">

      <!--Grid column-->
      <div class="col-md-6 mb-4">

        <!-- Search form -->
        <form class="form-inline md-form form-sm mt-0" method="post" action="tree.php">
          
          <input class="form-control form-control-sm ml-3 w-75" type="text" placeholder="Enter Search userid" aria-label="Search" name="search"><br /><br />
          <button type="submit" name="subm" class="btn-info"><i class="fa fa-search" aria-hidden="true"></i>Search</button>&emsp;  <button style="float: right; color: #fff; background: red" onclick="history.go(-1);">Go Back </button>
        </form>

      </div>
  </div>
    <div class="genealogy-tree">
        <ul>            
                    <li>
                        <a href="javascript:void(0);">
                            <div class="member-view-box">
                                <div class="member-image">
                                   
                                        <?php
                                        $qury = mysqli_query($con, "select * from user where email='$search'");
                                        $reslt = mysqli_fetch_array($qury);
                                        $date = $reslt['date'];
                                        $package = $reslt['package'];
                                        $statuss = $reslt['status'];
                                        $ses = mysqli_query($con, "select * from tree where userid='$search'");
                                        $sessi = mysqli_fetch_array($ses);
                                        $lefs = $sessi['leftcount'];
                                        $righs = $sessi['rightcount'];
                                        $cens = $sessi['centercount'];
                                        ?>
<?php if ($statuss == 'active') { ?> 
    <form class="form-inline md-form form-sm mt-0" method="post" action="tree.php"><input type="hidden" value="<?php echo $search ?>" name="search"> <button style="border: none; background: none" type="submit" name="subm"><img src="../images/blue.png" alt="Member"></button></form><?php } else if($search != ''){ { ?> <form class="form-inline md-form form-sm mt-0" method="post" action="tree.php"><input type="hidden" value="<?php echo $search ?>" name="search"> <button style="border: none; background: none" type="submit" name="subm"><img src="../images/orange.png" alt="Member"></button></form><?php } } else{ ?><button onclick="location.href='<?php if ($search != '') { echo 'join.php?side=left&upline=' . $search;}?>'" style="border: none; background: none" type="button"><img src="../images/orange.png" alt="Member"></button><?php }?>
                                    <div class="member-details">
                                        <h5><?php echo $search; ?></h5>
                                        <div class="card" id="hover" style="">
      
      <div class="card-body">
        
            <span style="font-size: 15px;">
       <strong> Name:  </strong> &nbsp<?php echo $name ?> &nbsp&nbsp||  &nbsp&nbsp <strong>Joining Date     :</strong>&nbsp   <?php echo $date ?><br />
<strong>Package: </strong> &nbspRs.<?php echo $package ?> &nbsp&nbsp||  &nbsp&nbsp<strong>Left Active Members    :<?php echo $lefs ?>Members</strong>&nbsp<br />
<strong>Right Active Members   :<?php echo $righs ?>Members</strong> &nbsp&nbsp||  &nbsp&nbsp &nbsp
</span>

      </div>
    </div>
                                </div>
                            </div>
                        </a>
                        <ul class="active">
                            <li>
                                <a href="javascript:void(0);">
                                    <div class="member-view-box">
                                        <div class="member-image">
                                          
                    <?php
                    $quary = mysqli_query($con, "select * from user where email='$first_left_user'");
                    $resltfl = mysqli_fetch_array($quary);
                    $name = $resltfl['name'];
                    $datea = $resltfl['date'];
                    $packagea = $resltfl['package'];
                    $statuss = $resltfl['status'];
                    $ses = mysqli_query($con, "select * from tree where userid='$first_left_user'");
                    $sessi = mysqli_fetch_array($ses);
                    $lefs = $sessi['leftcount'];
                    $righs = $sessi['rightcount'];
                    $cens = $sessi['centercount'];
                    if ($first_left_user != '') {
                        $hov = 'hover';
                    } else {
                        $hov = 'over';
                    }
                    ?> <?php if ($statuss == 'active') { ?> 
                         <form class="form-inline md-form form-sm mt-0" method="post" action="tree.php"><input type="hidden" value="<?php echo $first_left_user ?>" name="search"> <button style="border: none; background: none" type="submit" name="subm"><img src="../images/blue.png" alt="Member"></button></form><?php } else if($first_left_user != ''){ { ?> <form class="form-inline md-form form-sm mt-0" method="post" action="tree.php"><input type="hidden" value="<?php echo $first_left_user ?>" name="search"> <button style="border: none; background: none" type="submit" name="subm"><img src="../images/orange.png" alt="Member"></button></form><?php } } else{ ?><button onclick="location.href='<?php if ($search != '') { echo 'join.php?side=left&upline=' . $search;}?>'" style="border: none; background: none" type="button"><img src="../images/orange.png" alt="Member"></button><?php }?>
                                       <div class="member-details">
                                                <h5><?php echo $first_left_user ?></h5>
                                                <div class="card" id="<?php echo $hov ?>" style="">
      
      <div class="card-body">
        
            <span style="font-size: 15px;">
       <strong> Name:  </strong> &nbsp<?php echo $name ?> &nbsp&nbsp||  &nbsp&nbsp <strong>Joining Date     :</strong>&nbsp   <?php echo $datea ?><br />
<strong>Package: </strong> &nbspRs.<?php echo $packagea ?> &nbsp&nbsp||  &nbsp&nbsp<strong>Left Active Members    :<?php echo $lefs ?> Members</strong>&nbsp<br />
<strong>Right Active Members   :<?php echo $righs ?> Members</strong> &nbsp&nbsp
</span>

      </div>
    </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                              <ul>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="member-view-box">
                                                <div class="member-image">
                                                  
                 <?php
                 $quary = mysqli_query($con, "select * from user where email='$second_left_user'");
                 $resltfl = mysqli_fetch_array($quary);
                 $name = $resltfl['name'];
                 $datea = $resltfl['date'];
                 $packagea = $resltfl['package'];
                 $statuss = $resltfl['status'];
                 $ses = mysqli_query($con, "select * from tree where userid='$second_left_user'");
                 $sessi = mysqli_fetch_array($ses);
                 $lefs = $sessi['leftcount'];
                 $righs = $sessi['rightcount'];
                 $cens = $sessi['centercount'];
                 if ($second_left_user != '') {
                     $hov = 'hover';
                 } else {
                     $hov = 'over';
                 }
                 ?>                                         <?php if ($statuss == 'active') { ?> 
                 <form class="form-inline md-form form-sm mt-0" method="post" action="tree.php"><input type="hidden" value="<?php echo $second_left_user ?>" name="search"> <button style="border: none; background: none" type="submit" name="subm"><img src="../images/blue.png" alt="Member"></button></form><?php } else if($second_left_user != ''){ { ?> <form class="form-inline md-form form-sm mt-0" method="post" action="tree.php"><input type="hidden" value="<?php echo $second_left_user ?>" name="search"> <button style="border: none; background: none" type="submit" name="subm"><img src="../images/orange.png" alt="Member"></button></form><?php } } else{ ?><button onclick="location.href='<?php if ($first_left_user != '') { echo 'join.php?side=left&upline=' . $first_left_user;}?>'" style="border: none; background: none" type="button"><img src="../images/orange.png" alt="Member"></button><?php }?>
                                       <div class="member-details">
                                                        <h5><?php echo $second_left_user ?></h5>
                                                        <div class="card" id="<?php echo $hov ?>" style="">
      
      <div class="card-body">
        
            <span style="font-size: 15px;">
       <strong> Name:  </strong> &nbsp<?php echo $name ?> &nbsp&nbsp||  &nbsp&nbsp <strong>Joining Date     :</strong>&nbsp   <?php echo $datea ?><br />
<strong>Package: </strong> &nbspRs.<?php echo $packagea ?> &nbsp&nbsp||  &nbsp&nbsp<strong>Left Active Members    :<?php echo $lefs ?> Members</strong>&nbsp<br />
<strong>Right Active Members   :<?php echo $righs ?> Members</strong> &nbsp&nbsp
</span>

      </div>
    </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                <ul>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="member-view-box">
                                                <div class="member-image">
                                                   
                                                  <?php
                                                  $quary = mysqli_query($con, "select * from user where email='$fifth_left_user'");
                                                  $resltfl = mysqli_fetch_array($quary);
                                                  $name = $resltfl['name'];
                                                  $datea = $resltfl['date'];
                                                  $packagea = $resltfl['package'];
                                                  $statuss = $resltfl['status'];
                                                  $ses = mysqli_query($con, "select * from tree where userid='$fifth_left_user'");
                                                  $sessi = mysqli_fetch_array($ses);
                                                  $lefs = $sessi['leftcount'];
                                                  $righs = $sessi['rightcount'];
                                                  $cens = $sessi['centercount'];
                                                  if ($fifth_left_user != '') {
                                                      $hov = 'hover';
                                                  } else {
                                                      $hov = 'over';
                                                  }
                                                  ?>    <?php if ($statuss == 'active') { ?> 
                 <form class="form-inline md-form form-sm mt-0" method="post" action="tree.php"><input type="hidden" value="<?php echo $fifth_left_user ?>" name="search"> <button style="border: none; background: none" type="submit" name="subm"><img src="../images/blue.png" alt="Member"></button></form><?php } else if($fifth_left_user != ''){ { ?> <form class="form-inline md-form form-sm mt-0" method="post" action="tree.php"><input type="hidden" value="<?php echo $fifth_left_user ?>" name="search"> <button style="border: none; background: none" type="submit" name="subm"><img src="../images/orange.png" alt="Member"></button></form><?php } } else{ ?><button onclick="location.href='<?php if ($second_left_user != '') { echo 'join.php?side=left&upline=' . $second_left_user;}?>'" style="border: none; background: none" type="button"><img src="../images/orange.png" alt="Member"></button><?php }?>
                                       <div class="member-details">
                                                        <h5><?php echo $fifth_left_user ?> </h5>
                                                        <div class="card" id="<?php echo $hov ?>" style="">
      
      <div class="card-body">
        
            <span style="font-size: 15px;">
       <strong> Name:  </strong> &nbsp<?php echo $name ?> &nbsp&nbsp||  &nbsp&nbsp <strong>Joining Date     :</strong>&nbsp   <?php echo $datea ?><br />
<strong>Package: </strong> &nbspRs.<?php echo $packagea ?> &nbsp&nbsp||  &nbsp&nbsp<strong>Left Active Members    :<?php echo $lefs ?> Members</strong>&nbsp<br />
<strong>Right Active Members   :<?php echo $righs ?> Members</strong> &nbsp&nbsp
</span>

      </div>
    </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                     
                                        <a href="javascript:void(0);">
                                            <div class="member-view-box">
                                                <div class="member-image">
                                                   
                                       <?php
                                       $quary = mysqli_query($con, "select * from user where email='$fifth_right_user'");
                                       $resltfl = mysqli_fetch_array($quary);
                                       $name = $resltfl['name'];
                                       $datea = $resltfl['date'];
                                       $packagea = $resltfl['package'];
                                       $statuss = $resltfl['status'];
                                       $ses = mysqli_query($con, "select * from tree where userid='$fifth_right_user'");
                                       $sessi = mysqli_fetch_array($ses);
                                       $lefs = $sessi['leftcount'];
                                       $righs = $sessi['rightcount'];
                                       $cens = $sessi['centercount'];
                                       if ($fifth_right_user != '') {
                                           $hov = 'hover';
                                       } else {
                                           $hov = 'over';
                                       }
                                       ?>    <?php if ($statuss == 'active') { ?> 
                 <form class="form-inline md-form form-sm mt-0" method="post" action="tree.php"><input type="hidden" value="<?php echo $fifth_right_user ?>" name="search"> <button style="border: none; background: none" type="submit" name="subm"><img src="../images/blue.png" alt="Member"></button></form><?php } else if($fifth_right_user != ''){ { ?> <form class="form-inline md-form form-sm mt-0" method="post" action="tree.php"><input type="hidden" value="<?php echo $fifth_right_user ?>" name="search"> <button style="border: none; background: none" type="submit" name="subm"><img src="../images/orange.png" alt="Member"></button></form><?php } } else{ ?><button onclick="location.href='<?php if ($second_left_user != '') { echo 'join.php?side=right&upline=' . $second_left_user;}?>'" style="border: none; background: none" type="button"><img src="../images/orange.png" alt="Member"></button><?php }?>
                                       <div class="member-details">
                                                        <h5><?php echo $fifth_right_user ?> </h5>
                                                        <div class="card" id="<?php echo $hov ?>" style="">
      
      <div class="card-body">
        
            <span style="font-size: 15px;">
       <strong> Name:  </strong> &nbsp<?php echo $name ?> &nbsp&nbsp||  &nbsp&nbsp <strong>Joining Date     :</strong>&nbsp   <?php echo $datea ?><br />
<strong>Package: </strong> &nbspRs.<?php echo $packagea ?> &nbsp&nbsp||  &nbsp&nbsp<strong>Left Active Members    :<?php echo $lefs ?> Members</strong>&nbsp<br />
<strong>Right Active Members   :<?php echo $righs ?> Members</strong> &nbsp&nbsp
</span>

      </div>
    </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                                        
                                  
                                    
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="member-view-box">
                                                <div class="member-image">
                                                   
                                       <?php
                                       $quary = mysqli_query($con, "select * from user where email='$second_right_user'");
                                       $resltfl = mysqli_fetch_array($quary);
                                       $name = $resltfl['name'];
                                       $datea = $resltfl['date'];
                                       $packagea = $resltfl['package'];
                                       $statuss = $resltfl['status'];
                                       $ses = mysqli_query($con, "select * from tree where userid='$second_right_user'");
                                       $sessi = mysqli_fetch_array($ses);
                                       $lefs = $sessi['leftcount'];
                                       $righs = $sessi['rightcount'];
                                       $cens = $sessi['centercount'];
                                       if ($second_right_user != '') {
                                           $hov = 'hover';
                                       } else {
                                           $hov = 'over';
                                       }
                                       ?>                        <?php if ($statuss == 'active') { ?> 
                <form class="form-inline md-form form-sm mt-0" method="post" action="tree.php"><input type="hidden" value="<?php echo $second_right_user ?>" name="search"> <button style="border: none; background: none" type="submit" name="subm"><img src="../images/blue.png" alt="Member"></button></form><?php } else if($second_right_user != ''){ { ?> <form class="form-inline md-form form-sm mt-0" method="post" action="tree.php"><input type="hidden" value="<?php echo $second_right_user ?>" name="search"> <button style="border: none; background: none" type="submit" name="subm"><img src="../images/orange.png" alt="Member"></button></form><?php } } else{ ?><button onclick="location.href='<?php if ($first_left_user != '') { echo 'join.php?side=right&upline=' . $first_left_user;}?>'" style="border: none; background: none" type="button"><img src="../images/orange.png" alt="Member"></button><?php }?>
                                       <div class="member-details">
                                                                          <h5><?php echo $second_right_user ?> </h5>
                                                                          <div class="card" id="<?php echo $hov ?>" style="">
      
      <div class="card-body">
        
            <span style="font-size: 15px;">
       <strong> Name:  </strong> &nbsp<?php echo $name ?> &nbsp&nbsp||  &nbsp&nbsp <strong>Joining Date     :</strong>&nbsp   <?php echo $datea ?><br />
<strong>Package: </strong> &nbspRs.<?php echo $packagea ?> &nbsp&nbsp||  &nbsp&nbsp<strong>Left Active Members    :<?php echo $lefs ?> Members</strong>&nbsp<br />
<strong>Right Active Members   :<?php echo $righs ?> Members</strong> &nbsp&nbsp
</span>

      </div>
    </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                        <ul>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="member-view-box">
                                                <div class="member-image">
                                                   
                                       <?php
                                       $quary = mysqli_query($con, "select * from user where email='$seventh_left_user'");
                                       $resltfl = mysqli_fetch_array($quary);
                                       $name = $resltfl['name'];
                                       $datea = $resltfl['date'];
                                       $packagea = $resltfl['package'];
                                       $statuss = $resltfl['status'];
                                       $ses = mysqli_query($con, "select * from tree where userid='$seventh_left_user'");
                                       $sessi = mysqli_fetch_array($ses);
                                       $lefs = $sessi['leftcount'];
                                       $righs = $sessi['rightcount'];
                                       $cens = $sessi['centercount'];
                                       if ($seventh_left_user != '') {
                                           $hov = 'hover';
                                       } else {
                                           $hov = 'over';
                                       }
                                       ?>                                      <?php if ($statuss == 'active') { ?> 
                 <form class="form-inline md-form form-sm mt-0" method="post" action="tree.php"><input type="hidden" value="<?php echo $seventh_left_user ?>" name="search"> <button style="border: none; background: none" type="submit" name="subm"><img src="../images/blue.png" alt="Member"></button></form><?php } else if($seventh_left_user != ''){ { ?> <form class="form-inline md-form form-sm mt-0" method="post" action="tree.php"><input type="hidden" value="<?php echo $seventh_left_user ?>" name="search"> <button style="border: none; background: none" type="submit" name="subm"><img src="../images/orange.png" alt="Member"></button></form><?php } } else{ ?><button onclick="location.href='<?php if ($second_right_user != '') { echo 'join.php?side=left&upline=' . $second_right_user;}?>'" style="border: none; background: none" type="button"><img src="../images/orange.png" alt="Member"></button><?php }?>
                                       <div class="member-details">
                                                           <h5><?php echo $seventh_left_user ?> </h5>
                                                           <div class="card" id="<?php echo $hov ?>" style="">
      
      <div class="card-body">
        
            <span style="font-size: 15px;">
       <strong> Name:  </strong> &nbsp<?php echo $name ?> &nbsp&nbsp||  &nbsp&nbsp <strong>Joining Date     :</strong>&nbsp   <?php echo $datea ?><br />
<strong>Package: </strong> &nbspRs.<?php echo $packagea ?> &nbsp&nbsp||  &nbsp&nbsp<strong>Left Active Members    :<?php echo $lefs ?> Members</strong>&nbsp<br />
<strong>Right Active Members   :<?php echo $righs ?> Members</strong> &nbsp&nbsp
</span>

      </div>
    </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                        
                                        <a href="javascript:void(0);">
                                            <div class="member-view-box">
                                                <div class="member-image">
                                                   
                                       <?php
                                       $quary = mysqli_query($con, "select * from user where email='$seventh_right_user'");
                                       $resltfl = mysqli_fetch_array($quary);
                                       $name = $resltfl['name'];
                                       $datea = $resltfl['date'];
                                       $packagea = $resltfl['package'];
                                       $statuss = $resltfl['status'];
                                       $ses = mysqli_query($con, "select * from tree where userid='$seventh_right_user'");
                                       $sessi = mysqli_fetch_array($ses);
                                       $lefs = $sessi['leftcount'];
                                       $righs = $sessi['rightcount'];
                                       $cens = $sessi['centercount'];
                                       if ($seventh_right_user != '') {
                                           $hov = 'hover';
                                       } else {
                                           $hov = 'over';
                                       }
                                       ?>                                       <?php if ($statuss == 'active') { ?> 
                 <form class="form-inline md-form form-sm mt-0" method="post" action="tree.php"><input type="hidden" value="<?php echo $seventh_right_user ?>" name="search"> <button style="border: none; background: none" type="submit" name="subm"><img src="../images/blue.png" alt="Member"></button></form><?php } else if($seventh_right_user != ''){ { ?> <form class="form-inline md-form form-sm mt-0" method="post" action="tree.php"><input type="hidden" value="<?php echo $seventh_right_user ?>" name="search"> <button style="border: none; background: none" type="submit" name="subm"><img src="../images/orange.png" alt="Member"></button></form><?php } } else{ ?><button onclick="location.href='<?php if ($second_right_user != '') { echo 'join.php?side=right&upline=' . $second_right_user;}?>'" style="border: none; background: none" type="button"><img src="../images/orange.png" alt="Member"></button><?php }?>
                                       <div class="member-details">
                                                        <h5><?php echo $seventh_right_user ?> </h5>
                                                        <div class="card" id="<?php echo $hov ?>" style="">
      
      <div class="card-body">
        
            <span style="font-size: 15px;">
       <strong> Name:  </strong> &nbsp<?php echo $name ?> &nbsp&nbsp||  &nbsp&nbsp <strong>Joining Date     :</strong>&nbsp   <?php echo $datea ?><br />
<strong>Package: </strong> &nbspRs.<?php echo $packagea ?> &nbsp&nbsp||  &nbsp&nbsp<strong>Left Active Members    :<?php echo $lefs ?> Members</strong>&nbsp<br />
<strong>Right Active Members   :<?php echo $righs ?> Members</strong> &nbsp&nbsp
</span>

      </div>
    </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                                    </li>
                                </ul>
                            </li>
                        </li>
                            
                            <li>
                                <a href="javascript:void(0);">
                                    <div class="member-view-box">
                                        <div class="member-image">
                                           
                                       <?php
                                       $quary = mysqli_query($con, "select * from user where email='$first_right_user'");
                                       $resltfl = mysqli_fetch_array($quary);
                                       $name = $resltfl['name'];
                                       $datea = $resltfl['date'];
                                       $packagea = $resltfl['package'];
                                       $statuss = $resltfl['status'];
                                       $ses = mysqli_query($con, "select * from tree where userid='$first_right_user'");
                                       $sessi = mysqli_fetch_array($ses);
                                       $lefs = $sessi['leftcount'];
                                       $righs = $sessi['rightcount'];
                                       $cens = $sessi['centercount'];
                                       if ($first_right_user != '') {
                                           $hov = 'hover';
                                       } else {
                                           $hov = 'over';
                                       }
                                       ?>                <?php if ($statuss == 'active') { ?> 
                 <form class="form-inline md-form form-sm mt-0" method="post" action="tree.php"><input type="hidden" value="<?php echo $first_right_user ?>" name="search"> <button style="border: none; background: none" type="submit" name="subm"><img src="../images/blue.png" alt="Member"></button></form><?php } else if($first_right_user != ''){ { ?> <form class="form-inline md-form form-sm mt-0" method="post" action="tree.php"><input type="hidden" value="<?php echo $first_right_user ?>" name="search"> <button style="border: none; background: none" type="submit" name="subm"><img src="../images/orange.png" alt="Member"></button></form><?php } } else{ ?><button onclick="location.href='<?php if ($search != '') { echo 'join.php?side=right&upline=' . $search;}?>'" style="border: none; background: none" type="button"><img src="../images/orange.png" alt="Member"></button><?php }?>
                                       <div class="member-details">
                                <h5><?php echo $first_right_user ?> </h5>
                                <div class="card" id="<?php echo $hov ?>" style="">
      
      <div class="card-body">
        
            <span style="font-size: 15px;">
       <strong> Name:  </strong> &nbsp<?php echo $name ?> &nbsp&nbsp||  &nbsp&nbsp <strong>Joining Date     :</strong>&nbsp   <?php echo $datea ?><br />
<strong>Package: </strong> &nbspRs.<?php echo $packagea ?> &nbsp&nbsp||  &nbsp&nbsp<strong>Left Active Members    :<?php echo $lefs ?> Members</strong>&nbsp<br />
<strong>Right Active Members   :<?php echo $righs ?> Members</strong> &nbsp&nbsp
</span>

      </div>
    </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                              <ul>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="member-view-box">
                                                <div class="member-image">
                                                  
                                       <?php
                                       $quary = mysqli_query($con, "select * from user where email='$fourth_left_user'");
                                       $resltfl = mysqli_fetch_array($quary);
                                       $name = $resltfl['name'];
                                       $datea = $resltfl['date'];
                                       $packagea = $resltfl['package'];
                                       $statuss = $resltfl['status'];
                                       $ses = mysqli_query($con, "select * from tree where userid='$fourth_left_user'");
                                       $sessi = mysqli_fetch_array($ses);
                                       $lefs = $sessi['leftcount'];
                                       $righs = $sessi['rightcount'];
                                       $cens = $sessi['centercount'];
                                       if ($fourth_left_user != '') {
                                           $hov = 'hover';
                                       } else {
                                           $hov = 'over';
                                       }
                                       ?>                                        <?php if ($statuss == 'active') { ?> 
                 <form class="form-inline md-form form-sm mt-0" method="post" action="tree.php"><input type="hidden" value="<?php echo $fourth_left_user ?>" name="search"> <button style="border: none; background: none" type="submit" name="subm"><img src="../images/blue.png" alt="Member"></button></form><?php } else if($fourth_left_user != ''){ { ?> <form class="form-inline md-form form-sm mt-0" method="post" action="tree.php"><input type="hidden" value="<?php echo $fourth_left_user ?>" name="search"> <button style="border: none; background: none" type="submit" name="subm"><img src="../images/orange.png" alt="Member"></button></form><?php } } else{ ?><button onclick="location.href='<?php if ($first_right_user != '') { echo 'join.php?side=left&upline=' . $first_right_user;}?>'" style="border: none; background: none" type="button"><img src="../images/orange.png" alt="Member"></button><?php }?>
                                       <div class="member-details">
               <h5><?php echo $fourth_left_user ?> </h5>
               <div class="card" id="<?php echo $hov ?>" style="">
      
      <div class="card-body">
        
            <span style="font-size: 15px;">
       <strong> Name:  </strong> &nbsp<?php echo $name ?> &nbsp&nbsp||  &nbsp&nbsp <strong>Joining Date     :</strong>&nbsp   <?php echo $datea ?><br />
<strong>Package: </strong> &nbspRs.<?php echo $packagea ?> &nbsp&nbsp||  &nbsp&nbsp<strong>Left Active Members    :<?php echo $lefs ?> Members</strong>&nbsp<br />
<strong>Right Active Members   :<?php echo $righs ?> Members</strong> &nbsp&nbsp
</span>

      </div>
    </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    <ul>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="member-view-box">
                                                <div class="member-image">
                                                   
                                       <?php
                                       $quary = mysqli_query($con, "select * from user where email='$eleven_left_user'");
                                       $resltfl = mysqli_fetch_array($quary);
                                       $name = $resltfl['name'];
                                       $datea = $resltfl['date'];
                                       $packagea = $resltfl['package'];
                                       $statuss = $resltfl['status'];
                                       $ses = mysqli_query($con, "select * from tree where userid='$eleven_left_user'");
                                       $sessi = mysqli_fetch_array($ses);
                                       $lefs = $sessi['leftcount'];
                                       $righs = $sessi['rightcount'];
                                       $cens = $sessi['centercount'];
                                       if ($eleven_left_user != '') {
                                           $hov = 'hover';
                                       } else {
                                           $hov = 'over';
                                       }
                                       ?>                            <?php if ($statuss == 'active') { ?> 
                 <form class="form-inline md-form form-sm mt-0" method="post" action="tree.php"><input type="hidden" value="<?php echo $eleven_left_user ?>" name="search"> <button style="border: none; background: none" type="submit" name="subm"><img src="../images/blue.png" alt="Member"></button></form><?php } else if($eleven_left_user != ''){ { ?> <form class="form-inline md-form form-sm mt-0" method="post" action="tree.php"><input type="hidden" value="<?php echo $eleven_left_user ?>" name="search"> <button style="border: none; background: none" type="submit" name="subm"><img src="../images/orange.png" alt="Member"></button></form><?php } } else{ ?><button onclick="location.href='<?php if ($fourth_left_user != '') { echo 'join.php?side=left&upline=' . $fourth_left_user;}?>'" style="border: none; background: none" type="button"><img src="../images/orange.png" alt="Member"></button><?php }?>
                                       <div class="member-details">
                            <h5><?php echo $eleven_left_user ?> </h5>
                            <div class="card" id="<?php echo $hov ?>" style="">
      
      <div class="card-body">
        
            <span style="font-size: 15px;">
       <strong> Name:  </strong> &nbsp<?php echo $name ?> &nbsp&nbsp||  &nbsp&nbsp <strong>Joining Date     :</strong>&nbsp   <?php echo $datea ?><br />
<strong>Package: </strong> &nbspRs.<?php echo $packagea ?> &nbsp&nbsp||  &nbsp&nbsp<strong>Left Active Members    :<?php echo $lefs ?> Members</strong>&nbsp<br />
<strong>Right Active Members   :<?php echo $righs ?> Members</strong> &nbsp&nbsp
</span>

      </div>
    </div> 
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                       
                                        <a href="javascript:void(0);">
                                            <div class="member-view-box">
                                                <div class="member-image">
                                                  
                                       <?php
                                       $quary = mysqli_query($con, "select * from user where email='$eleven_right_user'");
                                       $resltfl = mysqli_fetch_array($quary);
                                       $name = $resltfl['name'];
                                       $datea = $resltfl['date'];
                                       $packagea = $resltfl['package'];
                                       $statuss = $resltfl['status'];
                                       $ses = mysqli_query($con, "select * from tree where userid='$eleven_right_user'");
                                       $sessi = mysqli_fetch_array($ses);
                                       $lefs = $sessi['leftcount'];
                                       $righs = $sessi['rightcount'];
                                       $cens = $sessi['centercount'];
                                       if ($eleven_right_user != '') {
                                           $hov = 'hover';
                                       } else {
                                           $hov = 'over';
                                       }
                                       ?>                              <?php if ($statuss == 'active') { ?> 
                 <form class="form-inline md-form form-sm mt-0" method="post" action="tree.php"><input type="hidden" value="<?php echo $eleven_right_user ?>" name="search"> <button style="border: none; background: none" type="submit" name="subm"><img src="../images/blue.png" alt="Member"></button></form><?php } else if($eleven_right_user != ''){ { ?> <form class="form-inline md-form form-sm mt-0" method="post" action="tree.php"><input type="hidden" value="<?php echo $eleven_right_user ?>" name="search"> <button style="border: none; background: none" type="submit" name="subm"><img src="../images/orange.png" alt="Member"></button></form><?php } } else{ ?><button onclick="location.href='<?php if ($fourth_left_user != '') { echo 'join.php?side=right&upline=' . $fourth_left_user;}?>'" style="border: none; background: none" type="button"><img src="../images/orange.png" alt="Member"></button><?php }?>
                                       <div class="member-details">
                          <h5><?php echo $eleven_right_user ?> </h5>
                          <div class="card" id="<?php echo $hov ?>" style="">
      
      <div class="card-body">
        
            <span style="font-size: 15px;">
       <strong> Name:  </strong> &nbsp<?php echo $name ?> &nbsp&nbsp||  &nbsp&nbsp <strong>Joining Date     :</strong>&nbsp   <?php echo $datea ?><br />
<strong>Package: </strong> &nbspRs.<?php echo $packagea ?> &nbsp&nbsp||  &nbsp&nbsp<strong>Left Active Members    :<?php echo $lefs ?> Members</strong>&nbsp<br />
<strong>Right Active Members   :<?php echo $righs ?> Members</strong> &nbsp&nbsp
</span>

      </div>
    </div> 
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                                
                                        
                                    
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="member-view-box">
                                                <div class="member-image">
                                                   
                                       <?php
                                       $quary = mysqli_query($con, "select * from user where email='$fourth_right_user'");
                                       $resltfl = mysqli_fetch_array($quary);
                                       $name = $resltfl['name'];
                                       $datea = $resltfl['date'];
                                       $packagea = $resltfl['package'];
                                       $statuss = $resltfl['status'];
                                       $ses = mysqli_query($con, "select * from tree where userid='$fourth_right_user'");
                                       $sessi = mysqli_fetch_array($ses);
                                       $lefs = $sessi['leftcount'];
                                       $righs = $sessi['rightcount'];
                                       $cens = $sessi['centercount'];
                                       if ($fourth_right_user != '') {
                                           $hov = 'hover';
                                       } else {
                                           $hov = 'over';
                                       }
                                       ?>                                       <?php if ($statuss == 'active') { ?> 
                 <form class="form-inline md-form form-sm mt-0" method="post" action="tree.php"><input type="hidden" value="<?php echo $fourth_right_user ?>" name="search"> <button style="border: none; background: none" type="submit" name="subm"><img src="../images/blue.png" alt="Member"></button></form><?php } else if($fourth_right_user != ''){ { ?> <form class="form-inline md-form form-sm mt-0" method="post" action="tree.php"><input type="hidden" value="<?php echo $fourth_right_user ?>" name="search"> <button style="border: none; background: none" type="submit" name="subm"><img src="../images/orange.png" alt="Member"></button></form><?php } } else{ ?><button onclick="location.href='<?php if ($first_right_user != '') { echo 'join.php?side=right&upline=' . $first_right_user;}?>'" style="border: none; background: none" type="button"><img src="../images/orange.png" alt="Member"></button><?php }?>
                                       <div class="member-details">
                <h5><?php echo $fourth_right_user ?> </h5>
                <div class="card" id="<?php echo $hov ?>" style="">
      
      <div class="card-body">
        
            <span style="font-size: 15px;">
       <strong> Name:  </strong> &nbsp<?php echo $name ?> &nbsp&nbsp||  &nbsp&nbsp <strong>Joining Date     :</strong>&nbsp   <?php echo $datea ?><br />
<strong>Package: </strong> &nbspRs.<?php echo $packagea ?> &nbsp&nbsp||  &nbsp&nbsp<strong>Left Active Members    :<?php echo $lefs ?> Members</strong>&nbsp<br />
<strong>Right Active Members   :<?php echo $righs ?> Members</strong> &nbsp&nbsp
</span>

      </div>
    </div>  
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    <ul>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="member-view-box">
                                                <div class="member-image">
                                                    
                                       <?php
                                       $quary = mysqli_query($con, "select * from user where email='$thirteen_left_user'");
                                       $resltfl = mysqli_fetch_array($quary);
                                       $name = $resltfl['name'];
                                       $datea = $resltfl['date'];
                                       $packagea = $resltfl['package'];
                                       $statuss = $resltfl['status'];
                                       $ses = mysqli_query($con, "select * from tree where userid='$thirteen_left_user'");
                                       $sessi = mysqli_fetch_array($ses);
                                       $lefs = $sessi['leftcount'];
                                       $righs = $sessi['rightcount'];
                                       $cens = $sessi['centercount'];
                                       if ($thirteen_left_user != '') {
                                           $hov = 'hover';
                                       } else {
                                           $hov = 'over';
                                       }
                                       ?>                                                     <?php if ($statuss == 'active') { ?> 
                <form class="form-inline md-form form-sm mt-0" method="post" action="tree.php"><input type="hidden" value="<?php echo $thirteen_left_user ?>" name="search"> <button style="border: none; background: none" type="submit" name="subm"><img src="../images/blue.png" alt="Member"></button></form><?php } else if($thirteen_left_user != ''){ { ?> <form class="form-inline md-form form-sm mt-0" method="post" action="tree.php"><input type="hidden" value="<?php echo $thirteen_left_user ?>" name="search"> <button style="border: none; background: none" type="submit" name="subm"><img src="../images/orange.png" alt="Member"></button></form><?php } } else{ ?><button onclick="location.href='<?php if ($fourth_right_user != '') { echo 'join.php?side=left&upline=' . $fourth_right_user;}?>'" style="border: none; background: none" type="button"><img src="../images/orange.png" alt="Member"></button><?php }?>
                                       <div class="member-details">
  <h5><?php echo $thirteen_left_user ?> </h5>
  <div class="card" id="<?php echo $hov ?>" style="">
      
      <div class="card-body">
        
            <span style="font-size: 15px;">
       <strong> Name:  </strong> &nbsp<?php echo $name ?> &nbsp&nbsp||  &nbsp&nbsp <strong>Joining Date     :</strong>&nbsp   <?php echo $datea ?><br />
<strong>Package: </strong> &nbspRs.<?php echo $packagea ?> &nbsp&nbsp||  &nbsp&nbsp<strong>Left Active Members    :<?php echo $lefs ?> Members</strong>&nbsp<br />
<strong>Right Active Members   :<?php echo $righs ?> Members</strong> &nbsp&nbsp
</span>

      </div>
    </div>            
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                        
                                        <a href="javascript:void(0);">
                                            <div class="member-view-box">
                                                <div class="member-image">
                                                  
                                       <?php
                                       $quary = mysqli_query($con, "select * from user where email='$thirteen_right_user'");
                                       $resltfl = mysqli_fetch_array($quary);
                                       $name = $resltfl['name'];
                                       $datea = $resltfl['date'];
                                       $packagea = $resltfl['package'];
                                       $statuss = $resltfl['status'];
                                       $ses = mysqli_query($con, "select * from tree where userid='$thirteen_right_user'");
                                       $sessi = mysqli_fetch_array($ses);
                                       $lefs = $sessi['leftcount'];
                                       $righs = $sessi['rightcount'];
                                       $cens = $sessi['centercount'];
                                       if ($thirteen_right_user != '') {
                                           $hov = 'hover';
                                       } else {
                                           $hov = 'over';
                                       }
                                       ?>                                                    <?php if ($statuss == 'active') { ?> 
                 <form class="form-inline md-form form-sm mt-0" method="post" action="tree.php"><input type="hidden" value="<?php echo $thirteen_right_user ?>" name="search"> <button style="border: none; background: none" type="submit" name="subm"><img src="../images/blue.png" alt="Member"></button></form><?php } else if($thirteen_right_user != ''){ { ?> <form class="form-inline md-form form-sm mt-0" method="post" action="tree.php"><input type="hidden" value="<?php echo $thirteen_right_user ?>" name="search"> <button style="border: none; background: none" type="submit" name="subm"><img src="../images/orange.png" alt="Member"></button></form><?php } } else{ ?><button onclick="location.href='<?php if ($fourth_right_user != '') { echo 'join.php?side=right&upline=' . $fourth_right_user;}?>'" style="border: none; background: none" type="button"><img src="../images/orange.png" alt="Member"></button><?php }?>
                                       <div class="member-details">
    <h5><?php echo $thirteen_right_user ?> </h5>
    <div class="card" id="<?php echo $hov ?>" style="">
      
      <div class="card-body">
        
            <span style="font-size: 15px;">
       <strong> Name:  </strong> &nbsp<?php echo $name ?> &nbsp&nbsp||  &nbsp&nbsp <strong>Joining Date     :</strong>&nbsp   <?php echo $datea ?><br />
<strong>Package: </strong> &nbspRs.<?php echo $packagea ?> &nbsp&nbsp||  &nbsp&nbsp<strong>Left Active Members    :<?php echo $lefs ?> Members</strong>&nbsp<br />
<strong>Right Active Members   :<?php echo $righs ?> Members</strong> &nbsp&nbsp
</span>

      </div>
    </div>        
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                                </ul>
                            </li>

                        </ul>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>
    <?php include('flinks.php'); ?>