<?php
#Include Files
include 'includes/include.php';
dbconnect();
session_set();
if(isset($_POST['update_student'])){
$regno = ucwords(mysqli_real_escape_string($conn,$_POST['regno']));
$fname = ucwords(mysqli_real_escape_string($conn,$_POST['fname']));
$lname = ucwords(mysqli_real_escape_string($conn,$_POST['lname']));
$gender = ucwords(mysqli_real_escape_string($conn,$_POST['gender']));
$dob = ucwords(mysqli_real_escape_string($conn,$_POST['dob']));
$mail = ucwords(mysqli_real_escape_string($conn,$_POST['mail']));
$ptmail = ucwords(mysqli_real_escape_string($conn,$_POST['ptmail']));
$stmob = ucwords(mysqli_real_escape_string($conn,$_POST['stmob']));
$ptmob = ucwords(mysqli_real_escape_string($conn,$_POST['ptmob']));
$ftname = ucwords(mysqli_real_escape_string($conn,$_POST['ftname']));
$mtname = ucwords(mysqli_real_escape_string($conn,$_POST['mtname']));
$ftprof = ucwords(mysqli_real_escape_string($conn,$_POST['ftprof']));
$mtprof = ucwords(mysqli_real_escape_string($conn,$_POST['mtprof']));
$branch = ucwords(mysqli_real_escape_string($conn,$_POST['branch']));
$session = ucwords(mysqli_real_escape_string($conn,$_POST['session']));
$mentor = ucwords(mysqli_real_escape_string($conn,$_POST['mentor']));
$batch = ucwords(mysqli_real_escape_string($conn,$_POST['batch']));
$category = ucwords(mysqli_real_escape_string($conn,$_POST['category']));
$ptincome = ucwords(mysqli_real_escape_string($conn,$_POST['ptincome']));
$bg = ucwords(mysqli_real_escape_string($conn,$_POST['bg']));
$address = ucwords(mysqli_real_escape_string($conn,$_POST['address']));
$about = ucwords(mysqli_real_escape_string($conn,$_POST['about']));
$updated_by = ucwords(mysqli_real_escape_string($conn,$_SESSION['username']));


$edit_sql = "UPDATE students_list SET regno='$regno', fname='$fname',lname='$lname',gender='$gender',dob='$dob',mail='$mail',ptmail='$ptmail',stmob='$stmob',ptmob='$ptmob',ftname='$ftname',mtname='$mtname',ftprof='$ftprof',mtprof='$mtprof',branch='$branch',session='$session',mentor='$mentor',batch='$batch',category='$category',ptincome='$ptincome',bg='$bg',address='$address',about='$about',updated_by='$updated_by',updated_on=now() where regno='$regno'";
$edit_query = mysqli_query($conn,$edit_sql);
if($edit_query){
	echo "<script>alert('Updated Successfully')</script>";
	echo "<script>sleep(5)</script>";
	echo "<script>window.location=\"student_profile.php?edit=".$regno."\"</script>";	
}
else{
	echo "<script>alert('Try Again')</script>";
	echo "<script>sleep(5)</script>";
	echo "<script>window.location=\"student_profile.php?edit=".$regno."\"</script>";
}
}
else{
	header('Location:index.php');
}
?>