<?php
// Include database connection
include 'config/db_connection.php';

// Retrieve data from the lecturers table
$sql = "SELECT * FROM lecturers";
$result = $mysqli->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lecturers</title>
    <link rel="stylesheet" href="css/views.css">
    <style>
        body{
    color: #04AA6D;
    padding: 10px;
}
hr{
    color: rgb(255, 136, 0);
    margin-bottom: 20px;
    
}
h1{
    color:#04AA6D ;
    padding: 10px;
    margin-bottom: 10px;
}
    </style>

</head>
<body>
    <h1>Lecturers</h1>
    <hr>
    <table>
        <tr>
            <th>ID</th>
            <th>Lecturer Name</th>
            <th>Program</th>
            <th>Qualifications</th>
            <th>Phone Number</th>
            <th>Gender</th>
        </tr>
        <?php
        // Output data of each row
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['lecturer_id'] . "</td>";
            echo "<td>" . $row['lecturer_name'] . "</td>";
            echo "<td>" . $row['program'] . "</td>"; // Assuming you have a program field in lecturers table
            echo "<td>" . $row['qualifications'] . "</td>";
            echo "<td>" . $row['phone'] . "</td>";
            echo "<td>" . $row['gender'] . "</td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>

<?php
// Close database connection
$mysqli->close();
?>
