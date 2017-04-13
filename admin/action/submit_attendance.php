<?php
include 'includes/include.php';
dbconnect();
session_set();

$r = $_GET['r'];
for($i=0;$i<$r;$i++){
 if(isset($_POST['submit_attendance'])){
            $status = mysqli_real_escape_string($conn,$_POST['status'][$i]);
            $reg = mysqli_real_escape_string($conn,$_POST['regno'][$i]);
            $branch = mysqli_real_escape_string($conn,$_POST['branch'][$i]);
            $session = mysqli_real_escape_string($conn,$_POST['session'][$i]);
            $subject = ucwords($_SESSION['subject']);
            $exam = ucwords($_SESSION['exam']);
            $attendance = 1;
            $sem = ucwords($_SESSION['sem']);
            $batch = ucwords($_SESSION['batch']);
            $updated_by = ucwords($_SESSION['username']);
            
            

            $marks_submit_sql = "INSERT INTO attendance(regno,branch,session,sem,batch,subject,status,attendance,updated_on,updated_by) VALUES('$reg','$branch','$session','$sem','$batch','$subject','$status','$attendance',now(),'$updated_by')";
            $marks_submit_query = mysqli_query($conn,$marks_submit_sql);

             if($marks_submit_query){
                 echo "<script>alert('Attendance Added Successfully');</script>";
                 echo "<script>sleep('5')</script>";
                 echo "<script>window.location = \"add-attendance\";</script>";
                 
                }
            else{
            	echo "<script>alert('Try Again')</script>";
            	echo "<script>sleep('5')</script>";
                echo "<script>window.location = \"add-attendance\";</script>";
                }
    }
}

?>