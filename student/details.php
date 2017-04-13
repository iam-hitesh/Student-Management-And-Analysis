<?php
include 'includes/include.php';
dbconnect();
session_set();
$user = $_SESSION['regno'];
$profile_sql = "SELECT * FROM students_list where regno='$user'";
$profile_query = mysqli_query($conn,$profile_sql);
$data = mysqli_fetch_array($profile_query);

if(isset($_POST['update_profile'])){
	$mail = mysqli_real_escape_string($conn,$_POST['mail']);
	$stmob = mysqli_real_escape_string($conn,$_POST['stmob']);
	$ptincome = mysqli_real_escape_string($conn,$_POST['ptincome']);
	$bg = mysqli_real_escape_string($conn,$_POST['bg']);
	$address = mysqli_real_escape_string($conn,$_POST['address']);
	$about = mysqli_real_escape_string($conn,$_POST['about']);
	$reg = $_SESSION['regno'];
	$updated_by = $_SESSION['username'];

	$target = "uploads/stprofile/"; 
             $fileName = $_FILES['filename']['name'];   
          if($fileName == ''){
    	     $fileTarget = $data['profile_pic'];
               }
          else{
    	     $fileTarget = $target.$fileName;
              }
             $tempFileName = $_FILES["filename"]["tmp_name"];
             $result = move_uploaded_file($tempFileName,$fileTarget);
             
  if($_FILES['filename']['type'] == "image/pjpeg" || $_FILES['filename']['type']=="image/jpeg" || $_FILES['filename']['type']=="image/gif" || $_FILES['filename']['type'] == "")  {
  	$update_sql = "UPDATE students_list SET mail='$mail',stmob='$stmob',ptincome='$ptincome',bg='$bg',address='$address',about='$about',profile_pic='$fileTarget',updated_on=now(),updated_by='$updated_by' WHERE regno='$reg'";
  	$update_query = mysqli_query($conn,$update_sql);
  	if($update_query){
              	echo "<script>alert('Profile Updated Successfully')</script>";
              }
              else{
                echo "<script>alert('Profile Can't Be Update Now')</script>";	
              } 
          }

          else{
            echo "<script>alert('File Format is Not Accepted')</script>";
          }

 }
