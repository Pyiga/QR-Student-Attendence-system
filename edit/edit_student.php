<?php
// Include database connection
include 'config/db_connection.php';

// Check if student ID is provided in the URL
if (isset($_GET['id'])) {
    $student_id = $_GET['id'];

    // Fetch student data from the database
    $query = "SELECT * FROM students WHERE student_id = $student_id";
    $result = $mysqli->query($query);

    if ($result->num_rows == 1) {
        // Student found, retrieve data
        $student = $result->fetch_assoc();
        $full_name = $student['full_name'];
        $reg_no = $student['reg_no'];
        $dob = $student['dob'];
        $gender = $student['gender'];
        $program_id = $student['program_id'];
        $intake = $student['intake'];
        $phone = $student['phone'];
    } else {
        // Student not found, redirect to view_students.php with error message
        header("Location: view_students.php?error=Student not found");
        exit();
    }
} else {
    // Student ID not provided, redirect to view_students.php with error message
    header("Location: view_students.php?error=Student ID not provided");
    exit();
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data and sanitize inputs
    $full_name = mysqli_real_escape_string($mysqli, $_POST['full_name']);
    $reg_no = mysqli_real_escape_string($mysqli, $_POST['reg_no']);
    $dob = mysqli_real_escape_string($mysqli, $_POST['dob']);
    $gender = mysqli_real_escape_string($mysqli, $_POST['gender']);
    $program_id = mysqli_real_escape_string($mysqli, $_POST['program_id']);
    $intake = mysqli_real_escape_string($mysqli, $_POST['intake']);
    $phone = mysqli_real_escape_string($mysqli, $_POST['phone']);

    // Update student data in the database
    $update_query = "UPDATE students SET full_name = '$full_name', reg_no = '$reg_no', dob = '$dob', gender = '$gender', program_id = '$program_id', intake = '$intake', phone = '$phone' WHERE student_id = $student_id";

    if ($mysqli->query($update_query) === TRUE) {
        // Redirect to view_students.php with success message
        header("Location: view_students.php?success=Student updated successfully");
        exit();
    } else {
        // Redirect to view_students.php with error message
        header("Location: view_students.php?error=Error updating student: " . $mysqli->error);
        exit();
    }
}

// Fetch existing programs from the database
$program_query = "SELECT * FROM programs";
$program_result = $mysqli->query($program_query);

// Fetch existing intakes from the database
$intake_query = "SELECT DISTINCT intake FROM students";
$intake_result = $mysqli->query($intake_query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Student</title>
    <link rel="stylesheet" href="css/form.css"> <!-- You may need to adjust the path to your CSS file -->
</head>
<body>
    <h1>Edit Student</h1>
    <hr>

    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . "?id=$student_id"); ?>">
        <label for="full_name">Full Name:</label>
        <input type="text" name="full_name" value="<?php echo $full_name; ?>" required>

        <label for="reg_no">Registration Number:</label>
        <input type="text" name="reg_no" value="<?php echo $reg_no; ?>" required>

        <label for="dob">Date of Birth:</label>
        <input type="date" name="dob" value="<?php echo $dob; ?>" required>

        <label for="gender">Gender:</label>
        <input type="radio" name="gender" value="Male" <?php if ($gender == 'Male') echo 'checked'; ?>> Male
        <input type="radio" name="gender" value="Female" <?php if ($gender == 'Female') echo 'checked'; ?>> Female

        <label for="program_id">Program:</label>
        <select name="program_id" required>
            <?php while ($row = $program_result->fetch_assoc()) { ?>
                <option value="<?php echo $row['program_id']; ?>" <?php if ($program_id == $row['program_id']) echo 'selected'; ?>><?php echo $row['program_name']; ?></option>
            <?php } ?>
        </select>

        <label for="intake">Intake:</label>
        <select name="intake" required>
            <?php while ($row = $intake_result->fetch_assoc()) { ?>
                <option value="<?php echo $row['intake']; ?>" <?php if ($intake == $row['intake']) echo 'selected'; ?>><?php echo $row['intake']; ?></option>
            <?php } ?>
        </select>

        <label for="phone">Phone Number:</label>
        <input type="text" name="phone" value="<?php echo $phone; ?>" required>

        <button type="submit">Update</button>
    </form>
</body>
</html>
