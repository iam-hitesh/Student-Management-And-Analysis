<?php
include 'includes/include.php';
dbconnect();
session_start();
error_reporting(0);
if(isset($_POST['login'])){
     $logvalue = mysqli_real_escape_string($conn,$_POST['logvalue']);
     $passcode = mysqli_real_escape_string($conn,$_POST['passcode']);
   if(($logvalue) && ($passcode) !== '' ){
     
     $login_sql = "SELECT * FROM users WHERE uname ='$logvalue' and password='".md5(sha1($passcode))."' or regno='$logvalue' and password='".md5(sha1($passcode))."' or idno ='$logvalue' and password='".md5(sha1($passcode))."'";
     $login_query = mysqli_query($conn,$login_sql);
     $count = mysqli_num_rows($login_query);
     if($count == 1){
        $row = mysqli_fetch_array($login_query);
        $_SESSION['regno'] = $row['regno'];
        $_SESSION['idno'] = $row['idno'];
        $_SESSION['username'] = $logvalue;
        header("Location: details.php");
     }
     else{
        echo "<script>alert('Wrong Password or Username')</script>";
     }
   }
   else{
     echo "<script>alert('No Field should be blank')</script>";
   }
}
else{
}
?>
<!DOCTYPE html>
<html lang="en" class="perfect-scrollbar-on"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Bootstrap core CSS     -->
    <link href="assets/custom/bootstrap.min.css" rel="stylesheet">
    <!--  Material Dashboard CSS    -->
    <link href="assets/custom/material-dashboard.css" rel="stylesheet">
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/custom/demo.css" rel="stylesheet">
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="assets/font-awesome-4.7.0/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="assets/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/custom/css">

</head>
<body>
    <nav class="navbar navbar-primary navbar-transparent navbar-absolute">
        <div class="container">
                <ul class="nav navbar-nav navbar-right">
                    <li class="">
                        <a href="signup">
                            <i class="material-icons">person_add</i> Register
                        </a>
                    </li>
                    <li class=" active ">
                        <a href="login">
                            <i class="material-icons">fingerprint</i> Login
                        </a>
                    </li>
                </ul>
        </div>
    </nav>
    <div class="wrapper wrapper-full-page">
        <div class="full-page login-page" filter-color="black" data-image="assets/img/login_cover.jpeg">
            <!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->
            <div class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 col-sm-6 col-md-offset-4 col-sm-offset-3">
                            <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                <div class="card card-login">
                                    <div class="card-header text-center" data-background-color="black">
                                        <h4 class="card-title">Login</h4>
                                        <div class="social-line">
                                            <a href="#" class="btn btn-just-icon btn-simple">
                                                <i class="fa fa-facebook-square"></i>
                                            </a>
                                            <a href="#" class="btn btn-just-icon btn-simple">
                                                <i class="fa fa-twitter"></i>
                                            </a>
                                            <a href="#" class="btn btn-just-icon btn-simple">
                                                <i class="fa fa-google-plus"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <p class="category text-center">
                                        Or Be Classical
                                    </p>
                                    <div class="card-content">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">email</i>
                                            </span>
                                            <div class="form-group label-floating is-empty">
                                                <label class="control-label">Username</label>
                                                <input type="text" name="logvalue" class="form-control">
                                            <span class="material-input"></span></div>
                                        </div>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">lock_outline</i>
                                            </span>
                                            <div class="form-group label-floating is-empty">
                                                <label class="control-label">Password</label>
                                                <input type="password" name="passcode" class="form-control">
                                            <span class="material-input"></span></div>
                                        </div>
                                    </div>
                                    <div class="footer text-center">
                                        <input type="submit" name="login" value="Lets Go" class="btn btn-rose btn-simple btn-wd btn-lg">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
     </body>
     <!--   Core JS Files   -->
    <script src="assets/js/jquery-3.1.0.min.js" type="text/javascript"></script>
    <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="assets/js/material.min.js" type="text/javascript"></script>

    <!--  Charts Plugin -->
    <script src="assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>

    <!-- Material Dashboard javascript methods -->
    <script src="assets/js/material-dashboard.js"></script>

    <!-- Material Dashboard DEMO methods, don't include it in your project! -->
    <script src="assets/js/demo.js"></script>

    <script type="text/javascript">
        $(document).ready(function(){

            // Javascript method's body can be found in assets/js/demos.js
            demo.initDashboardPageCharts();

        });
    </script>
</html>