include 'includes/head.php';
include 'includes/sidebar_menu.php';
include 'includes/header_menu.php';
?>
<body>

	        <div class="content">
	            <div class="container-fluid">
	                <div class="row">
	                    <div class="col-md-8">
	                        <div class="card">
	                            <div class="card-header" data-background-color="blue">
	                                <h4 class="title">Edit Profile</h4>
									<p class="category">Complete your profile</p>
	                            </div>
	                            <div class="card-content">
	                                <form method="POST" name="update_profile" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
	                                    <div class="row">
	                                        <div class="col-md-6">
												<div class="form-group label-floating">
													<label class="control-label">College Reg. No. (disabled)</label>
													<input type="text" class="form-control" value="<?php echo $data['regno']; ?>" disabled>
												</div>
	                                        </div>
	                                        <div class="col-md-6">
												<div class="form-group label-floating">
													<label class="control-label">University Roll No.(disabled)</label>
													<input type="text" class="form-control" value="<?php echo $data['univreg']; ?>" disabled>
												</div>
	                                        </div>
	                                    </div>
	                                    <div class="row">
	                                        <div class="col-md-6">
												<div class="form-group label-floating">
													<label class="control-label">First Name(disabled)</label>
													<input type="text" class="form-control" value="<?php echo $data['fname']; ?>" disabled>
												</div>
	                                        </div>
	                                        <div class="col-md-6">
												<div class="form-group label-floating">
													<label class="control-label">Last Name(disabled)</label>
													<input type="text" class="form-control" value="<?php echo $data['lname']; ?>" disabled>
												</div>
	                                        </div>
	                                    </div>

	                                    <div class="row">
	                                        <div class="col-md-6">
												<div class="form-group label-floating">
													<label class="control-label">Gender</label>
													<input type="text" class="form-control" value="<?php echo $data['gender']; ?>" disabled>
												</div>
	                                        </div>
	                                        <div class="col-md-6">
												<div class="form-group label-floating">
													<label class="control-label">Date of Birth</label>
													<input type="text" class="form-control" value="<?php echo $data['dob']; ?>" disabled>
												</div>
	                                        </div>
	                                    </div>

	                                    <div class="row">
	                                        <div class="col-md-6">
												<div class="form-group label-floating">
													<label class="control-label">E-Mail</label>
													<input type="email" class="form-control" value="<?php echo $data['mail']; ?>" name="mail">
												</div>
	                                        </div>
	                                        <div class="col-md-6">
												<div class="form-group label-floating">
													<label class="control-label">Parent's Mail</label>
													<input type="email" class="form-control" value="<?php echo $data['ptmail']; ?>" disabled>
												</div>
	                                        </div>
	                                    </div>

	                                    <div class="row">
	                                        <div class="col-md-6">
												<div class="form-group label-floating">
													<label class="control-label">Student Contact No.</label>
													<input type="text" class="form-control" value="<?php echo $data['stmob']; ?>" name="stmob">
												</div>
	                                        </div>
	                                        <div class="col-md-6">
												<div class="form-group label-floating">
													<label class="control-label">Parent's Contact No.</label>
													<input type="text" class="form-control" value="<?php echo $data['ptmob']; ?>" disabled>
												</div>
	                                        </div>
	                                    </div>

	                                    <div class="row">
	                                        <div class="col-md-6">
												<div class="form-group label-floating">
													<label class="control-label">Father's Name</label>
													<input type="text" class="form-control" value="<?php echo $data['ftname']; ?>" disabled>
												</div>
	                                        </div>
	                                        <div class="col-md-6">
												<div class="form-group label-floating">
													<label class="control-label">Mother's Name</label>
													<input type="text" class="form-control" value="<?php echo $data['mtname']; ?>" disabled>
												</div>
	                                        </div>
	                                    </div>

	                                    <div class="row">
	                                        <div class="col-md-6">
												<div class="form-group label-floating">
													<label class="control-label">Father's Profession</label>
													<input type="text" class="form-control" value="<?php echo $data['ftprof']; ?>" disabled>
												</div>
	                                        </div>
	                                        <div class="col-md-6">
												<div class="form-group label-floating">
													<label class="control-label">Mother's Profession</label>
													<input type="text" class="form-control" value="<?php echo $data['mtprof']; ?>" disabled>
												</div>
	                                        </div>
	                                    </div>

	                                    <div class="row">
	                                        <div class="col-md-6">
												<div class="form-group label-floating">
													<label class="control-label">Branch</label>
													<input type="text" class="form-control" value="<?php echo $data['branch']; ?>" disabled>
												</div>
	                                        </div>
	                                        <div class="col-md-6">
												<div class="form-group label-floating">
													<label class="control-label">Session</label>
													<input type="text" class="form-control" value="<?php echo $data['session']; ?>" disabled>
												</div>
	                                        </div>
	                                    </div>

	                                    <div class="row">
	                                        <div class="col-md-6">
												<div class="form-group label-floating">
													<label class="control-label">Mentor</label>
													<input type="text" class="form-control" value="<?php echo $data['mentor']; ?>" disabled>
												</div>
	                                        </div>
	                                        <div class="col-md-3">
												<div class="form-group label-floating">
													<label class="control-label">Batch</label>
													<input type="text" class="form-control" value="<?php echo $data['batch']; ?>" disabled>
												</div>
	                                        </div>
	                                        <div class="col-md-3">
												<div class="form-group label-floating">
													<label class="control-label">Category</label>
													<input type="text" class="form-control" value="<?php echo $data['category']; ?>" disabled>
												</div>
	                                        </div>
	                                    </div>

	                                    <div class="row">
	                                        <div class="col-md-6">
												<div class="form-group label-floating">
													<label class="control-label">Parent's Income(Annually)</label>
													<input type="text" name="ptincome" class="form-control" value="<?php echo $data['ptincome']; ?>">
												</div>
	                                        </div>
	                                        <div class="col-md-6">
												<div class="form-group label-floating">
													<label class="control-label">Blood Group</label>
													<input type="text" name="bg" class="form-control" value="<?php echo $data['bg']; ?>">
												</div>
	                                        </div>
	                                    </div>

	                                    <div class="row">
	                                        <div class="col-md-12">
	                                            <div class="form-group">
	                                                <label>Address</label>
													<div class="form-group label-floating">
									    				<label class="control-label">Write Your Full Address With Pin Code</label>
								    					<textarea class="form-control" name="address" rows="3" value="<?php echo $data['address'];?>"><?php echo $data['address'];?></textarea>
		                        					</div>
	                                            </div>
	                                        </div>
	                                    </div>

	                                    <div class="row">
	                                        <div class="col-md-6">
												<div class="form-group label-floating">
													<input type="file" name="filename" id="file-1" class="inputfile inputfile-1" style="cursor: pointer;"/>
					                                <label for="file-1"><span>Profile Picture</span></label>
												</div>
	                                        </div>
	                                        <div class="col-md-3">
												<div class="form-group label-floating">
													<label class="control-label">Batch</label>
													<input type="text" class="form-control" value="<?php echo $data['batch']; ?>" disabled>
												</div>
	                                        </div>
	                                        <div class="col-md-3">
												<div class="form-group label-floating">
													<label class="control-label">Category</label>
													<input type="text" class="form-control" value="<?php echo $data['category']; ?>" disabled>
												</div>
	                                        </div>
	                                    </div>

	                                    <div class="row">
	                                        <div class="col-md-12">
	                                            <div class="form-group">
	                                                <label>About Me</label>
													<div class="form-group label-floating">
									    				<label class="control-label"> Write Your Intro Here</label>
								    					<textarea name="about" class="form-control" rows="5"value="<?php echo $data['about'];?>"><?php echo $data['about'];?></textarea>
		                        					</div>
	                                            </div>
	                                        </div>
	                                    </div>

	                                    <button type="submit" name="update_profile" class="btn btn-primary pull-right">Update Profile</button>
	                                    <div class="clearfix"></div>
	                                </form>
	                            </div>
	                        </div>
	                    </div>
						
						<div class="col-md-4">
    						<div class="card card-profile">
    							<div class="card-avatar">
    								<a href="#pablo">
    									<img class="img" src="<?php echo $data['profile_pic']; ?>" />
    								</a>
    							</div>

    							<div class="content">
    								<h6 class="category text-gray">CEO / Co-Founder</h6>
    								<h4 class="card-title"><?php echo $data['fname']." ".$data['lname']; ?></h4>
    								<p class="card-content">
    									<?php echo $data['about']; ?>
    								</p>
    								<a href="#pablo" class="btn btn-primary btn-round">Follow</a>
    							</div>
    						</div>
		    			</div>

		    			<div class="col-md-4">
							<div class="card">
								<div class="card-header" data-background-color="red">
									<h4 class="title">Your Team</h4>
									<p class="category">Complete your profile</p>
								</div>
					<?php 
					    $user = $_SESSION['regno'];
					    $team_sql = "SELECT * FROM team_members where regno='$user'";
					    $team_query = mysqli_query($conn,$team_sql);
					    $team_num_rows = mysqli_num_rows($team_query);

					    if($team_query){
					    	if($team_num_rows > 0){
					    		echo "<br/>";
					    		echo "<div class=\"card-content\">";
								 echo "<ul class=\"list-unstyled team-members\">";
					    		  while($team_row = mysqli_fetch_array($team_query)){
                                          echo "<li>";
                                                echo "<div class=\"row\">";
                                                    echo "<div class=\"col-xs-3\">";
                                                        echo "<div class=\"avatar\">";
                                                            echo "<img src=\"assets/img/faces/face-0.jpg\" alt=\"Circle Image\" class=\"img-circle img-no-padding img-responsive\">";
                                                        echo "</div>";
                                                    echo "</div>";
                                                    echo "<div class=\"col-xs-6\">";
                                                         echo $team_row['members'];
                                                        echo "<br/>";
                                                        echo "<span class=\"text-muted\"><small>Offline</small></span>";
                                                    echo "</div>";

                                                    echo "<div class=\"col-xs-3 text-right\">";
                                                        echo "<btn class=\"btn btn-sm btn-icon\"><i class=\"material-icons\">message</i></btn>";
                                                    echo "</div>";
                                                echo "</div>";
                                            echo "</li>";
                                            echo "<br/>";
                                        }
                                        echo "</ul>";
                                       }
                                      }
                                    ?>
							 </div>
						   </div>
						</div>
	                </div>
	            </div>
	        </div>

<?php include 'includes/footer_menu.php' ?>

</body>

<?php include 'includes/footer.php'; ?>