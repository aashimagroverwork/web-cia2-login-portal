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

$stmt = mysqli_prepare($conn, "SELECT id FROM users WHERE email = ?");
mysqli_stmt_bind_param($stmt, "s", $email);
mysqli_stmt_execute($stmt);
mysqli_stmt_store_result($stmt);

if (mysqli_stmt_num_rows($stmt) > 0) {
    echo "That email is already registered. <a href='index.html'>Go back</a>";
    exit;
}
mysqli_stmt_close($stmt);

$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

$stmt = mysqli_prepare($conn, "INSERT INTO users (email, password_hash) VALUES (?, ?)");
mysqli_stmt_bind_param($stmt, "ss", $email, $hashedPassword);

if (mysqli_stmt_execute($stmt)) {
    header("Location: result.html");
    exit;
} else {
    echo "Something went wrong. Please try again. <a href='index.html'>Go back</a>";
}
?>