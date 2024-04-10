<?php
include '../config/db_connection.php';

if (isset($_GET['id'])) {
    $student_id = mysqli_real_escape_string($mysqli, $_GET['id']);
    $delete_query = "DELETE FROM students WHERE student_id = $student_id";
    if ($mysqli->query($delete_query)) {
        header("Location: view_students.php?success=Student deleted successfully");
        exit();
    } else {
        header("Location: view_students.php?error=Error deleting student: " . $mysqli->error);
        exit();
    }
} else {
    header("Location: view_students.php?error=Student ID not provided");
    exit();
}
?>
