<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Login</title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
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

<body class="login-page">
    <div class="login-box">
        <div class="logo">
            <img src="../images/logodark.png" style="width: 100px; margin: 0px 10% 20px 36%;"/><br />
            <!-- <a href="javascript:void(0);"><b>AKSHAYA</b></a> -->
            <small>User - Login</small>
        </div>
        <div class="card">
            <div class="body">
               <form method="post" action="login.php">
                    <div class="msg">Sign in to start your session</div>
                    <div class="input-group">
                         
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="email" placeholder="Username" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="row">
                        <!-- <div class="col-xs-8 p-t-5">
                            <input type="checkbox" name="rememberme" id="rememberme" class="filled-in chk-col-pink">
                            <label for="rememberme">Remember Me</label>
                        </div> -->
                        <div class="col-xs-4">
                            <button class="btn btn-block bg-pink waves-effect" type="submit">SIGN IN</button>
                        </div>
                    </div>
                    <div class="row m-t-15 m-b--20">
                        <div class="col-xs-6">
                            <a href="eregonce.php">Register Now!</a>
                        </div>
                        <!-- <div class="col-xs-6 align-right">
                            <a href="forgot-password.html">Forgot Password?</a>
                        </div> -->
                    </div>
                </form>
            </div>
        </div>
    </div>

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
    <script src="djs/pages/examples/sign-in.js"></script>
</body>

</html>