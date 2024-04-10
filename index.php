<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);


// Include database connection
include 'config/db_connection.php';
$programs = [];
$departments = [];
$program_query = "SELECT * FROM programs";
$program_result = $mysqli->query($program_query);

// Check if query executed successfully
if ($program_result === false) {
    echo "Error fetching programs: " . $mysqli->error;
} else {
    if ($program_result->num_rows > 0) {
        $programs = $program_result->fetch_all(MYSQLI_ASSOC);
    } else {
        echo "";
    }
}
$department_query = "SELECT * FROM departments";
$department_result = $mysqli->query($department_query);
if ($department_result === false) {
    echo "Error fetching departments: " . $mysqli->error;
} else {
    if ($department_result->num_rows > 0) {
        $departments = $department_result->fetch_all(MYSQLI_ASSOC);
    } else {
        echo "";
    }
}

$mysqli->close();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Luyanzi Students</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="responsive.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="pop.css">
    <link rel="stylesheet" href="pop2.css">
    <link rel="stylesheet" href="css/views.css">
</head>

<body>

    <!-- Header part -->
    <header>
        <div class="log">
            <div class="logo">
                <img src="logo/logo.png" style="width: 100px;">
            </div>
            <div class="menu-icon">
                <i class="material-icons" id="menu-icon" alt="menu-icon">menu</i>
            </div>
        </div>

        <div class="text">
            <div class="heading-txt">Luyanzi Institute</div>
        </div>

        <div class="message">
            <div class="nofication">
                <i class="material-icons" style="color: #04AA6D;">notifications</i>
            </div>
            <div class="dp">
                <img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210180014/profile-removebg-preview.png"
                    class="dpicn" alt="dp">
            </div>
        </div>
    </header>

    <div class="main-container">
        <div class="navcontainer">
            <nav class="nav">
                <div class="nav-upper-options">
                    <div class="nav-option option1">
                        <h3> Dashboard</h3>
                    </div>

                    <div class="option2 nav-option">
                        <div class="log">
                            <i class="material-icons">groups</i>&nbsp;&nbsp;&nbsp;
                            <h3> Students</h3>
                        </div>
                        <div class="dropdown-content">
                            <a href="#" onclick="openForm('student-popup')">Register Students</a>
                            <a href="#" onclick="loadView('view_students.php')">View Students</a>
                        </div>
                    </div>

                    <div class="option2 nav-option">
                        <div class="log">
                            <i class="material-icons">person</i>&nbsp;&nbsp;&nbsp;
                            <h3> Staff Members</h3>
                        </div>
                        <div class="dropdown-content">
                            <a href="#" onclick="openForm('admin-popup')">Register Administrators</a>
                            <a href="#" onclick="loadView('view_administrators.php')"> View_administrators</a>
                            <a href="#" onclick="openForm('lecturer-popup')"> Register Lecturers</a>
                            <a href="#" onclick="loadView('view_lecturers.php')">View Staff Members</a>

                        </div>
                    </div>

                    <div class="option2 nav-option">
                        <div class="log">
                            <i class="material-icons">terminal</i>&nbsp;&nbsp;&nbsp;
                            <h3> Programs</h3>
                        </div>
                        <div class="dropdown-content">
                            <a href="#" onclick="openForm('program-popup')">Add Programs</a>
                            <a href="#" onclick="loadView('view_programs.php')">View Programs</a>
                        </div>
                    </div>

                    <div class="option2 nav-option">
                        <div class="log">
                            <i class="material-icons">category</i>&nbsp;&nbsp;&nbsp;
                            <h3> Course Units</h3>
                        </div>
                        <div class="dropdown-content">
                            <a href="#" onclick="openForm('course-unit-popup')">Course Unit</a>
                            <a href="#" onclick="loadView('view_course_units.php')">View Course Units</a>
                        </div>
                    </div>

                    <div class="option2 nav-option">
                        <div class="log">
                            <i class="material-icons">dataset</i>&nbsp;&nbsp;&nbsp;
                            <h3> Department</h3>
                        </div>
                        <div class="dropdown-content">
                            <a href="#" onclick="openForm('department-popup')">Add Departments</a>
                            <a href="#" onclick="loadView('view_departments.php')">View Departments</a>
                        </div>
                    </div>

                    <div class="option2 nav-option">
                        <hr style="margin-left: -14px; color:rgba(255, 166, 0, 0.445);">
                        <h3> Attendence Reports</h3>
                        <div class="dropdown-content">
                            <a href="#" onclick="loadView('view_student_attendance.php')">View Attendances</a>
                        </div>
                    </div>

                    <div class="nav-option option6">
                        <i class="material-icons">settings</i>
                        <h3> Settings</h3>

                    </div>

                    <div class="nav-option logout">
                        <i class="material-icons">logout</i>
                        <h3>Logout</h3>
                    </div>

                </div>
            </nav>
        </div>
        <div class="main">
            <div class="searchbar2">
                <input type="text" name="" id="" placeholder="Search">
                <div class="searchbtn">
                </div>
            </div>

            <!-- Header boxes -->
            <div class="box-container">
                <div class="box box1">
                    <div class="text">
                        <h2 class="topic-heading">200</h2>
                        <div class="log">
                            <i class="material-icons">groups</i>&nbsp;&nbsp;
                            <h2 class="topic">Total Students</h2>
                        </div>
                    </div>
                </div>

                <div class="box box2">
                    <div class="text">
                        <h2 class="topic-heading">150</h2>
                        <div class="log">
                            <i class="material-icons">person</i>&nbsp;&nbsp;
                            <h2 class="topic">Staff Members</h2>
                        </div>
                    </div>
                </div>

                <div class="box box3">
                    <div class="text">
                        <h2 class="topic-heading">320</h2>
                        <div class="log">
                            <i class="material-icons">terminal</i>&nbsp;&nbsp;
                            <h2 class="topic">Programs</h2>
                        </div>
                    </div>
                </div>

                <div class="box box4">
                    <div class="text">
                        <h2 class="topic-heading">70</h2>
                        <div class="log">
                            <i class="material-icons">dataset</i>&nbsp;&nbsp;
                            <h2 class="topic">Departments</h2>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Loaded views will appear here -->
            <div id="student-attendance-report" class="report-container">
                <div id="viewContainer" class="section">
                    <!-- Loaded views will appear here -->
                </div>

            </div>
        </div>
    </div>

    <section id="lecturer-popup" class="form-popup">
        <span class="close" onclick="closeForm('lecturer-popup')">&times;</span>
        <form action="/submit" class="form-container">
            <h2>Register Lecturer</h2>
            <label for="fname"><b>Lecturer Name</b></label>
            <input type="text" placeholder="Enter Full Name" name="fname" required>
            <label for="program"><b>Program</b></label>
            <input type="text" placeholder="Enter Program" name="program" required>
            <label for="qualifications"><b>Qualifications</b></label>
            <input type="text" placeholder="Enter Qualifications" name="qualifications" required>
            <label for="phone"><b>Phone Number</b></label>
            <input type="tel" placeholder="Enter Phone Number" name="phone" required><br>
            <label><b>Gender</b></label><br>
            <input type="radio" id="male" name="gender" value="male">
            <label for="male">Male</label>&nbsp;&nbsp;&nbsp;
            <input type="radio" id="female" name="gender" value="female">
            <label for="female">Female</label><br>
            <button type="submit" class="btn">Register</button>
        </form>
    </section>

    <section id="student-popup" class="forms-popup">
        <span class="close" onclick="closeForm('student-popup')">&times;</span>
        <form action="register_student.php" method="post" class="form-container">
            <h2>Register Student</h2>

            <label for="fname"><b>Full Name:</b></label>
            <input type="text" placeholder="Enter Full Name" name="fname" required><br>

            <label for="reg_no"><b>Reg. No:</b></label>
            <input type="text" placeholder="Reg. No" name="reg_no" required><br>

            <label for="dob"><b>Date of Birth:</b></label>
            <input type="date" name="dob" required><br>

            <label for="gender"><b>Gender:</b></label><br>
            <input type="radio" id="male" name="gender" value="male">
            <label for="male">Male</label>&nbsp;&nbsp;&nbsp;
            <input type="radio" id="female" name="gender" value="female">
            <label for="female">Female</label><br>

            <label for="pn"><b>Program:</b></label><br>
            <select name="pn" id="pn" required onchange="updateProgramName()">
                <option value="">Select Program</option>
                <!-- Populate with options from database -->
                <?php
                // Include database connection
                include 'config/db_connection.php';

                // Fetch programs from the database
                $program_query = "SELECT * FROM programs";
                $program_result = $mysqli->query($program_query);

                // Check if query executed successfully
                if ($program_result && $program_result->num_rows > 0) {
                    // Fetch and display programs
                    while ($row = $program_result->fetch_assoc()) {
                        echo "<option value='" . $row['program_id'] . "'>" . $row['program_name'] . "</option>"; // Updated to use program ID
                    }
                } else {
                    echo "<option value=''>No programs found</option>";
                }
                ?>
            </select><br>

            <label for="intake"><b>Intake/Class</b></label>
            <input type="text" placeholder="Enter Intake" name="intake" required><br>

            <label for="phone"><b>Phone Number:</b></label>
            <input type="tel" placeholder="Enter Phone Number" name="phone" required><br>

            <!-- Submit button -->
            <button type="submit">Register</button>
        </form>
    </section>






    <section id="admin-popup" class="form-popup">
        <span class="close" onclick="closeForm('admin-popup')">&times;</span>
        <form action="register_administrator.php" class="form-container" method="post">
            <h2>Register Administrator</h2>

            <label for="fname"><b>Administrator Name</b></label>
            <input type="text" placeholder="Enter Full Name" name="fname" required>

            <label for="role"><b>Role</b></label>
            <input type="text" placeholder="Roles" name="role" required>

            <label for="phone"><b>Phone Number</b></label>
            <input type="tel" placeholder="Enter Phone Number" name="phone" required><br>

            <label><b>Gender</b></label><br>
            <input type="radio" id="male" name="gender" value="male">
            <label for="male">Male</label>&nbsp;&nbsp;&nbsp;
            <input type="radio" id="female" name="gender" value="female">
            <label for="female">Female</label><br>

            <button type="submit" class="btn">Register</button>
        </form>
    </section>

    <section id="program-popup" class="form-popup">
        <span class="close" onclick="closeForm('program-popup')">&times;</span>
        <form action="add_program.php" method="post" class="form-container">
            <h2>Add Program</h2>

            <label for="pn"><b>Program Name:</b></label>
            <input type="text" id="pn" placeholder="Enter Program Name" name="pn" required>

            <label for="period"><b>Period:</b></label>
            <input type="text" id="period" placeholder="Enter Period" name="period" required><br>

            <button type="submit" class="btn">Register</button>
        </form>
    </section>


    <section id="course-unit-popup" class="forms-popup">
        <span class="close" onclick="closeForm('course-unit-popup')">&times;</span>
        <form action="add_course_unit.php" method="post" class="form-container">
            <h2>Add Course Unit</h2>

            <label for="course_code"><b>Course Code:</b></label>
            <input type="text" id="course_code" placeholder="Enter Course Code" name="course_code" required>

            <label for="course_unit_name"><b>Course Unit Name:</b></label>
            <input type="text" id="course_unit_name" placeholder="Enter Course Unit Name" name="course_unit_name"
                required>

            <label for="description"><b>Description:</b></label>
            <textarea id="description" placeholder="Enter Description" name="description" rows="2" required></textarea>

            <label for="program_id"><b>Program :</b></label>
            <select id="program_id" name="program_id">
                <?php
            // Output options for programs
            foreach ($programs as $program) {
                echo "<option value='".$program["program_id"]."'>".$program["program_name"]."</option>";
            }
            ?>
            </select>

            <label for="department_id"><b>Department :</b></label>
            <select id="department_id" name="department_id">
                <?php
            // Output options for departments
            foreach ($departments as $department) {
                echo "<option value='".$department["department_id"]."'>".$department["department_name"]."</option>";
            }
            ?>
            </select>

            <button type="submit" class="btn">Register</button>
        </form>
    </section>

    <section id="department-popup" class="form-popup">
        <span class="close" onclick="closeForm('department-popup')">&times;</span>
        <form action="add_departments.php" method="post" class="form-container">
            <h2>Add Departments</h2>

            <label for="dp"><b>Department Name:</b></label>
            <input type="text" id="dp" placeholder="Enter Department Name" name="dp" required>

            <label for="dd"><b>Description:</b></label>
            <input type="text" id="dd" placeholder="Enter Description" name="dd" required><br>

            <button type="submit" class="btn">ADD</button>
        </form>
    </section>








    <script src="script.js"></script>
    <script src="pops.js"></script>
    <script src="pop.js"></script>
    <script src="js/views.js"></script>

    <script>
        function updateProgramName() {
            var programId = document.getElementById("program_id").value;
            var programNameInput = document.getElementById("program_name");

            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        var programName = xhr.responseText;
                        programNameInput.value = programName;
                    } else {
                        console.error('Error fetching program name');
                    }
                }
            };
            xhr.open("GET", "get_program_name.php?id=" + programId, true);
            xhr.send();
        }
    </script>


</body>

</html>