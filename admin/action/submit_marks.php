<?php
include 'includes/include.php';
dbconnect();
session_set();

$r = $_GET['r'];
for($i=0;$i<$r;$i++){
 if(isset($_POST['submit_marks'])){
            $marks = mysqli_real_escape_string($conn,$_POST['marks'][$i]);
            $max_marks = mysqli_real_escape_string($conn,$_POST['max_marks'][$i]);
            $reg = mysqli_real_escape_string($conn,$_POST['regno'][$i]);
            $fname = ucwords(mysqli_real_escape_string($conn,$_POST['fname'][$i]));
            $lname = ucwords(mysqli_real_escape_string($conn,$_POST['lname'][$i]));
            $branch = ucwords(mysqli_real_escape_string($conn,$_POST['branch'][$i]));
            $session = ucwords(mysqli_real_escape_string($conn,$_POST['session'][$i]));
            $added_by = ucwords(mysqli_real_escape_string($conn,$_SESSION['username']));
            $subject = ucwords($_SESSION['subject']);
            $exam = ucwords($_SESSION['exam']);
            $sem = ucwords($_SESSION['sem']);
            $batch = ucwords($_SESSION['batch']);
            $session = ucwords($_SESSION['session']);
            
            

            $marks_submit_sql = "INSERT INTO marks_allocation(regno,fname,lname,branch,session,subject,exam,sem,batch,marks,max_marks,added_by,updated_on) VALUES('$reg','$fname','$lname','$branch','$session','$subject','$exam','$sem','$batch','$marks','$max_marks','$added_by',now())";
            $marks_submit_query = mysqli_query($conn,$marks_submit_sql);

             if($marks_submit_query){
                 echo "<script>alert('Marks Added Successfully');</script>";
                 echo "<script>sleep('5')</script>";
                 echo "<script>window.location = \"add_marks\";</script>";
                 
                }
            else{
            	echo "<script>alert('Try Again')</script>";
            	echo "<script>sleep('5')</script>";
                echo "<script>window.location = \"add_marks\";</script>";
                }
    }
}

?>