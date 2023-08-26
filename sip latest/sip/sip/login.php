<?php
// Establish database connection
$host = 'localhost'; // e.g., 'localhost'
$db = 'test'; // e.g., 'mydatabase'
$user = 'root'; // e.g., 'root'
$password = ''; // e.g., 'password'
$conn = new mysqli($host, $user, $password, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$email = $_POST['email'];
$password = $_POST['password'];

// Check if user exists in the database
$sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // User credentials are correct, allow access to the website
    header("Location: finall.html"); // Redirect to me.html
    exit();
} else {
    // User credentials are incorrect, display an error message
    echo "Invalid email or password.";
}

$conn->close();
?>
