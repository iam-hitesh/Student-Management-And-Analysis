<?php
#Include Files
include 'includes/include.php';
dbconnect();
session_set();
if(isset($_POST['update_faculty'])){
$idno = ucwords(mysqli_real_escape_string($conn,$_POST['idno']));
$fname = ucwords(mysqli_real_escape_string($conn,$_POST['fname']));
$lname = ucwords(mysqli_real_escape_string($conn,$_POST['lname']));
$gender = ucwords(mysqli_real_escape_string($conn,$_POST['gender']));
$dob = ucwords(mysqli_real_escape_string($conn,$_POST['dob']));
$mail = ucwords(mysqli_real_escape_string($conn,$_POST['mail']));
$mob = ucwords(mysqli_real_escape_string($conn,$_POST['mob']));
$designation = ucwords(mysqli_real_escape_string($conn,$_POST['designation']));
$department = ucwords(mysqli_real_escape_string($conn,$_POST['department']));
$bg = ucwords(mysqli_real_escape_string($conn,$_POST['bg']));
$address = ucwords(mysqli_real_escape_string($conn,$_POST['address']));
$research = ucwords(mysqli_real_escape_string($conn,$_POST['research']));
$about = ucwords(mysqli_real_escape_string($conn,$_POST['about']));
$updated_by = ucwords(mysqli_real_escape_string($conn,$_SESSION['username']));


$update_sql = "UPDATE faculty_list SET idno='$idno', fname='$fname',lname='$lname',gender='$gender',dob='$dob',mail='$mail',mob='$mob',designation='$designation',department='$department',bg='$bg',address='$address',research='$research',about='$about',updated_by='$updated_by',updated_on=now() where idno='$idno'";
$update_query = mysqli_query($conn,$update_sql);
if($update_query){
	echo "<script>alert('Updated Successfully')</script>";
	echo "<script>sleep(5)</script>";
	echo "<script>window.location=\"student_profile.php?edit=".$idno."\"</script>";
}
else{
	echo "<script>alert('Try Again')</script>";
	echo "<script>sleep(5)</script>";
	echo "<script>window.location=\"student_profile.php?edit=".$idno."\"</script>";
   }
}
?>