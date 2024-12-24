<!DOCTYPE html>
<html>
	<!-- head -->
	<?php include '../View/commonFile/headView.php';?>
	<!-- head end -->
<bod>
	<div class="wrapper">
		<div class="main-header">
			<div class="logo-header">
				<a href="#" class="logo">
					Ready Dashboard
				</a>
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<button class="topbar-toggler more"><i class="la la-ellipsis-v"></i></button>
			</div>
			<nav class="navbar navbar-header navbar-expand-lg">
				<div class="container-fluid">
					
					<form class="navbar-left navbar-form nav-search mr-md-3" action="">
						<div class="input-group">
							<input type="text" placeholder="Search ..." class="form-control">
							<div class="input-group-append">
								<span class="input-group-text">
									<i class="la la-search search-icon"></i>
								</span>
							</div>
						</div>
					</form>
					<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
						<li class="nav-item dropdown hidden-caret">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="la la-envelope"></i>
							</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdown">
								<a class="dropdown-item" href="#">Action</a>
								<a class="dropdown-item" href="#">Another action</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="#">Something else here</a>
							</div>
						</li>
						<li class="nav-item dropdown hidden-caret">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="la la-bell"></i>
								<span class="notification">3</span>
							</a>
							<ul class="dropdown-menu notif-box" aria-labelledby="navbarDropdown">
								<li>
									<div class="dropdown-title">You have 4 new notification</div>
								</li>
								<li>
									<div class="notif-center">
										<a href="#">
											<div class="notif-icon notif-primary"> <i class="la la-user-plus"></i> </div>
											<div class="notif-content">
												<span class="block">
													New user registered
												</span>
												<span class="time">5 minutes ago</span> 
											</div>
										</a>
										<a href="#">
											<div class="notif-icon notif-success"> <i class="la la-comment"></i> </div>
											<div class="notif-content">
												<span class="block">
													Rahmad commented on Admin
												</span>
												<span class="time">12 minutes ago</span> 
											</div>
										</a>
										<a href="#">
											<div class="notif-img"> 
												<img src="../assets/img/profile2.jpg" alt="Img Profile">
											</div>
											<div class="notif-content">
												<span class="block">
													Reza send messages to you
												</span>
												<span class="time">12 minutes ago</span> 
											</div>
										</a>
										<a href="#">
											<div class="notif-icon notif-danger"> <i class="la la-heart"></i> </div>
											<div class="notif-content">
												<span class="block">
													Farrah liked Admin
												</span>
												<span class="time">17 minutes ago</span> 
											</div>
										</a>
									</div>
								</li>
								<li>
									<a class="see-all" href="javascript:void(0);"> <strong>See all notifications</strong> <i class="la la-angle-right"></i> </a>
								</li>
							</ul>
						</li>
						<li class="nav-item dropdown">
							<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false"> <img src="../assets/img/profile.jpg" alt="user-img" width="36" class="img-circle"><span >Hizrian</span></span> </a>
							<ul class="dropdown-menu dropdown-user">
								<li>
									<div class="user-box">
										<div class="u-img"><img src="assets/img/profile.jpg" alt="user"></div>
										<div class="u-text">
											<h4>Hizrian</h4>
											<p class="text-muted">hello@themekita.com</p><a href="profile.html" class="btn btn-rounded btn-danger btn-sm">View Profile</a></div>
										</div>
									</li>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="#"><i class="ti-user"></i> My Profile</a>
									<a class="dropdown-item" href="#"></i> My Balance</a>
									<a class="dropdown-item" href="#"><i class="ti-email"></i> Inbox</a>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="#"><i class="ti-settings"></i> Account Setting</a>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="#"><i class="fa fa-power-off"></i> Logout</a>
								</ul>
								<!-- /.dropdown-user -->
							</li>
						</ul>
					</div>
				</nav>
			</div>

			<div class="sidebar">
				<div class="scrollbar-inner sidebar-wrapper">
					<div class="user">
						<div class="photo">
							<img src="../assets/img/profile.jpg">
						</div>
						<div class="info">
							<a class="" data-toggle="collapse" href="#collapseExample" aria-expanded="true">
								<span>
									Hizrian
									<span class="user-level">Administrator</span>
									<span class="caret"></span>
								</span>
							</a>
							<div class="clearfix"></div>

							<div class="collapse in" id="collapseExample" aria-expanded="true" style="">
								<ul class="nav">
									<li>
										<a href="#profile">
											<span class="link-collapse">My Profile</span>
										</a>
									</li>
									<li>
										<a href="#edit">
											<span class="link-collapse">Edit Profile</span>
										</a>
									</li>
									<li>
										<a href="#settings">
											<span class="link-collapse">Settings</span>
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<?php include('../common/countallNo.php'); ?>
					<ul class="nav">
						<li class="nav-item ">
							<a href="../View/dashboard.php">
								<i class="la la-dashboard"></i>
								<p>Dashboard</p>
								<span class="badge badge-count">5</span>
							</a>
						</li>
						
						<li class="nav-item active">
							<a href="Testimonials.php">
								<i class="la la-dashboard"></i>
								<p>Testimonials</p>
								<span class="badge badge-count"><?php echo $total_count_testimonials; ?> </span>
							</a>
						</li>
			           
						<li class="nav-item ">
							<a href="../View/Banner.php">
								<i class="la la-dashboard"></i>
								<p>Banners</p>
								<span class="badge badge-count"><?php echo $total_count_banners; ?></span>
							</a>
						</li>
						<li class="nav-item ">
							<a href="../View/Pages.php">
								<i class="la la-dashboard"></i>
								<p>Pages</p>
								<span class="badge badge-count"><?php echo $total_count_pages; ?></span>
							</a>
						</li>
						
						
					</ul>
				</div>
			</div>

            <div class="main-panel">
            <div class="content">
                <div class="container-fluid">
                    <h4 class="page-title">Datalist</h4>
                    

                            <div class="container">
                                <div class="row">
                                    <div class="col-12">
									
									<div class="d-flex align-items-center justify-content-between my-4">
									<h3>Testimonials</h3>
									<a href="../backend/Testimonial/view/forms.php">
									<button class="btn btn-primary">Add Testimonials</button>
									</a>
									</div> 
									<?php
									// Include database connection
								
								 include '../common/db_connection.php'; 


									// Fetch data from the database
									$sql = "SELECT * FROM testimonials";
									$result = mysqli_query($conn, $sql);

									// Check for query errors
									if (!$result) {
										die("Query failed: " . mysqli_error($conn));
									}

									?>
											<!-- DataTable -->
											 <div class="table-responsive">
											<table id="example" class="display table table-bordered">
												<thead>
													<tr>
														<th>Name</th>
														<th>Image</th>
														<th>Designation</th>
														<th>Message</th>
														<th>Rating</th>
														<th>State</th>
														<th>Actions</th>
													</tr>
												</thead>
												<tbody>
													<?php while ($row = mysqli_fetch_assoc($result)) { ?>
														<tr>
															<td><?php echo $row['name']; ?></td>
															<td>
                                                            <img src="../backend/Testimonial/model_page/<?php echo $row['image']; ?>" style="width: 60px; height: 60px; border-radius: 5px; border: 1px solid #ddd;" alt="Image"></td>
															<td><?php echo $row['designation']; ?></td>
															<td class="message text-truncate" style="max-width: 250px;"><?php echo $row['message']; ?></td>
															<td><?php echo $row['rating']; ?></td>
															<td>
																<?php echo ($row['state'] == 1) ? 'Active' : 'Inactive'; ?>
															</td>
															<td>
																<!-- Action Buttons -->
																<a href="../backend/Testimonial/view/formUpdate.php?id=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm edit-btn">Edit</a>


																<a href="../backend/Testimonial/model_page/delete_testimonial.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm delete-btn">Delete</a>


															</td>
														</tr>
													<?php } ?>
												</tbody>
											</table>
										</div>
									</div>
	
									<?php
									// Close the database connection
									mysqli_close($conn);
									?>
                                    </div>
                                </div>
                            </div>
                          
                        </div>
							<!-- footer -->
							<?php include 'commonFile/footer.php'?>
							<!-- footer -->
						</div>
							
					</div>

				</div>

			</div>
				
		</div>	
			
	</div>
	
	
</body>

<!-- js link -->
<?php include 'commonFile/commonJsLink.php'; ?>
<!-- End js link -->

</html>