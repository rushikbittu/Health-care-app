<?php
// Database connection details
$host = 'localhost'; // e.g., 'localhost'
$db = 'test'; // e.g., 'mydatabase'
$user = 'root'; // e.g., 'root'
$password = ''; // e.g., 'password'

// Create a new MySQLi object
$conn = new mysqli($host, $user, $password, $db);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$password = $_POST['password'];

// Prepare and bind the statement to prevent SQL injection
$stmt = $conn->prepare("INSERT INTO users (name, email, phone, password) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $name, $email, $phone, $password);

// Execute the statement
if ($stmt->execute()) {
    header("Location: finall.html"); // Redirect to me.html
    exit();
} else {
    echo "Error: " . $stmt->error;
}

// Close the statement and database connection
$stmt->close();
$conn->close();
?>

