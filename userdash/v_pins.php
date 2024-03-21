<?php include('menu.php'); 
  $email = $_SESSION['userid'];
?>
<?php
//pin request 
if(isset($_POST['pin_request'])){
	$amount = mysqli_real_escape_string($con,$_POST['amount']);
	$date = date("y-m-d");
	$image = $_FILES['fileToUpload']['name'];
$tempname = $_FILES['fileToUpload']['tmp_name'];
move_uploaded_file($tempname, "uploads/$image");
	
	if($amount!=''){
		//Inset the value to pin request
        $msg = 'you have requested for pin of rs.'.$amount;  
        $quey = mysqli_query($con,"insert into comments(`userid`,`notif`) values('$email','$msg')");
        $msgc = 'Request for pin userid -'.$email; 
$query = mysqli_query($con, "INSERT INTO comments (userid, notif)
VALUES ('admin', '$msgc')");
		$query = mysqli_query($con,"INSERT INTO `pin_request` (`id`, `email`, `img`, `amount`, `date`, `status`) VALUES (NULL, '$email', '$image', '$amount', '$date', 'open');");

		if($query){
			 echo '<script type="text/javascript">';
  echo 'setTimeout(function () { swal("Sent!","Pin Request sent successully!","success");';
  echo '}, 1000);</script>';
		}
		else{
			//echo mysqli_error($con);
			echo '<script>alert("Unknown error occure.");window.location.assign("pin-request.php");</script>';
		}
	}
	else{
		echo '<script>alert("Please fill all the fields");</script>';
	}
	
}?>
                    <link href="dplugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="dplugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="dplugins/animate-css/animate.css" rel="stylesheet" />

    <!-- JQuery DataTable Css -->
    <link href="dplugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">

    <!-- Custom Css -->
    <link href="dcss/style.css" rel="stylesheet">
    <section class="content">
        <div class="container-fluid">
        	<div class="align-center m-t-15 font-bold"><h3>Available Pins</h3></div>
                            <ol class="breadcrumb breadcrumb-bg-cyan align-center">
                                <li><a href="javascript:void(0);"><i class="material-icons">home</i> Home</a></li>
                                <li><a href="javascript:void(0);"><i class="material-icons">library_books</i> Pins</a></li>
                                <li class="active"><i class="material-icons">archive</i> Available</li>
                            </ol>







<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Requested list
                            </h2>
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

                             <div class="row">
                    <div class="col-lg-4">
                        <form method="post" enctype="multipart/form-data"> 
                            <div class="form-group">
                                <label>No of pins required</label>
                                <input type="text" name="amount" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Upload Paid Transaction Image</label>
                                <input type="file" name="fileToUpload" id="fileToUpload" required>
                            </div>
                            <div class="form-group">
                                <input type="submit" name="pin_request" class="btn btn-primary" value="Pin Request">
                            </div>
                        </form>
                    </div>
                </div>


                
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>Sl no</th>
                                            <th>Pins</th>
                                           
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Sl no</th>
                                            <th>Pins</th>
                                           
                                            
                                        </tr>
                                    </tfoot>
                                    <tbody>
                             <?php
                                    $i=1;
                                    $query = mysqli_query($con,"select * from pin_list where userid='$userid' and status='open'");
                                    if(mysqli_num_rows($query)>0){
                                        while($row=mysqli_fetch_array($query)){
                                            $pin = $row['pin'];
                                        ?>
                                            <tr>
                                                <td><?php echo $i ?></td>
                                                <td><?php echo $pin ?></td>
                                            </tr>
                                        <?php
                                            $i++;
                                        }
                                    }
                                    ?>
                                      
                                    </tbody>
                                </table>
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

    <!-- Waves Effect Plugin Js -->
    <script src="dplugins/node-waves/waves.js"></script>

    <!-- Jquery DataTable Plugin Js -->
    <script src="dplugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="dplugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    <script src="dplugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
    <script src="dplugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
    <script src="dplugins/jquery-datatable/extensions/export/jszip.min.js"></script>
    <script src="dplugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
    <script src="dplugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
    <script src="dplugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
    <script src="dplugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>

    <!-- Custom Js -->
    <script src="djs/admin.js"></script>
    <script src="djs/pages/tables/jquery-datatable.js"></script>

    <!-- Demo Js -->
    <script src="djs/demo.js"></script>
