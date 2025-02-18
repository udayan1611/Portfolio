<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "udayan1611";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create database
$sql = "CREATE DATABASE IF NOT EXISTS db";
if ($conn->query($sql) === TRUE) {
  echo "Database created successfully or already exists.<br>";
} else {
  echo "Error creating database: " . $conn->error;
}

// Select database
mysqli_select_db($conn, "db");

// Get data from HTML form
$name = $_POST['Name'];
$email = $_POST['Email'];
$message = $_POST['Message'];

// Insert data into database
$sql = "INSERT INTO contact (name, email, message)
VALUES ('$name', '$email', '$message')";
$stmt = $conn->prepare($sql);
$stmt->bind_param('sss',$name,$email,$message);
$stmt->execute();
$result = $stmt->get_result();

// if ($conn->query($sql) === TRUE) {
//   echo "New record created successfully";
// } else {
//   echo "Error: " . $conn->error;
// }

$conn->close();
?>