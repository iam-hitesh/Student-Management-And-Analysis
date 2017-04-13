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
						<h2>Find Books Here</h2>
					</div>
					<div class="panel panel-widget">
						<div class="tables">
						<h2>Search Books</h2>
						<br/>
						<form method="POST" name="view_books" action="<?php echo $_SERVER['PHP_SELF']; ?>">
							<table class="table">
								<tbody>
								    <tr>
									  <td>
									    <input type="text" name="bookid" placeholder="Book ID" class="form-control"/>
							          </td>
							          <td>
									    <input type="text" name="isbn" placeholder="ISBN" class="form-control"/>
							          </td>
							          <td>
									    <input type="text" name="bookname" placeholder="Book Name" class="form-control"/>
							          </td>
							          <td>
									    <input type="text" name="authorname" placeholder="Author Name" class="form-control"/>
							          </td>
							         </tr>
								</tbody>
							</table>
							<input type="submit" name="view_books" value="Submit" class="btn btn-primary" required="true" />
							<input type="reset" name="reset" value="Reset" class="btn btn-danger" />
							</form>
						</div>
					</div>

		
	             
<?php

	if(isset($_POST['view_books'])){
		$bookid = ucwords(mysqli_real_escape_string($conn,$_POST['bookid']));
        $isbn = ucwords(mysqli_real_escape_string($conn,$_POST['isbn']));
        $bookname = ucwords(mysqli_real_escape_string($conn,$_POST['bookname']));
        $authorname = ucwords(mysqli_real_escape_string($conn,$_POST['authorname']));
        
        $books_sql = "SELECT * FROM books_list where bookid LIKE '%$bookid%' or isbn LIKE '%$isbn%' or  bookname LIKE '%$bookname%' or authorname LIKE '%$authorname%'";
        $books_query = mysqli_query($conn,$books_sql);
        $num_rows = mysqli_num_rows($books_query);

            echo "<div class=\"grids\">";
			echo "<div class=\"panel panel-widget\">";
			echo "<div class=\"tables\">";
			echo "<div class=\"progressbar-heading grids-heading\">";
			echo "<h2>Book's List</h2>";
			echo "</div>";
                       
            if($books_query){
      
                    if($num_rows > 0){
                        
                        echo "<table class=\"table table-bordered\">";
                        echo "<tr>";
                        echo "<th>Book ID</th>";
                        echo "<th>ISBN</th>";
                        echo "<th>Book Name</th>";
                        echo "<th>Author Name</th>";
                        echo "<th>Price</th>";
                        echo "<th>Publisher</th>";
                        echo "<th>Status</th>";
                        echo "</tr>";
        
            while($row = mysqli_fetch_array($books_query)){
                        
                        $bookid = $row['bookid'];
                        $isbn = $row['isbn'];
                        $bookname = $row['bookname'];
                        echo "<tr>";
                        echo "<td><a target=\"blank\" href=\"bookprofile?issue=".$bookid ."\">".$bookid ."</a></td>";
                        echo "<td>" . $row['bookid'] ."</td>";
                        echo "<td>" . $row['isbn'] . "</td>";
                        echo "<td>" . $row['bookname'] . "</td>";
                        echo "<td>" . $row['bookcost'] . "</td>";
                        echo "<td>" . $row['publisher'] . "</td>";
                        echo "<td>" . $row['status'] . "</td>";
                        echo "</tr>";
                    }
                 echo "</table>";
                        
                    mysqli_free_result($books_query);
                    } else{
                        echo "No records matching your query were found.";
                      }
                   } 
        else{
          echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
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