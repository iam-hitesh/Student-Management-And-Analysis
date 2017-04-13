<?php 
include 'includes/include.php';
dbconnect();
session_set();
if(isset($_POST['send'])){
	$sender = mysqli_real_escape_string($conn,$_POST['sender']);
	$receiver = mysqli_real_escape_string($conn,$_POST['receiver']);
	$message = mysqli_real_escape_string($conn,$_POST['message']);
$chat_sql = "INSERT INTO chat_app(sender,receiver,message,time) VALUES('$sender','$receiver','$message',now())";
$chat_query = mysqli_query($conn,$chat_sql);
if($chat_query){
	echo "send Successfully";
}
}
?>
<form method="post" name="send" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<input type="hidden" name="sender" value="<?php echo $_SESSION['username'] ?>">
<input type="text" name="receiver">
<br/>
<input type="text" name="message">
<br/>
<input type="submit" name="send">
</form>