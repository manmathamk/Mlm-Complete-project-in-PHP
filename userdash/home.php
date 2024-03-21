<?php include('menu.php'); ?>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> 
<?php
$sq = mysqli_query($con, "SELECT SUM(amount) as total from income_received where userid='$userid'");
$tott = mysqli_fetch_array($sq);
$tot = $tott['total'];
$sqc = mysqli_query($con, "SELECT * FROM pin_list where userid='$userid' and status='open'");
$pins = mysqli_fetch_array($sqc);
$sqlc = mysqli_query($con, "SELECT * FROM tree where userid='$userid'");
$sqcl = mysqli_fetch_array($sqlc);
$lc = $sqcl['leftcount'];
$rc = $sqcl['rightcount'];
$cc = $sqcl['centercount'];
$sgt = mysqli_query($con, "SELECT * FROM user where email='$userid'");
$sgtc = mysqli_fetch_array($sgt);
$sgtts = $sgtc['status'];
$s = mysqli_query($con, "SELECT * FROM user where email='$userid'");
$sc = mysqli_fetch_array($s);
$sts = $sc['status'];
if($sts == 'inactive'){
  $clr = 'red';
 
  echo '<script>
  $(document).ready(function(){
    $("#myModal").modal("show");
  });
</script>';
}
else {
  $clr = 'green';
}




$sqasd = mysqli_query($con, "SELECT amount from companyfunds where userid='$userid'");
$tottsdf = mysqli_fetch_array($sqasd);
$totcdf = $tottsdf['amount'];
          ?>
       
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>DASHBOARD</h2>
            </div></div><a class="icon" href="home.php">
                            <i class="material-icons">home</i></a>
                       
            <!-- Widgets -->
            <div class="row clearfix">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-pink hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">playlist_add_check</i>
                        </div>
                        <div class="content">
                            <div class="text">NEW MESSAGES</div>
                            <div class="number count-to" data-from="0" data-to="<?php echo mysqli_num_rows($ury);?>" data-speed="15" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-cyan hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">help</i>
                        </div>
                        <div class="content">
                            <div class="text">EARNED AMOUNT</div>
                            <div class="number count-to" data-from="0" data-to="<?php echo $tot;?>" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-light-green hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">forum</i>
                        </div>
                        <div class="content">
                            <div class="text">PINS AVALABLE</div>
                            <div class="number count-to" data-from="0" data-to="<?php echo mysqli_num_rows($sqc);?>" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box hover-expand-effect" style="background-color: <?php echo $clr?>">
                        <div class="icon">
                            <i class="material-icons">person_add</i>
                        </div>
                        <div class="content">
                            <div class="text" ><h4 style="color: #fff"><?php echo $sts;?></h4></div>
                            <div style="color: #fff" class="number count-to" data-from="0" data-to="<?php echo $sc['package'];?>" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Widgets -->
            <!-- CPU Usage -->
            
                <!-- #END# Latest Social Trends -->
                <!-- Answered Tickets -->
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <div class="card">
                        <div class="body bg-teal">
                            <div class="font-bold m-b--35">PROFILE SUMMARY</div>
                            <ul class="dashboard-stat-list">
                                <li>
                                    EARNED INCOME
                                    <span class="pull-right"><b>Rs.<?php echo $tot;?></b> </span>
                                </li>
                                <li>
                                    AUTO CUT OFF
                                    <span class="pull-right"><b>Rs.<?php echo $totcdf;?></b> </span>
                                </li>
                                <li>
                                    JOINED DATE
                                    <span class="pull-right"><b><?php echo $date;?></b> </span>
                                </li>
                                <li>
                                    LEFT MEMBERS
                                    <span class="pull-right"><b><?php echo $lc;?></b> <small>members</small></span>
                                </li>
                                <li>
                                    RIGHT MEMBERS
                                    <span class="pull-right"><b><?php echo $rc;?></b> <small>members</small></span>
                                </li>
                                <!-- <li>
                                    CENTER MEMBERS
                                    <span class="pull-right"><b><?php echo $cc;?></b> <small>members</small></span>
                                </li> -->
                                <li>
                                    UP-LINE-ID
                                    <span class="pull-right"><b><?php echo $under;?></b> </span>
                                </li>
                            </ul>
                        </div>

                    </div>

                </div>
                <!-- #END# Answered Tickets -->
          
                <!-- Task Info -->
                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">

                        <div>
       <canvas id="canvas" width="200" height="200">
</canvas>
 </div>
 
</head>
<div id="myModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Activate your account</h4>
            </div>
            <div class="modal-body">
        <p>Please Activate your account <a href="profile.php">click here</a> to Update your Profile/Bank Account</p>

               
                
                    <a href="activation.php"><button type="submit" class="btn btn-primary">Request for Activation</button></a>
             
            </div>
        </div>
    </div>
</div>
  <!-- calculator 
  <div class="calculator">

   display 
    <input type="text" class="display" disabled>
  keys
    <div class="keys">
      4 rows of keys 
      <div class="row">
        <button value="7">7</button>
        <button value="8">8</button>
        <button value="9">9</button>
        <button value="+" class="operator">+</button>
      </div>
      <div class="row">
        <button value="4">4</button>
        <button value="5">5</button>
        <button value="6">6</button>
        <button value="-" class="operator">-</button>
      </div>
      <div class="row">
        <button value="1">1</button>
        <button value="2">2</button>
        <button value="3">3</button>
        <button value="*" class="operator">*</button>
      </div>
      <div class="row">
        <button value="C" class="operator">C</button>
        <button value="0">0</button>
        <button value="/" class="operator">/</button>
        <button value="=" class="operator">=</button>
      </div>
    </div>

  </div>
  calculator body ends -->
  <style type="text/css">
      /* common styles */
