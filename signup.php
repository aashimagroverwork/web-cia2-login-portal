<?php
// signup.php - runs when the form is submitted

include "config.php";

$email = $_POST["email"];
$password = $_POST["password"];

if ($email == "" || $password == "") {
    echo "Email and password are required. <a href='index.html'>Go back</a>";
    exit;
}

if (strlen($password) < 6) {
    echo "Password must be at least 6 characters. <a href='index.html'>Go back</a>";
    exit;
}

// check if email already exists
$check = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");

if (mysqli_num_rows($check) > 0) {
    echo "That email is already registered. <a href='index.html'>Go back</a>";
    exit;
}

// hash the password before storing it
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// insert the new user
$sql = "INSERT INTO users (email, password_hash) VALUES ('$email', '$hashedPassword')";
$result = mysqli_query($conn, $sql);

if ($result) {
    echo "Account created successfully! <a href='index.html'>Go back</a>";
} else {
    echo "Something went wrong: " . mysqli_error($conn);
}
?>
