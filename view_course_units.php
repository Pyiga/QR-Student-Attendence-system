<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Course Units</title>
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
  
<body>
    <h1>Course Units</h1>
    <hr>
    <table>
        <tr>
            <th>ID</th>
            <th>Course Code</th>
            <th>Course Unit Name</th>
            <th>Description</th>
            <th>Program</th>
            <th>Department</th>
        </tr>
        <!-- Fetch and display data from the 'course_units' table here -->
        <?php
        // Include database connection
        include 'config/db_connection.php';

        // SQL query to fetch course units data
        $sql = "SELECT * FROM course_units";
        $result = $mysqli->query($sql);

        // Output data of each row
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['course_unit_id'] . "</td>";
            echo "<td>" . $row['course_code'] . "</td>";
            echo "<td>" . $row['course_unit_name'] . "</td>";
            echo "<td>" . $row['description'] . "</td>";
            echo "<td>" . $row['program_id'] . "</td>";
            echo "<td>" . $row['department_id'] . "</td>";
            echo "</tr>";
        }

        // Close database connection
        $mysqli->close();
        ?>
    </table>
</body>
</html>
