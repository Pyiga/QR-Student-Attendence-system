<?php
    // Include database connection
    include 'config/db_connection.php';

    // Get all the programs from the database
    $program_query = "SELECT * FROM `programs`";
    $all_programs = mysqli_query($mysqli, $program_query);

    // Check if the form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve form data
        $lecturer_name = $_POST['lecturer_name'];
        $program_id = $_POST['program'];
        $qualifications = $_POST['qualifications'];
        $phone = $_POST['phone'];
        $gender = $_POST['gender'];

        // Prepare insert statement
        $stmt = $mysqli->prepare("INSERT INTO lecturers (lecturer_name, program_id, qualifications, phone, gender) VALUES (?, ?, ?, ?, ?)");

        // Bind parameters and execute statement
        $stmt->bind_param("sisss", $lecturer_name, $program_id, $qualifications, $phone, $gender);
        if ($stmt->execute()) {
            // Success: redirect to success page or show success message
            echo '<script>alert("Lecturer added successfully")</script>';
        } else {
            // Error: show error message
            echo '<script>alert("Error adding lecturer. Please try again.")</script>';
        }

        // Close statement
        $stmt->close();
    }

    // Close connection
    $mysqli->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Add Lecturer</title>
    <style>
        /* Style the select element to look like an input box */
        select {
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            padding: 0.5rem;
            border: 1px solid #ccc;
            border-radius: 5px;
            width: 100%;
        }
    </style>
</head>
<body>
    <form method="POST">
        <label>Lecturer Name:</label>
        <input type="text" name="lecturer_name" required><br>
        
        <label>Select Program:</label>
        <select name="program" required>
            <option value="">Select Program</option>
            <?php 
                // Fetch programs from the database and display as options
                while ($program = $all_programs->fetch_assoc()): 
            ?>
                <option value="<?php echo $program["program_id"]; ?>">
                    <?php echo $program["program_name"]; ?>
                </option>
            <?php endwhile; ?>
        </select><br>
        
        <label>Qualifications:</label>
        <input type="text" name="qualifications" required><br>
        
        <label>Phone Number:</label>
        <input type="tel" name="phone" required><br>
        
        <label>Gender:</label>
        <input type="radio" id="male" name="gender" value="male" required>
        <label for="male">Male</label>
        <input type="radio" id="female" name="gender" value="female" required>
        <label for="female">Female</label><br>
        
        <input type="submit" value="Submit">
    </form>
</body>
</html>
