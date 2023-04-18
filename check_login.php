<?php
session_start();

// Check if user is already logged in
if(isset($_SESSION['u_id'])){
    header("Location: main.php");
    exit;
}

// Check if the login form has been submitted
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the email and password entered by the user
    $email = $_POST['email'];
    $password = $_POST['password'];

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
        $_SESSION['u_id'] = $row['u_id'];
        header("Location: main.php");
        exit();
      } else {
        // Passwords don't match, so show an error message
        $error_message = "Incorrect email or password";
      }
    }
    else {
      // User with the given email wasn't found, so show an error message
      $error_message = "Incorrect email or password";
    }

    // Close the SQL statement
    $stmt->close();
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
</head>
<body>
    <h1>Login Page</h1>
    <?php if(isset($error_message)): ?>
        <p><?php echo $error_message; ?></p>
    <?php endif; ?>
    <form method="POST">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email"><br><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password"><br><br>
        <input type="submit" value="Login">
    </form>
</body>
</html>
