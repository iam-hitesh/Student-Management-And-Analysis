<?php
include 'includes/include.php';
dbconnect();
session_start();
include 'includes/head.php';
?>
<?php
if(isset($_POST['login'])){
	 $logvalue = mysqli_real_escape_string($conn,$_POST['logvalue']);
	 $passcode = mysqli_real_escape_string($conn,$_POST['passcode']);
   if(($logvalue) && ($passcode) !== '' ){
     
     $login_sql = "SELECT * FROM users WHERE uname ='$logvalue' and password='$passcode' or regno='$logvalue' and password='$passcode' or idno ='$logvalue' and password='$passcode'";
     $login_query = mysqli_query($conn,$login_sql);
     $count = mysqli_num_rows($login_query);
     if($count == 1){
     	$row = mysqli_fetch_array($login_query);
     	$_SESSION['regno'] = $row['regno'];
     	$_SESSION['idno'] = $row['idno'];
     	$_SESSION['username'] = $logvalue;
     	header("Location: index.php");
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
<!DOCTYPE HTML>
<html>
<head>
<title>Welcome to College of Engineering and Technology,Bikaner Student's Zonea</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Bootstrap Core CSS -->
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<!-- font CSS -->
<link rel="icon" href="favicon.ico" type="image/x-icon" >
<!-- font-awesome icons -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
<!--webfonts-->
<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>
<!--//webfonts--> 
<!-- js -->
<script src="js/jquery-1.11.1.min.js"></script>
<!-- //js -->
</head> 
<body class="login-bg">
		<div class="login-body">
			<div class="login-heading">
				<h1>Login</h1>
			</div>
			<div class="login-info">
				<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="login">
					<input type="text" class="user" name="logvalue" placeholder="Email/Reg. No." required="true">
					<input type="password" name="passcode" class="lock" placeholder="Password" required="true">
					<div class="forgot-top-grids">
						<div class="forgot-grid">
							<ul>
								<li>
									<input type="checkbox" id="brand1" value="">
									<label for="brand1"><span></span>Remember me</label>
								</li>
							</ul>
						</div>
						<div class="forgot">
							<a href="password.php">Forgot password?</a>
						</div>
						<div class="clearfix"> </div>
					</div>
					<input type="submit" name="login">
					</form>
					<div class="signup-text">
						<a href="signup.html">Don't have an account? Create one now</a>
					</div>
					<hr>
					<h2>or login with</h2>
					<div class="login-icons">
						<ul>
							<li><a href="#" class="facebook"><i class="fa fa-facebook"></i></a></li>
							<li><a href="#" class="twitter"><i class="fa fa-twitter"></i></a></li>
							<li><a href="#" class="google"><i class="fa fa-google-plus"></i></a></li>
							<li><a href="#" class="dribbble"><i class="fa fa-dribbble"></i></a></li>
						</ul>
					</div>
			</div>
		</div>
		<div class="go-back login-go-back">
				<a href="index.html">Go To Home</a>
			</div>
		<div class="copyright login-copyright">
           <p>© 2016 Baxster . All Rights Reserved . Design by <a href="http://w3layouts.com/">W3layouts</a></p>    
		</div>
</body>
</html>