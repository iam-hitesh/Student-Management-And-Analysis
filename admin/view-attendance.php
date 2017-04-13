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
									   <select name="branch" id="branch" onChange="change_branch()" required="true" class="form-control" >
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
									      <select name="batch" required="true" class="form-control" >
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
                            <input type="date" name="date" class="form-control">
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
        $subject = mysqli_real_escape_string($conn,$_POST['subject']);
        $_SESSION['subject'] = $subject;
        $date = mysqli_real_escape_string($conn,$_POST['date']);
        $sem = mysqli_real_escape_string($conn,$_POST['sem']);
        $_SESSION['sem'] = $sem;
        $batch = mysqli_real_escape_string($conn,$_POST['batch']);
        $_SESSION['batch'] = $batch;
        $session = mysqli_real_escape_string($conn,$_POST['session']);
        $_SESSION['session'] = $session;
                        
        $marks_sql = "SELECT * FROM attendance where subject='$subject' and updated_on='$date' and batch='$batch'";
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
                        echo "<td colspan=\"3\"><b>Subject: </b>".$subject."</td>";
                        echo "<td colspan=\"4\"><b>".$sem."</b></td>";
                        echo "</tr>";
                        
                        echo "<tr>";
                        echo "<th>College ID</th>";
                        echo "<th>Full Name</th>";
                        echo "<th>Branch</th>";
                        echo "<th>Session</th>";
                        echo "<th>Batch</th>";
                        echo "<th>Class Attended</th>";
                        echo "</tr>";
        
            while($row = mysqli_fetch_array($marks_query)){
                        
                        $reg = $row['regno'];
                        $reg_sql = "SELECT regno,fname,lname from students_list where regno='$reg'";
                        $reg_query = mysqli_query($conn,$reg_sql);
                        $fetrch = mysqli_fetch_array($reg_query);
                        
                        echo "<tr>";
                        echo "<td>" .$reg. "</td>";
                        echo "<td>" .$fetrch['fname']." ".$fetrch['lname']."</td>";
                        echo "<td>" . $row['branch'] . "</td>";
                        echo "<td>" . $row['session'] . "</td>";
                        echo "<td>" . $row['batch'] . "</td>";
                        if($row['status'] == 1){
                        echo "<td>Present</td>";
                      }
                      else{
                        echo "<td>Absent</td>";
                      }
                        echo "</tr>";
                    }

                        echo "</table>";
                        
                        mysqli_free_result($marks_query);
                    } else{
                        echo "Oops! We didn't find what you want to search.";
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