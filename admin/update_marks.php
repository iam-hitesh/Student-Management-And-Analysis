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
						<h2>Update Marks Here</h2>
					</div>
					<div class="panel panel-widget">
						<div class="tables">
						<h2>Select Year,Branch,Batch and Subject</h2>
						<br/>
						<form method="POST" name="add_marks" action="<?php echo $_SERVER['PHP_SELF']; ?>">
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
                                              <select name="subject" required="true" class="form-control">
                                                <option>Select Subject</option>
                                                </select>
                                            </div>
							            </td>
							            <td>
									       <select name="exam" required="true" class="form-control" >
										     <option value="">Select Exam</option>
									         <option value="Mid Term 1">Mid Term 1</option>
									         <option value="Mid Term 2">Mid Term 2</option>  
									       </select>
									    </td>
                                        <td>
									      <input type="text" name="regno" class="form-control" placeholder="Reg. No.">
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
        $subject = mysqli_real_escape_string($conn,$_POST['subject']);
        $regno = mysqli_real_escape_string($conn,$_POST['regno']);
        $sem = mysqli_real_escape_string($conn,$_POST['sem']);
        $exam = mysqli_real_escape_string($conn,$_POST['exam']);
        
        $marks_sql = "SELECT * FROM marks_allocation where branch='$branch' and sem='$sem' and regno='$regno' and subject='$subject' and exam='$exam' ";
        $marks_query = mysqli_query($conn,$marks_sql);
        $num_rows = mysqli_num_rows($marks_query);

            echo "<div class=\"grids\">";
			echo "<div class=\"panel panel-widget\">";
			echo "<div class=\"tables\">";
			echo "<div class=\"progressbar-heading grids-heading\">";
			echo "<h2>Students List</h2>";
			echo "</div>";
                       
            if($marks_query){
      
                   $row = mysqli_fetch_array($marks_query);
                        
                        echo "<table class=\"table table-bordered\">";
                        echo "<tr>";
                        echo "<td colspan=\"2\"><b>Subject: </b>".$subject."</td>";
                        echo "<td colspan=\"2\"><b>".$sem."</b></td>";
                        echo "<td colspan=\"5\"><b>".$exam."</b></td>";
                        echo "</tr>";
                        
                        echo "<tr>";
                        echo "<th>College ID</th>";
                        echo "<th>Full Name</th>";
                        echo "<th>Branch</th>";
                        echo "<th>Session</th>";
                        echo "<th>Batch</th>";
                        echo "<th>Marks Obtained</th>";
                        echo "<th>Max Marks</th>";
                        echo "<th colspan=\"2\">Action</th>";
                        echo "</tr>";
        
            
                        
                        $reg = $row['regno'];
                        echo "<form action=\"action/updated_marks?reg=\"".$reg."\" method=\"POST\">";
                        echo "<tr>";
                        echo "<td>" .$reg . "</td>";
                        echo "<td>" . $row['fname'] ." ". $row['lname'] .  "</td>";
                        echo "<td>" . $row['branch'] . "</td>";
                        echo "<td>" . $row['session'] . "</td>";
                        echo "<td>" . $row['batch'] . "</td>";
                        echo "<td><input type=\"text\" name=\"marks\" class=\"form-control\" value=\"". $row['marks'] . "\"></td>";
                        echo "<td><input type=\"text\" name=\"max_marks\" class=\"form-control\" value=\"" . $row['max_marks'] . "\"></td>";
                        echo "<input type=\"hidden\" name=\"regno\" value=\"$reg\">";
                        echo "<input type=\"hidden\" name=\"subject\" value=\"$subject\">";
                        echo "<input type=\"hidden\" name=\"exam\" value=\"$exam\">";
                        echo "<td><input type=\"Submit\" name=\"update_marks\" class=\"btn btn-primary\" value=\"Update\" required=\"true\" ></td>";
                        echo "<td><input type=\"Submit\" name=\"delete_marks\" class=\"btn btn-primary\" value=\"Delete\" required=\"true\" ></td>";
                        echo "</tr>";
                        echo "</table>";
                        echo "</form>";
                        
                        mysqli_free_result($marks_query);
                     
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
