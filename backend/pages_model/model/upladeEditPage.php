<?php
// Include database connection
include('../../../common/db_connection.php'); // Adjust path if necessary

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ensure connection is established
    if (!$conn) {
        die("Database connection failed: " . mysqli_connect_error());
    }

    // Get the form data
    $id = $_POST['id'];  // Get the ID from the hidden field
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $details = mysqli_real_escape_string($conn, $_POST['details']);
    $existingImage = $_POST['existing_image']; // Store the existing image path in case the user doesn't upload a new one

    // Handle image upload (if a new image is uploaded)
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $imageTmpName = $_FILES['image']['tmp_name'];
        $imageName = $_FILES['image']['name'];
        $imageExtension = pathinfo($imageName, PATHINFO_EXTENSION);
        
        // Validate the image extension (optional)
        $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
        if (!in_array(strtolower($imageExtension), $allowedExtensions)) {
            echo "Invalid image type! Only JPG, PNG, and GIF are allowed.";
            exit();
        }

        // Define the upload directory   
        $uploadDir = 'Image/pages';

        // Generate a unique name for the image to avoid conflicts
        $imageName = uniqid() . '.' . $imageExtension;
        $imagePath = $uploadDir . $imageName;

        // Move the uploaded image to the folder
        if (move_uploaded_file($imageTmpName, $imagePath)) {
            $existingImage = $imagePath; // Update the image path with the new one
        } else {
            echo "Failed to upload the image. Please try again.";
            exit();
        }
    }

    // Update the page in the database with the new title, details, and image path
    $sql = "UPDATE pages SET title = '$title', details = '$details', image = '$existingImage' WHERE id = '$id'";

    if (mysqli_query($conn, $sql)) {
        // Redirect to the page list with a success message
        header("Location: ../../../View/Pages.php");
        exit();
    } else {
        // Show error message if query fails
        echo "Error updating page: " . mysqli_error($conn);
    }
}

// Close the database connection
mysqli_close($conn);
?>
