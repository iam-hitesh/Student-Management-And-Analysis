<?php
function dbconnect(){
	global $conn;
	$conn = mysqli_connect('localhost','root','','ecampus');
}
function logout(){
	session_start();
     if(session_destroy())
     {
      header("Location: login");
     }
 }

function session_set(){
  session_start();
  if(!isset($_SESSION["username"])){
  header('Location:login');
  exit(); }
}

?>
