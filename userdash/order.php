<?php include('menu.php');
$id = $_REQUEST['id'];
$userid = $_REQUEST['user'];

 $sqql = mysqli_query($con, "select * from income where userid='$userid'");
  $roqw = mysqli_fetch_array($sqql);
  $ttts = $roqw['total_bal'];


 $sql = mysqli_query($con, "select * from products where id='$id'");
  $row = mysqli_fetch_array($sql);
  $name = $row['pName'];
  $pro_id = $row['pCode'];
  $bv = $row['bv'];
$img = $row['picture'];
$price = $row['price'];
$brand = $row['item'];
$gst = $row['gst'];
$igst = $row['igst'];
$ordi = rand(1000000,9999999);

if(isset($_POST['carrt'])){
$prid = $_POST['pid'];
$id = $_POST['id'];
$qty = $_POST['amt'];
$oid = $_POST['od'];
$estim = $_POST['tobe'];
$pnam = $_POST['pnam'];
$imhs = $_POST['imgs'];
$bran = $_POST['bran'];
$odat = $_POST['odat'];
$pric = $_POST['pric'];
$usr = $_POST['user'];
$bv = $_POST['bv'];
$net = $_POST['actual'];
$gst = $_POST['gst'];
$igst = $_POST['igst'];

if ($ttts > $estim) {
 $sql = mysqli_query($con, "INSERT INTO `orders` (`id`, `uid`, `pid`, `quantity`, `oplace`, `mobile`, `dstatus`, `odate`, `ddate`, `delivery`, `oid`, `estimate`, `pname`, `brand`, `netamt`, `pic`) VALUES (NULL, '$userid', '$prid', '$qty', NULL, NULL, 'cart', '$odat', NULL, NULL, '$oid', '$estim', '$pnam', '$bran', '$net', '$imhs')");
 echo '<script>window.location.assign("cart.php");</script>'; 
}
else {
  echo '<script>alert("Insufficient Balance in your Account! Please recharge your account");window.location.assign("amt_wallet.php");</script>'; 
  }
}

?>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<meta name="viewport" >
<meta http-equiv="Accept-CH" content="DPR, Width, Viewport-Width">
<link rel="stylesheet" type="text/css" href="https://codepen.io/imgix/pen/d06269809bb83c85326ebbbf7e81241b">
<link rel="stylesheet" type="text/css" href="https://s3-us-west-2.amazonaws.com/s.cdpn.io/164071/drift-basic.css">
<script type="text/javascript" src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/164071/Drift.min.js"></script>
    <section class="content">
        <div class="container-fluid">

  <article class="demo-area">
  <img class="demo-trigger" src="admin/image/product/<?php echo $img?>?w=200&ch=DPR&dpr=2&border=1,ddd" data-zoom="admin/image/product/<?php echo $img?>?w=1000&ch=DPR&dpr=2">
  <div class="detail">
   <section>
  
  
      <h3><?php echo $name;?></h3>
      <p><?php echo $row['description'];?></p>
        <?php
date_default_timezone_set('Asia/Kolkata');
$currentTime = date( 'd-m-Y h:i:s A', time () );

?>

      <p>Specifications:<?php echo $ttts.$img;?> </p>
      <ul>
        <li>Hover over image</li>
        <li>35 mm stainless steel case</li>
        <li>Stainless link bracelet with buckle closure</li>
        <li>Water resistant to 100m</li>
      </ul>
      <div class="container-fluid">
      <h4> Price :  Rs.<?php echo $row['price']; ?><br /><h4 style="background-color: green;width: 50%;padding: 2%;color: white"> BV on Product :  Rs.<?php echo $row['bv']; ?><br /></div > <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Add To Cart
