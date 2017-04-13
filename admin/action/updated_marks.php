<?php
include 'includes/include.php';
dbconnect();
session_set();

if(isset($_POST['update_marks'])){
            $marks = mysqli_real_escape_string($conn,$_POST['marks']);
            $max_marks = mysqli_real_escape_string($conn,$_POST['max_marks']);
            $subject = mysqli_real_escape_string($conn,$_POST['subject']);
            $regno = mysqli_real_escape_string($conn,$_POST['regno']);
            $exam = mysqli_real_escape_string($conn,$_POST['exam']);
            
            $marks_submit_sql = "UPDATE marks_allocation SET marks='$marks',max_marks='$max_marks' WHERE regno='$regno' and subject = '$subject' and exam='$exam'";
            $marks_submit_query = mysqli_query($conn,$marks_submit_sql);

             if($marks_submit_query){
                 echo "<script>alert('Updated Successfully')</script>";
                 echo "<script>sleep('3')</script>";
                 echo "<script>window.location = \"update_marks\";</script>";
                }
            else{
            	echo "<script>alert('Try Again')</script>";
                 echo "<script>sleep('3')</script>";
                 echo "<script>window.location = \"update_marks\";</script>";
             }
    }

if(isset($_POST['delete_marks'])){
            $marks = mysqli_real_escape_string($conn,$_POST['marks']);
            $max_marks = mysqli_real_escape_string($conn,$_POST['max_marks']);
            $subject = mysqli_real_escape_string($conn,$_POST['subject']);
            $regno = mysqli_real_escape_string($conn,$_POST['regno']);
            $exam = mysqli_real_escape_string($conn,$_POST['exam']);
            
            $marks_submit_sql = "DELETE FROM marks_allocation WHERE regno='$regno' and subject = '$subject' and exam='$exam'";
            $marks_submit_query = mysqli_query($conn,$marks_submit_sql);

             if($marks_submit_query){
                 echo "<script>alert('Deleted Successfully')</script>";
                 echo "<script>sleep('3')</script>";
                 echo "<script>window.location = \"update_marks\";</script>";
                }
            else{
                echo "<script>alert('Try Again')</script>";
                 echo "<script>sleep('3')</script>";
                 echo "<script>window.location = \"update_marks\";</script>";
             }
    }
else{
    header('Location:index.php');
}
?>