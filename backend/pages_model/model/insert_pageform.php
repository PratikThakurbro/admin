<?php
// Include database connection
include('../../../common/db_connection.php');

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if all required fields are submitted
    if (isset($_POST['title'], $_POST['details'], $_FILES['image']) && $_FILES['image']['error'] == 0) {
        $title = mysqli_real_escape_string($conn, $_POST['title']);
        $details = mysqli_real_escape_string($conn, $_POST['details']);

        // Handle image upload
        $image = ''; // Default empty string for image
        $imageTmpName = $_FILES['image']['tmp_name'];
        $imageName = $_FILES['image']['name'];
        $imageExtension = pathinfo($imageName, PATHINFO_EXTENSION);  // Get file extension

        // Validate image format (only allow specific image formats)
        $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
        if (!in_array(strtolower($imageExtension), $allowedExtensions)) {
            echo "Invalid image format. Only JPG, JPEG, PNG, and GIF are allowed.";
            exit();
        }  

        // Ensure the 'Image/pages' directory exists, create if not
        $directory = 'Image/pages';
        if (!is_dir($directory)) { 
            mkdir($directory, 0777, true);  // Create directory if it doesn't exist
        }

        // Define the path to save the image inside 'Image/pages' directory
        $imagePath = $directory . '/' . uniqid() . '.' . $imageExtension;  // Store with a unique name

        // Move the uploaded file to the target directory
        if (move_uploaded_file($imageTmpName, $imagePath)) {
            // Now, store the image path in the database
            $image = $imagePath; // Store the path to the image in the database
            echo "Image uploaded successfully!<br>";
        } else {
            echo "Error: Unable to upload image. Please try again.<br>";
            exit();
        }

        // Prepare the SQL query to insert data into the database
        $sql = "INSERT INTO pages (title, image, details) VALUES ('$title', '$image', '$details')";

        // Execute the query
        if (mysqli_query($conn, $sql)) {
            // Redirect back to the Pages list with a success message
            header("Location: ../../../View/Pages.php?message=Page added successfully");
            exit();
        } else {
            // If the query fails, show an error
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        echo "Title, Details, or Image field is missing, or there was an error with the image upload.";
    }
} else {
    echo "Invalid request method.";
}

// Close the database connection
mysqli_close($conn);
?>
