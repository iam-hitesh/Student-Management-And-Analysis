<?php 
include 'includes/include.php';
 dbconnect();
 session_set();
      if(isset($_POST['add_book'])){
           $bookid = strtoupper(mysqli_real_escape_string($conn,$_POST['bookid']));
           $isbn = strtoupper(mysqli_real_escape_string($conn,$_POST['isbn']));
           $bookname = ucwords(mysqli_real_escape_string($conn,$_POST['bookname']));
           $authorname = ucwords(mysqli_real_escape_string($conn,$_POST['authorname']));
           $publisher = ucwords(mysqli_real_escape_string($conn,$_POST['publisher']));
           $bookcost = strtoupper(mysqli_real_escape_string($conn,$_POST['bookcost']));
           $status = ucwords(mysqli_real_escape_string($conn,$_POST['status']));
           $category = ucwords(mysqli_real_escape_string($conn,$_POST['category']));
           $updated_by = ucwords(mysqli_real_escape_string($conn,$_SESSION['username']));
           $target = "uploads/"; 
           $fileName = $_FILES['filename']['name'];   
           $fileTarget = $target.$fileName;  
           $tempFileName = $_FILES["filename"]["tmp_name"];
           $result = move_uploaded_file($tempFileName,$fileTarget);
             
  if($_FILES['filename']['type'] == "image/pjpeg" || $_FILES['filename']['type']=="image/jpeg" || $_FILES['filename']['type']=="image/gif") {
           $sql = "INSERT into books_list(bookid,isbn,bookname,authorname,publisher,bookcost,status,category,profile_pic,updated_by,updated_on) VALUES ('$bookid','$isbn','$bookname','$authorname','$publisher','$bookcost','$status','$category','$fileTarget','$updated_by',now())";
            $query = mysqli_query($conn,$sql);
           
            if($query){
                  echo "<script>alert('Book Added Successfully')</script>";
                 } 
            else {
	              echo "<script>alert('Try Again')</script>";
                 }                
         }
}
include 'includes/head.php';
include 'includes/sidebar_menu.php';
include 'includes/header_menu.php'; 
?>
		
	<!--- Main Content Starts Here -->
		<div id="page-wrapper">
			<div class="main-page">
              <div class="grids">
					<div class="progressbar-heading grids-heading">
						<h2>Add New Book</h2>
					</div>
					<div class="panel panel-widget">
						<div class="tables">
						<form method="POST" name="add_book" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
							<table class="table">
								<tbody>
								    <tr>
									  <td><label for="ID No.">Book ID: (required)</label><input type="text" name="bookid" required="true" class="form-control" /></td>
									  <td><label for="ISBN" >ISBN: (required)</label>
										<input type="text" name="isbn" required="true" class="form-control"/>               
									   </td>
									</tr>
								    <tr>
									  <td><label for="Book Title">Book Title: (required)</label><input type="text" name="bookname" required="true" class="form-control"/></td>
									  <td><label for="Author Name">Author Name: (required)</label><input type="text" name="authorname" required="true" class="form-control"/></td>
									</tr>
									<tr>
									  <td>
									  <label for="Publisher">Publisher: (required)</label><input type="text" name="publisher" required="true" class="form-control"/>
									  </td>
									  <td>
									  <label for="Book Cost">Book Cost: (required)</label><input type="text" name="bookcost" required="true" class="form-control"/>
									  </td>
									 </tr>
									<tr>
									  <td>
									   <label for="Category">Book Category: (required)</label>
										<div class="form-group" >
										 <select name="category" required="true" class="form-control" >
											<option value="">Select Book Category</option>
											<option value="Novel">Novel</option>
											<option value="Text Book">Text Book</option>
										 </select>
										</div>
                                      </td>
                                      <td>
									   <label for="status">Book Status: (required)</label>
										<div class="form-group" >
										 <select name="status" required="true" class="form-control" >
											<option value="">Select Book Status</option>
<?php
$sql = "SELECT DISTINCT status FROM books_list";
$query = mysqli_query($conn,$sql);
$num_rows = mysqli_num_rows($query);
if($query){
	if($num_rows>0){
		while($row = mysqli_fetch_array($query)){
			echo "<option value=\"".$row['status']."\">".$row['status']."</option>";
		}
	}
}
?>
										 </select>
										</div>
                                      </td>
                                     </tr>
                                     <tr>
                                     <td colspan="2">
									  <label for="Book Cost">Book Cost: (required)</label><input type="file" name="filename" required="true" class="form-control"/>
									  </td>
                                     </tr>
								</tbody>
							</table>
							<input type="submit" name="add_book" value="Add Book" class="btn btn-primary" required="true" />
							<input type="reset" name="reset" value="Reset" class="btn btn-danger" />
							</form>
						</div>
					</div>
		<!--- Main Content Ends Here -->
<?php include 'includes/footer.php'; ?>
