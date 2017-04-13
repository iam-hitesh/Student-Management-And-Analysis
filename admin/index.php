<?php
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
					<a href="students">
					<div class="col-md-3 ticket-grid">
						<div class="tickets">
							<div class="grid-left">
								<div class="book-icon">
									<i class="fa fa-user"></i>
								</div>
							</div>
							<div class="grid-right">
								<h3>Manage<span>Scholar's</span></h3>
								<p>452</p>
							</div>
							<div class="clearfix"> </div>
						</div>
					</div>
					</a>
					<a href="faculties">
					<div class="col-md-3 ticket-grid">
						<div class="tickets">
							<div class="grid-left">
								<div class="book-icon">
									<i class="fa fa-rocket"></i>
								</div>
							</div>
							<div class="grid-right">
								<h3>Manage<span>Faculties</span></h3>
								<p>745</p>
							</div>
							<div class="clearfix"> </div>
						</div>
					</div>
					</a>
					<a href="library">
					<div class="col-md-3 ticket-grid">
						<div class="tickets">
							<div class="grid-left">
								<div class="book-icon">
									<i class="fa fa-book"></i>
								</div>
							</div>
							<div class="grid-right">
								<h3>Manage<span>Library</span></h3>
								<p>5</p>
							</div>
							<div class="clearfix"> </div>
						</div>
					</div>
					</a>
					<a href="fees">
					<div class="col-md-3 ticket-grid">
						<div class="tickets">
							<div class="grid-left">
								<div class="book-icon">
									<i class="fa fa-bar-chart"></i>
								</div>
							</div>
							<div class="grid-right">
								<h3>Manage<span>Fees</span></h3>
								<p>7462</p>
							</div>
							<div class="clearfix"> </div>
						</div>
					</div>
					</a>
					<div class="clearfix"> </div>
				</div>
				<!-- //four-grids -->
				<!-- main content start-->


				<!--grids-->
				<div class="grids">
					<div class="panel panel-widget">
						<div class="inbox-page">
							<h4>New Messages</h4>
							<div class="inbox-row widget-shadow" id="accordion" role="tablist" aria-multiselectable="true">
								<div class="mail "> <input type="checkbox" class="checkbox"> </div>
								<div class="mail"><img src="images/i1.png" alt=""></div>
								<div class="mail mail-name"> <h6>Janiya</h6> </div>
								<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
									<div class="mail"><p>Nullam quis risus eget urna mollis ornare</p></div>
								</a>
								<div class="mail-right">
									<div class="dropdown">
										<a href="#" data-toggle="dropdown" aria-expanded="false">
											<p><i class="fa fa-ellipsis-v mail-icon"></i></p>
										</a>
										<ul class="dropdown-menu float-right">
											<li>
												<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
													<i class="fa fa-reply mail-icon"></i>
													Reply
												</a>
											</li>
											<li>
												<a href="#" title="">
													<i class="fa fa-download mail-icon"></i>
													Archive
												</a>
											</li>
											<li>
												<a href="#" class="font-red" title="">
													<i class="fa fa-trash-o mail-icon"></i>
													Delete
												</a>
											</li>
										</ul>
									</div> 
								</div>
								<div class="mail-right"><p>30 Dec</p></div>
								<div class="clearfix"> </div>
								<div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
									<div class="mail-body">
										<p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor.</p>
										<form>
											<input type="text" placeholder="Reply to sender" required="">
											<input type="submit" value="Send">
										</form>
									</div>
								</div>
							</div>
							<div class="inbox-row widget-shadow" id="accordion1" role="tablist" aria-multiselectable="true">
								<div class="mail "> <input type="checkbox" class="checkbox"> </div>
								<div class="mail"><img src="images/i2.png" alt=""></div>
								<div class="mail mail-name"><h6>Walsh</h6></div>
								<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
									<div class="mail"><p>Mollis nullam quis risus eget ornare</p></div>
								</a>
								<div class="mail-right">
									<div class="dropdown">
										<a href="#" data-toggle="dropdown" aria-expanded="false">
											<p><i class="fa fa-ellipsis-v mail-icon"></i></p>
										</a>
										<ul class="dropdown-menu float-right">
											<li>
												<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
													<i class="fa fa-reply mail-icon"></i>
													Reply
												</a>
											</li>
											<li>
												<a href="#" title="">
													<i class="fa fa-download mail-icon"></i>
													Archive
												</a>
											</li>
											<li>
												<a href="#" class="font-red" title="">
													<i class="fa fa-trash-o mail-icon"></i>
													Delete
												</a>
											</li>
										</ul>
									</div> 
								</div>
								<div class="mail-right"><p>30 Dec</p></div>
								<div class="clearfix"> </div>	
								<div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
									<div class="mail-body">
										<p>Quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.</p>
										<form>
											<input type="text" placeholder="Reply to sender" required="">
											<input type="submit" value="Send">
										</form>
									</div>
								</div>
							</div>
							<div class="inbox-row widget-shadow">
								<div class="mail "> <input type="checkbox" class="checkbox"> </div>
								<div class="mail"><img src="images/i3.png" alt=""></div>
								<div class="mail mail-name"><h6>Skolski</h6></div>
								<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="true" aria-controls="collapsethree">
									<div class="mail"><p>Ornare vel eu leo nullam quis urna mollis </p></div>
								</a>
								<div class="mail-right">
									<div class="dropdown">
										<a href="#" data-toggle="dropdown" aria-expanded="false">
											<p><i class="fa fa-ellipsis-v mail-icon"></i></p>
										</a>
										<ul class="dropdown-menu float-right">
											<li>
												<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
													<i class="fa fa-reply mail-icon"></i>
													Reply
												</a>
											</li>
											<li>
												<a href="#" title="">
													<i class="fa fa-download mail-icon"></i>
													Archive
												</a>
											</li>
											<li>
												<a href="#" class="font-red" title="">
													<i class="fa fa-trash-o mail-icon"></i>
													Delete
												</a>
											</li>
										</ul>
									</div> 
								</div>
								<div class="mail-right"><p>30 Dec</p></div>
								<div class="clearfix"> </div>
								<div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
									<div class="mail-body">
										<p>Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.</p>
										<form>
											<input type="text" placeholder="Reply to sender" required="">
											<input type="submit" value="Send">
										</form>
									</div>
								</div>
							</div>
							<div class="inbox-row widget-shadow">
								<div class="mail "> <input type="checkbox" class="checkbox"> </div>
								<div class="mail"><img src="images/i4.png" alt=""></div>
								<div class="mail mail-name"><h6>Emoori</h6></div>
								<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
									<div class="mail"><p>Vely Ornare  leo nullam quis risus mollis </p></div>
								</a>
								<div class="mail-right">
									<div class="dropdown">
										<a href="#" data-toggle="dropdown" aria-expanded="false">
											<p><i class="fa fa-ellipsis-v mail-icon"></i></p>
										</a>
										<ul class="dropdown-menu float-right">
											<li>
												<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="true" aria-controls="collapsefour">
													<i class="fa fa-reply mail-icon"></i>
													Reply
												</a>
											</li>
											<li>
												<a href="#" title="">
													<i class="fa fa-download mail-icon"></i>
													Archive
												</a>
											</li>
											<li>
												<a href="#" class="font-red" title="">
													<i class="fa fa-trash-o mail-icon"></i>
													Delete
												</a>
											</li>
										</ul>
									</div> 
								</div>
								<div class="mail-right"><p>30 Dec</p></div>
								<div class="clearfix"> </div>
								<div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
									<div class="mail-body">
										<p> Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.</p>
										<form>
											<input type="text" placeholder="Reply to sender" required="">
											<input type="submit" value="Send">
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
<?php include 'includes/footer.php'; ?>