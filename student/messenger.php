<?php 
include 'includes/include.php';
dbconnect();
session_set();
$user = $_SESSION['username'];
 $message_sql = "SELECT * from chat_app where receiver='$user' ORDER by time";
 $message_query = mysqli_query($conn,$message_sql);
 $num_rows = mysqli_num_rows($message_query);
 if($message_query){
 	if($num_rows > 0){
 		while($message = mysqli_fetch_array($message_query)){
 			echo $message['time'];
 			echo $message['message'];

 		}
 	}
 }
?>