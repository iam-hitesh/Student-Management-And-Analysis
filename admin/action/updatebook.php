<?php
#Include Files
include 'includes/include.php';
dbconnect();
session_set();
if(isset($_POST['update_book'])){
	$bookid = ucwords(mysqli_real_escape_string($conn,$_POST['bookid']));
	$isbn = ucwords(mysqli_real_escape_string($conn,$_POST['isbn']));
	$bookname = ucwords(mysqli_real_escape_string($conn,$_POST['bookname']));
	$authorname = ucwords(mysqli_real_escape_string($conn,$_POST['authorname']));
	$publisher = ucwords(mysqli_real_escape_string($conn,$_POST['publisher']));
	$bookcost = ucwords(mysqli_real_escape_string($conn,$_POST['bookcost']));
	$status = ucwords(mysqli_real_escape_string($conn,$_POST['status']));
	$category = ucwords(mysqli_real_escape_string($conn,$_POST['category']));

   $update_sql = "UPDATE books_list SET isbn='$isbn',bookname='$bookname',authorname='$authorname',publisher='$publisher',bookcost='$bookcost',status='$status',category='$category' WHERE bookid = '$bookid'";
   $update_query = mysqli_query($conn,$update_sql);
   if($update_query){
   	echo "<script>alert('Updated Successfully')</script>";
   	echo "<script>sleep(5)</script>";
	echo "<script>window.location=\"bookprofile?issue=".$bookid."\"</script>";
   }
   else{
   	echo "<script>alert('Try Again')</script>";
   	echo "<script>sleep(5)</script>";
	echo "<script>window.location=\"bookprofile?issue=".$bookid."\"</script>";
   }
}
if(isset($_POST['delete_book'])){
  $bookid = ucwords(mysqli_real_escape_string($conn,$_POST['bookid']));
  
    $delete_sql = "DELETE FROM books_list WHERE bookid = '$bookid'";
    $delete_query = mysqli_query($conn,$delete_sql);
    if($delete_query){
    echo "<script>alert('Deleted Successfully')</script>";
    echo "<script>sleep(5)</script>";
    echo "<script>window.location=\"add_books\"</script>";
   }
   else{
    echo "<script>alert('Try Again')</script>";
    echo "<script>sleep(5)</script>";
    echo "<script>window.location=\"bookprofile?issue=".$bookid."\"</script>";
   }
}
if(isset($_POST['issue_book'])){
	$bookid = ucwords(mysqli_real_escape_string($conn,$_POST['bookid']));
	$issued_to = strtoupper(mysqli_real_escape_string($conn,$_POST['issued_to']));
	$issued_by = ucwords(mysqli_real_escape_string($conn,$_SESSION['username']));
	$status = 'Not Available';

    $status_sql = "UPDATE books_list SET status='$status' WHERE bookid = '$bookid'";
    $issue_sql = "INSERT INTO issue_book(bookid,issued_to,issued_on,issued_by) VALUES('$bookid','$issued_to',now(),'$issued_by')";
    $status_query = mysqli_query($conn,$status_sql);
    $issue_query = mysqli_query($conn,$issue_sql);
    if($status_query && $issue_sql ){
   	echo "<script>alert('Updated Successfully')</script>";
   	echo "<script>sleep(5)</script>";
	echo "<script>window.location=\"bookprofile?issue=".$bookid."\"</script>";
   }
   else{
   	echo "<script>alert('Try Again')</script>";
   	echo "<script>sleep(5)</script>";
	echo "<script>window.location=\"bookprofile?issue=".$bookid."\"</script>";
   }
}
if(isset($_POST['return_book'])){
	$bookid = ucwords(mysqli_real_escape_string($conn,$_POST['bookid']));
	$status = 'Available';

    $status_sql = "UPDATE books_list SET status='$status' WHERE bookid = '$bookid'";
    $return_sql = "UPDATE issue_book SET returned=now() WHERE bookid = '$bookid' ORDER BY issued_on DESC LIMIT 1 ";
    $status_query = mysqli_query($conn,$status_sql);
    $issue_query = mysqli_query($conn,$return_sql);
    if($status_query && $return_sql ){
   	echo "<script>alert('Updated Successfully')</script>";
   	echo "<script>sleep(5)</script>";
	echo "<script>window.location=\"bookprofile?issue=".$bookid."\"</script>";
   	
   }
   else{
   	echo "<script>alert('Try Again')</script>";
   	echo "<script>sleep(5)</script>";
	echo "<script>window.location=\"bookprofile?issue=".$bookid."\"</script>";
   }
}
else{
  header('Location:index.php');
}
?>