* {
  padding: 0;
  margin: 0;
}


/* common styles end */

/* calculator */
.calculator {
  width: 300px;
  padding-bottom: 15px;
  border-radius: 7px;
  background-color: #000;
  box-shadow: 5px 8px 8px -2px rgba(0, 0, 0, 0.61);
}
/* calculator style end */

/* display */
.display {
  width: 100%;
  height: 80px;
  border: none;
  box-sizing: border-box;
  padding: 10px;
  font-size: 2rem;
  background-color: #00ff44;
  color: #000;
  text-align: right;
  border-top-left-radius: 7px;
  border-top-right-radius: 7px;
}

/* display style end */

/* row */
.row {
  display: flex;
  justify-content: space-between;
}
/* row style end */

/* button */
button {
  
  border-radius: 50%;
  border: none;
  outline: none;
  font-size: 1.5rem;
  background-color: #222;
  color: #fff;
  margin: 10px;
}

button:hover {
  cursor: pointer;
}

/* button style end */

/* operator */
.operator {
  background-color: #00ff44;
  color: #000;
}

/* operator style end */
  </style>
  <script type="text/javascript">
      // select all the buttons
const buttons = document.querySelectorAll('button');
// select the <input type="text" class="display" disabled> element
const display = document.querySelector('.display');

// add eventListener to each button
buttons.forEach(function(button) {
  button.addEventListener('click', calculate);
});

// calculate function
function calculate(event) {
  // current clicked buttons value
  const clickedButtonValue = event.target.value;

  if (clickedButtonValue === '=') {
    // check if the display is not empty then only do the calculation
    if (display.value !== '') {
      // calculate and show the answer to display
      display.value = eval(display.value);
    }
  } else if (clickedButtonValue === 'C') {
    // clear everything on display
    display.value = '';
  } else {
    // otherwise concatenate it to the display
    display.value += clickedButtonValue;
  }
}
  </script>
                    </div>

                    
                        <div>


 <style type="text/css">
   
.watch{
  width:400px;
  position:relative;
  margin:0 auto;
}



 </style>
<script type="text/javascript">
    var canvas = document.getElementById("canvas");
var ctx = canvas.getContext("2d");
var radius = canvas.height / 2;
ctx.translate(radius, radius);
radius = radius * 0.90
setInterval(drawClock, 1000);

function drawClock() {
  drawFace(ctx, radius);
  drawNumbers(ctx, radius);
  drawTime(ctx, radius);
}

function drawFace(ctx, radius) {
  var grad;
  ctx.beginPath();
  ctx.arc(0, 0, radius, 0, 2*Math.PI);
  ctx.fillStyle = '#0B0B0B';
  ctx.fill();
  grad = ctx.createRadialGradient(0,0,radius*0.95, 0,0,radius*1.05);
  grad.addColorStop(0.2, '#A1A1A1');
  grad.addColorStop(0.5, '#DDDDDD');
   grad.addColorStop(0.1, '#DDDDDD');
    
  ctx.strokeStyle = grad;
  ctx.lineWidth = radius*0.1;
  ctx.stroke();
  ctx.beginPath();
  ctx.arc(0, 0, radius*0.1, 0, 2*Math.PI);
  ctx.fillStyle = '#DDDDDD';
  ctx.fill();
}

function drawNumbers(ctx, radius) {
  var ang;
  var num;
  ctx.font = radius*0.15 + "px arial";
  ctx.textBaseline="middle";
  ctx.textAlign="center";
  for(num = 1; num < 13; num++){
    ang = num * Math.PI / 6;
    ctx.rotate(ang);
    ctx.translate(0, -radius*0.85);
    ctx.rotate(-ang);
    ctx.fillText(num.toString(), 0, 0);
    ctx.rotate(ang);
    ctx.translate(0, radius*0.85);
    ctx.rotate(-ang);
  }
}

function drawTime(ctx, radius){
    var now = new Date();
    var hour = now.getHours();
    var minute = now.getMinutes();
    var second = now.getSeconds();
    //hour
    hour=hour%12;
    hour=(hour*Math.PI/6)+
    (minute*Math.PI/(6*60))+
    (second*Math.PI/(360*60));
    drawHand(ctx, hour, radius*0.5, radius*0.07);
    //minute
    minute=(minute*Math.PI/30)+(second*Math.PI/(30*60));
    drawHand(ctx, minute, radius*0.8, radius*0.07);
    // second
    second=(second*Math.PI/30);
    drawHand(ctx, second, radius*0.9, radius*0.02);
}

function drawHand(ctx, pos, length, width) {
    ctx.beginPath();
    ctx.lineWidth = width;
    ctx.lineCap = "round";
    ctx.moveTo(0,0);
    ctx.rotate(pos);
    ctx.lineTo(0, -length);
    ctx.stroke();
    ctx.rotate(-pos);
}
</script>                   


 </div>
                
                <!-- #END# Task Info -->
                <!-- Browser Usage -->
                
                <!-- #END# Browser Usage -->
           </div>
       </section>
   </body>
   </html>
<?php include('flinks.php'); ?>