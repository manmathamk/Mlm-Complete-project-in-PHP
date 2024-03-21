<?php include('menu.php'); 
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
        	<div class="align-center m-t-15 font-bold"><h3>My Downlines</h3></div>
                            <ol class="breadcrumb breadcrumb-bg-cyan align-center">
                                <li><a href="javascript:void(0);"><i class="material-icons">home</i> Home</a></li>
                                <li><a href="javascript:void(0);"><i class="material-icons">library_books</i> Payments</a></li>
                                <li class="active"><i class="material-icons">archive</i> Downlines</li>
                            </ol>


<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Downlines List
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
                                    <?php         
                
$login_username = $userid;    
//$query = "SELECT name, acc_holder, joindate from reg order by sid desc";
$arr_side = array('left','right','center');
$arr_users = array($login_username);
//$arr_side = array('left','right');

$i=0;
while($i<count($arr_users)){

    $temp_userid = $arr_users[$i];


    $query_tree = mysqli_query($con, "SELECT * from tree where userid='$temp_userid'");
    $result = mysqli_fetch_array($query_tree);
    foreach($arr_side as $side){
      if($result[$side]!=NULL && $result[$side]!=""){
        array_push($arr_users, $result[$side]);
      }
    }

    $i++;
}
        ?>
                                    <thead>

                                        <tr>
                                            <th>Sl no.</th>
                                            <th>Userid</th>
                                            <th>Name</th>
                                            <th>side</th>
                                            <th>Mobile</th>
                                            <th>Upline</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                           <th>Sl no.</th>
                                            <th>Userid</th>
                                            <th>Name</th>
                                            <th>side</th>
                                            <th>Mobile</th>
                                            <th>Upline</th> 
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                          <?php 
                
$i=1;
foreach($arr_users as $temp_userid){
                                    ?> 
                                    <tr>
                                        <?php
                            $query = mysqli_query($con,"SELECT * from user where email='$temp_userid' limit 1");
                                    
                                        
                                  $row = mysqli_fetch_array($query);
                                            
                            ?>
                     <td><?php echo $i; ?></td>
    <td><?php echo $temp_userid ?></td>
    <td><?php echo $row['name']; ?></td>
    <td><?php echo $row['side']; ?></td>
    <td><?php echo $row['mobile']; ?></td>
   
    <td><?php echo $row['under_userid']; ?></td>
                    
                    </tr>
        <?php 
    $i++;                                       
                                    
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