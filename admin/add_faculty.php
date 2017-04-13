<?php 
include 'includes/include.php';
dbconnect();
session_set();
if(isset($_POST['add_faculty'])){
              $idno = strtoupper(mysqli_real_escape_string($conn,$_POST['idno']));
              $title = ucwords(mysqli_real_escape_string($conn,$_POST['title']));
              $fname = ucwords(mysqli_real_escape_string($conn,$_POST['fname']));
              $lname = ucwords(mysqli_real_escape_string($conn,$_POST['lname']));
              $gender = ucwords(mysqli_real_escape_string($conn,$_POST['gender']));
              $dob = ucwords(mysqli_real_escape_string($conn,$_POST['dob']));
              $mail = mysqli_real_escape_string($conn,$_POST['mail']);
              $mob = ucwords(mysqli_real_escape_string($conn,$_POST['mob']));
              $designation = ucwords(mysqli_real_escape_string($conn,$_POST['designation']));
              $department = ucwords(mysqli_real_escape_string($conn,$_POST['department']));
              $bg = ucwords(mysqli_real_escape_string($conn,$_POST['bg']));
              $address = ucwords(mysqli_real_escape_string($conn,$_POST['address']));
              $research = ucwords(mysqli_real_escape_string($conn,$_POST['research']));
              $updated_by = ucwords(mysqli_real_escape_string($conn,$_SESSION['username']));
              $user_type = 'facul';
              $target = "uploads/facultypic/"; 
             $fileName = $_FILES['filename']['name'];   
             $fileTarget = $target.$fileName;  
             $tempFileName = $_FILES["filename"]["tmp_name"];
             $result = move_uploaded_file($tempFileName,$fileTarget);

if($_FILES['filename']['type'] == "image/pjpeg" || $_FILES['filename']['type']=="image/jpeg" || $_FILES['filename']['type']=="image/gif") {

              $faculty_sql = "INSERT into faculty_list(idno,title,fname,lname,gender,dob,mail,mob,designation,department,bg,address,research,profile_pic,updated_on,updated_by) VALUES('$idno','$title','$fname','$lname','$gender','$dob','$mail','$mob','$designation','$department','$bg','$address','$research','$fileTarget',now(),'$updated_by')";
              $user_sql = "INSERT INTO users(idno,user_type,created_at) VALUES('$idno','$user_type',now())";
              $faculty_query = mysqli_query($conn,$faculty_sql);
              $user_query = mysqli_query($conn,$user_sql);
   if($faculty_query){
	    echo "<script>alert('Faculty Registered Successfully')</script>";
          }
   else {
	   echo "<script>alert('Try Again')</script>";
        }
    }
}
include 'includes/head.php';
include 'includes/sidebar_menu.php';
include 'includes/header_menu.php';
?>
<!--- Main Content Starts Here -->
		<div id="page-wrapper">
			<div class="main-page">
              <div class="grids">
					<div class="progressbar-heading grids-heading">
						<h2>Add New Faculty</h2>
					</div>
					<div class="panel panel-widget">
						<div class="tables">
						<form method="POST" name="add_faculty" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
							<table class="table">
								<tbody>
								   <tr>
									  <td><label for="ID No.">ID No.: (required)</label><input type="text" name="idno" required="true" class="form-control" /></td>
									  <td><label for="Title" >Title: (required)</label>
										<div class="form-group" >
											<select name="title" required="true" class="form-control" >
												<option value="">Select Title</option>
												<option value="Mr.">Mr.</option>
												<option value="Mrs.">Mrs.</option>
												<option value="Ms.">Ms.</option>
												<option value="Prof.">Prof.</option>
												<option value="Dr">Dr</option>
											</select>
										</div>
                                      </td>
									</tr>
								    <tr>
									  <td><label for="First Name">First Name: (required)</label><input type="text" name="fname" required="true" class="form-control"/></td>
									  <td><label for="Last Name">Last Name: (required)</label><input type="text" name="lname" required="true" class="form-control"/></td>
									</tr>
									<tr>
									  <td><label for="Gender" >Gender: (required)</label>
										<div class="form-group" >
											<select name="gender" required="true" class="form-control" >
												<option value="">Select Gender</option>
												<option value="Male">Male</option>
												<option value="Female">Female</option>
											</select>
										</div>
                                      </td>
									  <td><label for="dob" >Date of Birth: (required)</label>
									  	<input type="date" name="dob" required="true" class="form-control">
									  </td>
									</tr>
									<tr>
									  <td>
									  <label for="E-Mail">E-Mail Id: (required)</label><input type="email" name="mail" required="true" class="form-control"/>
									  </td>
									  <td>
									  <label for="Mob">Contact No.: </label><input type="text" name="mob" class="form-control" required="true"/>
									  </td>
									</tr>
									<tr>
									  <td><label for="Designation">Designation: (required)</label>
										<div class="form-group" >
											<select name="designation" required="true" class="form-control" >
												<option value="">Select Designation</option>
												<option value="Principal">Principal</option>
												<option value="Head of Department">Head of Department</option>
												<option value="Professor">Professor</option>
												<option value="Associate Professor">Associate Professor</option>
												<option value="Assistant Professor">Assistant Professor</option>
												<option value="Guest Faculty">Guest Faculty</option>
											</select>
										</div>
                                      </td>
									  <td><label for="Department">Department: (required)</label>
										<div class="form-group" >
											<select name="department" required="true" class="form-control" >
												<option value="">Select Department</option>
                                       <?php
                                           $departments_sql = "SELECT name from departments";
                                           $departments_query = mysqli_query($conn,$departments_sql);

                                           $num_rows = mysqli_num_rows($departments_query);
                                              
                                              if($departments_query){
                                                      if($num_rows > 0){
	                                              
	                                                     while($row = mysqli_fetch_array($departments_query)){
		                                                     echo "<option value=\"".$row['name']."\">".$row['name']."</option>";
	                                                               }
                                                               }
                                                           }
                                        ?>
											</select>
										</div>
                                      </td>
									</tr>
									<tr>
									<td><label for="bg">Blood Required: (required)</label>
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
									    <label for="Address">Full Address: (required)</label>
										<textarea type="textarea" name="address" required="true" class="form-control"></textarea>
                                      </td> 
									</tr>
									<tr>
									  <td><label for="research">Research Areas: (required)</label>
											<textarea type="text" name="research" required="true" class="form-control"/></textarea>
                                      </td>
                                      <td>
									    <label for="Image">Profile Image</span></label>
										<input type="file" name="filename" class="form-control">
                                      </td>
								</tbody>
							</table>
							<input type="submit" name="add_faculty" class="btn btn-primary" required="true" />
							<input type="reset" name="reset" value="Reset" class="btn btn-danger" />
							</form>
						</div>
					</div>
		<!--- Main Content Ends Here -->
		
<?php include 'includes/footer.php'; ?>