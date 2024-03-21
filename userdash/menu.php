<?php include('php-includes/check-login.php'); ?>
<?php
error_reporting(E_ALL ^ E_NOTICE);
include('php-includes/connect.php');

$userid = $_SESSION['userid'];
$qry = mysqli_query($con, "select * from user where email = '$userid'");
$rws = mysqli_fetch_array($qry);
$name = $rws['name'];
$mobile = $rws['mobile'];
$date = $rws['date'];
$address = $rws['address'];
$account = $rws['account'];
$under = $rws['under_userid'];
$side = $rws['side'];
$package = $rws['package'];
$statusrds = $rws['status'];
$password = $rws['password'];

$qryy = mysqli_query($con, "SELECT * FROM `comments` where userid = '$userid' and status='1'");
$array = array();
while ($rwss = mysqli_fetch_array($qryy)) {

    $notif = $rwss['notif'];
    $status = $rwss['status'];
    $style = $rwss['style'];
    $id = $rwss['comment_id'];
}

$s = mysqli_query($con, "SELECT * FROM user where email='$userid'");
$sc = mysqli_fetch_array($s);
$sts = $sc['status'];
if ($sts == 'inactive') {
    $clr = 'red';
    echo '<script>
  $(document).ready(function(){
    $("#myModal").modal("show");
  });
</script>';
    $dis = 'none';
} else {
    $clr = 'green';
}


$sql = "SELECT * FROM files";
$result = mysqli_query($con, $sql);

$files = mysqli_fetch_array($result, MYSQLI_ASSOC);
if (isset($_GET['file_id'])) {
    $id = $_GET['file_id'];

    // fetch file to download from database
    $sql = "SELECT * FROM files WHERE id=$id";
    $result = mysqli_query($con, $sql);

    $file = mysqli_fetch_assoc($result);
    $filepath = 'uploads/' . $file['name'];

    if (file_exists($filepath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($filepath));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize('uploads/' . $file['name']));
        readfile('uploads/' . $file['name']);
        echo '<script>window.location.assign("home.php");</script>';
        // Now update downloads count
        $newCount = $file['downloads'] + 1;
        $updateQuery = "UPDATE files SET downloads=$newCount WHERE id=$id";
        mysqli_query($con, $updateQuery);

    }

}
?>



<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Akshaya</title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">
 <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet"
        type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="dplugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="dplugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="dplugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Morris Chart Css-->
    <link href="dplugins/morrisjs/morris.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="dcss/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="dcss/themes/all-themes.css" rel="stylesheet" />
</head>

