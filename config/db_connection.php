<?php
$user = 'root';
$password = '';
$database = 'school_db';
$servername = 'localhost';

// Create connection
$mysqli = new mysqli($servername, $user, $password, $database);

// Check connection
if ($mysqli->connect_error) {
    die('Connection Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
} else {
    echo '';
}
?>

