<?php include('menu.php'); 
$email = $_SESSION['userid'];
$query = mysqli_query($con,"select * from income_received where userid='$email' order by id desc limit 1");
                            if(mysqli_num_rows($query)>0){
                                while($row=mysqli_fetch_array($query)){
                                    $amount = $row['amount'];
                                    $date = $row['date'];
                                    $timeamp = strtotime($date);
 
// Creating new date format from that timestamp
$dte = date("d-m-Y", $timeamp);
                                    }
                                }

                                $qury = mysqli_query($con,"select * from user where email='$email'");
                                while($rw=mysqli_fetch_array($qury)){
                                    $name = $rw['name'];
                                    $package = $rw['package'];
                                
                                    }

              $original_date = date("Y-m-d");
 
// Creating timestamp from given date
$timestamp = strtotime($original_date);
 
// Creating new date format from that timestamp
$new_date = date("d-m-Y", $timestamp);
 // Outputs: 31-03-2019

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

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="dcss/themes/all-themes.css" rel="stylesheet" />
    <section class="content">
        <div class="container-fluid">
        	<div class="align-center m-t-15 font-bold"><h3>Received Payments</h3></div>
                            <ol class="breadcrumb breadcrumb-bg-cyan align-center">
                                <li><a href="javascript:void(0);"><i class="material-icons">home</i> Home</a></li>
                                <li><a href="javascript:void(0);"><i class="material-icons">library_books</i> Payments</a></li>
                                <li class="active"><i class="material-icons">archive</i> Received</li>
                            </ol>


<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Received List
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
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>Sl no</th>
                                            <th>Amount</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Sl no</th>
                                            <th>Amount</th>
                                            <th>Date</th>
                                            
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php 
                            $i=1;
                            
                            $query = mysqli_query($con,"select * from income_received where userid='$email' order by id desc");
                            if(mysqli_num_rows($query)>0){
                                while($row=mysqli_fetch_array($query)){
                                    $amount = $row['amount'];
                                    $date = $row['date'];
                                ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $amount; ?></td>
                                        <td><?php echo $date; ?></td>
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