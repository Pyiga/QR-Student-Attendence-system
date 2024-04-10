<?php include 'config/db_connection.php'; ?>

<section>
    <h1>Student Attendance</h1>
    <hr>

    <form method="post" action="process_attendance.php">
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Program</th>
                    <th>Course Unit</th>
                    <th>Attendance Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Fetch student attendance records
                $sql = "SELECT attendance.*, students.full_name AS student_name, programs.program_name, course_units.course_unit_name 
                        FROM attendance 
                        INNER JOIN students ON attendance.student_id = students.student_id 
                        INNER JOIN programs ON attendance.program_id = programs.program_id 
                        INNER JOIN course_units ON attendance.course_unit_id = course_units.course_unit_id";
                $result = $mysqli->query($sql);

                // Display attendance records with radio buttons for each student
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['student_name'] . "</td>";
                    echo "<td>" . $row['program_name'] . "</td>";
                    echo "<td>" . $row['course_unit_name'] . "</td>";
                    echo "<td>";
                    echo "<label><input type='radio' name='attendance[" . $row['id'] . "]' value='present'> Present</label>";
                    echo "<label><input type='radio' name='attendance[" . $row['id'] . "]' value='absent'> Absent</label>";
                    echo "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
        <button type="submit">Submit Attendance</button>
    </form>
</section>
