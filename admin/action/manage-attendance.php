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
						<h2>Manage Attendance</h2>
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
									 <div id="sem">
                      <select name="sem" id="sem" required="true" class="form-control">
                        <option>Select Semester</option>
                      </select>
                  </div> 
                  </td>            
									   </td>
									   <td>
									      <div id="subjects">
                          <select name="subjects" required="true" class="form-control">
                          <option>Select Subject</option>
                          </select>
                          </div>
							            </td>
							           <td>
                            <input type="date" name="date" class="form-control">
                          </td>
                          <td>
                            <input type="text" name="reg" required="true" class="form-control" placeholder="Enter Reg. No.">
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
        $reg = mysqli_real_escape_string($conn,$_POST['reg']);
        $subject = mysqli_real_escape_string($conn,$_POST['subject']);
        $_SESSION['subject'] = $subject;
        $date = mysqli_real_escape_string($conn,$_POST['date']);
        $sem = mysqli_real_escape_string($conn,$_POST['sem']);
        $_SESSION['sem'] = $sem;
                                
        $marks_sql = "SELECT * FROM attendance where subject='$subject' and updated_on='$date' and regno='$reg' and branch='$branch'";
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
                        echo "<form method=\"POST\" action=\"".$_SERVER['PHP_SELF']."\" name=\"update_attendance\">";
                        echo "<tr>";
                        echo "<td colspan=\"3\"><b>Subject: </b>".$subject."</td>";
                        echo "<td colspan=\"5\"><b>".$sem."</b></td>";
                        echo "</tr>";
                        
                        echo "<tr>";
                        echo "<th>College ID</th>";
                        echo "<th>Full Name</th>";
                        echo "<th>Branch</th>";
                        echo "<th>Session</th>";
                        echo "<th>Batch</th>";
                        echo "<th>Status</th>";
                        echo "<th>Total Classes</th>";
                        echo "<th>Action</th>";
                        echo "</tr>";
        
            while($row = mysqli_fetch_array($marks_query)){
                        
                        $reg = $row['regno'];
                        $reg_sql = "SELECT regno,fname,lname from students_list where regno='$reg'";
                        $reg_query = mysqli_query($conn,$reg_sql);
                        $fetch = mysqli_fetch_array($reg_query);
                        
                        echo "<tr>";
                        echo "<td>" .$reg. "</td>";
                        echo "<td>" .$fetch['fname']." ".$fetch['lname']."</td>";
                        echo "<td>" . $row['branch'] . "</td>";
                        echo "<td>" . $row['session'] . "</td>";
                        echo "<td>" . $row['batch'] . "</td>";
                        if($row['status'] == 1){echo "<td>Present</td>"; }
                        else{
                          echo "<td>Absent</td>";
                        }
                        echo "<td>" . $row['attendance'] . "</td>";
                        echo "<td><input type=\"submit\" name=\"delete_attendance\" value=\"Delete\" class=\"btn btn-primary\" required=\"true\"/></td>";
                        echo "</tr>";
                    }

                        echo "</form>";
                        echo "</table>";
                        
                mysqli_free_result($marks_query);
                    } else{
                        echo "oops are u searching aliens???";
                      }
                   } 
        else{
          echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
     }
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
<script type="text/javascript">
function JSalert(){
    swal({   title: "Your account will be deleted permanently!",   
    text: "Are you sure to proceed?",   
    type: "warning",   
    showCancelButton: true,   
    confirmButtonColor: "#DD6B55",   
    confirmButtonText: "Yes, Remove My Account!",   
    cancelButtonText: "No, I am not sure!",   
    closeOnConfirm: false,   
    closeOnCancel: false }, 
    function(isConfirm){   
        if (isConfirm) 
    {   

        swal("Account Removed!", "Your account is removed permanently!", "success");   
        } 
        else {     
            swal("Hurray", "Account is not removed!", "error");   
            } });
}
function jsalert2(){
    swal({
  title: "Are you sure?",
  text: "You will not be able to recover this imaginary file!",
  type: "warning",
  showCancelButton: true,
  confirmButtonColor: "#DD6B55",
  confirmButtonText: "Yes, delete it!",
  cancelButtonText: "No, cancel plx!",
  closeOnConfirm: false,
  closeOnCancel: false
},
function(isConfirm){
  if (isConfirm) {
    swal("Deleted!", "Your imaginary file has been deleted.", "success");
  } else {
    swal("Cancelled", "Your imaginary file is safe :)", "error");
  }
});
}
window.onload = jsalert();
</script>
