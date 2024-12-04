<?php
// Retrieve form data
$name = $_POST['name'];
$email = $_POST['email'];
$age = $_POST['age'];
$message = $_POST['message'];

// Database connection parameters
$servername = "db"; // Use service name defined in docker-compose.yml
$username = "admin";
$password = "Teju#2001";
$dbname = "sample_name";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Escape user inputs to prevent SQL Injection
$name = $conn->real_escape_string($name);
$email = $conn->real_escape_string($email);
$age = $conn->real_escape_string($age);
$message = $conn->real_escape_string($message);

// Prepare SQL statement
$sql = "INSERT INTO user_details (name, email, age, message) VALUES ('$name', '$email', $age, '$message')";

// Execute SQL statement
if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close connection
$conn->close();
?>