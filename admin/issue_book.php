<?php
#Include Files
include 'includes/include.php';
dbconnect();
session_set();
include 'includes/head.php'; 
include 'includes/sidebar_menu.php';
include 'includes/header_menu.php';
?>
<div id="page-wrapper">
			<div class="main-page">
              <div class="grids">
					<div class="progressbar-heading grids-heading">
						<h2>Issue Book</h2>
					</div>
					<div class="panel panel-widget">
						<div class="tables">
						<h2>Select Year,Branch,Batch and Subject</h2>
						<br/>
						<form method="POST" name="issue_book" action="<?php echo $_SERVER['PHP_SELF']; ?>">
							<table class="table">
								<tbody>
								    <tr>
									  <td>
									     <label for="Book ID No.">Book ID No.: (required)</label>
									     <input type="text" name="book_id" required="true" class="form-control" />
									  </td>
                                      <td>
									     <label for="ISBN No.">ISBN No.: (required)</label>
									     <input type="text" name="isbn" class="form-control" />
									  </td>
									  <td>
									     <label for="Book Title">Book Title:</label>
									     <input type="text" name="bookname" class="form-control" />
									  </td>
							        </tr>
								</tbody>
							</table>
							<input type="submit" name="issue_book" value="Search Book" class="btn btn-primary" required="true" />
							<input type="reset" name="reset" value="Reset" class="btn btn-danger" />
							</form>
						</div>
					</div>

		
	             <?php

					if(isset($_POST['issue_book'])){
						echo "<div class=\"grids\">";
			            echo "<div class=\"progressbar-heading grids-heading\">";
				        echo "<h2>Books List</h2>";
			            echo "</div>";
			            echo "<div class=\"panel panel-widget\">";
				        echo "<div class=\"tables\">";
						$bookid = mysqli_real_escape_string($conn,$_POST['book_id']);
                        $isbn = mysqli_real_escape_string($conn,$_POST['isbn']);
                        $bookname = mysqli_real_escape_string($conn,$_POST['bookname']);
                        $_SESSION['bookid'] = $bookid;
                        $_SESSION['isbn'] = $isbn;

                       $issue_sql = "SELECT bookid,isbn,bookname,authorname,publisher,bookcost,status FROM books_list where bookid='$bookid' or isbn LIKE '%$isbn%' or bookname LIKE '%$bookname%'";
                       $issue_query = mysqli_query($conn,$issue_sql);
                       $num_rows = mysqli_num_rows($issue_query);
                       
                       if($issue_query){
      
                               if($num_rows > 0){
                               	  echo "<table class=\"table table-bordered\">";
                                  echo "<tr>";
                                  echo "<th>Book ID No.</th>";
                                  echo "<th>ISBN</th>";
                                  echo "<th>Book Title</th>";
                                  echo "<th>Author Name</th>";
                                  echo "<th>Publishers</th>";
                                  echo "<th>Status</th>";
                                  echo "</tr>";
        
                        while($row = mysqli_fetch_array($issue_query)){
           
                                   echo "<tr>";
                                   echo "<td><a href=\"bookprofile?issue=" . $row['bookid'] . "\" target=\"_BLANK\">" . $row['bookid'] . "</td>";
                                   echo "<td>" . $row['isbn'] ."</td>";
                                   echo "<td>" . $row['bookname'] . "</td>";
                                   echo "<td>" . $row['authorname'] . "</td>";
                                   echo "<td>" . $row['publisher'] . "</td>";
                                   echo "<td>" . $row['status'] . "</td>";
                                   echo "</tr>";
                                }

                           echo "</table>";
         mysqli_free_result($issue_query);
    } else{
        echo "No records matching your query were found.";
    }
} 
else{
    echo "ERROR: Could not able to execute";
}
 
mysqli_close($conn);
}					
?>
	               </div>
				</div>
			</div>
		</div>
	</div>


<?php include 'includes/footer.php'; ?>