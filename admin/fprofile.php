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

    $idno = $_GET['view'];
     
    $view_sql = "SELECT * FROM faculty_list where idno='$idno'";
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
									<img class="img-circle" width="280" src="http://localhost/sms/theme/temp2/assets/img/faces/marc.jpg" />
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
											<li class="head">Team (Online) </li>
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
											<li><a href="#">
													<div class="chat-left">
														<img class="img-circle" src="images/i1.png" alt="">
														<label class="small-badge"></label>
													</div>
													<div class="chat-right">
														<p>Andrew Josifn</p>
														<h6>Nullam quis risus eget </h6>
													</div>
													<div class="clearfix"> </div>	
												</a>
											</li>
											<li><a href="#">
													<div class="chat-left">
														<img class="img-circle" src="images/i2.png" alt="">
														<label class="small-badge bg-green"></label>
													</div>
													<div class="chat-right">
														<p>Justen Ferry</p>
														<h6>Urna mollis ornare vel</h6>
													</div>
													<div class="clearfix"> </div>	
												</a>
											</li>
											<li><a href="#">
													<div class="chat-left">
														<img class="img-circle" src="images/i3.png" alt="">
														<label class="small-badge bg-green"></label>
													</div>
													<div class="chat-right">
														<p>Brown Andy </p>
														<h6>Quis risus ullam neget </h6>
													</div>
													<div class="clearfix"> </div>	
												</a>
											</li>
											<li><a href="#">
													<div class="chat-left">
														<img class="img-circle" src="images/i4.png" alt="">
														<label class="small-badge"></label>
													</div>
													<div class="chat-right">
														<p>Deos Jhon</p>
														<h6>Mollis ornare Urna vel</h6>
													</div>
													<div class="clearfix"> </div>	
												</a>
											</li>
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
											     <td colspan="2">
											       <div class="col-md-12 info">
												    <b>ID No.: </b>
												    <?php
												    echo $row['idno'];
                                                    ?>
												   </div>
	                                             </td>
	                                            </tr>
											   <tr>
											     <td colspan="2">
											       <div class="col-md-12 info">
												    <b>Name</b>: 
												   <?php
												    echo $row['title']." ".$row['fname']."".$row['lname'];
                                                    ?>
                                                   </div>
	                                             </td>
	                                            </tr>
	                                           <tr>
											     <td>
											       <div class="col-md-12 info">
												    <b>Gender:</b> 
												   <?php
												    echo $row['gender'];
                                                    ?>
                                                   </div>
	                                             </td>
	                                             <td>
	                                              <div class="col-md-12 info">
												   <b>Date of Birth: </b>
												   <?php
												   echo $row['dob'];
                                                   ?>
                                                  </div>
	                                             </td>
	                                           </tr>
	                                           <tr>
											     <td>
											       <div class="col-md-12 info">
												    <b>E - Mail: </b>
												   <?php
												    echo $row['mail'];
                                                    ?>
                                                   </div>
	                                             </td>
	                                             <td>
	                                              <div class="col-md-12 info">
												   <b>Parent's Mail: </b>
												   <?php
												   echo $row['mob'];
                                                   ?>
                                                  </div>
	                                             </td>
	                                           </tr>
	                                           <tr>
											     <td>
											       <div class="col-md-12 info">
												    <b>Designation:</b>
												   <?php
												    echo $row['designation'];
                                                    ?>
                                                   </div>
	                                             </td>
	                                             <td>
	                                              <div class="col-md-12 info">
												   <b>Department:</b>: 
												   <?php
												   echo $row['department'];
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
	                                           <tr>
											     <td colspan="2">
											       <div class="col-md-12 info">
												    <b>Research Areas</b>
												   <?php
												    echo $row['research'];
                                                    ?>
                                                   </div>
	                                             </td>
	                                            </tr>
	                                           <tr>
											     <td colspan="2">
											       <div class="col-md-12 info">
												    <b>About</b>
												   <?php
												    echo $row['about'];
                                                    ?>
                                                   </div>
	                                             </td>
	                                           </tr>
	                                         </tbody>
										  </table>	
										  <a href="<?php echo "fprofile?edit=".$_GET['view']."";?>">
										  <input type="submit" value="Edit Profile">
										  </a>
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
    $idno = $_GET['edit'];

    $edit_sql = "SELECT * FROM faculty_list where idno='$idno'";
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
											<li><a href="#">
													<div class="chat-left">
														<img class="img-circle" src="images/i1.png" alt="">
														<label class="small-badge"></label>
													</div>
													<div class="chat-right">
														<p>Andrew Josifn</p>
														<h6>Nullam quis risus eget </h6>
													</div>
													<div class="clearfix"> </div>	
												</a>
											</li>
											<li><a href="#">
													<div class="chat-left">
														<img class="img-circle" src="images/i2.png" alt="">
														<label class="small-badge bg-green"></label>
													</div>
													<div class="chat-right">
														<p>Justen Ferry</p>
														<h6>Urna mollis ornare vel</h6>
													</div>
													<div class="clearfix"> </div>	
												</a>
											</li>
											<li><a href="#">
													<div class="chat-left">
														<img class="img-circle" src="images/i3.png" alt="">
														<label class="small-badge bg-green"></label>
													</div>
													<div class="chat-right">
														<p>Brown Andy </p>
														<h6>Quis risus ullam neget </h6>
													</div>
													<div class="clearfix"> </div>	
												</a>
											</li>
											<li><a href="#">
													<div class="chat-left">
														<img class="img-circle" src="images/i4.png" alt="">
														<label class="small-badge"></label>
													</div>
													<div class="chat-right">
														<p>Deos Jhon</p>
														<h6>Mollis ornare Urna vel</h6>
													</div>
													<div class="clearfix"> </div>	
												</a>
											</li>
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
											Faculty Info: 
										</div>
									 <form action="action/update_faculty" method="post" name="update_faculty">
										<div class="panel-body" style="padding:5px;padding-top: 20px;">
										  <table class="table">
										     <tbody>
											   <tr>
											     <td colspan="2">
											       <div class="col-md-12 info">
												    <b>ID No.: </b>
												     <?php echo $edit_row['idno'];?>
												     <input type="hidden" name="idno" value="<?php echo $edit_row['idno']; ?>">
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
												   <b>Mobile No.: </b> 
												   <input class="form-control" type="text" name="mob" value="<?php echo $edit_row['mob']; ?>" >
                                                  </div>
	                                             </td>
	                                           </tr>
	                                           <tr>
											     <td>
											       <div class="col-md-12 info">
												    <b>Designation: </b>
												   <input class="form-control" type="text" name="designation" value="<?php echo $edit_row['designation']; ?>" >
                                                   </div>
	                                             </td>
	                                             <td>
	                                              <div class="col-md-12 info">
												   <b>Department: </b>
												   <input class="form-control" type="text" name="department" value="<?php echo $edit_row['department']; ?>" >
                                                  </div>
	                                             </td>
	                                           </tr>
	                                           <tr>
											     <td>
											       <div class="col-md-12 info">
												    <b>Blood Group: </b>
												   <input class="form-control" type="text" name="bg" value="<?php echo $edit_row['bg']; ?>" >
                                                   </div>
	                                             </td>
	                                            </tr>
	                                            <tr>
	                                             <td colspan="2">
	                                              <div class="col-md-12 info">
												   <b>Address: </b>
												   <input class="form-control" type="text" name="address" value="<?php echo $edit_row['address']; ?>" >
                                                  </div>
	                                             </td>
	                                           </tr>
	                                           <tr>
											     <td colspan="2">
											       <div class="col-md-12 info">
												    <b>Research Area's:</b> 
												   <input class="form-control" type="text" name="research" value="<?php echo $edit_row['research']; ?>" >
                                                   </div>
	                                             </td>
	                                            </tr>
	                                           <tr>
											     <td colspan="2">
											       <div class="col-md-12 info">
												    <b>About: (Don't Make any changes)</b>
												    <textarea class="form-control" name="about" value="<?php echo $edit_row['about']; ?>"></textarea>
												    </div>
	                                             </td>
	                                            </tr>
	                                         </tbody>
	                                       </table>	
	                                       <input type="submit" value="Update Profile" name="update_faculty">
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