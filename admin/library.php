<?php 
#Include Files
include 'includes/include.php';
dbconnect();
session_set();
include 'includes/head.php'; 
include 'includes/sidebar_menu.php';
include 'includes/header_menu.php';
?>
		

	<!-- main content start-->
		<div id="page-wrapper">
			<div class="main-page">
			
				<!-- four-grids -->
				<div class="row four-grids">
					<a href="add_books">
					<div class="col-md-3 ticket-grid">
						<div class="tickets">
							<div class="grid-left">
								<div class="book-icon">
									<i class="fa fa-book"></i>
								</div>
							</div>
							<div class="grid-right">
								<h3>Add <span>Books</span></h3>
								<p>452</p>
							</div>
							<div class="clearfix"> </div>
						</div>
					</div>
					</a>
					<a href="view_books">
					<div class="col-md-3 ticket-grid">
						<div class="tickets">
							<div class="grid-left">
								<div class="book-icon">
									<i class="fa fa-rocket"></i>
								</div>
							</div>
							<div class="grid-right">
								<h3>Manage <span>Books</span></h3>
								<p>745</p>
							</div>
							<div class="clearfix"> </div>
						</div>
					</div>
					</a>
					<a href="issue_books">
					<div class="col-md-3 ticket-grid">
						<div class="tickets">
							<div class="grid-left">
								<div class="book-icon">
									<i class="fa fa-bar-chart"></i>
								</div>
							</div>
							<div class="grid-right">
								<h3>Issue/Return<span> Books</span></h3>
								<p>5</p>
							</div>
							<div class="clearfix"> </div>
						</div>
					</div>
					</a>
					<a href="lib_status">
					<div class="col-md-3 ticket-grid">
						<div class="tickets">
							<div class="grid-left">
								<div class="book-icon">
									<i class="fa fa-user"></i>
								</div>
							</div>
							<div class="grid-right">
								<h3>Check<span> Status</span></h3>
								<p>7462</p>
							</div>
							<div class="clearfix"> </div>
						</div>
					</div>
					</a>
					<div class="clearfix"> </div>
				</div>
				<!-- //four-grids -->
				<!--grids-->
				<div class="grids">
					<div class="progressbar-heading grids-heading">
						<h2>Faculty Absent Today</h2>
					</div>
					<div class="panel panel-widget">
						<div class="tables">
							<h4>Student List</h4>
							<table class="table">
								<thead>
									<tr>
									  <th>#</th>
									  <th>First Name</th>
									  <th>Last Name</th>
									  <th>Username</th>
									</tr>
								</thead>
								<tbody>
									<tr>
									  <th scope="row">1</th>
									  <td>Mark</td>
									  <td>Otto</td>
									  <td>@mdo</td>
									</tr>
									<tr>
									  <th scope="row">2</th>
									  <td>Jacob</td>
									  <td>Thornton</td>
									  <td>@fat</td>
									</tr>
									<tr>
									  <th scope="row">3</th>
									  <td>Larry</td>
									  <td>the Bird</td>
									  <td>@twitter</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>


<?php include 'includes/footer.php'; ?>