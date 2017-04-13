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
						<h2>Add Marks Here</h2>
					</div>
					<div class="panel panel-widget">
						<div class="tables">
						<h2>Select Year,Branch,Batch and Subject</h2>
						<br/>
						<form method="POST" name="search_student" action="<?php echo $_SERVER['PHP_SELF']; ?>">
							<table class="table">
								<tbody>
								    <tr>
									  <td>
									   <select name="branch" id="branch" onChange="change_branch()" required="true" class="form-control" >
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
									      <select name="session" required="true" class="form-control" >
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
									    <div id="sem">
                                           <select name="sem" id="sem" required="true" class="form-control">
                                              <option>Select Semester</option>
                                           </select>
                                         </div>             
									   </td>
									   <td>
									      <div id="subjects">
                                              <select name="subjects" required="true" class="form-control">
                                                <option>Select Subject</option>
                                                </select>
                                            </div>
							            </td>
							            <td>
									      <select name="batch" class="form-control" >
											<option value="">Select Batch</option>
										<?php
                                           $session_sql = "SELECT DISTINCT batch from students_list";
                                           $session_query = mysqli_query($conn,$session_sql);

                                           $num_rows = mysqli_num_rows($session_query);
                                              
                                              if($session_query){
                                                      if($num_rows > 0){
	                                              
	                                                     while($row = mysqli_fetch_array($session_query)){
		                                                     echo "<option value=\"".$row['batch']."\">".$row['batch']."</option>";
	                                                               }
                                                               }
                                                           }
                                        ?>
							               </select>
							            </td>
							         </tr>
							      </tbody>
							</table>
							<input type="submit" name="search_student" value="Search" class="btn btn-primary" required="true" />
							<input type="reset" name="reset" value="Reset" class="btn btn-danger" />
							</form>
						</div>
					</div>

		
	             
<?php
   if(isset($_POST['search_student'])){
		$branch = mysqli_real_escape_string($conn,$_POST['branch']);
        $session = mysqli_real_escape_string($conn,$_POST['session']);
        $batch = mysqli_real_escape_string($conn,$_POST['batch']);
        $subject = mysqli_real_escape_string($conn,$_POST['subject']);
        $_SESSION['subject'] = $subject;
        $sem = mysqli_real_escape_string($conn,$_POST['sem']);
        $_SESSION['sem'] = $sem;
        $batch = mysqli_real_escape_string($conn,$_POST['batch']);
        $_SESSION['batch'] = $batch;
        $session = mysqli_real_escape_string($conn,$_POST['session']);
        $_SESSION['session'] = $session;
                        
                        

        $marks_sql = "SELECT regno,fname,lname,branch,session,batch FROM students_list where branch='$branch' and session='$session' and batch='$batch'";
        $marks_query = mysqli_query($conn,$marks_sql);
        $num_rows = mysqli_num_rows($marks_query);

      echo "<div class=\"grids\">";
			echo "<div class=\"panel panel-widget\">";
			echo "<div class=\"tables\">";
			echo "<div class=\"progressbar-heading grids-heading\">";
			echo "<h2>Students List</h2>";
			echo "</div>";
                       
            if($marks_query){
      
                    if($num_rows > 0){
                        
                        echo "<table class=\"table table-bordered\">";
                        echo "<tr>";
                        echo "<th>College ID</th>";
                        echo "<th>Full Name</th>";
                        echo "<th>Branch</th>";
                        echo "<th>Session</th>";
                        echo "<th>Batch</th>";
                        echo "<th>Attendance</th>";
                        echo "</tr>";
        
            while($row = mysqli_fetch_array($marks_query)){
                        
                        $reg = $row['regno'];
                        $fname = $row['fname'];
                        $lname = $row['lname'];
                        echo "<form action=\"action/submit_attendance.php?r=".$num_rows."&&reg=".$reg."\" method=\"POST\">";
                        echo "<tr>";
                        echo "<td>" .$reg . "</td>";
                        echo "<td>" . $row['fname'] ." ". $row['lname'] .  "</td>";
                        echo "<td>" . $row['branch'] . "</td>";
                        echo "<td>" . $row['session'] . "</td>";
                        echo "<td>" . $row['batch'] . "</td>";
                        echo "<td><fieldset>";
                        echo "<label for=\"Present\">P &nbsp;</label>";
                        echo "<input type=\"radio\" name=\"status\" value=\"1\">";
                        echo "&nbsp;";
                        echo "<label for=\"Absent\">A &nbsp;</label>";
                        echo "<input type=\"radio\" name=\"status\" value=\"0\">";
                        echo "</fieldset></td>";
                        echo "<input type=\"hidden\" name=\"regno[]\" value=\"$reg\">";
                        echo "<input type=\"hidden\" name=\"branch[]\" value=\"$branch\">";
                        echo "<input type=\"hidden\" name=\"session[]\" value=\"$session\">";
                        echo "<input type=\"hidden\" name=\"batch[]\" value=\"$batch\">";
                        echo "</tr>";
                    }

                        echo "</table>";
                        echo "<input type=\"submit\" name=\"submit_attendance\" value=\"Submit Attendance\" class=\"btn btn-primary\" required=\"true\" >";
                        echo "</form>";

        
                        mysqli_free_result($marks_query);
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
<script type="text/javascript">
	function change_branch(){
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.open("GET","ajax.php?branch="+document.getElementById("branch").value,false);
		xmlhttp.send(null);

		document.getElementById("sem").innerHTML=xmlhttp.responseText;
	}
	function change_sem(){
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.open("GET","ajax2.php?sem="+document.getElementById("semdd").value+"&&branch="+document.getElementById("branch").value,false);
		xmlhttp.send(null);

		document.getElementById("subjects").innerHTML=xmlhttp.responseText;
	}
</script>