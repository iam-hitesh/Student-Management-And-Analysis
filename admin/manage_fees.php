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
						<h2>View Attendance Here</h2>
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
                            <input type="text" name="regno" required="true" class="form-control" placeholder="Registration No.">
                          </td>
                          <td>
                    <select name="fee_type" class="form-control" required="True">
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
		    $fee_type = mysqli_real_escape_string($conn,$_POST['fee_type']);
        $reg = mysqli_real_escape_string($conn,$_POST['regno']);
                       
        $sql = "SELECT * FROM fees_allocation where note='$fee_type' and regno='$reg'";
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
                        echo "<th>College ID</th>";
                        echo "<th>Full Name</th>";
                        echo "<th>Branch</th>";
                        echo "<th>Session</th>";
                        echo "<th>Fee Type</th>";
                        echo "<th>Fee Status</th>";
                        echo "<th>Fees </th>";
                        echo "<th>Updated On</th>";
                        echo "<th>Action</th>";
                        echo "</tr>";
        
            while($row = mysqli_fetch_array($query)){
                        
                        $reg = $row['regno'];
                        $reg_sql = "SELECT regno,fname,lname from students_list where regno='$reg'";
                        $reg_query = mysqli_query($conn,$reg_sql);
                        $fetch = mysqli_fetch_array($reg_query);
                        
                        echo "<tr>";
                        echo "<form method=\"POST\" action=\"action/manage_fees.php\" name=\"manage_fees\">";
                        echo "<td>" .$reg. "</td>";
                        echo "<td>" .$fetch['fname']." ".$fetch['lname']."</td>";
                        echo "<td>" . $row['branch'] . "</td>";
                        echo "<td>" . $row['session'] . "</td>";
                        echo "<td>" . $row['note'] . "</td>";
                        echo "<td><select name=\"status\" class=\"form-control\">";
                        echo "<option value=\"".$row['status']."\">".$row['status']."</option>";
                        echo "<option value=\"Submitted\">Submitted</option>";
                        echo "<option value=\"Not Submitted\">Not Submitted</option>";
                        echo "</select></td>";
                        echo "<td><input type=\"text\" class=\"form-control\" name=\"fees\" value=\"". $row['fees'] ."\"></td>";
                        echo "<td>" . $row['updated_on'] . "</td>";
                        echo "<input type=\"hidden\" name=\"reg\" value=\"".$reg."\">";
                        echo "<input type=\"hidden\" name=\"fee_type\" value=\"".$fee_type."\">";
                        echo "<td><input type=\"submit\" name=\"update_fees\" value=\"Update\" class=\"btn btn-primary\" required=\"true\" />&nbsp;<input type=\"submit\" name=\"delete_fees\" value=\"Delete\" class=\"btn btn-primary\" required=\"true\" /></td>";
                        echo "</form>";
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