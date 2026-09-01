<?php
include "config.php";

$email = trim($_POST["email"] ?? "");
$password = $_POST["password"] ?? "";

if ($email === "" || $password === "") {
    echo "Email and password are required. <a href='index.html'>Go back</a>";
    exit;
}

if (strlen($password) < 6) {
    echo "Password must be at least 6 characters. <a href='index.html'>Go back</a>";
    exit;
}

// Check if email already exists
$checkQuery = "SELECT id FROM users WHERE email = '$email'";
$result = mysqli_query($conn, $checkQuery);

if (mysqli_num_rows($result) > 0) {
    echo "That email is already registered. <a href='index.html'>Go back</a>";
    exit;
}

// Hash the password
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// Insert the new user
$insertQuery = "INSERT INTO users (email, password_hash) VALUES ('$email', '$hashedPassword')";

if (mysqli_query($conn, $insertQuery)) {
    echo "Signup successful! <a href='result.html'>Continue</a>";
} else {
    echo "Something went wrong. Please try again. <a href='index.html'>Go back</a>";
}
?>
