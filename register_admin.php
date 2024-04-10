<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include database connection
    include 'config/db_connection.php';

    // Collect form data
    $fname = $_POST['fname'];
    $role = $_POST['role'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];

    // Perform SQL insertion
    $insert_query = "INSERT INTO administrators (administrator_name, role, phone, gender) 
                     VALUES ('$fname', '$role', '$phone', '$gender')";

    if ($mysqli->query($insert_query)) {
        echo "Administrator registered successfully.";
    } else {
        echo "Error: " . $mysqli->error;
    }

    // Close database connection
    $mysqli->close();
}
?>
