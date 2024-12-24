<?php
// Include database connection file
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

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $designation = mysqli_real_escape_string($conn, $_POST['designation']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);
    $rating = mysqli_real_escape_string($conn, $_POST['rating']);
    $state = mysqli_real_escape_string($conn, $_POST['state']);

    // Handle the uploaded image (if any)
    $image = ''; // Default to empty if no image is uploaded
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $imageTmpName = $_FILES['image']['tmp_name'];
        $imageName = $_FILES['image']['name'];
        $imageExtension = pathinfo($imageName, PATHINFO_EXTENSION);  // Get file extension

        // Validate image format (optional: allow only specific image formats)
        $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
        if (!in_array(strtolower($imageExtension), $allowedExtensions)) {
            echo "Invalid image format. Only JPG, JPEG, PNG, and GIF are allowed.";
            exit();
        }

        // Define the directory to store the images
        $directory = 'Image/testimonials';
        if (!is_dir($directory)) {
            mkdir($directory, 0777, true);  // Create directory if it doesn't exist
        }

        // Generate a unique image name
        $imageName = uniqid() . '.' . $imageExtension;

        // Define the path to save the image
        $imagePath = $directory . '/' . $imageName;

        // Move the uploaded file to the target directory
        if (move_uploaded_file($imageTmpName, $imagePath)) {
            echo "Image uploaded successfully!<br>";
            $image = $imagePath;  // Save the image filename in the database
        } else {
            echo "Error: Unable to upload image. Please try again.<br>";
            exit();
        }
    } else {
        // If no new image is uploaded, use the existing one from the database
        $result = mysqli_query($conn, "SELECT image FROM testimonials WHERE id = $id");
        if ($row = mysqli_fetch_assoc($result)) {
            $image = $row['image'];  // Use the existing image from the database
        } else {
            echo "Error: No testimonial found with the given ID.<br>";
            exit();
        }
    }

    // Update testimonial query with prepared statement
    $stmt = $conn->prepare("UPDATE testimonials SET name = ?, image = ?, designation = ?, message = ?, rating = ?, state = ? WHERE id = ?");
    $stmt->bind_param("ssssssi", $name, $image, $designation, $message, $rating, $state, $id);

    if ($stmt->execute()) {
        // Redirect to testimonials page after successful update
        header("Location: ../../../View/Testimonials.php?message=Testimonial updated successfully");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

// Close the database connection
mysqli_close($conn);
?>
