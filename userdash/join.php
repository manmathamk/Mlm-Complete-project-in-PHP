<?php
error_reporting(E_ALL ^ E_NOTICE);

//Include required PHPMailer files
	require 'MailerWork/PHPMailer.php';
	require 'MailerWork/SMTP.php';
	require 'MailerWork/Exception.php';
//Define name spaces
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;
	
	
include('php-includes/connect.php');
include('php-includes/check-login.php');
include('menu.php');

$side = $_GET['side'];
$under_userid = $_GET['upline'];
$userid = $_SESSION['userid'];
$qry = mysqli_query($con, "select * from user where email = '$userid'");
$rws = mysqli_fetch_array($qry);
$pkgs = $rws['package'];
$original_date = date("Y/m/d");
$timestamp = strtotime($original_date);
$new_date = date("d-m-Y", $timestamp);
$nam = $_REQUEST['name'];
$pack = $_REQUEST['package'];
$mob = $_REQUEST['mobile'];
$capping = 50000;
?>
<?php

if (isset($_GET['join_user'])) {

    // $pin = mysqli_real_escape_string($con, $_GET['pin']);
    $name = mysqli_real_escape_string($con, $_GET['name']);
    $email = mysqli_real_escape_string($con, $_GET['email']);
    $mobile = mysqli_real_escape_string($con, $_GET['mobile']);
    $address = mysqli_real_escape_string($con, $_GET['address']);
    $date = mysqli_real_escape_string($con, $_GET['date']);
    $emailid = mysqli_real_escape_string($con, $_GET['emailid']);
    
    $under_userid = mysqli_real_escape_string($con, $_GET['under_userid']);
    // $package = mysqli_real_escape_string($con,$_GET['package']);
    $side = mysqli_real_escape_string($con, $_GET['side']);
    $password = mysqli_real_escape_string($con, $_GET['password']);
    $msgs = 'new user trying to login mobile number' . $mobile;
    
    $flag = 0;

    if ($name != '' && $email != '' && $mobile != '' && $emailid != '' && $address != '' && $date != '' && $under_userid != '' && $side != '' && $password != '') {



        if (email_check($email)) {

            if (!email_check($under_userid)) {

                if (side_check($under_userid, $side)) {

                    $flag = 1;
                } else {
                    $query = mysqli_query($con, "INSERT INTO comments (userid, notif)
VALUES ('admin', '$msgs')");
                    echo '<script>alert("The side you selected is not available.");</script>';

                }
            } else {

                $query = mysqli_query($con, "INSERT INTO comments (userid, notif)
VALUES ('admin', '$msgs')");
                echo '<script>alert("Invalid Under userid.");</script>';

            }
        } else {

            $query = mysqli_query($con, "INSERT INTO comments (userid, notif)
VALUES ('admin', '$msgs')");
            echo '<script>alert("This user id already availble.");</script>';

        }
    } else {

        $query = mysqli_query($con, "INSERT INTO comments (userid, notif)
VALUES ('admin', '$msgs')");
        echo '<script>alert("Please fill all the fields.");</script>';

    }


    if ($flag == 1) {


        $query = mysqli_query($con, "INSERT INTO `user` (`id`, `name`, `email`, `emailid`, `password`, `status`, `mobile`, `address`, `date`, `b_name`,`b_pname`, `account`, `b_aname`, `ifsc`, `under_userid`, `package`, `side`) VALUES (NULL, '$name', '$email', '$emailid', '$password', 'inactive', '$mobile', '$address', '$date', NULL, NULL, NULL, NULL, NULL, '$under_userid', 999, '$side');");


        $msgc = 'New user Joined under ' . $under_userid . ' having id ' . $email;
        $query = mysqli_query($con, "INSERT INTO comments (userid, notif)
VALUES ('admin', '$msgc')");
        $msg1 = 'User-id:' . $email . '&nbsp&nbsppassword' . $password;
        $msg3 = $email . ' have registered by your account on &nbsp' . $date;
        $msg2 = 'Taken&nbsp' . $side . '&nbspof&nbsp' . $under_userid . '&nbspwith package of&nbsp 999';
        $query = mysqli_query($con, "INSERT INTO comments (userid, notif)
VALUES ('$email', 'Thank you for Registering to Our company')");
        $query = mysqli_query($con, "INSERT INTO comments (userid, notif)
VALUES ('$email', '$msg1')");
        $query = mysqli_query($con, "INSERT INTO comments (userid, notif)
VALUES ('$userid', '$msg3')");
        $query = mysqli_query($con, "INSERT INTO comments (userid, notif)
VALUES ('$email', '$msg2')");

        $query = mysqli_query($con, "INSERT INTO `imgdocs` (`id`, `userid`, `docs`, `pdocs`, `image_url`, `pimage_url`, `status`) VALUES (NULL, '$email', '0', '0', 'kycimages/vector-id-front.png', 'kycimages/vector-id-front.png', 'Pending')");



        $query = mysqli_query($con, "insert into tree(`userid`) values('$email')");

        $query = mysqli_query($con, "insert into companyfunds(`userid`) values('$email')");

        $query = mysqli_query($con, "update tree set `$side`='$email' where userid='$under_userid'");


        // $query = mysqli_query($con, "update pin_list set status='close' where pin='$pin'");


        $query = mysqli_query($con, "insert into income (`userid`) values('$email')");
        echo mysqli_error($con);






        echo mysqli_error($con);
        
        
        
        $admin_body = '<!doctype html>
<html lang="en-US">

<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
    <title>New Account Email Template</title>
    <meta name="description" content="New Account Email Template.">
    <style type="text/css">
        a:hover {text-decoration: underline !important;}
    </style>
</head>

<body marginheight="0" topmargin="0" marginwidth="0" style="margin: 0px; background-color: #f2f3f8;" leftmargin="0">
    <table cellspacing="0" border="0" cellpadding="0" width="100%" bgcolor="#f2f3f8"
        style="@import url(https://fonts.googleapis.com/css?family=Rubik:300,400,500,700|Open+Sans:300,400,600,700); font-family: "Open Sans", sans-serif;">
        <tr>
            <td>
                <table style="background-color: #f2f3f8; max-width:670px; margin:0 auto;" width="100%" border="0"
                    align="center" cellpadding="0" cellspacing="0">
                    <tr>
                        <td style="height:80px;">&nbsp;</td>
                    </tr>
                    <tr>
                        <td style="text-align:center;">
                            <a href="http://akshaya.asia" title="logo" target="_blank">
                            <img width="60" src="http://akshaya.asia/images/logo.png" title="logo" alt="logo">
                          </a>
                        </td>
                    </tr>
                    <tr>
                        <td style="height:20px;">&nbsp;</td>
                    </tr>
                    <tr>
                        <td>
                            <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0"
                                style="max-width:670px; background:#fff; border-radius:3px; text-align:center;-webkit-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);-moz-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);box-shadow:0 6px 18px 0 rgba(0,0,0,.06);">
                                <tr>
                                    <td style="height:40px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td style="padding:0 35px;">
                                        <h1 style="color:#1e1e2d; font-weight:500; margin:0;font-size:32px;font-family:"Rubik",sans-serif;">Get started $name
                                        </h1>
                                        <p style="font-size:15px; color:#455056; margin:8px 0 0; line-height:24px;">
                                            Your account has been created on the Akshaya.asia. <br><strong>"Unlock your earning potential with your newly created account and start making money through the power of Pair Punch!"</strong>.</p>
                                        <span
                                            style="display:inline-block; vertical-align:middle; margin:29px 0 26px; border-bottom:1px solid #cecece; width:100px;"></span>
                                            
                                             <p
                                            style="color:#455056; font-size:18px;line-height:20px; margin:0; font-weight: 500;">
                                            <strong
                                                style="display: block;font-size: 13px; margin: 0 0 4px; color:rgba(0,0,0,.64); font-weight:normal;">Username</strong>'.$email.'
                                            <strong
                                                style="display: block; font-size: 13px; margin: 24px 0 4px 0; font-weight:normal; color:rgba(0,0,0,.64);">Password</strong>'.$password.'
                                        </p>

                                        <a href="http://akshaya.asia/userdash/"
                                            style="background:#20e277;text-decoration:none !important; display:inline-block; font-weight:500; margin-top:24px; color:#fff;text-transform:uppercase; font-size:14px;padding:10px 24px;display:inline-block;border-radius:50px;">Login
                                            to your Account</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="height:40px;">&nbsp;</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td style="height:20px;">&nbsp;</td>
                    </tr>
                    <tr>
                        <td style="text-align:center;">
                            <p style="font-size:14px; color:rgba(69, 80, 86, 0.7411764705882353); line-height:18px; margin:0 0 0;">&copy; <strong>www.akshaya.asia</strong> </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="height:80px;">&nbsp;</td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>

</html>';


$content = '
    Welcome to Akshaya.asia!
    
    Dear ' . $name . ',
    Thank you for joining Akshaya.asia. We are thrilled to have you on board!
    Your account details:
    
        User ID: ' . $email . '
        Password: ' . $password . '
   
    We believe that Akshaya.asia will provide you with great opportunities and help you unlock your earning potential.
    If you have any questions or need assistance, feel free to contact our support team.
    Once again, welcome to Akshaya.asia! We wish you a successful and rewarding experience.
    
    
    
    Best regards,
    The Akshaya.asia Team
';

$to = $emailid;
$subject = 'Welcome To Akshaya';
$message = $content;

$headers = array(
    'From' => 'akshaya.asia@gmail.com',
    'Reply-To' => 'akshaya.asia@gmail.com',
    'X-Mailer' => 'PHP/' . phpversion(),
);

$smtp_host = 'relay-hosting.secureserver.net';
$smtp_port = 25;

// Set the SMTP server settings
ini_set('SMTP', $smtp_host);
ini_set('smtp_port', $smtp_port);

// Send the email
$mail_sent = mail($to, $subject, $message, $headers);

if ($mail_sent) {
    header("HTTP/1.1 200 OK");
    header("Content-Type: text/html; charset=UTF-8");
    echo 'Email sent successfully!';
} else {
    header("HTTP/1.1 500 Internal Server Error");
    header("Content-Type: text/html; charset=UTF-8");
    echo 'Failed to send email.';
}


// //Create instance of PHPMailer
// 	$mail = new PHPMailer();
// //Set mailer to use smtp
// 	$mail->isSMTP();
// //Define smtp host
// 	$mail->Host = "smtp.gmail.com";
// //Enable smtp authentication
// 	$mail->SMTPAuth = true;
// //Set smtp encryption type (ssl/tls)
// 	$mail->SMTPSecure = "tls";
// //Port to connect smtp
// 	$mail->Port = "587";
// //Set gmail username
// 	$mail->Username = "akshaya.asia@gmail.com";
// //Set gmail password
// 	$mail->Password = "ruiwjzyzirdvrhct";
// //Email subject
// 	$mail->Subject = "Welcome to Akshaya.asia";
// //Set sender email
// 	$mail->setFrom('akshaya.asia@gmail.com');
// //Enable HTML
// 	$mail->isHTML(true);
// //Attachment
// 	// $mail->addAttachment('img/attachment.png');
// //Email body
// // 	$mail->Body = $admin_body;
// 	$mail->Body = "Hi";
// //Add recipient
// 	$mail->addAddress($emailid);
// //Finally send email
// 	if ( $mail->send() ) {
// 		echo "Email Sent..!";
// 	}else{
// 		echo "Message could not be sent. Mailer Error: ".$mail->ErrorInfo;
// 	}
// //Closing smtp connection
// 	$mail->smtpClose();

        echo '<script>window.location.assign("success.php?variable1='.$email.'&variable2='.$password.'");</script>';
    }

}
?>
<?php

function pin_check($pin)
{
    global $con, $userid;

    $query = mysqli_query($con, "select * from pin_list where pin='$pin' and userid='$userid' and status='open'");
    if (mysqli_num_rows($query) > 0) {
        return true;
    } else {
        return false;
    }
}
function email_check($email)
{
    global $con;

    $query = mysqli_query($con, "select * from user where email='$email'");
    if (mysqli_num_rows($query) > 0) {
        return false;
    } else {
        return true;
    }
}
function side_check($email, $side)
{
    global $con;

    $query = mysqli_query($con, "select * from tree where userid='$email'");
    $result = mysqli_fetch_array($query);
    $side_value = $result[$side];
    if ($side_value == '') {
        return true;
    } else {
        return false;
    }
}
function income($userid)
{
    global $con;
    $data = array();
    $query = mysqli_query($con, "select * from income where userid='$userid'");
    $result = mysqli_fetch_array($query);
    $data['day_bal'] = $result['day_bal'];
    $data['current_bal'] = $result['current_bal'];
    $data['total_bal'] = $result['total_bal'];

    return $data;
}
function tree($userid)
{
    global $con;
    $data = array();
    $query = mysqli_query($con, "select * from tree where userid='$userid'");
    $result = mysqli_fetch_array($query);
    $data['left'] = $result['left'];
    $data['right'] = $result['right'];
    $data['leftcount'] = $result['leftcount'];
    $data['rightcount'] = $result['rightcount'];

    return $data;
}
function getUnderId($userid)
{
    global $con;
    $query = mysqli_query($con, "select * from user where email='$userid'");
    $result = mysqli_fetch_array($query);
    return $result['under_userid'];
}
function getUnderIdPlace($userid)
{
    global $con;
    $query = mysqli_query($con, "select * from user where email='$userid'");
    $result = mysqli_fetch_array($query);
    return $result['side'];
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet"
        type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="dplugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="dplugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="dplugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="dcss/style.css" rel="stylesheet">
</head>
<style type="text/css">
    @media only screen and (min-width:786px) {
        .card {
            width: 100%;
            margin: auto;
        }
    }
    
    
    
    
    .button {
  position: relative;
  padding: 8px 16px;
  background: #009579;
  border: none;
  outline: none;
  border-radius: 2px;
  cursor: pointer;
}

.button:active {
  background: #007a63;
}

.button__text {
  font: bold 20px "Quicksand", san-serif;
  color: #ffffff;
  transition: all 0.2s;
}

.button--loading .button__text {
  visibility: hidden;
  opacity: 0;
}

.button--loading::after {
  content: "";
  position: absolute;
  width: 16px;
  height: 16px;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  margin: auto;
  border: 4px solid transparent;
  border-top-color: #ffffff;
  border-radius: 50%;
  animation: button-loading-spinner 1s ease infinite;
}

@keyframes button-loading-spinner {
  from {
    transform: rotate(0turn);
  }

  to {
    transform: rotate(1turn);
  }
}

</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<section class="content">
    <div class="container-fluid">

        <body class="signup-page">
            <div class="signup-box">

                <div class="card">
                    <div class="body">
                        <form method="get">

                            <div class="msg">Register a new member</div>


                            <div class="body">

                                <div class="row clearfix">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="name" class="form-control" placeholder="Name"
                                                    value="<?php echo $nam; ?>">
                                                    <input type="hidden" name="email"
                                                    value="<?php echo 'AKSH' . rand(1000, 999999); ?>" readonly
                                                    class="form-control" placeholder="Userid">
                                            </div>
                                        </div>
                                    </div>
 <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="password" name="password" class="form-control"
                                                    placeholder="Password">
                                            </div>
                                        </div>
                                    </div>
                                    <!--<div class="col-md-6">-->
                                    <!--    <div class="form-group">-->
                                    <!--        <div class="form-line">-->
                                    <!--            <input type="hidden" name="email"-->
                                    <!--                value="<?php echo 'AKSH' . rand(1000, 999999); ?>" readonly-->
                                    <!--                class="form-control" placeholder="Userid">-->
                                    <!--        </div>-->
                                    <!--    </div>-->
                                    <!--</div>-->
                                </div>

                                <!--<div class="row clearfix">-->
                                   

                                <!--    <div class="col-md-6">-->
                                <!--        <div class="form-group">-->
                                <!--            <div class="form-line">-->
                                <!--                <input type="password" name="password" class="form-control"-->
                                <!--                    placeholder="Confirm password">-->
                                <!--                <span id='message'></span>-->
                                <!--            </div>-->
                                <!--        </div>-->
                                <!--    </div>-->
                                <!--</div>-->
                                <div class="row clearfix">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="mobile" class="form-control"
                                                    placeholder="Mobile" value="<?php echo $mob; ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="address" class="form-control"
                                                    placeholder="Address">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-md-6" hidden>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="date" class="form-control"
                                                    value="<?php echo $new_date; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="form-line">
                                              <input type="text" name="under_userid" id="animaloption" class="form-control" placeholder="Up-line ID" value="<?php echo isset($under_userid) ? $under_userid : ''; ?>" <?php echo isset($under_userid) ? 'readonly' : ''; ?>>
                                            </div>
                                             <div id="kind"></div>
                                        </div>
                                       
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="emailid" class="form-control" placeholder="Email Id">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <p>
                                        <b>Package</b>
                                    </p>
                                    <input type="text" class="form-control" disabled name="package"
                                        placeholder="package" id="browser" value="999">

                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                       <input type="radio" name="side" id="left" class="with-gap" value="left" <?php echo isset($side) && $side === 'left' ? 'checked' : ''; ?>>
                                        <label for="left">Left</label>
                                        
                                        <input type="radio" name="side" id="right" class="with-gap" value="right" <?php echo isset($side) && $side === 'right' ? 'checked' : ''; ?>>
                                        <label for="right">Right</label>

                                    </div>
                                </div>





                                <div class="form-group">
                                    <input type="checkbox" name="terms" id="terms" class="filled-in chk-col-pink">
                                    <label for="terms">I read and agree to the <a href="javascript:void(0);">terms of
                                            usage</a>.</label>
                                </div>
                                <button type="submit" name="join_user" class="btn btn-block btn-lg bg-pink waves-effect button" onclick="this.classList.toggle('button--loading')" value="Join">
    <span class="button__text">Join</span>
</button>
                                <!--<input type="submit" name="join_user" class="btn btn-block btn-lg bg-pink waves-effect"-->
                                <!--    value="Join">-->


                                <div class="m-t-25 m-b--5 align-center">
                                    <a href="index.php">You already have a membership?</a>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
            
            <script>
            
    $(document).ready(function() {
        //  $('#animaloption').keypress(function(event) {
  $("#animaloption").on('keyup input', function() {
    var userids = $(this).val();
    
    $.ajax({
      url: "./getuser.php",
      type: "post",
      data: {"userids": userids},
      success: function(response) {
        $("#kind").html(response);
      }
    });
  });
});
            </script>

            <!-- Jquery Core Js -->
            <script src="dplugins/jquery/jquery.min.js"></script>

            <!-- Bootstrap Core Js -->
            <script src="dplugins/bootstrap/js/bootstrap.js"></script>

            <!-- Waves Effect Plugin Js -->
            <script src="dplugins/node-waves/waves.js"></script>

            <!-- Validation Plugin Js -->
            <script src="dplugins/jquery-validation/jquery.validate.js"></script>

            <!-- Custom Js -->
            <script src="djs/admin.js"></script>
            <script src="djs/pages/examples/sign-up.js"></script>