</button></h4>
   </section>
  </div>
  </article>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h5 class="modal-title" id="exampleModalLabel">Cart Details</h5>
       <img class="demo-trigger" class="form-control" src="admin/image/product/<?php echo $img?>?w=100&ch=DPR&dpr=2&border=1,ddd">
      
      <div class="modal-body">
        <form method="post">
      <div class="container-fluid">
        <div class="row">
       
         <input type="text" class="form-control" readonly name="pid" value="<?php echo $row['pCode'];?>">
       </div></div>
       <div class="container-fluid"><br />
         <label>Enter Quantity</label>
         <input type="text" class="form-control" id="amt" name="amt" >
         <input type="hidden" class="form-control" name="id" value="<?php echo $id ?>">
          <input type="hidden" class="form-control" name="od" value="<?php echo $ordi ?>">
         <label>BV on Product</label>
         <input type="text" readonly id="tobe" name="tobe" class="form-control" value="">

         <input type="hidden" class="form-control" name="pnam" value="<?php echo $name ?>">
         <input type="hidden" class="form-control" name="bran" value="<?php echo $brand ?>">
         <input type="hidden" class="form-control" name="odat" value="<?php echo $currentTime; ?>">
         <input type="hidden" class="form-control" id="pric" name="pric" value="<?php echo $price; ?>">
          <input type="hidden" class="form-control" name="user" value="<?php echo $userid?>">
          <input type="hidden" class="form-control" id="bv" name="bv" value="<?php echo $bv?>">
           <input type="hidden" class="form-control" id="imgs" name="imgs" value="<?php echo $img?>">
           <label>Amount to be paid incl. tax</label>
          <input type="text" id="actual" name="actual" readonly class="form-control"  value="">
          <input type="hidden" readonly class="form-control" id="gst" name="gst" value="<?php echo $gst?>">
          <input type="hidden" readonly class="form-control" id="igst" name="igst" value="<?php echo $igst?>">
       </div>
       
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="carrt" class="btn btn-primary">proceed Booking</button>
      </form>
      </div>
    </div>
  </div>
</div>











<script type="text/javascript">
  $(document).ready(function() {
    //this calculates values automatically 
    sum();
    $("#amt, #pric").on("keydown keyup", function() {
        sum();
    });
});

function sum() {
            var num1 = document.getElementById('amt').value;
            var num2 = document.getElementById('pric').value;
            var num3 = document.getElementById('bv').value;
            var num4 = document.getElementById('gst').value;
            var gst = parseInt(num4) / 100;
            var num5 = document.getElementById('igst').value;
            var igst = parseInt(num5) / 100;
            var tgst = parseFloat(gst + igst).toFixed( 2 );
      var result = parseInt(num1) * parseInt(num2);
      var result1 = parseInt(num1) * parseInt(num3);
      var result2 = result1 * tgst;
      var result3 = parseInt(result + result2);
      var result4 = parseInt(result1 + result2);




            if (!isNaN(result)) {
                document.getElementById('actual').value = result3;
        document.getElementById('tobe').value = result4;
            }
        }
</script>
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
<style type="text/css">
  .demo-area{
  background:$color_invert_fg;
  border-radius:8px;
  padding:20px;
  section{
    padding-top:0;
  }
}

.demo-trigger {
  display: inline-block;
  width: 30%;
  float: left;
}

.detail {
  position: relative;
  width: 65%;
  margin-left: 5%;
  float: left;
  button{
    vertical-align:middle;
    opacity:.5;
    cursor:unset;
    background:$color_invert_chrome_tint;
    margin-left:1em;
  }
}


@media (max-width: 610px) {

  .detail, .demo-trigger {
    float: none;
  }

  .demo-trigger {
    display:block;
    width: 50%;
    max-width:200px;
    margin: 0 auto;
  }

  .detail {
    margin: 0;
    width: auto;
  }



  .responsive-hint {
    display: none;
  }
  h3 {
    margin-top:20px;
  }
}
</style>
<script type="text/javascript">
  var demoTrigger = document.querySelector('.demo-trigger');
var paneContainer = document.querySelector('.detail');

new Drift(demoTrigger, {
  paneContainer: paneContainer,
  inlinePane: false,
});
</script>

