<?php
// Include database connection
include('../../../common/db_connection.php');

// Check if the form is submitted and ID is passed in the URL or via POST
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])) {
    // Get the POST data (title, description, state, id, and URL)
    $id = $_POST['id'];  // Getting ID from POST
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $state = $_POST['state'];
    $url = mysqli_real_escape_string($conn, $_POST['url']);  // Get URL from POST

    // Validate URL (ensure it is a valid URL)
    if (!filter_var($url, FILTER_VALIDATE_URL)) {
        echo "Invalid URL format.";
        exit();
    }

    // Handle image upload
    $existingImage = ''; // Default empty if no image is uploaded
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

        // Check if image size is too large (e.g., limit to 5MB)
        if ($_FILES['image']['size'] > 5 * 1024 * 1024) {  // 5MB limit
            echo "Image size is too large. Maximum allowed size is 5MB.";
            exit();
        }

        // Ensure the 'Image/banner' directory exists, create if not
        $directory = 'Image/banner';
        if (!is_dir($directory)) {
            mkdir($directory, 0777, true);  // Create directory if it doesn't exist
        }

        // Generate a unique image name
        $imageName = uniqid() . '.' . $imageExtension;

        // Define the path to save the image inside 'Image/banner' directory
        $imagePath = $directory . '/' . $imageName;

        // Move the uploaded image to the desired folder
        if (move_uploaded_file($imageTmpName, $imagePath)) {
            $existingImage = $imagePath;  // Save the image filename in the database
        } else {
            echo "Error: Unable to upload image. Please try again.<br>";
            exit();
        }
    } else {
        // If no new image is uploaded, use the existing image
        $result = mysqli_query($conn, "SELECT image FROM banners WHERE id = $id");
        $row = mysqli_fetch_assoc($result);
        $existingImage = $row['image'];  // Use the existing image
    }

    // Update banner query with prepared statement
    $stmt = $conn->prepare("UPDATE banners SET title = ?, image = ?, description = ?, url = ?, state = ? WHERE id = ?");

    if ($stmt === false) {
        die('MySQL prepare error: ' . $conn->error);
    }

    $stmt->bind_param("sssssi", $title, $existingImage, $description, $url, $state, $id);

    // Execute the query
    if ($stmt->execute()) {
        // Redirect to the page that lists all banners after successful update
        header("Location: ../../../View/Banner.php?message=Banner updated successfully");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close statement
    $stmt->close();
}

// Close the database connection
mysqli_close($conn);
?>
