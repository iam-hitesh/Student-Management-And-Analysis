<?php
#Include Files
include 'includes/include.php';
dbconnect();
session_set();
?>
<style>
.info{
   padding-bottom: 20px;
   font-size:15px;
   font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
}
.img-circle {
    border-radius: 50%;
    font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
}
</style>
<?php 

    $regno = $_GET['view'];

    $view_sql = "SELECT * FROM students_list where regno='$regno'";
    $view_query = mysqli_query($conn,$view_sql);
    $num_rows = mysqli_num_rows($view_query);

    $row = mysqli_fetch_array($view_query);
    
include 'includes/head.php'; 
include 'includes/sidebar_menu.php';
include 'includes/header_menu.php';
?>
		<!-- main content start-->
		<?php
   if(isset($_GET['view'])){
   	?>
		<div id="page-wrapper">
			<div class="main-page">
				<!--grids-->
				<div class="grids">
					<div class="compose-grids">
						<div class="col-md-4">
							<div class="panel panel-widget">
								<div class="compose-left">
									<img class="img-circle" width="280" src="<?php echo $row['profile_pic']; ?>" />
									<hr>
									<center>
									<?php
										echo $row['fname']." ".$row['lname'];
                                    ?>
                                    </center>
							    </div>
							</div>
							<div class="panel panel-widget">
								<div class="compose-left">
									<div class="chat-grid widget-shadow">
										<ul>
											<li class="head">Team  </li>
											<?php
                                             $regno1 = $_GET['view'];
                                             $team_sql = "SELECT * FROM team_members Where regno='$regno1'";
                                             $team_query = mysqli_query($conn,$team_sql);
                                             $team_num_rows = mysqli_num_rows($team_query);
                                             if($team_query){
                                             	if($team_num_rows > 0){
                                                  while($team = mysqli_fetch_array($team_query)){
                                             	
                                             	echo "<li><a href=\"#\">";
													echo "<div class=\"chat-left\">";
														echo "<img class=\"img-circle\" src=\"images/i1.png\">";
														echo "<label class=\"small-badge\"></label>";
													echo "</div>";
													echo "<div class=\"chat-right\">";
														echo "<p>".$team['members']."</p>";
													 echo "</div>";
												   echo "<div class=\"clearfix\"> </div>";	
												echo "</a>";
											echo "</li>";
                                              }
                                         }
                                     }
											?>
										</ul>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-8">
							<div class="panel panel-widget">
								<div class="compose-right widget-shadow">
									<div class="panel-default">
										<div class="panel-heading">
											Students Info: 
										</div>
										<div class="panel-body">
										  <table class="table table-bordered">
										     <tbody>
											   <tr>
											     <td>
											       <div class="col-md-12 info">
												    <b>College Reg No.: </b>
												    <?php
												    echo $row['regno'];
                                                    ?>
												   </div>
	                                             </td>
	                                             <td>
	                                              <div class="col-md-12 info">
												   <b>University Reg. No.</b>
												   <?php
												    echo $row['univreg'];
                                                    ?>
                                                  </div>
	                                             </td>
	                                           </tr>
											   <tr>
											     <td>
											       <div class="col-md-12 info">
												    <b>First Name</b>: 
												   <?php
												    echo $row['fname'];
                                                    ?>
                                                   </div>
	                                             </td>
	                                             <td>
	                                              <div class="col-md-12 info">
												   Last Name: 
												   <?php
												   echo $row['lname'];
                                                   ?>
                                                  </div>
	                                             </td>
	                                           </tr>
	                                           <tr>
											     <td>
											       <div class="col-md-12 info">
												    Gender: 
												   <?php
												    echo $row['gender'];
                                                    ?>
                                                   </div>
	                                             </td>
	                                             <td>
	                                              <div class="col-md-12 info">
												   Date of Birth: 
												   <?php
												   echo $row['dob'];
                                                   ?>
                                                  </div>
	                                             </td>
	                                           </tr>
	                                           <tr>
											     <td>
											       <div class="col-md-12 info">
												    E - Mail: 
												   <?php
												    echo $row['mail'];
                                                    ?>
                                                   </div>
	                                             </td>
	                                             <td>
	                                              <div class="col-md-12 info">
												   Parent's Mail: 
												   <?php
												   echo $row['ptmail'];
                                                   ?>
                                                  </div>
	                                             </td>
	                                           </tr>
	                                           <tr>
											     <td>
											       <div class="col-md-12 info">
												    Mobile No.: 
												   <?php
												    echo $row['stmob'];
                                                    ?>
                                                   </div>
	                                             </td>
	                                             <td>
	                                              <div class="col-md-12 info">
												   Parent's Mobile No.: 
												   <?php
												   echo $row['ptmob'];
                                                   ?>
                                                  </div>
	                                             </td>
	                                           </tr>
	                                           <tr>
											     <td>
											       <div class="col-md-12 info">
												    Father Name: 
												   <?php
												    echo $row['ftname'];
                                                    ?>
                                                   </div>
	                                             </td>
	                                             <td>
	                                              <div class="col-md-12 info">
												   Mother Name: 
												   <?php
												   echo $row['mtname'];
                                                   ?>
                                                  </div>
	                                             </td>
	                                           </tr>
	                                           <tr>
											     <td>
											       <div class="col-md-12 info">
												    Father's Profession: 
												   <?php
												    echo $row['ftprof'];
                                                    ?>
                                                   </div>
	                                             </td>
	                                             <td>
	                                              <div class="col-md-12 info">
												   Mother's Profession: 
												   <?php
												   echo $row['mtprof'];
                                                   ?>
                                                  </div>
	                                             </td>
	                                           </tr>
	                                           <tr>
											     <td>
											       <div class="col-md-12 info">
												    Branch: 
												   <?php
												    echo $row['branch'];
                                                    ?>
                                                   </div>
	                                             </td>
	                                             <td>
	                                              <div class="col-md-12 info">
												   Session: 
												   <?php
												   echo $row['session'];
                                                   ?>
                                                  </div>
	                                             </td>
	                                           </tr>
	                                           <tr>
											     <td>
											       <div class="col-md-12 info">
												    Mentor: 
												   <?php
												    echo $row['mentor'];
                                                    ?>
                                                   </div>
	                                             </td>
	                                             <td>
	                                              <div class="col-md-12 info">
												   Batch: 
												   <?php
												   echo $row['batch'];
                                                   ?>
                                                  </div>
	                                             </td>
	                                           </tr>
	                                           <tr>
											     <td>
											       <div class="col-md-12 info">
												    Mentor: 
												   <?php
												    echo $row['category'];
                                                    ?>
                                                   </div>
	                                             </td>
	                                             <td>
	                                              <div class="col-md-12 info">
												   Batch: 
												   <?php
												   echo $row['ptincome'];
                                                   ?>
                                                  </div>
	                                             </td>
	                                           </tr>
	                                           <tr>
											     <td>
											       <div class="col-md-12 info">
												    <b>Blood Group:</b>
												   <?php
												    echo $row['bg'];
                                                    ?>
                                                   </div>
	                                             </td>
	                                             <td>
	                                              <div class="col-md-12 info">
												   <b>Address:</b> 
												   <?php
												   echo $row['address'];
                                                   ?>
                                                  </div>
	                                             </td>
	                                           </tr>
	                                           <tr colspan="2">
											     <td>
											       <div class="col-md-12 info">
												    <b>About: </b>
												   <?php
												    echo $row['about'];
                                                    ?>
                                                   </div>
	                                             </td>
	                                           </tr>
	                                         </tbody>
										  </table>
										  <center>	
										  <a href="<?php echo "student_profile?edit=".$_GET['view']."";?>">
										  <input type="submit" value="Update Profile">
										  </a>
										  </center>
										</div>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	                    <div class="clearfix"> </div>
					</div>
						
					</div>
				</div>
				<!--//grids-->
<?php } 
else if(isset($_GET['edit'])){?>
<?php
    $regno = $_GET['edit'];

    $edit_sql = "SELECT * FROM students_list where regno='$regno'";
    $edit_query = mysqli_query($conn,$edit_sql);
    $edit_num_rows = mysqli_num_rows($edit_query);

    $edit_row = mysqli_fetch_array($edit_query);
?>
				
			<div id="page-wrapper">
			<div class="main-page">
				<!--grids-->
				<div class="grids">
					<div class="compose-grids">
						<div class="col-md-4">
							<div class="panel panel-widget">
								<div class="compose-left">
									<img class="img-circle" width="280" src="http://localhost/sms/theme/temp2/assets/img/faces/marc.jpg" />
									<hr>
									<center>
									<?php
										echo $edit_row['fname']." ".$edit_row['lname'];
                                    ?>
                                    </center>
							    </div>
							</div>
							<div class="panel panel-widget">
								<div class="compose-left">
									<div class="chat-grid widget-shadow">
										<ul>
											<li class="head">Team Member's </li>
											<?php
                                             $regno1 = $_GET['edit'];
                                             $team_sql = "SELECT * FROM team_members Where regno='$regno1'";
                                             $team_query = mysqli_query($conn,$team_sql);
                                             $num_rows = mysqli_num_rows($team_query);
                                             if($team_query){
                                             	if($num_rows > 0){
                                                  while($team = mysqli_fetch_array($team_query)){
                                             	
                                             	echo "<li><a href=\"#\">";
													echo "<div class=\"chat-left\">";
														echo "<img class=\"img-circle\" src=\"images/i1.png\">";
														echo "<label class=\"small-badge\"></label>";
													echo "</div>";
													echo "<div class=\"chat-right\">";
														echo "<p>".$team['members']."</p>";
													 echo "</div>";
												   echo "<div class=\"clearfix\"> </div>";	
												echo "</a>";
											echo "</li>";
                                              }
                                         }
                                     }
											?>
										</ul>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-8">
							<div class="panel panel-widget">
								<div class="compose-right widget-shadow">
									<div class="panel-default">
										<div class="panel-heading">
											Students Info: 
										</div>
									 <form action="action/update_student.php" method="post" >
										<div class="panel-body" style="padding:5px;padding-top: 20px;">
										  <table class="table">
										     <tbody>
											   <tr>
											     <td>
											       <div class="col-md-12 info">
												    <b>College Reg No.: </b>
												     <?php echo $edit_row['regno'];?>
												     <input type="hidden" name="regno" value="<?php echo $edit_row['regno']; ?>">
												    </div>
	                                             </td>
	                                             <td>
	                                              <div class="col-md-12 info">
												   <b>University Reg. No.</b>
												    <?php echo $edit_row['univreg']; ?>
                                                  </div>
	                                             </td>
	                                           </tr>
											   <tr>
											     <td>
											       <div class="col-md-12 info">
												    <b>First Name</b>: 
												     <input class="form-control" type="text" name="fname" value="<?php echo $edit_row['fname']; ?>" >
                                                   </div>
	                                             </td>
	                                             <td>
	                                              <div class="col-md-12 info">
												   <b>Last Name: </b>
												  <input class="form-control" type="text" name="lname" value="<?php echo $edit_row['lname']; ?>" >
                                                  </div>
	                                             </td>
	                                           </tr>
	                                           <tr>
											     <td>
											       <div class="col-md-12 info">
												    <b>Gender:</b> 
												   <input class="form-control" type="text" name="gender" value="<?php echo $edit_row['gender']; ?>" >
                                                   </div>
	                                             </td>
	                                             <td>
	                                              <div class="col-md-12 info">
												   <b>Date of Birth:</b> 
												  <input class="form-control" type="text" name="dob" value="<?php echo $edit_row['dob']; ?>" >
                                                  </div>
	                                             </td>
	                                           </tr>
	                                           <tr>
											     <td>
											       <div class="col-md-12 info">
												    <b>E - Mail: </b>
												   <input class="form-control" type="text" name="mail" value="<?php echo $edit_row['mail']; ?>" >
                                                   </div>
	                                             </td>
	                                             <td>
	                                              <div class="col-md-12 info">
												   <b>Parent's Mail: </b> 
												   <input class="form-control" type="text" name="ptmail" value="<?php echo $edit_row['ptmail']; ?>" >
                                                  </div>
	                                             </td>
	                                           </tr>
	                                           <tr>
											     <td>
											       <div class="col-md-12 info">
												    <b>Mobile No.: </b>
												   <input class="form-control" type="text" name="stmob" value="<?php echo $edit_row['stmob']; ?>" >
                                                   </div>
	                                             </td>
	                                             <td>
	                                              <div class="col-md-12 info">
												   <b>Parent's Mobile No.: </b>
												   <input class="form-control" type="text" name="ptmob" value="<?php echo $edit_row['ptmob']; ?>" >
                                                  </div>
	                                             </td>
	                                           </tr>
	                                           <tr>
											     <td>
											       <div class="col-md-12 info">
												    <b>Father Name: </b>
												   <input class="form-control" type="text" name="ftname" value="<?php echo $edit_row['ftname']; ?>" >
                                                   </div>
	                                             </td>
	                                             <td>
	                                              <div class="col-md-12 info">
												   <b>Mother Name: </b>
												   <input class="form-control" type="text" name="mtname" value="<?php echo $edit_row['mtname']; ?>" >
                                                  </div>
	                                             </td>
	                                           </tr>
	                                           <tr>
											     <td>
											       <div class="col-md-12 info">
												    <b>Father's Profession:</b> 
												   <input class="form-control" type="text" name="ftprof" value="<?php echo $edit_row['ftprof']; ?>" >
                                                   </div>
	                                             </td>
	                                             <td>
	                                              <div class="col-md-12 info">
												   <b>Mother's Profession: </b>
												   <input class="form-control" type="text" name="mtprof" value="<?php echo $edit_row['mtprof']; ?>" >
                                                  </div>
	                                             </td>
	                                           </tr>
	                                           <tr>
											     <td>
											       <div class="col-md-12 info">
												    <b>Branch: </b>
												   <input class="form-control" type="text" name="branch" value="<?php echo $edit_row['branch']; ?>" >
                                                   </div>
	                                             </td>
	                                             <td>
	                                              <div class="col-md-12 info">
												   <b>Session:</b> 
												   <input class="form-control" type="text" name="session" value="<?php echo $edit_row['session']; ?>" >
                                                  </div>
	                                             </td>
	                                           </tr>
	                                           <tr>
											     <td>
											       <div class="col-md-12 info">
												    <b>Mentor: </b>
												   <input class="form-control" type="text" name="mentor" value="<?php echo $edit_row['mentor']; ?>" >
                                                   </div>
	                                             </td>
	                                             <td>
	                                              <div class="col-md-12 info">
												   <b>Batch:</b> 
												   <input class="form-control" type="text" name="batch" value="<?php echo $edit_row['batch']; ?>" >
                                                  </div>
	                                             </td>
	                                           </tr>
	                                           <tr>
											     <td>
											       <div class="col-md-12 info">
												    <b>Category: </b> 
												  <input class="form-control" type="text" name="category" value="<?php echo $edit_row['category']; ?>" >
                                                   </div>
	                                             </td>
	                                             <td>
	                                              <div class="col-md-12 info">
												   Parent's Income: 
												   <input class="form-control" type="text" name="ptincome" value="<?php echo $edit_row['ptincome']; ?>" >
                                                  </div>
	                                             </td>
	                                           </tr>
	                                           <tr>
											     <td>
											       <div class="col-md-12 info">
												    <b>Blood Group:</b>
												   <input class="form-control" type="text" name="bg" value="<?php echo $edit_row['bg']; ?>" >
                                                   </div>
	                                             </td>
	                                            </tr>
	                                            <tr>
	                                             <td colspan="2">
	                                              <div class="col-md-12 info">
												   <b>Address:</b> 
												   <textarea class="form-control" type="text" name="address" value="<?php echo $edit_row['address']; ?>" ><?php echo $edit_row['address']; ?></textarea>
                                                  </div>
	                                             </td>
	                                           </tr>
	                                           <tr>
											     <td colspan="2">
											       <div class="col-md-12 info">
												    <b>About: </b>
												   <textarea class="form-control" type="text" name="address" value="<?php echo $edit_row['about']; ?>"><?php echo $edit_row['about']; ?></textarea>
                                                   </div>
	                                             </td>
	                                           </tr>
	                                         </tbody>
										  </table>	
										  <input type="submit" value="Update Profile" name="update_student">
	                                    </div>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	                    <div class="clearfix"> </div>
					</div>
						
					</div>
				</div>
				<!--//grids-->


<?php } ?>
			</div>
		</div>
<?php include 'includes/footer.php'; ?>