<?php
// Include database connection file (adjust path as necessary)
include('../../../common/db_connection.php'); // Adjust the path as needed

// Check if ID is passed via GET
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];

    // SQL query to delete the record
    $sql = "DELETE FROM testimonials WHERE id = ?";

    // Prepare and bind
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("i", $id);

        // Execute the query
        if ($stmt->execute()) {
            // Redirect to testimonials page after deletion
            header("Location: ../../../View/Testimonials.php");
            exit(); // Make sure no further code is executed
        } else {
            echo "Error executing query: " . $stmt->error;
        }
    } else {
        echo "Error preparing query: " . $conn->error;
    }
    $stmt->close();
} else {
    echo "No ID provided!";
}

// Close the database connection if it's set
if (isset($conn)) {
    $conn->close();
}
?>
