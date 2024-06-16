<?php
// Database connection settings
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cadt";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Capture form data
$user = $_POST['username'];
$pass = $_POST['password'];

// Hash the password for security
$hashed_password = password_hash($pass, PASSWORD_DEFAULT);

// Insert the data into the database
$sql = "INSERT INTO account (username, password) VALUES (?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $user, $hashed_password);
$stmt->execute();

// Close the connection
$stmt->close();
$conn->close();


header("Location: https://elearning.cadt.edu.kh/login/index.php");
exit();
?>
