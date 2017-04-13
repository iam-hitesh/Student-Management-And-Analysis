<?php 
include 'includes/include.php';
dbconnect();
session_set();
include 'includes/head.php';
include 'includes/sidebar_menu.php';
include 'includes/header_menu.php';
?>

	<!--- Main Content Starts Here -->
		<div id="page-wrapper">
			<div class="main-page">
              <div class="grids">
					<div class="progressbar-heading grids-heading">
						<h2>Add New Notice/Notification</h2>
					</div>
					<div class="panel panel-widget">
						<div class="tables">
						<form method="POST" name="add_notice" action="action/post_notice.php" enctype="multipart/form-data">
							<table class="table">
								<tbody>
								  <tr>
									<td>
									  <label for="Title">Notice Title: (required)</label>
									  <input type="text" name="topic" required="true" class="form-control" />
									</td>
								  </tr>
								  <tr>
									  <td>
									  <label for="Notice Description">Notice Description: (required)</label>
									  <textarea type="text" name="notice" required="true" class="form-control"/></textarea></td>
							      </tr>
								  <tr>
									<td>
									   <label for="link">Link: </label>
									   <input type="text" name="link" class="form-control"/>
                                    </td>
                                   </tr>
                                   <tr>
									<td>
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
                                    </td>
                                   </tr>
                                   <tr>
									<td>
									   <select name="session" required="true" class="form-control" >
											<option value="">Select Session/Semester</option>
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
                                    </td>
                                   </tr>
                                   <tr>
									<td>
									   <label for="file">File: (Upload only PDF/DOC/JPEG/PNG)</label>
									   <input type="file" name="filename" class="form-control" />
                                    </td>
                                   </tr>
								</tbody>
							</table>
							<input type="submit" name="add_notice" value="Upload" class="btn btn-primary" required="true" />
							<input type="reset" name="reset" value="Reset" class="btn btn-danger" />
							</form>
						</div>
					</div>
		<!--- Main Content Ends Here -->
		
<?php include 'includes/footer.php'; ?>