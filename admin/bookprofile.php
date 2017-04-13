<?php
#Include Files
include 'includes/include.php';
dbconnect();
session_set();
?>
<style>
.info{
   padding-bottom: 20px;
   font-size:15px;
   font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
}
.img-circle {
    border-radius: 50%;
    font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
}
</style>
<?php 
include 'includes/head.php'; 
include 'includes/sidebar_menu.php';
include 'includes/header_menu.php';
?>
<!-- main content start-->
<?php  
if(isset($_GET['issue'])){

    $bookid = $_GET['issue'];

    $prof_sql = "SELECT * FROM books_list where bookid='$bookid'";
    $prof_query = mysqli_query($conn,$prof_sql);
    $edit_num_rows = mysqli_num_rows($prof_query);
    $edit_row = mysqli_fetch_array($prof_query);
    if($edit_row['bookid'] != $bookid){
    	?>
    	<div id="page-wrapper">
		<div class="main-page">
				<!--grids-->
				<div class="grids">
					<div class="compose-grids">
						<div class="col-md-4">
						</div>
						<div class="col-md-12">
							<div class="panel panel-widget">
								<div class="compose-right widget-shadow">
									<div class="panel-default">
										<div class="panel-heading">
											No Book Found for Your Queries 
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php  }
else{

?>
	<div id="page-wrapper">
		<div class="main-page">
				<!--grids-->
				<div class="grids">
					<div class="compose-grids">
						<div class="col-md-4">
							<div class="panel panel-widget">
								<div class="compose-left">
									<img width="280" src="http://localhost/sms/theme/temp2/assets/img/faces/marc.jpg" />
								</div>
							</div>
						</div>
						<div class="col-md-8">
							<div class="panel panel-widget">
								<div class="compose-right widget-shadow">
									<div class="panel-default">
										<div class="panel-heading">
											Book Info: 
										</div>
									 <div class="panel-body" style="padding:5px;padding-top: 20px;">
									  <form name="update_book" method="POST" action="action/updatebook.php">
										  <table class="table">
										     <tbody>
											   <tr>
											     <td colspan="2">
											       <div class="col-md-12 info">
												    <b>Book ID No.: </b>
												     <?php echo $edit_row['bookid'];?>
												     <input type="hidden" name="bookid" value="<?php echo $edit_row['bookid']; ?>">
												    </div>
	                                             </td>
	                                            </tr>
											   <tr>
											     <td>
											       <div class="col-md-12 info">
												    <b>ISBN</b>: 
												     <input class="form-control" type="text" name="isbn" value="<?php echo $edit_row['isbn']; ?>" >
                                                   </div>
	                                             </td>
	                                             <td>
	                                              <div class="col-md-12 info">
												   <b>Book Name: </b>
												  <input class="form-control" type="text" name="bookname" value="<?php echo $edit_row['bookname']; ?>" >
                                                  </div>
	                                             </td>
	                                           </tr>
	                                           <tr>
											     <td>
											       <div class="col-md-12 info">
												    <b>Author Name:</b> 
												   <input class="form-control" type="text" name="authorname" value="<?php echo $edit_row['authorname']; ?>" >
                                                   </div>
	                                             </td>
	                                             <td>
	                                              <div class="col-md-12 info">
												   <b>Publisher:</b> 
												  <input class="form-control" type="text" name="publisher" value="<?php echo $edit_row['publisher']; ?>" >
                                                  </div>
	                                             </td>
	                                           </tr>
	                                           <tr>
	                                           	<td colspan="2">
											       <div class="col-md-12 info">
												    <b>Book Status: </b>
												    <?php echo $edit_row['status']; ?>
                                                   </div>
	                                             </td>
	                                           </tr>
	                                           <tr>
											     <td colspan="2">
	                                              <div class="col-md-12 info">
												   <b>Book Cost: </b> 
												   <input class="form-control" type="text" name="bookcost" value="<?php echo $edit_row['bookcost']; ?>" >
                                                  </div>
	                                             </td>
											    </tr>
	                                           <tr>
											     <td colspan="2">
											       <div class="col-md-12 info">
												    <b>Category: </b>
												   <input class="form-control" type="text" name="category" value="<?php echo $edit_row['category']; ?>" >
                                                   </div>
	                                             </td>
	                                            </tr>
	                                         </tbody>
	                                       </table>	
	                                       <center>
										  <input type="submit" name="update_book" value="Update Profile">
										  <input type="submit" name="delete_book" value="Delete Profile">
										  </center>
	                                    </div>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	                    <div class="col-md-12">
							<div class="panel panel-widget">
								<div class="compose-right widget-shadow">
									<div class="panel-default">

										<div class="panel-heading">
											Book Record: 
										</div>
									 <div class="panel-body" style="padding:5px;padding-top: 20px;">
<?php
 $bookid = $_GET['issue'];
 if(($bookid != '') && ($bookid == $edit_row['bookid'])){
 $issue_sql = "SELECT * FROM issue_book where bookid='$bookid'";
 $issue_query = mysqli_query($conn,$issue_sql);
 $num_rows = mysqli_num_rows($issue_query);
   
   if($issue_query){
      if($num_rows > 0){
            echo "<table class=\"table table-bordered\">";
            echo "<tr>";
            echo "<th>Issued to</th>";
            echo "<th>Issued On</th>";
            echo "<th>Issued By</th>";
            echo "<th>Returned On</th>";
            
            while($row = mysqli_fetch_array($issue_query)){
                        echo "<tr>";
                        echo "<td><a target=\"_blank\" href=\"student_profile?view=".$row['issued_to']."\">" . $row['issued_to'] . "</a></td>";
                        echo "<td>" . $row['issued_on'] . "</td>";
                        echo "<td>" . $row['issued_by'] . "</td>";
                        echo "<td>" . $row['returned'] . "</td>";
                        echo "</tr>";
                    }
                 
                 echo "</table>";
                    mysqli_free_result($issue_query);
                    } 
                    else{
                        echo "No records matching your query were found.";
                      }
                   } 
        else{
          echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
         }
        }
        else{
        	echo "<script>window.location = \"index.php\";</script>";
        }
?>	  
	            </div>
	          </div>
	       </div>
	    </div>
	  </div>
<div class="col-md-12">
	<div class="panel panel-widget">
	   <div class="compose-right widget-shadow">
		 <div class="panel-default">
			<div class="panel-heading">
					Book Issue or Return: 
				</div>
			<div class="panel-body" style="padding:5px;padding-top: 20px;">
<?php 
    $bookid = $_GET['issue'];
    $bookid = $_GET['issue'];
 if(($bookid != '') && ($bookid == $edit_row['bookid'])){
    $status_sql = "SELECT * FROM books_list where bookid='$bookid'";
    $status_query = mysqli_query($conn,$status_sql);
    $status_row = mysqli_fetch_array($status_query);

    if($status_row['status'] == 'Available'){
          echo "<form method=\"POST\" name=\"issue_book\" action=\"action/updatebook.php\">";
          echo "<input type=\"hidden\" class=\"form-control\" name=\"bookid\" value=\"".$bookid."\">";
          echo "<input type=\"hidden\" class=\"form-control\" name=\"status\">";
          echo "<input type=\"text\" class=\"form-control col-md-4\" placeholder=\"Enter College Reg. No.\" name=\"issued_to\">";
          echo "<input type=\"submit\" name=\"issue_book\" value=\"Issue Book\">";
          echo "</form>";
    }
    else{
        echo "<form method=\"POST\" name=\"issue_book\" action=\"action/updatebook.php\">";
        echo "<input type=\"hidden\" class=\"form-control\" name=\"bookid\" value=\"".$bookid."\">";
        echo "<input type=\"hidden\" class=\"form-control\" name=\"status\">";
        echo "<center><input type=\"submit\" name=\"return_book\" value=\"Return Book\"></center>";
        echo "</form>";
    }
   }
   else{
   	echo "<script>window.location = \"index.php\";</script>";
   }
    mysqli_free_result($status_query);
    mysqli_close($conn);
}
?>
	      </div>
	   </div>
	 </div>
   </div>
</div>
<div class="clearfix"> </div>
</div>
<div class="clearfix"> </div>
</div>
<div class="clearfix"> </div>
</div>
</div>
</div>

<?php } ?>
		</div>
	</div>
<?php include 'includes/footer.php'; ?>