<?php
require('config/db_connection.php');

$programFilter = $intakeFilter = "";

if (isset($_GET['program'])) {
    $programFilter = $_GET['program'];
}

if (isset($_GET['intake'])) {
    $intakeFilter = $_GET['intake'];
}

$sql = "SELECT s.*, p.program_name FROM students s LEFT JOIN programs p ON s.program_id = p.program_id WHERE 1";

if (!empty($programFilter)) {
    $sql .= " AND s.program_id = '$programFilter'";
}

if (!empty($intakeFilter)) {
    $sql .= " AND s.intake = '$intakeFilter'";
}

$result = $mysqli->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Students</title>
    <link rel="stylesheet" href="css/views.css">
</head>
<body>
    <h1>Students</h1>
    <hr>

    <form method="GET" action="">
        <label for="program">Filter by Program:</label>
        <select name="program" id="program">
            <option value="">All</option>
            <?php
            $programQuery = "SELECT DISTINCT p.program_id, p.program_name FROM programs p JOIN students s ON p.program_id = s.program_id";
            $programResult = $mysqli->query($programQuery);
            while ($programRow = $programResult->fetch_assoc()) {
                echo "<option value='" . $programRow['program_id'] . "'";
                if ($programFilter == $programRow['program_id']) {
                    echo " selected";
                }
                echo ">" . $programRow['program_name'] . "</option>";
            }
            ?>
        </select>

        <label for="intake">Filter by Intake:</label>
        <select name="intake" id="intake">
            <option value="">All</option>
            <?php
            $intakeQuery = "SELECT DISTINCT intake FROM students";
            $intakeResult = $mysqli->query($intakeQuery);
            while ($intakeRow = $intakeResult->fetch_assoc()) {
                echo "<option value='" . $intakeRow['intake'] . "'";
                if ($intakeFilter == $intakeRow['intake']) {
                    echo " selected";
                }
                echo ">" . $intakeRow['intake'] . "</option>";
            }
            ?>
        </select>

        <button type="submit">Filter</button>
    </form>

    <table>
        <tr>
            <th>ID</th>
            <th>Full Name</th>
            <th>Registration Number</th>
            <th>Date of Birth</th>
            <th>Gender</th>
            <th>Program</th>
            <th>Intake</th>
            <th>Phone Number</th>
            <th>Action</th>
        </tr>
        <?php
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['student_id'] . "</td>";
            echo "<td>" . $row['full_name'] . "</td>";
            echo "<td>" . $row['reg_no'] . "</td>";
            echo "<td>" . $row['dob'] . "</td>";
            echo "<td>" . $row['gender'] . "</td>";
            echo "<td>" . $row['program_name'] . "</td>"; // Display program_name instead of program_id
            echo "<td>" . $row['intake'] . "</td>";
            echo "<td>" . $row['phone'] . "</td>";
            echo "<td><a href='../edit/edit_student.php?id=" . $row['student_id'] . "'>Edit</a> | <a href='../delete/d1.php?id=" . $row['student_id'] . "' onclick='return confirm(\"Are you sure you want to delete this student?\")'>Delete</a></td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>

<?php
$mysqli->close();
?>
