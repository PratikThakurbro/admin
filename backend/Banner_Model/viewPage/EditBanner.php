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
								<p>Update Banners</p>
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
            
            
            <?php
			// Include database connection
			include('../../../common/db_connection.php');

			// Check if ID is passed in the URL (assuming you are passing the page ID for editing)
			if (isset($_GET['id'])) {
				$id = $_GET['id'];

				// Fetch data for the specific page using the ID
				$sql = "SELECT * FROM banners WHERE id = '$id'"; 
				$result = mysqli_query($conn, $sql);

				// Check for query errors
				if (!$result) {
					die("Query failed: " . mysqli_error($conn));
				}

				// Fetch the data from the result set
				$row = mysqli_fetch_assoc($result);

				// If no page found, show an error message
				if (!$row) {
					echo "Page not found!";
					exit();
				}
			} else {
				echo "No page ID provided!";
				exit();
			}
			?>

						<div class="main-panel">
							<div class="content">
								<div class="container-fluid">
									<h4 class="page-title">Update Banner</h4>

									<div class="container">
										<div class="row">
											<div class="col-12">
												<div class="d-flex align-items-center justify-content-between my-4">
													<h3>Edit Banner</h3>
												</div>
												
												<?php if ($row) { ?>
												<!-- Banner Edit Form -->
												<form action="../modelPage/updateBanner.php?id=<?php echo $id; ?>" method="POST" enctype="multipart/form-data">
												<!-- Title Input -->
												<div class="mb-3">
													<label for="title" class="form-label">Title</label>
													<input type="text" class="form-control" id="title" name="title" value="<?php echo htmlspecialchars($row['title']); ?>" required>
												</div>

												<!-- Image Input with Preview -->
												<div class="mb-3">
													<label for="image" class="form-label">Image</label>
													<input type="file" class="form-control" id="image" name="image" accept="image/*" onchange="previewImage(event)">
												</div>

												<!-- Image Preview -->
												<div class="mb-3">
													<img id="imagePreview" src="<?php echo htmlspecialchars($row['image']); ?>" alt="Image Preview" style="display:block; max-width: 100%; height: auto;"/>
												</div>

												<!-- Description Textarea -->
												<div class="mb-3">
													<label for="description" class="form-label">Description</label>
													<textarea class="form-control" id="description" name="description" required><?php echo htmlspecialchars($row['description']); ?></textarea>
												</div>

												<!-- URL Input -->
												<div class="mb-3">
													<label for="url" class="form-label">URL</label>
													<input type="url" class="form-control" id="url" name="url" value="<?php echo htmlspecialchars($row['url']); ?>" required>
												</div>

												<!-- State Selection (Active/Inactive) -->
												<div class="mb-3">
													<label for="state" class="form-label">State (Active/Inactive)</label>
													<select class="form-control" id="state" name="state" required>
														<option value="1" <?php echo ($row['state'] == 1) ? 'selected' : ''; ?>>Active</option>
														<option value="0" <?php echo ($row['state'] == 0) ? 'selected' : ''; ?>>Inactive</option>
													</select>
												</div>

												<!-- Hidden ID Field -->
												<input type="hidden" name="id" value="<?php echo $id; ?>">

												<!-- Submit Button -->
												<div class="form-group">
													<button type="submit" class="btn btn-success">Update</button>
													<button type="button" class="btn btn-danger" onclick="window.location.href='../../View/Banner.php';">Cancel</button>
												</div>
											</form>

									<?php } ?>

								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- footer -->
				<?php include '../../../common/footer.php' ?>
				<!-- footer end -->
			</div>

			<!-- Image preview script -->
			<script>
			function previewImage(event) {
				const reader = new FileReader();
				reader.onload = function() {
					const output = document.getElementById('imagePreview');
					output.src = reader.result;
				};
				reader.readAsDataURL(event.target.files[0]);
			}
			</script>
	
			</div>
		</div>
	</div>
	<!-- Modal -->
	
</body>
 <!-- js link -->
 <?php include '../../../common/coomonJsLink.php';?>
 <!-- js link  end-->
</html>