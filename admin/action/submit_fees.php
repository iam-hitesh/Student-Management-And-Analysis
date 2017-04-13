<?php
include 'includes/include.php';
dbconnect();
session_set();

$r = $_GET['r'];
for($i=0;$i<$r;$i++){
 if(isset($_POST['submit_fees'])){
            $fees = mysqli_real_escape_string($conn,$_POST['fees'][$i]);
            $status = mysqli_real_escape_string($conn,$_POST['status'][$i]);
            $note = ucwords(mysqli_real_escape_string($conn,$_POST['note'][$i]));
            $added_by = ucwords(mysqli_real_escape_string($conn,$_SESSION['username']));
            $reg = mysqli_real_escape_string($conn,$_POST['regno'][$i]);
            $batch = mysqli_real_escape_string($conn,$_POST['batch']);
            $branch = mysqli_real_escape_string($conn,$_POST['branch']);
            $session = mysqli_real_escape_string($conn,$_POST['session']);
            
            $fees_submit_sql = "INSERT INTO fees_allocation(regno,branch,session,batch,fees,status,note,added_by,updated_on) VALUES('$reg','$branch','$session','$batch','$fees','$status','$note','$added_by',now())";
            $fees_submit_query = mysqli_query($conn,$fees_submit_sql);

             if($fees_submit_query){
                 echo "<script>alert('Fees Added Successfully')</script>";
                 echo "<script>sleep('5')</script>";
                 echo "<script>window.location = \"add_fees\";</script>";
                 
                }
            else{
            	echo "<script>alert('Try Again')</script>";
            	echo "<script>sleep('5')</script>";
                echo "<script>window.location = \"add_fees\";</script>";
             }
       }
}

?>