<?php
function dbconnect(){
	global $conn;
	$conn = mysqli_connect('localhost','root','','ecampus') or die('Couldn\'t Connect');
}
function mailchecker(){

}

function session_set(){
           session_start();
           if(!isset($_SESSION["username"]))
           {
             header("Location: login.php");
             exit(); 
           }
}


function logout(){
	session_start();
     if(session_destroy())
     {
      header("Location: login.php");
     }
 }
?>
