<?php
// Include database connection
include('../../../common/db_connection.php');

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $state = mysqli_real_escape_string($conn, $_POST['state']);
    $url = mysqli_real_escape_string($conn, $_POST['url']); // Get URL from form

    // Validate URL (ensure it is a valid URL)
    if (!filter_var($url, FILTER_VALIDATE_URL)) {
        echo "Invalid URL format.";
        exit();
    }

    // Handle image upload
    $image = ''; // Default empty string for image
    if ($_FILES['image']['error'] == 0) {
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

        // Define the path to save the image inside 'Image/banner' directory
        $imagePath = $directory . '/' . uniqid() . '.' . $imageExtension;  // Store with a unique name

        // Debugging: Check if the path is correct
        echo "Saving image to: " . $imagePath . "<br>";

        // Move the uploaded file to the desired folder
        if (move_uploaded_file($imageTmpName, $imagePath)) {
            // Use prepared statement to insert data into the database
            $stmt = $conn->prepare("INSERT INTO banners (title, image, description, url, state) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("sssss", $title, $imagePath, $description, $url, $state); // Bind parameters

            if ($stmt->execute()) {
                header('Location: ../../../View/Banner.php'); // Redirect after successful upload
                exit();
            } else {
                $error = "Error: " . $stmt->error;
            }

            $stmt->close();
        } else {
            $error = "Error uploading image. Please check file permissions.";
        }
    } else {
        $error = "Please upload an image or check the upload error. Error Code: " . $_FILES['image']['error'];
    }

    // If there is any error, print it
    if (isset($error)) {
        echo $error;
    }
}

// Close the database connection
mysqli_close($conn);
?>
