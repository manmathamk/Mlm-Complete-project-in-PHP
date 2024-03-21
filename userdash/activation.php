<?php include('menu.php');
$sgt = mysqli_query($con, "SELECT * FROM activation where userid='$userid'");
$sgtc = mysqli_fetch_array($sgt);
$sgtts = $sgtc['status'];
$saql = mysqli_query($con, "select * from user where email='$userid'");
$raw = mysqli_fetch_array($saql);
$pkgg = $raw['package'];
$sql = mysqli_query($con, "select * from imgdocs where userid='$userid'");
$rw = mysqli_fetch_array($sql);
$sta = $rw['status'];

if($sta == 'Pending'){
 echo '<script>alert("Please Provide KYC Information");window.location.assign("kyc.php");</script>';
}
elseif($sta == 'Waiting'){
 echo '<script>alert("Your KYC is Waiting For Approval! Please try after some time");</script>';
}
elseif($sta == 'Rejected'){
 echo '<script>alert("Your KYC is Rejected! Try after KYC Approval");window.location.assign("kyc.php");</script>';
}
else{

if (isset($_POST['active'])){
    $pkgs = $_POST['package'];


//finding file extention
$profile_pic_name = @$_FILES['profilepic']['name'];
$file_basename = substr($profile_pic_name, 0, strripos($profile_pic_name, '.'));
$file_ext = substr($profile_pic_name, strripos($profile_pic_name, '.'));

if (((@$_FILES['profilepic']['type']=='image/jpeg') || (@$_FILES['profilepic']['type']=='image/png') || (@$_FILES['profilepic']['type']=='image/gif')) && (@$_FILES['profilepic']['size'] < 1000000)) {

    $item = $item;
    if (file_exists("activation/$item")) {
        //nothing
    }else {
        mkdir("activation/$item");
    }
    
    
    $filename = $userid.$file_ext;

    if (file_exists("activation/$item/".$filename)) {
        echo @$_FILES["profilepic"]["name"]."Already exists";
    }else {
        if(move_uploaded_file(@$_FILES["profilepic"]["tmp_name"], "activation/$item/".$filename)){
            $photos = $filename;
            $result = mysqli_query($con, "INSERT INTO `activation` (`id`, `userid`, `package`, `transaction`, `status`) VALUES (NULL, '$userid', '$pkgs', '$photos', 'open');");
            echo '<script>window.location.assign("home.php");</script>';
        }else {
            echo "Something Worng on upload!!!";
        }
        //echo "Uploaded and stored in: userdata/profile_pics/$item/".@$_FILES["profilepic"]["name"];
        
        
    }
    }
    else {
        $error_message = 'Add picture!';
    }
}
}
?>

<section class="content">
        <div class="container-fluid">

<div class="card">
	<form action="" id="frmFileUpload" class="dropzone" method="post" enctype="multipart/form-data">
                        <div class="header bg-light-blue">
                            <h2>
                                Request for activation<small>Please submit the form with following details...</small>
                            </h2>
                            
                        </div>
                        <div class="body">
                            <?php if ($sgtts == 'open') {
                                $sgtts = 'Sorry for the interruption You have a pending Activation Request! Waiting Approval From Company! Please Wait for Some time';
                            }?>
                            <label><h2><?php echo $sgtts?></h2></label>
                        </div>
                        <div class="body">
                            <label>Selected Package</label>
                        <input type="text" readonly class="form-control" name="package" value="<?php echo $pkgg?>">
                        </div>
                        <div class="body">
                          
                        	<input type="hidden" name="useq" value="<?php echo $userid;?>">
                           <label>Please Attach Transaction image Below</label>
                                <div class="dz-message dropzone">
                                    <div class="drag-icon-cph">
                                        <i class="material-icons">touch_app</i>
                                    </div>
                                    <h3>Drop files here or click to upload.</h3>
                                    
                                </div>
                                <div class="fallback">
                                    <input required name="profilepic" type="file" multiple />
                                </div>
                            
                        </div>
                        <button type="submit" class="btn-success form-control" name="active" >Request for activation</button>
                    </form>
                
                    

        </div>
    </section>
<?php include('flinks.php');?>