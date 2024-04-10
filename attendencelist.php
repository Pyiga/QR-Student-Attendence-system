<?php include 'config/db_connection.php'; ?>

<section>
    <h1>Student Attendance</h1>
    <hr>

    <!-- Filter Form -->
    <form method="post">
        <label for="intake">Select Intake:</label>
        <select name="intake" id="intake">
            <option value="">All Intakes</option>
            <?php
            // Fetch distinct intakes from the 'students' table
            $intake_query = "SELECT DISTINCT intake FROM students";
            $intake_result = $mysqli->query($intake_query);
            while ($row = $intake_result->fetch_assoc()) {
                $selected = ($_POST['intake'] == $row['intake']) ? 'selected' : '';
                echo "<option value='" . $row['intake'] . "' " . $selected . ">" . $row['intake'] . "</option>";
            }
            ?>
        </select>

        <label for="program">Select Program:</label>
        <select name="program" id="program">
            <option value="">All Programs</option>
            <?php
            // Fetch programs from the 'programs' table
            $program_query = "SELECT * FROM programs";
            $program_result = $mysqli->query($program_query);
            while ($row = $program_result->fetch_assoc()) {
                $selected = ($_POST['program'] == $row['program_id']) ? 'selected' : '';
                echo "<option value='" . $row['program_id'] . "' " . $selected . ">" . $row['program_name'] . "</option>";
            }
            ?>
        </select>

        <label for="course_unit">Select Course Unit:</label>
        <select name="course_unit" id="course_unit">
            <option value="">All Course Units</option>
            <?php
            // Fetch course units from the 'course_units' table
            $course_unit_query = "SELECT * FROM course_units";
            $course_unit_result = $mysqli->query($course_unit_query);
            while ($row = $course_unit_result->fetch_assoc()) {
                $selected = ($_POST['course_unit'] == $row['course_unit_id']) ? 'selected' : '';
                echo "<option value='" . $row['course_unit_id'] . "' " . $selected . ">" . $row['course_unit_name'] . "</option>";
            }
            ?>
        </select>

        <button type="submit" name="filter">Filter</button>
    </form>

    <!-- Display List of Students -->
    <?php
    // Fetch all students by default
    $students_query = "SELECT * FROM students";
    
    // Apply filter if form is submitted
    if (isset($_POST['filter'])) {
        $intake = $_POST['intake'];
        $program = $_POST['program'];
        $course_unit = $_POST['course_unit'];

        $students_query .= " WHERE 1"; // Start with WHERE clause
        
        // Add conditions for intake, program, and course unit
        if (!empty($intake)) {
            $students_query .= " AND intake = '$intake'";
        }
        if (!empty($program)) {
            $students_query .= " AND program_id = '$program'";
        }
        if (!empty($course_unit)) {
            $students_query .= " AND course_unit_id = '$course_unit'";
        }
    }

    $students_result = $mysqli->query($students_query);
    ?>

    <form method="post" action="process_attendance.php">
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Attendance Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Display all students or filtered students
                while ($student = $students_result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $student['full_name'] . "</td>";
                    echo "<td>";
                    echo "<label><input type='radio' name='attendance[" . $student['student_id'] . "]' value='present'> Present</label>";
                    echo "<label><input type='radio' name='attendance[" . $student['student_id'] . "]' value='absent'> Absent</label>";
                    echo "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
        <button type="submit">Submit Attendance</button>
    </form>
</section>
<?php include 'config/db_connection.php'; ?>

<section>
    <h1>Student Attendance</h1>
    <hr>

    <!-- Filter Form -->
    <form method="post">
        <label for="intake">Select Intake:</label>
        <select name="intake" id="intake">
            <option value="">All Intakes</option>
            <?php
            // Fetch distinct intakes from the 'students' table
            $intake_query = "SELECT DISTINCT intake FROM students";
            $intake_result = $mysqli->query($intake_query);
            while ($row = $intake_result->fetch_assoc()) {
                $selected = ($_POST['intake'] == $row['intake']) ? 'selected' : '';
                echo "<option value='" . $row['intake'] . "' " . $selected . ">" . $row['intake'] . "</option>";
            }
            ?>
        </select>

        <label for="program">Select Program:</label>
        <select name="program" id="program">
            <option value="">All Programs</option>
            <?php
            // Fetch programs from the 'programs' table
            $program_query = "SELECT * FROM programs";
            $program_result = $mysqli->query($program_query);
            while ($row = $program_result->fetch_assoc()) {
                $selected = ($_POST['program'] == $row['program_id']) ? 'selected' : '';
                echo "<option value='" . $row['program_id'] . "' " . $selected . ">" . $row['program_name'] . "</option>";
            }
            ?>
        </select>

        <label for="course_unit">Select Course Unit:</label>
        <select name="course_unit" id="course_unit">
            <option value="">All Course Units</option>
            <?php
            // Fetch course units from the 'course_units' table
            $course_unit_query = "SELECT * FROM course_units";
            $course_unit_result = $mysqli->query($course_unit_query);
            while ($row = $course_unit_result->fetch_assoc()) {
                $selected = ($_POST['course_unit'] == $row['course_unit_id']) ? 'selected' : '';
                echo "<option value='" . $row['course_unit_id'] . "' " . $selected . ">" . $row['course_unit_name'] . "</option>";
            }
            ?>
        </select>

        <button type="submit" name="filter">Filter</button>
    </form>

    <!-- Display List of Students -->
    <?php
    // Fetch all students by default
    $students_query = "SELECT * FROM students";
    
    // Apply filter if form is submitted
    if (isset($_POST['filter'])) {
        $intake = $_POST['intake'];
        $program = $_POST['program'];
        $course_unit = $_POST['course_unit'];

        $students_query .= " WHERE 1"; // Start with WHERE clause
        
        // Add conditions for intake, program, and course unit
        if (!empty($intake)) {
            $students_query .= " AND intake = '$intake'";
        }
        if (!empty($program)) {
            $students_query .= " AND program_id = '$program'";
        }
        if (!empty($course_unit)) {
            $students_query .= " AND course_unit_id = '$course_unit'";
        }
    }

    $students_result = $mysqli->query($students_query);
    ?>

    <form method="post" action="process_attendance.php">
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Attendance Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Display all students or filtered students
                while ($student = $students_result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $student['full_name'] . "</td>";
                    echo "<td>";
                    echo "<label><input type='radio' name='attendance[" . $student['student_id'] . "]' value='present'> Present</label>";
                    echo "<label><input type='radio' name='attendance[" . $student['student_id'] . "]' value='absent'> Absent</label>";
                    echo "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
        <button type="submit">Submit Attendance</button>
    </form>
</section>
