<?php
#Include Files
include 'includes/include.php';
dbconnect();
session_set();

$subject = mysqli_real_escape_string($conn,$_POST['subject']);
$regno = mysqli_real_escape_string($conn,$_POST['reg']);
$date = mysqli_real_escape_string($conn,$_POST['date']);
$status = mysqli_real_escape_string($conn,$_POST['status']);

if(isset($_POST['delete_attendance'])){
	$sql = "DELETE FROM attendance WHERE regno='$regno' and subject='$subject' and updated_on='$date'";
	$query = mysqli_query($conn,$sql);
	if($query){
		echo "<script>alert('Attendance Deleted Successfully')</script>";
        echo "<script>sleep('10')</script>";
        echo "<script>window.location = \"http://localhost/SMS/admin2/manage_attendance.php\";</script>";
	}
	else{
		echo "<script>alert('Try Again')</script>";
        echo "<script>sleep('10')</script>";
        echo "<script>window.location = \"http://localhost/SMS/admin2/manage_attendance.php\";</script>";
	}
}
if(isset($_POST['update_attendance'])){
	$sql = "UPDATE attendance SET status='$status' WHERE regno='$regno' and subject='$subject' and updated_on='$date'";
	$query = mysqli_query($conn,$sql);
	if($query){
		echo "<script>alert('Attendance Updated Successfully')</script>";
        echo "<script>sleep('10')</script>";
        echo "<script>window.location = \"http://localhost/SMS/admin2/manage_attendance.php\";</script>";
	}
	else{
		echo "<script>alert('Try Again')</script>";
        echo "<script>sleep('10')</script>";
        echo "<script>window.location = \"http://localhost/SMS/admin2/manage_attendance.php\";</script>";
	}
}

?>