<?php
$servername = "127.0.0.1:4306";
$username = "root";  // Your database username
$password = "";      // Your database password
$dbname = "dashboard_master"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to count the number of testimonials
$sql_testimonials = "SELECT COUNT(*) as total_count FROM testimonials";
$result_testimonials = mysqli_query($conn, $sql_testimonials);

// Check if query is successful
if (!$result_testimonials) {
    die("Query failed for testimonials: " . mysqli_error($conn));
}

// Fetch the result
$row_testimonials = mysqli_fetch_assoc($result_testimonials);
$total_count_testimonials = $row_testimonials['total_count'];

// Query to count the number of pages
$sql_pages = "SELECT COUNT(*) as total_count FROM pages";  // Assuming you have a 'pages' table
$result_pages = mysqli_query($conn, $sql_pages);

// Check if query is successful
if (!$result_pages) {
    die("Query failed for pages: " . mysqli_error($conn));
}

// Fetch the result
$row_pages = mysqli_fetch_assoc($result_pages);
$total_count_pages = $row_pages['total_count'];

// Query to count the number of banners
$sql_banners = "SELECT COUNT(*) as total_count FROM banners";  // Assuming you have a 'banners' table
$result_banners = mysqli_query($conn, $sql_banners);

// Check if query is successful
if (!$result_banners) {
    die("Query failed for banners: " . mysqli_error($conn));
}

// Fetch the result
$row_banners = mysqli_fetch_assoc($result_banners);
$total_count_banners = $row_banners['total_count'];

// Close the database connection
mysqli_close($conn);
?>


