<?php
// Include database connection
include 'config/db_connection.php';

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if all required fields are present
    if (isset($_POST['fname'], $_POST['program'], $_POST['qualifications'], $_POST['phone'], $_POST['gender'])) {
        // Retrieve form data
        $lecturer_name = $_POST['fname'];
        $program_id = $_POST['program'];
        $qualifications = $_POST['qualifications'];
        $phone = $_POST['phone'];
        $gender = $_POST['gender'];

        // Prepare and execute insert statement
        $stmt = $mysqli->prepare("INSERT INTO lecturers (lecturer_name, program_id, qualifications, phone, gender) VALUES (?, ?, ?, ?, ?)");
        if ($stmt) {
            $stmt->bind_param("sisss", $lecturer_name, $program_id, $qualifications, $phone, $gender);
            if ($stmt->execute()) {
                // Success: redirect to success page
                header("Location: success.php");
                exit();
            } else {
                // Error: redirect to error page
                header("Location: error.php");
                exit();
            }
        } else {
            // Error: redirect to error page
            header("Location: error.php");
            exit();
        }
    } else {
        // Error: redirect to error page if required fields are missing
        header("Location: error.php");
        exit();
    }
}

// Close connection
$mysqli->close();
?>