<body class="theme-light-blue">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->
    <!--   <div class="search-bar">
      <div class="search-icon">
          <i class="material-icons">search</i>
      </div>
      <input type="text" placeholder="START TYPING...">
      <div class="close-search">
          <i class="material-icons">close</i>
      </div>
  </div> -->
    <!-- #END# Search Bar -->
    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                &emsp; &emsp;<img src="../images/logodark.png" style="width: 50px;" /><br />
                <!-- <a class="navbar-brand" href="home.php">ZeroZilla</a> -->
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <!-- Call Search -->
                    <!-- <li><a href="javascript:void(0);" class="js-search" data-close="true"><i class="material-icons">search</i></a></li> -->
                    <!-- #END# Call Search -->
                    <!-- Notifications -->
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                            <i class="material-icons">notifications</i>
                            <span class="label-count">
                                <?php
                                $i = 1;
                                $ury = mysqli_query($con, "SELECT * FROM `comments` where userid = '$userid' and status='1' order by comment_id desc");
                                echo mysqli_num_rows($ury); ?>
                            </span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">NOTIFICATIONS</li>
                            <li class="body">
                                <ul class="menu">
                                    <?php
                                    $i = 1;
                                    $qury = mysqli_query($con, "SELECT * FROM `comments` where userid = '$userid' and status='1' order by comment_id desc limit 6 ");


                                    while ($row = mysqli_fetch_array($qury)) {
                                        $noti = $row['notif'];
                                        $usern = $userid;
                                        ?>
                                        <li>
                                            <a href="javascript:void(0);">

                                                <div class="menu-info">
                                                    <h4>
                                                        <?php echo $noti ?>
                                                    </h4>
                                                    <p>
                                                        <i class="material-icons">access_time</i> 4 hours ago
                                                    </p>
                                                </div>
                                            </a>
                                        </li>
                                        <?php
                                        $i++;
                                    }

                                    ?>
                                </ul>
                            </li>
                            <li class="footer">
                                <a href="#">View All Notifications</a>
                            </li>
                        </ul>
                    </li>
                    <!-- #END# Notifications -->
                    <!-- Tasks -->
                    <li class="dropdown">
                        <a href="logout.php" role="button">
                            <i class="material-icons">logout</i>
                            <span class="label-count"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">TASKS</li>
                            <li class="body">
                                <ul class="menu tasks">
                                    <li>
                                        <a href="javascript:void(0);">
                                            <h4>
                                                Footer display issue
                                                <small>32%</small>
                                            </h4>
                                            <div class="progress">
                                                <div class="progress-bar bg-pink" role="progressbar" aria-valuenow="85"
                                                    aria-valuemin="0" aria-valuemax="100" style="width: 32%">
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <h4>
                                                Make new buttons
                                                <small>45%</small>
                                            </h4>
                                            <div class="progress">
                                                <div class="progress-bar bg-cyan" role="progressbar" aria-valuenow="85"
                                                    aria-valuemin="0" aria-valuemax="100" style="width: 45%">
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <h4>
                                                Create new dashboard
                                                <small>54%</small>
                                            </h4>
                                            <div class="progress">
                                                <div class="progress-bar bg-teal" role="progressbar" aria-valuenow="85"
                                                    aria-valuemin="0" aria-valuemax="100" style="width: 54%">
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <h4>
                                                Solve transition issue
                                                <small>65%</small>
                                            </h4>
                                            <div class="progress">
                                                <div class="progress-bar bg-orange" role="progressbar"
                                                    aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"
                                                    style="width: 65%">
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <h4>
                                                Answer GitHub questions
                                                <small>92%</small>
                                            </h4>
                                            <div class="progress">
                                                <div class="progress-bar bg-purple" role="progressbar"
                                                    aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"
                                                    style="width: 92%">
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="footer">
                                <a href="javascript:void(0);">View All Tasks</a>
                            </li>
                        </ul>
                    </li>
                    <!-- #END# Tasks -->

                </ul>
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">

                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php echo $name ?>
                    </div>
                    <div class="email">
                        <?php echo $userid ?>
                    </div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="profile.php"><i class="material-icons">person</i>Profile</a></li>

                            <li><a href="logout.php"><i class="material-icons">input</i>Sign Out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">MAIN NAVIGATION</li>
                    <li class="">
                        <a href="home.php">
                            <i class="material-icons">home</i>
                            <span>Home</span>
                        </a>
                    </li>
                    <li>
                        <a href="welcome.php">
                            <i class="material-icons">text_fields</i>
                            <span>Welcome Letter</span>
                        </a>
                    </li>
                    <li>
                        <!-- <a href="join.php" style="pointer-events: <?php echo $dis ?>;"> -->
                        <a href="join.php">
                            <i class="material-icons">layers</i>
                            <span>Join User</span>
                        </a>
                    </li>
                    <li>
                        <a href="downloads.php" style="pointer-events: <?php echo $dis ?>;">
                            <i class="material-icons">perm_media</i>
                            <span>Downloads </span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">widgets</i>
                            <span>Profile</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="javascript:void(0);" class="menu-toggle">
                                    <span>View Profile</span>
                                </a>
                                <ul class="ml-menu">
                                    <li>
                                        <a href="profile.php">Basic Info</a>
                                    </li>

                                    <li>
                                        <a href="kyc.php">Kyc</a>
                                    </li>
                                </ul>
                            </li>

                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">swap_calls</i>
                            <span>Geneology</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="tree.php">Tree View</a>
                            </li>
                            <li>
                                <a href="treeActive.php">Topup Tree</a>
                            </li>
                            <li>
                                <a href="downline.php">My Downlines</a>
                            </li>
                            <!-- <li>
                                <a href="#">My Referrals</a>
                            </li> -->


                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle" style="pointer-events: <?php echo $dis ?>;">
                            <i class="material-icons">assignment</i>
                            <span>Payments</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="received.php">Received Payments</a>
                            </li>
                            <li>
                                <a href="balance.php">Balance</a>
                            </li>
                            <li>
                                <a href="invoice.php">Last received Invoice</a>
                            </li>
                            <!-- <li>
                                <a href="amt_wallet.php">Recharge wallet</a>
                            </li> -->
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">view_list</i>
                            <span>Pins</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="v_pins.php">Pin Request</a>
                            </li>
                            <li>
                                <a href="r_pins.php">Available pins</a>
                            </li>
                            <?php if($statusrds != 'active'){ ?>
                            <li>
                                <a href="myProfile.php">Activate My Profile</a>
                            </li>
                            <?php  }?>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; 2022 - 2023 <a href="javascript:void(0);">Akshaya</a>.
                </div>

            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
        <!-- Right Sidebar -->

        <!-- #END# Right Sidebar -->
    </section>