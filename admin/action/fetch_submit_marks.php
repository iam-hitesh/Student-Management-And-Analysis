<?php
//fetch.php
if(isset($_POST["action"]))
{
 include 'includes/include.php';
dbconnect();
session_set();
 
 if($_POST["action"] == "state")
 {
  $query = "SELECT subjects FROM subjects WHERE departments= '".$_POST['departments']."' and sem='".$_POST['sem']."'";
  $result = mysqli_query($connect, $query);
  $output .= '<option value="">Select Subject</option>';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '<option value="'.$row["city"].'">'.$row["city"].'</option>';
  }
 }
 echo $output;
}
?>