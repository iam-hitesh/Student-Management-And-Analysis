<?php 
include 'includes/include.php';
dbconnect();
session_set();

if(isset($_POST['add_student'])){
           $regno = ucwords(mysqli_real_escape_string($conn,$_POST['regno']));
           $univreg = ucwords(mysqli_real_escape_string($conn,$_POST['univreg']));
           $fname = ucwords(mysqli_real_escape_string($conn,$_POST['fname']));
           $lname = ucwords(mysqli_real_escape_string($conn,$_POST['lname']));
           $gender = ucwords(mysqli_real_escape_string($conn,$_POST['gender']));
           $dob = ucwords(mysqli_real_escape_string($conn,$_POST['dob']));
           $mail = ucwords(mysqli_real_escape_string($conn,$_POST['mail']));
           $ptmail = ucwords(mysqli_real_escape_string($conn,$_POST['ptmail']));
           $stmob = ucwords(mysqli_real_escape_string($conn,$_POST['stmob']));
           $ptmob = ucwords(mysqli_real_escape_string($conn,$_POST['ptmob']));
           $ftname = ucwords(mysqli_real_escape_string($conn,$_POST['ftname']));
           $mtname = ucwords(mysqli_real_escape_string($conn,$_POST['mtname']));
           $ftprof = ucwords(mysqli_real_escape_string($conn,$_POST['ftprof']));
           $mtprof = ucwords(mysqli_real_escape_string($conn,$_POST['mtprof']));
           $branch = ucwords(mysqli_real_escape_string($conn,$_POST['branch']));
           $session = ucwords(mysqli_real_escape_string($conn,$_POST['session']));
           $mentor = ucwords(mysqli_real_escape_string($conn,$_POST['mentor']));
           $batch = ucwords(mysqli_real_escape_string($conn,$_POST['batch']));
           $category = ucwords(mysqli_real_escape_string($conn,$_POST['category']));
           $ptincome = ucwords(mysqli_real_escape_string($conn,$_POST['ptincome']));
           $bg = ucwords(mysqli_real_escape_string($conn,$_POST['bg']));
           $address = ucwords(mysqli_real_escape_string($conn,$_POST['address']));
           $user_type = 'stu';
           $updated_by = ucwords($_SESSION['username']);
           $target = "uploads/studentspic/"; 
             $fileName = $_FILES['filename']['name'];   
             $fileTarget = $target.$fileName;  
             $tempFileName = $_FILES["filename"]["tmp_name"];
             $result = move_uploaded_file($tempFileName,$fileTarget);

if($_FILES['filename']['type'] == "image/pjpeg" || $_FILES['filename']['type']=="image/jpeg" || $_FILES['filename']['type']=="image/gif") {
           
           $student_sql = "INSERT INTO students_list(regno,univreg,fname,lname,gender,dob,mail,ptmail,stmob,ptmob,ftname,mtname,ftprof,mtprof,branch,session,mentor,batch,category,ptincome,bg,address,profile_pic,updated_on,updated_by) VALUES ('$regno','$univreg','$fname','$lname','$gender','$dob','$mail','$ptmail','$stmob','$ptmob','$ftname','$mtname','$ftprof','$mtprof','$branch','$session','$mentor','$batch','$category','$ptincome','$bg','$address','$fileTarget',now(),'$updated_by')";
           $user_sql = "INSERT INTO users(regno,univreg,user_type,created_at) VALUES ('$regno','$univreg','$user_type',now())";

           $user_query = mysqli_query($conn,$user_sql);
           $student_query = mysqli_query($conn,$student_sql);
           
    if($student_query){
	             echo "<script>alert('Student Registered Successfully')</script>";
                 }
           else {
	             echo "<script>alert('Try Again')</script>";
                }
         }
  }

#Include Files
include 'includes/head.php'; 
include 'includes/sidebar_menu.php';
include 'includes/header_menu.php';
?>
		
