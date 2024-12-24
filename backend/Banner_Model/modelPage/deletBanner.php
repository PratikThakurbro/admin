<?php
// Include database connection
include('../../../common/db_connection.php');

// Check if the 'id' parameter is passed via GET
if (isset($_GET['id'])) {
    // Sanitize and validate the ID
    $bannerId = intval($_GET['id']);  // Use intval to ensure it is an integer

    // Prepare the SQL query to delete the banner
    $sql = "DELETE FROM banners WHERE id = ?";

    if ($stmt = $conn->prepare($sql)) {
        // Bind the ID parameter to the query
        $stmt->bind_param("i", $bannerId);

        // Execute the query
        if ($stmt->execute()) {
            // Redirect with success message
            header("Location: ../../../View/Banner.php?message=Banner deleted successfully");
            exit();  // Ensure to call exit after header to stop further execution
        } else {
            // Redirect with error message
            header("Location: ../../../View/Banner.php?message=Error deleting banner");
            exit();  // Ensure to call exit after header to stop further execution
        }
    } else {
        // If query preparation fails, redirect with error message
        header("Location: ../../../View/Banner.php?message=Error preparing the statement");
        exit();  // Ensure to call exit after header to stop further execution
    }
} else {
    // If no ID is provided, show an error message
    header("Location: ../../../View/Banner.php?message=No ID provided");
    exit();  // Ensure to call exit after header to stop further execution
}

// Close the database connection
$conn->close();
?>
