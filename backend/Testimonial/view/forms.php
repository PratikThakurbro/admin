<!DOCTYPE html>
<html>
<!-- head -->
 <?php include '../../../common/head.php'; ?>
<!-- head end -->
<body>
	<div class="wrapper">
		<div class="main-header">
			<div class="logo-header">
				<a href="index.html" class="logo">
					Ready Dashboard
				</a>
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<button class="topbar-toggler more"><i class="la la-ellipsis-v"></i></button>
			</div>

			<!-- neve -->
			<?php include '../../../common/nav.php'; ?>
			 <!-- neve end -->
			  
			</div>
			<div class="sidebar">
				<div class="scrollbar-inner sidebar-wrapper">
					<div class="user">
						<div class="photo">
							<img src="../../../assets/img/profile.jpg">
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
					<?php include '../../../common/countallNo.php'; ?>
					<ul class="nav">
						<li class="nav-item">
							<a href="../../../View/dashboard.php">
								<i class="la la-dashboard"></i>
								<p>Dashboard</p>
								<span class="badge badge-count">5</span>
							</a>
						</li>
						
						<li class="nav-item">
							<a href="../../../View/Testimonials.php">
								<i class="la la-dashboard"></i>
								<p>Testimonials</p>
								<span class="badge badge-count"><?php echo $total_count_testimonials; ?></span>
							</a>
						</li>
						
						<li class="nav-item active">
							<a href="#">
								<i class="la la-table"></i>
								<p>Add Testimonials</p>
								<span class="badge badge-count"><?php echo $total_count_testimonials; ?></span>
							</a>
						</li>
						<li class="nav-item ">
							<a href="../../../View/Banner.php">
								<i class="la la-table"></i>
								<p>Banner</p>
								<span class="badge badge-count"><?php echo $total_count_banners; ?></span>
							</a>
						</li>
						<li class="nav-item ">
							<a href="../../../View/Pages.php">
								<i class="la la-table"></i>
								<p>Pages</p>
								<span class="badge badge-count"><?php echo $total_count_banners; ?></span>
							</a>
						</li>
						
						
					</ul>
				</div>
			</div>
			<!-- form -->
			<div class="main-panel">
					<div class="content">
						<div class="container-fluid">
							<h4 class="page-title">Forms</h4>
							<div class="row">
								<div class="col-md-12">
									<div class="card">
									<div class="container mt-5">
									<h4>Add Testimonial</h4>
									<form action="../model_page/addTestimonial.php" method="POST" enctype="multipart/form-data">
										<!-- Name Field -->
										<div class="form-group">
											<label for="name">Name</label>
											<input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" required>
										</div>

										<!-- Image Field -->
										<div class="form-group">
											<label for="image">Image</label>
											<input type="file" class="form-control-file" id="image" name="image">
										</div>

										<!-- Designation Field -->
										<div class="form-group">
											<label for="designation">Designation</label>
											<input type="text" class="form-control" id="designation" name="designation" placeholder="Enter Designation" required>
										</div>

										<!-- Message Field -->
										<div class="form-group">
											<label for="message">Message</label>
											<textarea class="form-control" id="message" name="message" rows="4" placeholder="Enter Message" required></textarea>
										</div>

										<!-- Rating Field -->
										<div class="form-group">
											<label for="rating">Rating</label>
											<select class="form-control" id="rating" name="rating" required>
												<option value="1">1</option>
												<option value="2">2</option>
												<option value="3">3</option>
												<option value="4">4</option>
												<option value="5">5</option>
											</select>
										</div>

										<!-- State Field -->
										<div class="form-group">
											<label for="state">State</label>
											<select class="form-control" id="state" name="state" required>
												<option value="0">Inactive</option>
												<option value="1">Active</option>
											</select>
										</div>

										<!-- Submit and Cancel Buttons -->
										<div class="form-group">
											<button type="submit" class="btn btn-success">Submit</button>
											<button type="button" class="btn btn-danger" onclick="window.location.href='../../../View/Testimonials.php';">Cancel</button>
											</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			 <!-- end form -->
		
					<!-- footer -->
					<?php include '../../../common/footer.php' ?>
					<!-- footer end -->
				</div>
			</div>
		</div>
	</div>
	
</body>
 <!-- js link -->
 <?php include '../../../common/coomonJsLink.php';?>
 <!-- js link  end-->

</html>