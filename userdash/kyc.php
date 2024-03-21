<?php include('menu.php'); ?>
 <?php


$userid = $_SESSION['userid'];
echo $userid;
$qry = mysqli_query($con,"select * from imgdocs where userid = '$userid'");
$rws = mysqli_fetch_array($qry);
$atype = $rws['type'];
$adocs = $rws['docs'];
$pdocs = $rws['pdocs'];
$a_url = $rws['image_url'];
$p_url = $rws['pimage_url'];
$stsa = $rws['status'];
$rej = 'Rejected';
$pen = 'Pending';
if ($stsa != $pen) {
	if ($stsa != $rej) {
	$buts = 'disabled';
}
}
elseif ($stsa != $rej) {
	if ($stsa != $pen) {
	$buts = 'disabled';
}

}
else
{$buts='';}

//require("libs/config.php");

if (isset($_POST["sq"])) {
	
	$dcst = $_POST['dcst'];
	$type = $_POST['type'];
	echo $dcst.'    '.$type;
	$img_file = $_FILES["img_file"]["name"];
	$folderName = "docs/";
	$validExt = array("jpg", "png", "jpeg", "bmp", "gif");
	
	if ($img_file == "") {
		$msg = errorMessage( "Attach an image");
	} elseif ($_FILES["img_file"]["size"] <= 0 ) {
		$msg = errorMessage( "Image is not proper.");
	} else {
		$ext = strtolower(end(explode(".", $img_file)));
		
		if ( !in_array($ext, $validExt) )  {
			$msg = errorMessage( "Not a valid image file");
		} else {
			$filePath = $folderName.$dcst.'.'.$ext;
			
			if ( move_uploaded_file( $_FILES["img_file"]["tmp_name"], $filePath)) {
				$sql = mysqli_query($con, "update imgdocs set docs = '$dcst', image_url = '$filePath' where userid = '$userid'");
				echo '<script>window.location.assign("home.php");</script>';
			}
			
		}
	}
	
}
if (isset($_POST["s"])) {
	
	$dcs = $_POST['dcs'];
	$types = $_POST['types'];
	echo $dcs.'    '.$type;
	$img_file = $_FILES["picture"]["name"];
	$folderName = "docs/";
	$validExt = array("jpg", "png", "jpeg", "bmp", "gif");
	
	if ($img_file == "") {
		$msg = errorMessage( "Attach an image");
	} elseif ($_FILES["picture"]["size"] <= 0 ) {
		$msg = errorMessage( "Image is not proper.");
	} else {
		$ext = strtolower(end(explode(".", $img_file)));
		
		if ( !in_array($ext, $validExt) )  {
			$msg = errorMessage( "Not a valid image file");
		} else {
			$filePath = $folderName. $dcs.'.'.$ext;
			
			if ( move_uploaded_file( $_FILES["picture"]["tmp_name"], $filePath)) {
				$sql = mysqli_query($con, "update imgdocs set pdocs = '$dcs', pimage_url = '$filePath' where userid = '$userid'");
				echo '<script>window.location.assign("home.php");</script>';
			}
			
		}
	}
}

if (isset($_POST["verify"])) {
	$sql = mysqli_query($con, "update imgdocs set status = 'Waiting' where userid = '$userid'");
	 echo '<script type="text/javascript">';
  echo 'setTimeout(function () { swal("Requested!","Requested for approval!","success");';
  echo '}, 1000);</script>';
}
?>
     <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
    <link href="dplugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="dplugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="dplugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Sweet Alert Css -->
    <link href="dplugins/sweetalert/sweetalert.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="dcss/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="dcss/themes/all-themes.css" rel="stylesheet" />
    <section class="content">
        <div class="container-fluid">


<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>Upload Document</h2><a class="icon" href="home.php">
                            <i class="material-icons">home</i></a>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div id="wizard_horizontal">
                                <h2>First Step</h2>
                                <section>
                                    <form method="post" action="" name="f" enctype="multipart/form-data" onSubmit="return validateImages();" >
		<div class="gaps-2x"></div>
		<h5 class="font-mid"><h3>Upload Aadhar card</h3></h5>
		<div class="row align-items-center">
			<div class="col-sm-8"><div class="upload-box">
				<div class="upload-zone">
			<div class="dz-message" data-dz-message>
				<span class="dz-message-text">Drag and drop file</span>
				<span class="dz-message-or">or</span>
				<input type="text" name="dcst"required placeholder="Document number" value="<?php echo $adocs.$filepath ?>"></br><br /><input type="file" name="img_file" id="img_file" />
            <br>
            Only jpg, jpeg, png, gif, bmp files allowed
				<button <?php echo $buts?> class="btn btn-primary" type="submit" name='sq'>UPLOAD</button>
			</div>
		</div></div></div></form>
		<div class="mx-md-4">
			<img src="<?php echo $a_url?>" alt="Upoaded image here" width=30%></div>
                                </section>

                                <h2>Second Step</h2>
                                <section>
                                    <form method="post" action="" name="f" enctype="multipart/form-data" onSubmit="return validateImage();" >
			<h5 class="font-mid"><h3>Upload here PAN Card</h3></h5>
			<div class="row align-items-center">
				<div class="col-sm-8">
			<div class="upload-box">
				<div class="upload-zone">
			<div class="dz-message" data-dz-message>
		<span class="dz-message-text">Drag and drop file</span>
		<span class="dz-message-or">or</span>
		
		<input type="text" name="dcs"required placeholder="Document number" value="<?php echo $pdocs ?>"></br>
		</br><input type="file" name="picture" id="picture" />
            <br>
            Only jpg, jpeg, png, gif, bmp files allowed
		<button class="btn btn-primary" <?php echo $buts?> type="submit" name='s'>Upload</button></div></div></div></div></form>
		<div class="mx-md-4">
			<img src="<?php echo $p_url?>" alt="Upoaded image here" width=30%></div>
                                </section>

                                <h2>Third Step</h2>
                                <section>
                                	<form method="post" action="">
		<div class="form-step-fields card-innr">

			<div class="input-item">
				<input class="input-checkbox input-checkbox-md" id="term-condition" type="checkbox">
				<label for="term-condition">I have read the <a href="#">Terms of Condition</a> and <a href="#">Privary Policy.</a></label></div>

		<div class="input-item">
			<input class="input-checkbox input-checkbox-md" id="info-currect" type="checkbox">

			<label for="info-currect">All the personal information I have entered is correct.</label></div>

			<div class="gaps-1x"></div>
			<button class="btn btn-primary" <?php echo $buts?> name="verify">Process for Verify</button>
			</div>
</form>
                                	
                                </section>

                                <h2>Forth Step</h2>
                                <section>
                                   <div class="body">
                                   	<span style="font-size: 200%" class="label label-info">Thank you! your documents Succefully submitted for processing</span>
                                   </div>
                                </section>
                            </div>
                        </div>
                    </div>
                </div>
            </div>











      <script src="dplugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="dplugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="dplugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="dplugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Jquery Validation Plugin Css -->
    <script src="dplugins/jquery-validation/jquery.validate.js"></script>

    <!-- JQuery Steps Plugin Js -->
    <script src="dplugins/jquery-steps/jquery.steps.js"></script>

    <!-- Sweet Alert Plugin Js -->
    <script src="dplugins/sweetalert/sweetalert.min.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="dplugins/node-waves/waves.js"></script>

    <!-- Custom Js -->
    <script src="djs/admin.js"></script>
    <script src="djs/pages/forms/form-wizard.js"></script>

    <!-- Demo Js -->
    <script src="djs/demo.js"></script>