<!--- Main Content Starts Here -->
		<div id="page-wrapper">
			<div class="main-page">
              <div class="grids">
					<div class="progressbar-heading grids-heading">
						<h2>Register New Students</h2>
					</div>
					<div class="panel panel-widget">
						<div class="tables">
						<form method="POST" name="add_student" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
							<table class="table">
								<tbody>
								    <tr>
									  <td><label for="College Reg. No.">College Reg. No: <span>(required)</span></label><input type="text" name="regno" required="true" class="form-control" /></td>
									  <td><label for="University Reg. No.">University Reg. No.: <span>(required)</span></label><input type="text" name="univreg" required="true" class="form-control"/></td>
									</tr>
								    <tr>
									  <td><label for="First Name">First Name: <span>(required)</span></label><input type="text" name="fname" required="true" class="form-control"/></td>
									  <td><label for="Last Name">Last Name: <span>(required)</span></label><input type="text" name="lname" required="true" class="form-control"/></td>
									</tr>
									<tr>
									  <td><label for="Gender" >Gender: <span>(required)</span></label>
										<div class="form-group" >
											<select name="gender" required="true" class="form-control" >
												<option value="">Select Gender</option>
												<option value="Male">Male</option>
												<option value="Female">Female</option>
											</select>
										</div>
                                      </td>
									  <td><label for="dob" >Date of Birth: <span>(required)</span></label>
									    <input type="date" name="dob" required="true" class="form-control">
									  	</td>
									</tr>
									<tr>
									  <td><label for="Self E-Mail">Student's E-Mail: <span>(required)</span></label><input type="mail" name="mail" required="true" class="form-control"/></td>
									  <td><label for="Parent's E-Mail">Parent's E-Mail: </label><input type="email" name="ptmail" class="form-control"/></td>
									</tr>
									<tr>
									  <td><label for="Students Contact No.">Student's Contact No: <span>(required)</span></label><input type="text" name="stmob" required="true" class="form-control"/></td>
									  <td><label for="Parent's Contact No.">Parent's Contact No: <span>(required)</span></label><input type="text" name="ptmob" required="true" class="form-control"/></td>
									</tr>
									<tr>
									  <td><label for="Father's Name">Father's Name: <span>(required)</span></label><input type="text" name="ftname" required="true" filter="" class="form-control" data-required=""/></td>
									  <td><label for="Mother's Name">Mother's Name: <span>(required)</span></label><input type="text" name="mtname" required="true" class="form-control"/></td>
									</tr>
									<tr>
									  <td><label for="Father's Profession">Father's Profession: <span>(required)</span></label><input type="text" name="ftprof" required="true" filter="" class="form-control" data-required=""/></td>
									  <td><label for="Mother's Profession">Mother's Profession: <span>(required)</span></label><input type="text" name="mtprof" required="true" class="form-control"/></td>
									</tr>
									<tr>
									  <td><label for="Branch" >Branch: <span>(required)</span></label>
										<div class="form-group" >
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
										</div>
                                      </td>
									  <td><label for="session">Session/Year: <span>(required)</span></label>
										<div class="form-group" >
											<select name="session" required="true" class="form-control" >
											 <option value="">Select Session/Sem</option>
										<?php
                                           $session_sql = "SELECT DISTINCT session from strings LIMIT 4";
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
										</div>
                                      </td> 
									</tr>
									<tr>
									  <td><label for="Mentor">Mentor Name: <span>(required)</span></label><input type="text" name="mentor" required="true" class="form-control"/></td>
									  <td>
									  <label for="Batch">Batch: <span>(required)</span></label><input type="text" name="batch" required="true" class="form-control"/></td>
									</tr>
									<tr>
									<td><label for="category">Category: <span>(required)</span></label>
										<div class="form-group" >
											<select name="category" required="true" class="form-control" >
												<option value="">Select Category</option>
												<option value="General">General</option>
												<option value="OBC">OBC</option>
												<option value="SC">SC</option>
												<option value="ST">ST</option>
											</select>
										</div>
                                      </td>
                                      <td><label for="ptincome">Family Income: <span>(required)</span></label>
										<input type="text" name="ptincome" class="form-control"/>
                                      </td> 
									</tr>
									<tr>
									<td><label for="bg">Blood Required: <span>(required)</span></label>
										<div class="form-group" >
											<select name="bg" required="true" class="form-control" >
												<option value="">Select Blood Group</option>
												<option value="A+">A+</option>
												<option value="A-">A-</option>
												<option value="B+">B+</option>
												<option value="B-">B-</option>
												<option value="AB+">AB+</option>
												<option value="AB-">AB-</option>
												<option value="O+">O+</option>
												<option value="O-">O-</option>
											</select>
										</div>
                                      </td>
									<td>
									    <label for="Image">Profile Image</span></label>
										<input type="file" name="filename" class="form-control">
                                      </td> 
									</tr>
									<tr>
									<td colspan="2">
									    <label for="Address">Full Address: <span>(required)</span></label>
										<textarea type="textarea" name="address" required="true" class="form-control"></textarea>
                                      </td>
									</tr>
								</tbody>
							</table>
							<input type="submit" name="add_student" class="btn btn-primary" required="true" />
							<input type="reset" name="reset" class="btn btn-danger" />
							</form>
						</div>
					</div>
		<!--- Main Content Ends Here -->
<?php include 'includes/footer.php'; ?>