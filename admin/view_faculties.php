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
						<h2>View Faculties Profile</h2>
					</div>
					<div class="panel panel-widget">
						<div class="tables">
						<h2>Select Faculties Profile</h2>
						<br/>
						<form method="POST" name="view_faculties" action="<?php echo $_SERVER['PHP_SELF']; ?>">
							<table class="table">
								<tbody>
								    <tr>
									  <td>
									   <select name="department" required="true" class="form-control" >
											<option value="">Select Department</option>
									    <?php
                                           $departments_sql = "SELECT name from departments";
                                           $departments_query = mysqli_query($conn,$departments_sql);

                                           $num_rows = mysqli_num_rows($departments_query);
                                              
                                              if($departments_query){
                                                      if($num_rows > 0){
	                                              
	                                                     while($row = mysqli_fetch_array($departments_query)){
		                                                     echo "<option value=\"".$row['name']."\">".$row['name']."</option>";
	                                                               }
                                                               }
                                                           }
                                        ?>
                                      </select>
									 </td>
									 <td>
									    <select name="designation" required="true" class="form-control" >
											<option value="">Select Session/Semester</option>
											<?php
                                           $designation_sql = "SELECT name from designation";
                                           $designation_query = mysqli_query($conn,$designation_sql);

                                           $num_rows = mysqli_num_rows($designation_query);
                                              
                                              if($designation_query){
                                                      if($num_rows > 0){
	                                              
	                                                     while($row = mysqli_fetch_array($designation_query)){
		                                                     echo "<option value=\"".$row['name']."\">".$row['name']."</option>";
	                                                               }
                                                               }
                                                           }
                                        ?>
										</select>               
									   </td>
									   <td>
									      <input type="text" name="fname" placeholder="First Name" class="form-control"/>
							            </td>
							         </tr>
								</tbody>
							</table>
							<input type="submit" name="add_marks" value="Submit" class="btn btn-primary" required="true" />
							<input type="reset" name="reset" value="Reset" class="btn btn-danger" />
							</form>
						</div>
					</div>

		
	             
<?php

	if(isset($_POST['add_marks'])){
		$designation = ucwords(mysqli_real_escape_string($conn,$_POST['designation']));
        $department = ucwords(mysqli_real_escape_string($conn,$_POST['department']));
        $idno = ucwords(mysqli_real_escape_string($conn,$_POST['idno']));
        $fname = ucwords(mysqli_real_escape_string($conn,$_POST['fname']));
        
        $faculty_sql = "SELECT * FROM faculty_list where idno='$idno' or department='$department' and designation='$designation' or fname LIKE '%$fname%'";
        $faculty_query = mysqli_query($conn,$faculty_sql);
        $num_rows = mysqli_num_rows($faculty_query);

            echo "<div class=\"grids\">";
			echo "<div class=\"panel panel-widget\">";
			echo "<div class=\"tables\">";
			echo "<div class=\"progressbar-heading grids-heading\">";
			echo "<h2>Students List</h2>";
			echo "</div>";
                       
            if($faculty_query){
      
                    if($num_rows > 0){
                        
                        echo "<table class=\"table table-bordered\">";
                        echo "<tr>";
                        echo "<th>College ID</th>";
                        echo "<th>Full Name</th>";
                        echo "<th>Branch</th>";
                        echo "<th>Session</th>";
                        echo "<th>Batch</th>";
                        echo "</tr>";
        
            while($row = mysqli_fetch_array($faculty_query)){
                        
                        $idno = $row['idno'];
                        $fname = $row['fname'];
                        $lname = $row['lname'];
                        echo "<tr>";
                        echo "<td><a target=\"blank\" href=\"fprofile?view=".$idno ."\">".$idno ."</a></td>";
                        echo "<td>" . $row['fname'] ." ". $row['lname'] .  "</td>";
                        echo "<td>" . $row['department'] . "</td>";
                        echo "<td>" . $row['designation'] . "</td>";
                        echo "<td>" . $row['mail'] . "</td>";
                        echo "</tr>";
                    }
                 echo "</table>";
                        
                    mysqli_free_result($faculty_query);
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