<?php
include 'config/db_connection.php';

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Loop through attendance data and insert into database
    foreach ($_POST['attendance'] as $id => $status) {
        // Perform SQL query to insert attendance data
        $sql = "INSERT INTO attendance (student_id, program_id, course_unit_id, date, time, status) 
                VALUES ('$id', '$program_id', '$course_unit_id', NOW(), NOW(), '$status')";
        $result = $mysqli->query($sql);
    }
    
   
    header("Location: attendance_success.php");
    exit();
}
?>
