<?php
include 'includes/include.php';
dbconnect();
session_set();
error_reporting(0);
$user = $_SESSION['regno'];
$user_sql = "SELECT * FROM students_list where regno='$user'";
$user_query = mysqli_query($conn,$user_sql);
$user_row = mysqli_fetch_array($user_query);
include 'includes/head.php';
include 'includes/sidebar_menu.php';
include 'includes/header_menu.php';
?>
<body>

	      <div class="content">
	            <div class="container-fluid">
	                <div class="row">

	                    <div class="col-md-12">
	                        <div class="card">
	                            <div class="card-header" data-background-color="blue">
	                                <h4 class="title">Check Your Marks</h4>
									<p class="category">Select Semester and Subject</p>
	                            </div>
	                            <div class="card-content">
	                                <form method="POST" name="search_marks" action="<?php echo $_SESSION['PHP_SELF']; ?>">
	                                    <div class="row">
	                                        <div class="col-md-3">
												<div class="form-group label-floating">
													<select name="branch" class="form-control" id="branch" onChange="change_branch()">
													    <option>Select Branch</option>
														<option value="<?php echo $user_row['branch']; ?>"><?php echo $user_row['branch']; ?></option>
													</select>
												</div>
	                                        </div>

	                                        <div class="col-md-3">
												<div class="form-group label-floating">
													<div id="sem">
                                                       <select name="sem" id="sem" required="true" class="form-control">
                                                           <option>Select Semester</option>
                                                       </select>
                                                    </div>
												</div>
	                                        </div>
	                                        <div class="col-md-3">
												<div class="form-group label-floating">
													<div id="subjects">
                                                       <select name="subjects" required="true" class="form-control">
                                                         <option>Select Subject</option>
                                                       </select>
                                                    </div>
												</div>
	                                        </div>
	                                    </div>
	                                    
	                                    <button type="submit" name="search_marks" class="btn btn-primary pull-right">Search</button>
	                                    <div class="clearfix"></div>
	                                </form>
	                            </div>
	                        </div>
	                    </div>
<?php 
    if(isset($_POST['search_marks'])){
 
        $reg = $_SESSION['regno'];
        $sem = mysqli_real_escape_string($conn,$_POST['sem']);
        $subject = mysqli_real_escape_string($conn,$_POST['subject']); 

        $attendance_sql = "SELECT * FROM attendance where regno='$reg' and sem='$sem' and subject='$subject'";
        $attendance_query = mysqli_query($conn,$attendance_sql);
        $attendance_num_rows = mysqli_num_rows($attendance_query);

	            if($attendance_query){
	                if($attendance_num_rows > 0){
	             echo "<div class=\"content\">";
	              echo "<div class=\"container-fluid\">";
	                echo "<div class=\"row\">";
	                  echo "<div class=\"col-md-12\">";
	                    echo "<div class=\"card\">";
	                       echo "<div class=\"card-header\" data-background-color=\"blue\">";
	                          echo "<h4 class=\"title\">Your Attendance in ".$subject."</h4>";
	                            echo "</div>";
	                              echo "<div class=\"card-content table-responsive\">";
	                                echo "<table class=\"table\">";
	                                   echo "<thead class=\"text-primary\">";
	                                        echo "<th>Subject</th>";
	                                    	echo "<th>Status</th>";
											echo "<th>Date</th>";
	                                        echo "</thead>";
	                                        echo "<tbody>";
	                    while($attendance_row = mysqli_fetch_array($attendance_query)){
	                        echo "<tr>";
	                        echo "<td>".$attendance_row['subject']."</td>";
	                        if($attendance_row['status'] == 1){
	                        echo "<td>Present</td>";
	                        }
	                        else{
	                        	echo "<td>Absent</td>";
	                        }
							echo "<td>".$attendance_row['updated_on']."</td>";
							echo "</tr>";
							$total += $attendance_row['status'];
							$total_attendance +=$attendance_row['attendance'];
	                      }
	                      
	                    $percent = (($total/$total_attendance) * 100);
	                    echo "<tr>";
	                    echo "<td>Total Attendance</td>";
						echo "<td>".$total." Out of</td>";
						echo "<td>".$total_attendance."</td>";
						echo "</tr>";
						echo "<tr><td colspan=\"3\"><center><h3>You have ".$percent."% attendance in ".$subject."</h3></center></td></tr>";

	                }
	        }
      }
?>
	                        </tbody>
	                      </table>
	                   </div>
	                </div>
	              </div>


<?php include'includes/footer_menu.php'; ?>

</body>
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
<?php include 'includes/footer.php'; ?>