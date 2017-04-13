<?php
#Include Files
include 'includes/include.php';
dbconnect();
session_set();

$status = mysqli_real_escape_string($conn,$_POST['status']);
$fees = mysqli_real_escape_string($conn,$_POST['fees']);
$regno = mysqli_real_escape_string($conn,$_POST['reg']);
$fee_type = mysqli_real_escape_string($conn,$_POST['fee_type']);

if(isset($_POST['delete_fees'])){
	$sql = "DELETE FROM fees_allocation WHERE regno='$regno' and note='$fee_type'";
	$query = mysqli_query($conn,$sql);
	if($query){
		echo "<script>alert('Fees Deleted Successfully')</script>";
        echo "<script>sleep('10')</script>";
        echo "<script>window.location = \"http://localhost/SMS/admin2/manage_fees.php\";</script>";
	}
	else{
		echo "<script>alert('Try Again')</script>";
        echo "<script>sleep('10')</script>";
        echo "<script>window.location = \"http://localhost/SMS/admin2/manage_fees.php\";</script>";
	}
}
if(isset($_POST['update_fees'])){
	$sql = "UPDATE fees_allocation SET status='$status',fees='$fees' WHERE regno='$regno' and note='$fee_type'";
	$query = mysqli_query($conn,$sql);
	if($query){
		echo "<script>alert('Fees Updated Successfully')</script>";
		echo "<script>sleep('10')</script>";
        echo "<script>window.location = \"http://localhost/SMS/admin2/manage_fees.php\";</script>";
       }
	else{
		echo "<script>alert('Try Again')</script>";
		echo "<script>sleep('10')</script>";
        echo "<script>window.location = \"http://localhost/SMS/admin2/manage_fees.php\";</script>";
    }
}

?>