<?php
// Include database connection
include 'config/db_connection.php';

// Retrieve data from the administrators table
$sql = "SELECT * FROM administrators";
$result = $mysqli->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Administrators</title>
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
    <h1>Administrators</h1>
    <hr>
    <table>
        <tr>
            <th>ID</th>
            <th>Administrator Name</th>
            <th>Role</th>
            <th>Gender</th>
            <th>Phone Number</th>
        </tr>
        <?php
        // Output data of each row
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['admin_id'] . "</td>";
            echo "<td>" . $row['admin_name'] . "</td>";
            echo "<td>" . $row['role'] . "</td>";
            echo "<td>" . $row['gender'] . "</td>";
            echo "<td>" . $row['phone'] . "</td>";
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
