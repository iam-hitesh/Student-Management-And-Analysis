<?php
include 'includes/include.php';
dbconnect();
session_set();
if(isset($_POST['add_notice'])){
              $topic = ucwords(mysqli_real_escape_string($conn,$_POST['topic']));
              $notice = mysqli_real_escape_string($conn,$_POST['notice']);
              $link = mysqli_real_escape_string($conn,$_POST['link']);
              $created_by = ucwords(mysqli_real_escape_string($conn,$_SESSION['username']));
              $branch = ucwords(mysqli_real_escape_string($conn,$_POST['branch']));
              $session = ucwords(mysqli_real_escape_string($conn,$_POST['session']));
             
             $target = "uploads/"; 
             $fileName = $_FILES['filename']['name'];   
             $fileTarget = $target.$fileName;  
             $tempFileName = $_FILES["filename"]["tmp_name"];
             $result = move_uploaded_file($tempFileName,$fileTarget);
             
  if($_FILES['filename']['type'] == "image/pjpeg" || $_FILES['filename']['type']=="image/jpeg" || $_FILES['filename']['type']=="image/gif") {
            $notice_sql="INSERT INTO notices(notice_topic,notice_details,notice_link,file,branch,session,created_by,created_on) VALUES('$topic','$notice','$link','$fileTarget','$branch','$session','$created_by',now())";
              $notice_query = mysqli_query($conn,$notice_sql);

              if($notice_query){
              	echo "<script>alert('Notice Published Successfully')</script>";
                echo "<script>sleep('10')</script>";
                echo "<script>window.location = \"add_notice\";</script>";
              }
              else{
                echo "<script>alert('Notice Can't Be Published Now')</script>";	
                echo "<script>sleep('10')</script>";
                echo "<script>window.location = \"add_notice\";</script>";
              } 
          }

          else{
            echo "<script>alert('File Format is Not Accepted')</script>"; 
            echo "<script>sleep('5')</script>";
            echo "<script>window.location = \"add_notice\";</script>";
          }

 }
 else
 {
  echo "<script>alert('Error in Uploading File')</script>";
  echo "<script>sleep('5')</script>";
  echo "<script>window.location = \"add_notice\";</script>";
 }
?>