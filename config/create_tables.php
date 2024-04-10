<?php

// Include database connection
include 'db_connection.php';

// SQL statements to create tables
$tables = array(
    "departments" => "
        CREATE TABLE IF NOT EXISTS departments (
            department_id INT AUTO_INCREMENT PRIMARY KEY,
            department_name VARCHAR(255) NOT NULL,
            description TEXT NOT NULL
        )",
    "programs" => "
        CREATE TABLE IF NOT EXISTS programs (
            program_id INT AUTO_INCREMENT PRIMARY KEY,
            program_name VARCHAR(255) NOT NULL,
            period VARCHAR(20) NOT NULL
        )",
    "course_units" => "
        CREATE TABLE IF NOT EXISTS course_units (
            course_unit_id INT AUTO_INCREMENT PRIMARY KEY,
            course_code VARCHAR(20) NOT NULL,
            course_unit_name VARCHAR(255) NOT NULL,
            description TEXT NOT NULL,
            program_id INT,
            department_id INT,
            FOREIGN KEY (program_id) REFERENCES programs(program_id),
            FOREIGN KEY (department_id) REFERENCES departments(department_id)
        )",
    "students" => "
        CREATE TABLE IF NOT EXISTS students (
            student_id INT AUTO_INCREMENT PRIMARY KEY,
            full_name VARCHAR(255) NOT NULL,
            reg_no VARCHAR(20) NOT NULL,
            dob DATE NOT NULL,
            gender ENUM('Male', 'Female') NOT NULL,
            program_id INT,
            intake VARCHAR(100) NOT NULL,
            phone VARCHAR(20) NOT NULL,
            FOREIGN KEY (program_id) REFERENCES programs(program_id)
        )",
    "attendance" => "
        CREATE TABLE IF NOT EXISTS attendance (
            id INT AUTO_INCREMENT PRIMARY KEY,
            student_id INT NOT NULL,
            program_id INT NOT NULL,
            course_unit_id INT NOT NULL,
            time TIME NOT NULL,
            date DATE NOT NULL,
            status VARCHAR(50) NOT NULL,
            FOREIGN KEY (student_id) REFERENCES students(student_id),
            FOREIGN KEY (program_id) REFERENCES programs(program_id),
            FOREIGN KEY (course_unit_id) REFERENCES course_units(course_unit_id)
        )",
    "lecturers" => "
        CREATE TABLE IF NOT EXISTS lecturers (
            lecturer_id INT AUTO_INCREMENT PRIMARY KEY,
            lecturer_name VARCHAR(255) NOT NULL,
            program_id INT,
            qualifications TEXT NOT NULL,
            phone VARCHAR(20) NOT NULL,
            gender ENUM('Male', 'Female') NOT NULL,
            FOREIGN KEY (program_id) REFERENCES programs(program_id)
        )",
    "administrators" => "
        CREATE TABLE IF NOT EXISTS administrators (
            admin_id INT AUTO_INCREMENT PRIMARY KEY,
            admin_name VARCHAR(255) NOT NULL,
            role VARCHAR(255) NOT NULL,
            gender ENUM('Male', 'Female') NOT NULL,
            phone VARCHAR(20) NOT NULL
        )"
);

// Create tables that do not exist
foreach ($tables as $table => $sql) {
    $result = $mysqli->query("SHOW TABLES LIKE '$table'");
    if ($result->num_rows == 0) {
        if ($mysqli->query($sql)) {
            echo "Table $table created successfully<br>";
        } else {
            echo "Error creating table $table: " . $mysqli->error . "<br>";
        }
    } else {
        echo "Table $table already exists<br>";
    }
}


// Close connection
$mysqli->close();

?>
