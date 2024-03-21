<?php include('menu.php');?> 
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
    <!-- Bootstrap Core Css -->
    <link href="dplugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="dplugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="dplugins/animate-css/animate.css" rel="stylesheet" />

    <!--WaitMe Css-->
    <link href="dplugins/waitme/waitMe.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="dcss/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="dcss/themes/all-themes.css" rel="stylesheet" />


    <section class="content">
        <div class="container-fluid">
          
            <!-- Basic Example -->
            
            
            <!-- #END# Basic Example -->
            <!-- Colored Card - With Loading -->
           
            <?php $sql = mysqli_query($con, "select * from products where id>0");
                $i=1;
                while ($row = mysqli_fetch_array($sql)) {?>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="card">
                        <div class="header bg-light-blue">
                            <h2>
                                <?php 
                              $id = $row['id'];
                                echo $row['pName'];?> - Rs.<?php echo $row['price'];?> <small><?php echo $row['description'];?></small>
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li>
                                    <a href="order.php?id=<?php echo $id?>&user=<?php echo $userid?>" data-toggle="cardloading" data-loading-effect="timer" data-loading-color="lightBlue" id="<?php echo $id;?>" class="viw_data">
                                        <i class="material-icons">add_shopping_cart</i>
                                    </a>
                                </li>
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">show all <?php echo $row['item'];?></a></li>
                                        <li><a href="javascript:void(0);">show all <?php echo $row['type'];?></a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                             <a href="order.php?id=<?php echo $id?>&user=<?php echo $userid?>"><img src="admin/image/product/<?php echo $row['picture'];?>" alt="product" class="responsive" width="270px" height="200px"></a> 
                        </div>
                    </div>
                </div>
                <?php
                    $i++;
                }
                    ?>
                
            </div>
         
            <!-- #END# Colored Card - With Loading -->
        </div>
    </section>
    

    <!-- Jquery Core Js -->
    <script src="dplugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="dplugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="dplugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="dplugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="dplugins/node-waves/waves.js"></script>

    <!-- Wait Me Plugin Js -->
    <script src="dplugins/waitme/waitMe.js"></script>

    <!-- Custom Js -->
    <script src="djs/admin.js"></script>
    <script src="djs/pages/cards/colored.js"></script>

    <!-- Demo Js -->
    <script src="djs/demo.js"></script>
</body>
</html>
