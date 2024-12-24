<!DOCTYPE html>
<html>
<!-- head -->
<?php include '../../../common/head.php'; ?>
<!-- head end -->
<body>
	<class="wrapper">
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
					<ul class="nav">
						<li class="nav-item ">
							<a href="../../../View/dashboard.php">
								<i class="la la-dashboard"></i>
								<p>Dashboard</p>
								<span class="badge badge-count">5</span>
							</a>
						</li>
						
                        <?php include '../../../common/countallNo.php'; ?>	
						<li class="nav-item ">
							<a href="../../../View/Testimonials.php">
								<i class="la la-dashboard"></i>
								<p>Testimonials</p>
								<span class="badge badge-count"><?php echo $total_count_testimonials; ?></span>
							</a>
						</li>
						
                        <li class="nav-item ">
							<a href="../../../View/Banner.php">
								<i class="la la-dashboard"></i>
								<p>Banners</p>
								<span class="badge badge-count"><?php echo $total_count_banners; ?></span>
							</a>
						</li>
                        <li class="nav-item active">
							<a href="#">
								<i class="la la-dashboard"></i>
								<p> Add Banners</p>
								<span class="badge badge-count"><?php echo $total_count_banners; ?></span>
							</a>
						</li>
                        <li class="nav-item ">
							<a href="../../../View/Pages.php">
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
									<h3>Add Banner</h3>
									
									</div> 
									 <!-- Display Error Message if Exists -->
                                     <?php if (isset($error) && !empty($error)): ?>
                                     <div class="alert alert-danger"><?php echo $error; ?></div>
                                     <?php endif; ?>

                                    <!-- Banner Add Form -->
									<form action="../modelPage/add_banners.php" method="POST" enctype="multipart/form-data">
										<!-- Title Input -->
										<div class="mb-3">
											<label for="title" class="form-label">Title</label>
											<input type="text" class="form-control" id="title" name="title" required>
										</div>

										<!-- Image Input with Preview -->
										<div class="mb-3">
											<label for="image" class="form-label">Image</label>
											<input type="file" class="form-control" id="image" name="image" accept="image/*" onchange="previewImage(event)" required>
										</div>

										<!-- Image Preview -->
										<div class="mb-3">
											<img id="imagePreview" src="#" alt="Image Preview" style="display:none; max-width: 100%; height: auto;"/>
										</div>

										<!-- Description Textarea -->
										<div class="mb-3">
											<label for="description" class="form-label">Description</label>
											<textarea class="form-control" id="description" name="description" required></textarea>
										</div>

										<!-- URL Input -->
										<div class="mb-3">
											<label for="url" class="form-label">URL</label>
											<input type="url" class="form-control" id="url" name="url" placeholder="Enter the URL" required>
										</div>

										<!-- State Selection (Active/Inactive) -->
										<div class="mb-3">
											<label for="state" class="form-label">State (Active/Inactive)</label>
											<select class="form-control" id="state" name="state" required>
												<option value="1">Active</option>
												<option value="0">Inactive</option>
											</select>
										</div>

										<!-- Submit Button -->
										<div class="form-group">
											<button type="submit" class="btn btn-success">Add Banner</button>
											<button type="button" class="btn btn-danger" onclick="window.location.href='../../../View/Banner.php';">Cancel</button>
										</div>
									</form>

									
	
									
                                    </div>
                                </div>
                            </div>
                          
                        </div>
                    </div>
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