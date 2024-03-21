<?php include('menu.php');
$sql = mysqli_query($con, "select * from income where userid='$userid'");
$rw = mysqli_fetch_array($sql);
$total = $rw['total_bal'];
if (isset($_POST["add"])) {
	
	$dcst = $_POST['dcst'];
	$amt = $_POST['amt'];
	
	$img_file = $_FILES["img_file"]["name"];
	$folderName = "Transaction/";
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
				$sql = mysqli_query($con, "INSERT INTO `transaction` (`id`, `userid`, `amount`, `transaction`, `image`) VALUES (NULL, '$userid', '$amt', '$dcst', '$filePath');");
				echo '<script>window.location.assign("home.php");</script>';
			}
			
		}
	}
	
}
?>

<section class="content">
        <div class="container-fluid">


        	<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header bg-light-blue">
                            <h2>
                                Add Money to Wallet 
                            </h2>
                          
                        </div>
                        <div class="body">
                            <form method="post" action="" name="f" enctype="multipart/form-data" >
                            	<h3>Wallet balance  :  Rs.<?php echo $total;?></h3>
                            <label class="">Amount to add in Wallet</label>
                            <input type="text" name="amt" class="form-control"></br>
                            <label class="">Transaction Number</label>
                            <input type="text" name="dcst" class="form-control"></br>
                            <label class="">Transaction Picture</label>
                            <input type="file" name="img_file" class="form-control"></br>

                            <button type="submit" name="add" class="form-control btn-success">Add</button>
                        </form>
                        </div>
                    </div>
                </div>
<?php include('flinks.php');?>