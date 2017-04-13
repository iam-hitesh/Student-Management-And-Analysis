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
	                
<div class="card card-nav-tabs">
	<div class="card-header" data-background-color="blue">
		<div class="nav-tabs-navigation">
			<div class="nav-tabs-wrapper">
				<span class="nav-tabs-title">Tasks:</span>
				<ul class="nav nav-tabs" data-tabs="tabs">
					<li class="active">
						<a href="#profile" data-toggle="tab">
							<i class="material-icons">bug_report</i>
							First
						<div class="ripple-container"></div></a>
					</li>
					<li class="">
						<a href="#messages" data-toggle="tab">
							<i class="material-icons">code</i>
							Second
						<div class="ripple-container"></div></a>
					</li>
					<li class="">
						<a href="#settings" data-toggle="tab">
							<i class="material-icons">cloud</i>
							Third
						<div class="ripple-container"></div></a>
					</li>
				</ul>
			</div>
		</div>
	</div>

	<div class="card-content">
		<div class="tab-content">
			<div class="tab-pane active" id="profile">
				First Tab
			</div>
			<div class="tab-pane" id="messages">
				Second Tab
			</div>
			<div class="tab-pane" id="settings">
				Third Tab
			</div>
		</div>
	</div>

</div>
	                </div>
	            

<?php include 'includes/footer_menu.php' ?>

</body>

<?php include 'includes/footer.php'; ?>