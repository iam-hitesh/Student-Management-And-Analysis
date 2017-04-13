<?php
include 'includes/include.php';
dbconnect();
session_set();

if($_GET['view'] != ''){
$user = $_GET['view'];

$list_sql = "SELECT * FROM students_list where regno='$user'";
$list_query = mysqli_query($conn,$list_sql);
$list = mysqli_fetch_array($list_query);

if($_GET['view'] == $list['regno']){
$profile_sql = "SELECT * FROM profile where regno='$user'";
$profile_query = mysqli_query($conn,$profile_sql);
$data = mysqli_fetch_array($profile_query);

include 'includes/head.php';
include 'includes/sidebar_menu.php';
include 'includes/header_menu.php';
?>
<body>

			<div class="content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-12">
    						<div class="card card-profile">
    							<div class="card-avatar">
    								<a href="#pablo">
    									<img class="img" src="<?php echo $list['profile_pic'] ?>" />
    								</a>
    							</div>

    							<div class="content">
    								<h6 class="category text-gray"><?php echo $data['title'] ?></h6>
    								<h4 class="card-title"><?php echo $list['fname']." ".$list['lname']; ?></h4>
    								<p class="card-content">
    									Don't be scared of the truth because we need to restart the human foundation in truth And I love you like Kanye loves Kanye I love Rick Owens’ bed design but the back is...
    								</p>
    								<a href="#pablo" class="btn btn-primary btn-round">Message</a>
    							</div>
                    	    </div>
	                  	</div>
	                </div>

	                <div class="col-md-12 col-md-offset-0">
							<div class="profile-tabs">
			                    <div class="nav-align-center">
									<ul class="nav nav-pills" role="tablist">
										<li class="active">
											<a href="#about" role="tab" data-toggle="tab">
												<i class="material-icons">account_box</i>
												About
											</a>
										</li>
										<li>
				                            <a href="#skills" role="tab" data-toggle="tab">
												<i class="material-icons">code</i>
												Skills
				                            </a>
				                        </li>
				                        <li>
				                            <a href="#work" role="tab" data-toggle="tab">
												<i class="material-icons">work</i>
				                                Work
				                            </a>
				                        </li>
				                        <li>
				                            <a href="#projects" role="tab" data-toggle="tab">
												<i class="material-icons">build</i>
				                                Build
				                            </a>
				                        </li>
				                    </ul>

				                    <div class="tab-content gallery">
										<div class="tab-pane active" id="about">
				                            <div class="row">
											 <div class="col-lg-12 col-md-12">
							                  <div class="card">
	                                           <div class="card-header" data-background-color="black">
	                                               <h2 class="title">About</h2>
	                                            </div>
	                                        <div class="card-content table-responsive">
	                                      <table style="text-align: left;" class="table">
	                                        <tbody>
											 <tr>
											   <td>
											   <b>Email</b>
											   <td>
											   <b><?php echo $data['email']; ?></b>
											   </td>
											 </tr>
											 <tr>
											   <td>
											   <b>City</b>
											   <td>
											   <b><?php echo $data['city']; ?></b>
											   </td>
											 </tr>
											</tbody>
										  </table>

	                                       </div>
	                                     </div>
	                                   </div>
				                      </div>
				                      </div>
				                     <div class="tab-pane text-center" id="skills">
									    <div class="row">
										    <div class="col-lg-12 col-md-12">
							                    <div class="card">
	                                               <div class="card-header" data-background-color="orange">
	                                                   <h2 class="title">Profile</h2>
	                                             </div>
	                                     <div class="card-content table-responsive">

	                                     <table style="text-align: left;" class="table">
	                                        <tbody>
											 <tr>
											   <td>
											   <b>Skills</b>
											   <td>
											   <b><?php echo $data['skills']; ?></b>
											   </td>
											 </tr>
											 <tr>
											   <td>
											   <b>Programming Languages</b>
											   <td>
											   <b><?php echo $data['languages']; ?></b>
											   </td>
											 </tr>
											 <tr>
											   <td>
											   <b>Research Interests</b>
											   <td>
											   <b><?php echo $data['interests']; ?></b>
											   </td>
											 </tr>
											</tbody>
										  </table>
	                                           </div>
	                                        </div>
	                                     </div>
	                                   </div>
	                                 </div>
							         <div class="tab-pane text-center" id="work">
								        <div class="row">
										  <div class="col-lg-12 col-md-12">
							                <div class="card">
	                                           <div class="card-header" data-background-color="blue">
	                                               <h4 class="title">Work</h4>
	                                           </div>
	                                        <div class="card-content table-responsive">
	                                        <table style="text-align: left;" class="table">
	                                        <tbody>
<?php
$work_sql = "SELECT * FROM p_work where regno='$user'";
$work_query = mysqli_query($conn,$work_sql);
$work_num_rows = mysqli_num_rows($work_query); 
if($work_num_rows > 0){
	while($work_data = mysqli_fetch_array($work_query)){
              echo "<tr>";
			  echo "<td>";
			  echo "<h4>".$work_data['work_at']."</h4>";
			  echo "<b>Position: </b>".$work_data['position']."<br/><br/>";
			  echo "<b>Time Period: </b>".$work_data['work_period']."<br/><br/>";
			  echo "</td>";
			  echo "</tr>";
			}
			  
	    }
	    
?>
											</tbody>
										  </table>
	                                       </div>
	                                     </div>
	                                   </div>	
									 </div>
				                     </div>
				                     <div class="tab-pane text-center" id="projects">
									    <div class="row">
										  <div class="col-lg-12 col-md-12">
							                <div class="card">
	                                           <div class="card-header" data-background-color="red">
	                                               <h4 class="title">Projects</h4>
	                                           </div>
	                                        <div class="card-content table-responsive">
	                                        <table style="text-align: left;" class="table">
	                                        <tbody>
<?php
$project_sql = "SELECT * FROM p_project where regno='$user'";
$project_query = mysqli_query($conn,$project_sql);
$project_num_rows = mysqli_num_rows($project_query); 
if($project_num_rows > 0){
	while($project_data = mysqli_fetch_array($project_query)){
              echo "<tr>";
			  echo "<td>";
			  echo "<h4>".$project_data['project']."</h4>";
			  echo "<b>Project Exposure: </b>".$project_data['project_expo']."<br/><br/>";
			  echo "<b>Link: </b><a target=\"_BLANK\" href=".$project_data['link'].">Click Here</a><br/><br/>";
			  echo "</td>";
			  echo "</tr>";
			}
			  
	    }
	    
?>
											</tbody>
										  </table>
	                                       </div>
	                                     </div>
	                                   </div>		
									    </div>
				                     </div>
				                  </div>
                               </div>
	                        </div>
          </body>


<?php include 'includes/footer.php'; 
   }
 }
