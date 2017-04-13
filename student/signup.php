<?php
include 'includes/include.php';
dbconnect();
session_start();
error_reporting(0);
if(isset($_POST['signup'])){
     $reg = mysqli_real_escape_string($conn,$_POST['reg']);
     $username = mysqli_real_escape_string($conn,$_POST['username']); 
     $passcode = mysqli_real_escape_string($conn,$_POST['passcode']);
     $cpasscode = mysqli_real_escape_string($conn,$_POST['cpasscode']);
     $user_type = 'student';

   if(($passcode) == ($cpasscode)){
     
     $signup_sql = "INSERT INTO users(uname,regno,password,user_type,created_at) VALUES('$username','$reg','".md5(sha1($passcode))."','$user_type',now())";
     $signup_query = mysqli_query($conn,$signup_sql);
     
     if($signup_query){
        echo "<script>alert('Successfully Registered')</script>";
     }
     else{
        echo "<script>alert('Try Again')</script>";
     }
   }
   else{
     echo "<script>alert('Password Doesn't Match')</script>";
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
                    <li class="active">
                        <a href="signup">
                            <i class="material-icons">person_add</i> Register
                        </a>
                    </li>
                    <li class="">
                        <a href="login">
                            <i class="material-icons">fingerprint</i> Login
                        </a>
                    </li>
                </ul>
        </div>
    </nav>
    <div class="wrapper wrapper-full-page">
        <div class="full-page login-page" filter-color="blue" data-image="assets/img/login_cover.jpeg">
            <!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->
            <div class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 col-sm-6 col-md-offset-4 col-sm-offset-3">
                            <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                <div class="card card-login">
                                    <div class="card-header text-center" data-background-color="blue">
                                        <h4 class="card-title">Register Here</h4>
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
                                                <i class="material-icons">perm_identity</i>
                                            </span>
                                            <div class="form-group label-floating is-empty">
                                                <label class="control-label">College Reg. No.</label>
                                                <input type="text" name="reg" class="form-control" required="true">
                                            <span class="material-input"></span></div>
                                        </div>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">code</i>
                                            </span>
                                            <div class="form-group label-floating is-empty">
                                                <label class="control-label">Username(Min 6 Characters)</label>
                                                <input type="text" name="username" class="form-control" required="true" min="6" max="25">
                                            <span class="material-input"></span></div>
                                        </div>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">lock_outline</i>
                                            </span>
                                            <div class="form-group label-floating is-empty">
                                                <label class="control-label">Password(Should be 8 to 28 Characters)</label>
                                                <input type="password" name="passcode" class="form-control" id="passcode" required="true" min="8" max="28">
                                            <span class="material-input"></span></div>
                                        </div>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">lock_outline</i>
                                            </span>
                                            <div class="form-group label-floating is-empty">
                                                <label class="control-label">Confirm Password</label>
                                                <input type="password" name="cpasscode" class="form-control" id="cpasscode" onkeyup="checkPass(); return false;" required="true" min="8" max="28">
                                                <span id="confirmMessage" class="confirmMessage"></span>
                                            <span class="material-input"></span></div>
                                        </div>
                                    </div>
                                    <div class="footer text-center">
                                        <input type="submit" name="signup" value="Register Me" class="btn btn-rose btn-simple btn-wd btn-lg">
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
    <script type="text/javascript">
    function checkPass()
            {
   
    var passcode = document.getElementById('passcode');
    var cpasscode = document.getElementById('cpasscode');
    
    var message = document.getElementById('confirmMessage');
    
    var goodColor = "#66cc66";
    var badColor = "#ff6666";
    if(passcode.value == cpasscode.value){
        message.style.color = goodColor;
        message.innerHTML = "Password Match!"
    }else{
        message.style.color = badColor;
        message.innerHTML = "Password Do Not Match!"
    }
}  
</script>
</html>