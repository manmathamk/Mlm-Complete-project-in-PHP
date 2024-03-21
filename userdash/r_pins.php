<?php include('menu.php');
$email = $_SESSION['userid'];
?>
<?php
//pin request 
if (isset($_GET['pin_request'])) {
    $amount = mysqli_real_escape_string($con, $_GET['amount']);
    $date = date("y-m-d");


    if ($amount != '') {
        //Inset the value to pin request
        $msg = 'you have requested for pin of rs.' . $amount;
        $quey = mysqli_query($con, "insert into comments(`userid`,`notif`) values('$email','$msg')");
        $msgc = 'Request for pin userid -' . $email;
        $query = mysqli_query($con, "INSERT INTO comments (userid, notif)
VALUES ('admin', '$msgc')");
        $query = mysqli_query($con, "insert into pin_request(`email`,`amount`,`date`) values('$email','$amount','$date')");

        if ($query) {
            echo '<script type="text/javascript">';
            echo 'setTimeout(function () { swal("Sent!","Pin Request sent successully!","success");';
            echo '}, 1000);</script>';
        } else {
            //echo mysqli_error($con);
            echo '<script>alert("Unknown error occure.");window.location.assign("pin-request.php");</script>';
        }
    } else {
        echo '<script>alert("Please fill all the fields");</script>';
    }

}

if(isset($_POST['transfer'])){
    $transferto = $_POST['transferto'];
    $idsd = $_POST['idsd'];
echo '<script>alert('.$transferto.')</script>';
    mysqli_query($con, "UPDATE `pin_list` SET `userid` = '$transferto' WHERE `id` = $idsd");
}

if(isset($_POST['Activatesd'])){
    $transferto = $_POST['transferto'];
    $idsd = $_POST['idsd'];
echo '<script>alert("' . $idsd . '");</script>';
    mysqli_query($con, "UPDATE `pin_list` SET `status` = 'close' WHERE `id` = '$idsd'");
        echo '<script>window.location.replace("http://akshaya.asia/userdash/activate.php?serid=' . $transferto . '");</script>';
}
?>
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
        <div class="align-center m-t-15 font-bold">
            <h3>Pin Request</h3>
        </div>
        <ol class="breadcrumb breadcrumb-bg-cyan align-center">
            <li><a href="javascript:void(0);"><i class="material-icons">home</i> Home</a></li>
            <li><a href="javascript:void(0);"><i class="material-icons">library_books</i> Pins</a></li>
            <li class="active"><i class="material-icons">archive</i> Request</li>
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
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown"
                                    role="button" aria-haspopup="true" aria-expanded="false">
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
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                <thead>
                                    <tr>
                                        <th>Sl no</th>
                                        <th>Pins</th>
                                        <th>Status</th>
                                        <th>Transfer to</th>
                                        <th>Send</th>
                                         <th>Activate User</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Sl no</th>
                                        <th>Pins</th>
                                        <th>Status</th>
                                        <th>Transfer to</th>
                                        <th>Send</th>
                                        <th>Activate User</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    $query = mysqli_query($con, "select * from pin_list where userid='$email' order by id desc");
                                    if (mysqli_num_rows($query) > 0) {
                                        while ($row = mysqli_fetch_array($query)) {
                                            $pin = $row['pin'];
                                            $idfg = $row['id'];
                                            $status = $row['status'];
                                            if ($status == 'open') {
                                                $status = 'Available';
                                            } else {
                                                $status = 'Used';
                                            }
                                            ?>
                                            <tr>
                                                <td>
                                                    <?php echo $i; ?>
                                                </td>
                                                <td>
                                                    <?php echo $pin; ?>
                                                </td>
                                                <td>
                                                    <?php echo $status; ?>
                                                </td>
                                                <form method="post">
                                                    <td><input type="text" name="transferto"> <input type="hidden" class="form-control" name="idsd" value="<?php echo $idfg ?>">
                                                    </td>
                                                    <td><button type="submit" name="transfer" class="btn btn-primary">Transfer</button></td>
                                             
                                                    <td><button type="submit" name="Activatesd" class="btn btn-success">Activate User</button></td>
                                                </form>
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