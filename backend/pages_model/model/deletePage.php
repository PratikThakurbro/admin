<?php
// Include database connection
include('../../../common/db_connection.php');// Adjust path if necessary

// Check if ID is provided in the URL (GET method)
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Ensure connection is established
    if (!$conn) {
        die("Database connection failed: " . mysqli_connect_error());
    }

    // Delete the page from the database
    $sql = "DELETE FROM pages WHERE id = '$id'";

    if (mysqli_query($conn, $sql)) {
        // Redirect to the pages list page after deletion
        header("Location: ../../../View/Pages.php?success=Page deleted successfully");
        exit();
    } else {
        // Show error message if query fails
        echo "Error deleting page: " . mysqli_error($conn);
    }
} else {
    // Redirect if ID is not provided
    header("Location: ../View/Pages.php?error=Page ID is required");
    exit();
}

// Close the database connection
mysqli_close($conn);
?>
