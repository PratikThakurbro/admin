<!DOCTYPE html>
<html>
<!-- head -->
<?php include '../../../common/head.php'; ?>
<!-- head end -->
<body>
	<div class="wrapper">
		<div class="main-header">
			<div class="logo-header">
				<a href="dashboard.php" class="logo">
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
					<?php include('../../../common/countallNo.php'); ?>
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
							<a href="../../../View/Testimonials.php">
								<i class="la la-table"></i>
								<p>Update Testimonials</p>
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
								<span class="badge badge-count"><?php echo $total_count_pages; ?></span>
							</a>
						</li>
						
						
					</ul>
				</div>
			</div>
					<!-- form -->
					<?php
					// Include your database connection
					include('../../../common/db_connection.php');

					// Check if the 'id' parameter is passed via GET
					if (isset($_GET['id'])) {
						$testimonial_id = $_GET['id'];

						// Query to fetch the testimonial from the database
						$query = "SELECT * FROM testimonials WHERE id = $testimonial_id";
						$result = mysqli_query($conn, $query);

						// Check if the query was successful and the testimonial was found
						if ($result && mysqli_num_rows($result) > 0) {
							// Fetch the testimonial data
							$testimonial = mysqli_fetch_assoc($result);
						} else {
							// If no testimonial found, display an error
							echo "Testimonial not found!";
							exit; // Stop further script execution
						}
					} else {
						// If the 'id' parameter is not provided in the URL, handle it gracefully
						echo "Testimonial ID not specified!";
						exit; // Stop further script execution
					}
					?>

					<!-- HTML form (with pre-filled values from the database) -->
					<div class="main-panel">
						<div class="content">
							<div class="container-fluid">
								<h4 class="page-title">Forms</h4>
								<div class="row">
									<div class="col-md-12">
										<div class="card">
											<div class="container mt-5">
												<h4>Edit Testimonial</h4>
												<form action="../model_page/updateTestimonial.php" method="POST" enctype="multipart/form-data">
													<!-- Hidden Field for ID -->
													<input type="hidden" name="id" value="<?php echo $testimonial['id']; ?>">

													<!-- Name Field -->
													<div class="form-group">
														<label for="name">Name</label>
														<input type="text" class="form-control" id="name" name="name" value="<?php echo $testimonial['name']; ?>" required>
													</div>

													<div class="mb-3">
														<label for="image" class="form-label">Image</label>
														<input type="file" class="form-control" id="image" name="image" accept="image/*" onchange="previewImage(event)">
													</div>

													<!-- Image Preview -->
													<div class="mb-3">
														<!-- Show existing image if available -->
														<?php if (!empty($testimonial['image'])): ?>
															<div class="mt-2">
																<img id="imagePreview" src="<?php echo htmlspecialchars($testimonial['image']); ?>" alt="Current Image" style="max-width: 100%; height: auto;">
															</div>
														<?php else: ?>
															<!-- Default preview image if no existing image is available -->
															<img id="imagePreview" src="#" alt="Image Preview" style="display:none; max-width: 100%; height: auto;">
														<?php endif; ?>
													</div>

													<!-- Designation Field -->
													<div class="form-group">
														<label for="designation">Designation</label>
														<input type="text" class="form-control" id="designation" name="designation" value="<?php echo $testimonial['designation']; ?>" required>
													</div>

													<!-- Message Field -->
													<div class="form-group">
														<label for="message">Message</label>
														<textarea class="form-control" id="message" name="message" rows="4" required><?php echo $testimonial['message']; ?></textarea>
													</div>

													<!-- Rating Field -->
													<div class="form-group">
														<label for="rating">Rating</label>
														<select class="form-control" id="rating" name="rating" required>
															<option value="1" <?php echo ($testimonial['rating'] == 1) ? 'selected' : ''; ?>>1</option>
															<option value="2" <?php echo ($testimonial['rating'] == 2) ? 'selected' : ''; ?>>2</option>
															<option value="3" <?php echo ($testimonial['rating'] == 3) ? 'selected' : ''; ?>>3</option>
															<option value="4" <?php echo ($testimonial['rating'] == 4) ? 'selected' : ''; ?>>4</option>
															<option value="5" <?php echo ($testimonial['rating'] == 5) ? 'selected' : ''; ?>>5</option>
														</select>
													</div>

													<!-- State Field -->
													<div class="form-group">
														<label for="state">State</label>
														<select class="form-control" id="state" name="state" required>
															<option value="0" <?php echo ($testimonial['state'] == 0) ? 'selected' : ''; ?>>Inactive</option>
															<option value="1" <?php echo ($testimonial['state'] == 1) ? 'selected' : ''; ?>>Active</option>
														</select>
													</div>

													<!-- Submit and Cancel Buttons -->
													<div class="form-group">
														<button type="submit" class="btn btn-success">Update</button>
														<button type="button" class="btn btn-danger" onclick="window.location.href='../../View/Testimonials.php';">Cancel</button>
													</div>
												
												</form>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						
				
						<?php include '../../../common/footer.php' ?>
							<!-- footer end -->
					</div>

				</div>
			</div>
		</div>
	</div>
	
</body>

 <!-- js link -->
 <?php include '../../../common/coomonJsLink.php';?>
 <!-- js link  end-->

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
</html>