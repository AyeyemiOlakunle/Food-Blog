<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

if (empty($_POST["username"]) || empty($_POST["email"]) || empty($_POST["password"]) || empty($_POST["password_confirmation"])) {
    die("All fields are required");
}

if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
    die("Valid email is required");
}

if (strlen($_POST["password"]) < 8) {
    die("Password must be at least 8 characters");
}

if (!preg_match("/[a-z]/i", $_POST["password"])) {
    die("Password must contain at least one letter");
}

if (!preg_match("/[0-9]/", $_POST["password"])) {
    die("Password must contain at least one number");
}

if ($_POST["password"] !== $_POST["password_confirmation"]) {
    die("Passwords must match");
}

// Database connection details
$servername = "localhost";
$username = "root";
$password = ""; // Replace with your actual database password if set
$dbname = "mileskitchen";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Escape user inputs to prevent SQL injection
$username = $conn->real_escape_string($_POST['username']);
$email = $conn->real_escape_string($_POST['email']);
$password = $conn->real_escape_string($_POST['password']);

// Hash the password securely
$password_hash = password_hash($password, PASSWORD_DEFAULT);

// Prepare and execute the SQL statement to insert data into the database
$sql = "INSERT INTO chef (username, email, password) VALUES ('$username','$email','$password_hash') ";

if ($conn->query($sql) === TRUE) {
    header("Location: success.html");
    exit; // Terminate script after redirect
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();
?>
