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
						<h2>View Fees Here</h2>
					</div>
					<div class="panel panel-widget">
						<div class="tables">
						<h2>Select Year,Branch,Batch and Subject</h2>
						<br/>
						<form method="POST" name="search_students" action="<?php echo $_SERVER['PHP_SELF']; ?>">
							<table class="table">
								<tbody>
								    <tr>
									  <td>
									   <select name="branch" id="branch" class="form-control" >
										<option value="">Select Branch</option>
									   <?php
                         $departments_sql = "SELECT DISTINCT branch from students_list";
                        $departments_query = mysqli_query($conn,$departments_sql);

                            $num_rows = mysqli_num_rows($departments_query);
                                              
                                 if($departments_query){
                                          if($num_rows > 0){
	                                              
	                                 while($row = mysqli_fetch_array($departments_query)){
		                                  echo "<option value=\"".$row['branch']."\">".$row['branch']."</option>";                                                     }
                                                   }
                                         }
                                        ?>
                                      </select>
									 </td>
									 <td>
									      <select name="session" class="form-control" >
											<option value="">Select Session</option>
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
									  <select name="batch" class="form-control" >
											<option value="">Select Batch</option>
											<?php
                                           $batch_sql = "SELECT DISTINCT batch from students_list";
                                           $batch_query = mysqli_query($conn,$batch_sql);

                                           $num_rows = mysqli_num_rows($batch_query);
                                              
                                              if($batch_query){
                                                      if($num_rows > 0){
	                                              
	                                                     while($row = mysqli_fetch_array($batch_query)){
		                                                     echo "<option value=\"".$row['batch']."\">".$row['batch']."</option>";
	                                                               }
                                                               }
                                                           }
                                        ?>
                                        </select>
							            </td>
                           <td>
                    <select name="fee_type" class="form-control" >
                      <option value="">Select Fees Type</option>
                      <?php
                                           $status_sql = "SELECT DISTINCT note from fees_allocation";
                                           $status_query = mysqli_query($conn,$status_sql);

                                           $num_rows = mysqli_num_rows($status_query);
                                              
                                              if($status_query){
                                                      if($num_rows > 0){
                                                
                                                       while($row = mysqli_fetch_array($status_query)){
                                                         echo "<option value=\"".$row['note']."\">".$row['note']."</option>";
                                                                 }
                                                               }
                                                           }
                                        ?>
                                        </select>
                          </td>
                          <td>
                    <select name="status" class="form-control" >
                      <option value="">Select Fees Status</option>
                      <?php
                                           $status_sql = "SELECT DISTINCT status from fees_allocation";
                                           $status_query = mysqli_query($conn,$status_sql);

                                           $num_rows = mysqli_num_rows($status_query);
                                              
                                              if($status_query){
                                                      if($num_rows > 0){
                                                
                                                       while($row = mysqli_fetch_array($status_query)){
                                                         echo "<option value=\"".$row['status']."\">".$row['status']."</option>";
                                                                 }
                                                               }
                                                           }
                                        ?>
                                        </select>
                          </td>
                          <td>
                            <input type="text" name="regno" class="form-control" placeholder="Registration No.">
                          </td>
							         </tr>
								</tbody>
							</table>
							<input type="submit" name="search_students" value="Search" class="btn btn-primary" required="true" />
							<input type="reset" name="reset" value="Reset" class="btn btn-danger" />
							</form>
						</div>
					</div>

		
	             
<?php
   if(isset($_POST['search_students'])){
		    $branch = mysqli_real_escape_string($conn,$_POST['branch']);
        $session = mysqli_real_escape_string($conn,$_POST['session']);
        $batch = mysqli_real_escape_string($conn,$_POST['batch']);
        $fee_type = mysqli_real_escape_string($conn,$_POST['fee_type']);
        $status = mysqli_real_escape_string($conn,$_POST['status']);
        $reg = mysqli_real_escape_string($conn,$_POST['regno']);
                       
        $sql = "SELECT * FROM fees_allocation where branch='$branch' and session='$session' and batch='$batch' and status='$status' and note='$fee_type' or regno='$reg'";
        $query = mysqli_query($conn,$sql);
        $num_rows = mysqli_num_rows($query);

      echo "<div class=\"grids\">";
			echo "<div class=\"panel panel-widget\">";
			echo "<div class=\"tables\">";
			echo "<div class=\"progressbar-heading grids-heading\">";
			echo "<h2>Students List</h2>";
			echo "</div>";
                       
            if($query){
      
                    if($num_rows > 0){
                         
                        echo "<table class=\"table table-bordered\">";
                        echo "<tr>";
                        echo "<td colspan=\"3\"><b>Subject: </b>".$branch."</td>";
                        echo "<td colspan=\"4\"><b>Batch: ".$batch."</b></td>";
                        echo "</tr>";
                        
                        echo "<tr>";
                        echo "<th>College ID</th>";
                        echo "<th>Full Name</th>";
                        echo "<th>Branch</th>";
                        echo "<th>Session</th>";
                        echo "<th>Fee Type</th>";
                        echo "<th>Class Attended</th>";
                        echo "<th>Updated On</th>";
                        echo "</tr>";
        
            while($row = mysqli_fetch_array($query)){
                        
                        $reg = $row['regno'];
                        $reg_sql = "SELECT regno,fname,lname from students_list where regno='$reg'";
                        $reg_query = mysqli_query($conn,$reg_sql);
                        $fetrch = mysqli_fetch_array($reg_query);
                        
                        echo "<tr>";
                        echo "<td>" .$reg. "</td>";
                        echo "<td>" .$fetrch['fname']." ".$fetrch['lname']."</td>";
                        echo "<td>" . $row['branch'] . "</td>";
                        echo "<td>" . $row['session'] . "</td>";
                        echo "<td>" . $row['note'] . "</td>";
                        echo "<td>" . $row['status'] . "</td>";
                        echo "<td>" . $row['updated_on'] . "</td>";
                        echo "</tr>";
                    }

                        echo "</table>";
                        
                        mysqli_free_result($query);
                    } else{
                        echo "Oops! We didn't find what you want to search.";
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