else{
$user = $_SESSION['regno'];
header('Location:details.php');
$list_sql = "SELECT * FROM students_list where regno='$user'";
$list_query = mysqli_query($conn,$list_sql);
$list = mysqli_fetch_array($list_query);

$profile_sql = "SELECT * FROM profile where regno='$user'";
$profile_query = mysqli_query($conn,$profile_sql);
$data = mysqli_fetch_array($profile_query);

include 'includes/head.php';
include 'includes/sidebar_menu.php';
include 'includes/header_menu.php';
?>
<body>

			<div class="content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-12">
    						<div class="card card-profile">
    							<div class="card-avatar">
    								<a href="#pablo">
    									<img class="img" src="uploads/stprofile/hitesh.jpg" />
    								</a>
    							</div>

    							<div class="content">
    								<h6 class="category text-gray">Student</h6>
    								<h4 class="card-title"><?php echo $list['fname']." ".$list['lname']; ?></h4>
    								<p class="card-content">
    									Don't be scared of the truth because we need to restart the human foundation in truth And I love you like Kanye loves Kanye I love Rick Owens’ bed design but the back is...
    								</p>
    								<a href="#pablo" class="btn btn-primary btn-round">Message</a>
    							</div>
                    	    </div>
	                  	</div>
	                </div>

	                <div class="col-md-12 col-md-offset-0">
							<div class="profile-tabs">
			                    <div class="nav-align-center">
									<ul class="nav nav-pills" role="tablist">
										<li class="active">
											<a href="#about" role="tab" data-toggle="tab">
												<i class="material-icons">account_box</i>
												About
											</a>
										</li>
										<li>
				                            <a href="#skills" role="tab" data-toggle="tab">
												<i class="material-icons">code</i>
												Skills
				                            </a>
				                        </li>
				                        <li>
				                            <a href="#work" role="tab" data-toggle="tab">
												<i class="material-icons">work</i>
				                                Work
				                            </a>
				                        </li>
				                        <li>
				                            <a href="#projects" role="tab" data-toggle="tab">
												<i class="material-icons">build</i>
				                                Build
				                            </a>
				                        </li>
				                    </ul>

				                    <div class="tab-content gallery">
										<div class="tab-pane active" id="about">
				                            <div class="row">
											 <div class="col-lg-12 col-md-12">
							                  <div class="card">
	                                           <div class="card-header" data-background-color="black">
	                                               <h2 class="title">About</h2>
	                                            </div>
	                                        <div class="card-content table-responsive">
	                                      <table style="text-align: left;" class="table">
	                                        <tbody>
											 <tr>
											   <td>
											   <b>Email</b>
											   <td>
											   <b><?php echo $data['email']; ?></b>
											   </td>
											 </tr>
											 <tr>
											   <td>
											   <b>City</b>
											   <td>
											   <b><?php echo $data['city']; ?></b>
											   </td>
											 </tr>
											</tbody>
										  </table>

	                                       </div>
	                                     </div>
	                                   </div>
				                      </div>
				                      </div>
				                     <div class="tab-pane text-center" id="skills">
									    <div class="row">
										    <div class="col-lg-12 col-md-12">
							                    <div class="card">
	                                               <div class="card-header" data-background-color="orange">
	                                                   <h2 class="title">Profile</h2>
	                                             </div>
	                                     <div class="card-content table-responsive">

	                                     <table style="text-align: left;" class="table">
	                                        <tbody>
											 <tr>
											   <td>
											   <b>Skills</b>
											   <td>
											   <b><?php echo $data['skills']; ?></b>
											   </td>
											 </tr>
											 <tr>
											   <td>
											   <b>Programming Languages</b>
											   <td>
											   <b><?php echo $data['languages']; ?></b>
											   </td>
											 </tr>
											 <tr>
											   <td>
											   <b>Research Interests</b>
											   <td>
											   <b><?php echo $data['interests']; ?></b>
											   </td>
											 </tr>
											</tbody>
										  </table>
	                                           </div>
	                                        </div>
	                                     </div>
	                                   </div>
	                                 </div>
							         <div class="tab-pane text-center" id="work">
								        <div class="row">
										  <div class="col-lg-12 col-md-12">
							                <div class="card">
	                                           <div class="card-header" data-background-color="blue">
	                                               <h4 class="title">Work</h4>
	                                           </div>
	                                        <div class="card-content table-responsive">
	                                        <table style="text-align: left;" class="table">
	                                        <tbody>
<?php
$work_sql = "SELECT * FROM p_work where regno='$user'";
$work_query = mysqli_query($conn,$work_sql);
$work_num_rows = mysqli_num_rows($work_query); 
if($work_num_rows > 0){
	while($work_data = mysqli_fetch_array($work_query)){
              echo "<tr>";
			  echo "<td>";
			  echo "<h4>".$work_data['work_at']."</h4>";
			  echo "<b>Position: </b>".$work_data['position']."<br/><br/>";
			  echo "<b>Time Period: </b>".$work_data['work_period']."<br/><br/>";
			  echo "</td>";
			  echo "</tr>";
			}
			  
	    }
	    
?>
											</tbody>
										  </table>
	                                       </div>
	                                     </div>
	                                   </div>	
									 </div>
				                     </div>
				                     <div class="tab-pane text-center" id="projects">
									    <div class="row">
										  <div class="col-lg-12 col-md-12">
							                <div class="card">
	                                           <div class="card-header" data-background-color="red">
	                                               <h4 class="title">Projects</h4>
	                                           </div>
	                                        <div class="card-content table-responsive">
	                                        <table style="text-align: left;" class="table">
	                                        <tbody>
<?php
$project_sql = "SELECT * FROM p_project where regno='$user'";
$project_query = mysqli_query($conn,$project_sql);
$project_num_rows = mysqli_num_rows($project_query); 
if($project_num_rows > 0){
	while($project_data = mysqli_fetch_array($project_query)){
              echo "<tr>";
			  echo "<td>";
			  echo "<h4>".$project_data['project']."</h4>";
			  echo "<b>Project Exposure: </b>".$project_data['project_expo']."<br/><br/>";
			  echo "<b>Link: </b><a target=\"_BLANK\" href=".$project_data['link'].">Click Here</a><br/><br/>";
			  echo "</td>";
			  echo "</tr>";
			}
			  
	    }
	    
?>
											</tbody>
										  </table>
	                                       </div>
	                                     </div>
	                                   </div>		
									    </div>
				                     </div>
				                  </div>
                               </div>
	                        </div>
<?php } ?>
<?php include 'includes/footer_menu.php' ?>

</body>

<?php include 'includes/footer.php'; ?>
