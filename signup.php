<?php
// Connect to the database
$conn = mysqli_connect('localhost', 'root', '', 'webdesign');

// Check for errors in the database connection
if (mysqli_connect_errno()) {
  die('Failed to connect to database: ' . mysqli_connect_error());
}

// Get the form data
$name = $_POST['name'];
$username = $_POST['username'];
$email = $_POST['email'];
$address = $_POST['address'];
$phone = $_POST['phone'];
$password = $_POST['password'];

// Sanitize the data to prevent SQL injection
$name = mysqli_real_escape_string($conn, $name);
$username = mysqli_real_escape_string($conn, $username);
$email = mysqli_real_escape_string($conn, $email);
$address = mysqli_real_escape_string($conn, $address);
$phone = mysqli_real_escape_string($conn, $phone);
$password = mysqli_real_escape_string($conn, $password);

// Hash the password for security
$password_hashed = password_hash($password, PASSWORD_DEFAULT);

// Insert the data into the "userdata" table
$query = "INSERT INTO userdata (name, username, email, address, phone, password) VALUES ('$name', '$username', '$email', '$address', '$phone', '$password_hashed')";
$result = mysqli_query($conn, $query);

// Check for errors in the query
if (!$result) {
  die('Error inserting data: ' . mysqli_error($conn));
}

// Close the database connection
mysqli_close($conn);

// Redirect the user to the login page
header("Location: login.php");
exit;
?>
