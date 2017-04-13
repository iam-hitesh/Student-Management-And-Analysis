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
						<h2>Add Fees Here</h2>
					</div>
					<div class="panel panel-widget">
						<div class="tables">
						<h2>Select Students</h2>
						<br/>
						<form method="POST" name="add_fees" action="<?php echo $_SERVER['PHP_SELF']; ?>">
							<table class="table">
								<tbody>
								    <tr>
									  <td>
                                       <select name="branch" class="form-control" >
											<option value="">Select Branch</option>
										<?php
											$departments_sql = "SELECT DISTINCT branch from students_list";
                                           $departments_query = mysqli_query($conn,$departments_sql);

                                           $num_rows = mysqli_num_rows($departments_query);
                                              
                                              if($departments_query){
                                                      if($num_rows > 0){
	                                              
	                                                     while($row = mysqli_fetch_array($departments_query)){
		                                                     echo "<option value=\"".$row['branch']."\">".$row['branch']."</option>";
	                                                               }
                                                               }
                                                           }
                                                           ?>
										</select>
									  </td>
									  <td>
									    <select name="session"  class="form-control" >
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
									   <input type="text" name="note" class="form-control" required="true" placeholder="Fees For" />
									   </td>
                     <td>
                     <input type="text" name="reg" class="form-control" required="true" placeholder="Reg. No." />
                     </td>
									  </tr>
								</tbody>
							</table>
							<input type="submit" name="add_fees" value="Search" class="btn btn-primary" required="true" />
							<input type="reset" name="reset" value="Reset" class="btn btn-danger" />
							</form>
						</div>
					</div>       
<?php

	if(isset($_POST['add_fees'])){
		    $branch = mysqli_real_escape_string($conn,$_POST['branch']);
        $session = mysqli_real_escape_string($conn,$_POST['session']);
        $note = mysqli_real_escape_string($conn,$_POST['note']);
        $reg = mysqli_real_escape_string($conn,$_POST['reg']);
        
        $fees_sql = "SELECT regno,fname,lname,branch,session,batch FROM students_list where branch='$branch' and session='$session' or regno='$reg'";
        $fees_query = mysqli_query($conn,$fees_sql);
        $num_rows = mysqli_num_rows($fees_query);

            echo "<div class=\"grids\">";
			echo "<div class=\"panel panel-widget\">";
			echo "<div class=\"tables\">";
			echo "<div class=\"progressbar-heading grids-heading\">";
			echo "<h2>Students List</h2>";
			echo "</div>";
                       
            if($fees_query){
      
                    if($num_rows > 0){
                        
                        echo "<table class=\"table table-bordered\">";
                        echo "<tr>";
                        echo "<th>College ID</th>";
                        echo "<th>Full Name</th>";
                        echo "<th>Branch</th>";
                        echo "<th>Session</th>";
                        echo "<th>Batch</th>";
                        echo "<th>Add Fees</th>";
                        echo "<th>Status</th>";
                        echo "</tr>";
        
            while($row = mysqli_fetch_array($fees_query)){
                        
                        $reg = $row['regno'];
                        echo "<form name=\"submit_fees\" action=\"action/submit_fees.php?r=".$num_rows."&&reg=".$reg."\" method=\"POST\">";
                        echo "<tr>";
                        echo "<td>" .$reg . "</td>";
                        echo "<td>" . $row['fname'] ." ". $row['lname'] .  "</td>";
                        echo "<td>" . $row['branch'] . "</td>";
                        echo "<td>" . $row['session'] . "</td>";
                        echo "<td>" . $row['batch'] . "</td>";
                        echo "<td><input type=\"text\" name=\"fees[]\"></td>";
                        echo "<td><select name=\"status[]\" required=\"true\" class=\"form-control\">";
								        echo "<option value=\"\">Status</option>";
								        echo "<option value=\"Submitted\">Submitted</option>";
								        echo "<option value=\"Not Submitted\">Not Submitted</option>";
						            echo "</select></td>";
                        echo "<input type=\"hidden\" name=\"regno[]\" value=\"$reg\">";
                        echo "<input type=\"hidden\" name=\"note[]\" value=\"$note\">";
                        echo "<input type=\"hidden\" name=\"batch\" value=\"".$row['batch']."\">";
                        echo "<input type=\"hidden\" name=\"branch\" value=\"".$branch."\">";
                        echo "<input type=\"hidden\" name=\"session\" value=\"".$session."\">";
                        echo "</tr>";
                    }

                        echo "</table>";
                        echo "<input type=\"submit\" name=\"submit_fees\" class=\"btn btn-primary\" required=\"true\" >";
                        echo "</form>";

        
                        mysqli_free_result($fees_query);
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