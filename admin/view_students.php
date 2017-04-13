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
						<h2>Search Students Here</h2>
					</div>
					<div class="panel panel-widget">
						<div class="tables">
						<h2>Select Students Details Here</h2>
						<br/>
						<form method="POST" name="add_marks" action="<?php echo $_SERVER['PHP_SELF']; ?>">
							<table class="table">
								<tbody>
								    <tr>
									  <td>
									   <select name="branch" required="true" class="form-control" >
											<option value="">Select Branch</option>
									    <?php
                                           $departments_sql = "SELECT departments from strings";
                                           $departments_query = mysqli_query($conn,$departments_sql);

                                           $num_rows = mysqli_num_rows($departments_query);
                                              
                                              if($departments_query){
                                                      if($num_rows > 0){
	                                              
	                                                     while($row = mysqli_fetch_array($departments_query)){
		                                                     echo "<option value=\"".$row['departments']."\">".$row['departments']."</option>";
	                                                               }
                                                               }
                                                           }
                                        ?>
                                      </select>
									 </td>
									 <td>
									    <select name="session" required="true" class="form-control" >
											<option value="">Select Session/Semester</option>
											<?php
                                           $session_sql = "SELECT DISTINCT session from students_list";
                                           $session_query = mysqli_query($conn,$session_sql);

                                           $num_rows = mysqli_num_rows($session_query);
                                              
                                              if($session_query){
                                                      if($num_rows > 0){
	                                              
	                                                     while($row = mysqli_fetch_array($session_query)){
		                                                     echo "<option value=\"".$row['session']."\">".$row['session']."</option>";
	                                                               }
                                                               }
                                                           }
                                        ?>
										</select>               
									   </td>
									   <td>
									      <input type="text" name="regno" placeholder="Reg No." class="form-control"/>
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
		$branch = mysqli_real_escape_string($conn,$_POST['branch']);
        $session = mysqli_real_escape_string($conn,$_POST['session']);
        $regno = mysqli_real_escape_string($conn,$_POST['regno']);
        $fname = mysqli_real_escape_string($conn,$_POST['fname']);
        
        $students_sql = "SELECT regno,fname,lname,branch,session,batch FROM students_list where regno='$regno' or branch='$branch' and session='$session' or fname='$fname'";
        $students_query = mysqli_query($conn,$students_sql);
        $num_rows = mysqli_num_rows($students_query);

            echo "<div class=\"grids\">";
			echo "<div class=\"panel panel-widget\">";
			echo "<div class=\"tables\">";
			echo "<div class=\"progressbar-heading grids-heading\">";
			echo "<h2>Students List</h2>";
			echo "</div>";
                       
            if($students_query){
      
                    if($num_rows > 0){
                        
                        echo "<table class=\"table table-bordered\">";
                        echo "<tr>";
                        echo "<th>College ID</th>";
                        echo "<th>Full Name</th>";
                        echo "<th>Branch</th>";
                        echo "<th>Session</th>";
                        echo "<th>Batch</th>";
                        echo "</tr>";
        
            while($row = mysqli_fetch_array($students_query)){
                        
                        $reg = $row['regno'];
                        $fname = $row['fname'];
                        $lname = $row['lname'];
                        echo "<tr>";
                        echo "<td><a target=\"blank\" href=\"students/profile.php?view=".$reg ."\">".$reg ."</a></td>";
                        echo "<td>" . $row['fname'] ." ". $row['lname'] .  "</td>";
                        echo "<td>" . $row['branch'] . "</td>";
                        echo "<td>" . $row['session'] . "</td>";
                        echo "<td>" . $row['batch'] . "</td>";
                        echo "</tr>";
                    }
                 echo "</table>";
                        
                    mysqli_free_result($students_query);
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