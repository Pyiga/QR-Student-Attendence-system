<?php
// Include database connection
include 'config/db_connection.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $course_code = $_POST["course_code"];
    $course_unit_name = $_POST["course_unit_name"];
    $description = $_POST["description"];
    $program_id = $_POST["program_id"];
    $department_id = $_POST["department_id"];

    // Prepare SQL statement to insert data into course_units table
    $insert_query = "INSERT INTO course_units (course_code, course_unit_name, description, program_id, department_id) 
                     VALUES ('$course_code', '$course_unit_name', '$description', '$program_id', '$department_id')";

    // Execute SQL statement
    if ($mysqli->query($insert_query) === TRUE) {
        echo "New course unit added successfully!";
    } else {
        echo "Error: " . $mysqli->error;
    }

    // Close database connection
    $mysqli->close();
}
?>