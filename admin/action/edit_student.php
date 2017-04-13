<?php
if(isset($_POST['edit_student'])){
$regno = mysqli_real_escape_string($conn,$_POST['regno']);
$univreg = mysqli_real_escape_string($conn,$_POST['univreg']);
$edit_sql = "UPDATE students_list SET univreg='$univreg' where regno='$regno'";
$edit_query = mysqli_query($conn,$edit_sql);
if($edit_query){
	echo "<script>alert('Updated Successfully')</script>";
	echo "<script>sleep('3')</script>";
    echo "<script>window.location = \"student_profile\";</script>";
}
else{
	echo "<script>alert('Try Again')</script>";
	echo "<script>sleep('3')</script>";
    echo "<script>window.location = \"student_profile\";</script>";
}
}
?>