<?php
require('config/db_connection.php');

if(isset($_REQUEST['id']) && !empty($_REQUEST['id'])) {
    $student_id = $_REQUEST['id'];

    // Prepare the delete query using a prepared statement
    $query = "DELETE FROM students WHERE student_id = ?";
    $statement = $mysqli->prepare($query);

    // Bind parameters
    $statement->bind_param("i", $student_id);

    // Execute the query
    $statement->execute();

    // Check if the query was successful
    if ($statement->affected_rows > 0) {
        echo "Student with ID $student_id has been deleted successfully!";
    } else {
        echo "Error deleting student with ID $student_id: " . $mysqli->error;
    }

    // Close the statement
    $statement->close();
} else {
    echo "No student ID provided.";
}

// Redirect to view_students.php regardless of the result
header("Location: view_students.php"); 
exit();
?>

