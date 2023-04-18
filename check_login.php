<?php
// Establish a database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "webdesign";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check if the connection was successful
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Get the email and password entered by the user
$email = $_POST['email'];
$password = $_POST['password'];

// Hash the password using the bcrypt algorithm
$hashed_password = password_hash($password, PASSWORD_BCRYPT);

// Prepare a SQL statement to select the user with the given email
$stmt = $conn->prepare("SELECT * FROM userdata WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

// Check if a user with the given email was found
if ($result->num_rows == 1) {
  $row = $result->fetch_assoc();
  
  // Check if the hashed password matches the one in the database
  if (password_verify($password, $row['password'])) {
    // Passwords match, so log the user in
    session_start();
    $_SESSION['user_id'] = $row['id'];
    header("Location: MAIN.php");
    exit();
  } else {
    // Passwords don't match, so show an error message
    echo  "<script>alert('User not found');</script>";
  }
}
else {
  // User with the given email wasn't found, so show an error message
  echo "<script>alert('User not found');</script>";
}


// Close the database connection
$stmt->close();
$conn->close();
?>
