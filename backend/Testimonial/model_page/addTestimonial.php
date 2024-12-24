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

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Check if all required fields are submitted
    if (isset($_POST['name'], $_POST['designation'], $_POST['message'], $_POST['rating'], $_POST['state'], $_FILES['image'])) {
        // Sanitize form data
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $designation = mysqli_real_escape_string($conn, $_POST['designation']);
        $message = mysqli_real_escape_string($conn, $_POST['message']);
        $rating = mysqli_real_escape_string($conn, $_POST['rating']);
        $state = mysqli_real_escape_string($conn, $_POST['state']);

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

            // Ensure the 'Image/testmonials' directory exists, create if not
            $directory = 'Image/testmonials';
            if (!is_dir($directory)) {
                mkdir($directory, 0777, true);  // Create directory if it doesn't exist
            }

            // Define the path to save the image inside 'Image/testmonials' directory
            $imagePath = $directory . '/' . uniqid() . '.' . $imageExtension;  // Store with a unique name

            // Debugging: Check if the path is correct
            echo "Saving image to: " . $imagePath . "<br>";

            // Move the uploaded file to the target directory
            if (move_uploaded_file($imageTmpName, $imagePath)) {
                $image = $imagePath; // Store the path to the image in the database
                echo "Image uploaded successfully!<br>";
            } else {
                echo "Error: Unable to upload image. Please try again.<br>";
                exit();
            }
        } else {
            echo "Error: No image uploaded or there was an error during the upload.<br>";
            exit();
        }

        // Prepare the SQL query to insert testimonial data into the database
        $sql = "INSERT INTO testimonials (name, image, designation, message, rating, state) 
                VALUES ('$name', '$image', '$designation', '$message', '$rating', '$state')";

        // Execute the SQL query
        if (mysqli_query($conn, $sql)) {
            // Redirect to the testimonials list page with a success message
            header('Location: ../../../View/Testimonials.php?message=Testimonial added successfully');
            exit();
        } else {
            // If the query fails, show an error message
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        echo "All required fields (Name, Designation, Message, Rating, State, Image) must be filled.";
    }
} else {
    echo "Invalid request method.";
}

// Close the database connection
mysqli_close($conn);
?>
