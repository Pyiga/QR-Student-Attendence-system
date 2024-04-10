<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include database connection
    include 'config/db_connection.php';

    // Retrieve form data and sanitize inputs
    $fname = mysqli_real_escape_string($mysqli, $_POST['fname']);
    $reg_no = mysqli_real_escape_string($mysqli, $_POST['reg_no']);
    $dob = mysqli_real_escape_string($mysqli, $_POST['dob']);
    $gender = mysqli_real_escape_string($mysqli, $_POST['gender']);
    $program_id = mysqli_real_escape_string($mysqli, $_POST['pn']);
    $intake = mysqli_real_escape_string($mysqli, $_POST['intake']);
    $phone = mysqli_real_escape_string($mysqli, $_POST['phone']);

    // Prepare SQL statement
    $sql = "INSERT INTO students (full_name, reg_no, dob, gender, program_id, intake, phone) 
            VALUES ('$fname', '$reg_no', '$dob', '$gender', '$program_id', '$intake', '$phone')";

    // Execute SQL statement
    if ($mysqli->query($sql) === true) {
        // Success message
        echo "Student registered successfully";
    } else {
        // Error message
        echo "Error: " . $mysqli->error;
    }

    // Close database connection
    $mysqli->close();
}
?>
