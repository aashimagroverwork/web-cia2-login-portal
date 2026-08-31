<?php
// connect to the database
$conn = mysqli_connect("localhost", "root", "", "code_doctor");

if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}
?>
