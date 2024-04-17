<?php
// Retrieve form data
$name = $_POST['name'];
$service = $_POST['service'];
$email = $_POST['email'];
$phone = $_POST['phone'];

// Create database connection
$conn = new mysqli('localhost', 'root', '', 'mickztransport');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare SQL statement with placeholders
$sql = "INSERT INTO contacts (name, service, email, phone) VALUES (?, ?, ?, ?)";

// Prepare the SQL statement
$stmt = $conn->prepare($sql);

// Bind parameters to the prepared statement
$stmt->bind_param("ssss", $name, $service, $email, $phone);

// Execute SQL statement
if ($stmt->execute()) {
    echo "Thank you for contacting us!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close prepared statement and database connection
$stmt->close();
$conn->close();
?>
