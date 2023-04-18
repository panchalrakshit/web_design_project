<?php
require_once "connection.php";
session_start();

// Check if user is already logged in
if(isset($_SESSION['user_id'])){
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
        $_SESSION['user_id'] = $row['u_id'];
        header("Location: main.php");
        exit();
      } else {
        // Passwords don't match, so show an error message
        $error_message = "Incorrect email or password";
      }
    }
    else {
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
	<style>
		body {
			background-color: #f2f2f2;
			font-family: Arial, sans-serif;
		}
		.container {
			margin: 0 auto;
			max-width: 400px;
			padding: 20px;
			background-color: #fff;
			border-radius: 5px;
			box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
		}
		h2 {
			text-align: center;
			margin-bottom: 20px;
		}
		input[type="email"],
		input[type="password"] {
			width: 100%;
			padding: 12px 20px;
			margin: 8px 0;
			display: inline-block;
			border: 1px solid #ccc;
			border-radius: 4px;
			box-sizing: border-box;
		}
		input[type="submit"] {
			background-color: #4CAF50;
			color: #fff;
			padding: 12px 20px;
			border: none;
			border-radius: 4px;
			cursor: pointer;
			width: 100%;
		}
		input[type="submit"]:hover {
			background-color: #45a049;
		}
		.register-link {
			display: block;
			text-align: center;
			margin-top: 20px;
		}
		.register-link a {
			color: #4CAF50;
			font-weight: bold;
			text-decoration: none;
		}
		.restaurant-link {
			display: block;
			text-align: center;
			margin-top: 20px;
		}
		.restaurant-link a {
			color: #4CAF50;
			font-weight: bold;
			text-decoration: none;
		}
	</style>
</head>
<body>
	<div class="container">
		<h2>Login</h2>
			<?php
			if(isset($error_message)) {
    		echo "<p style='color:red'>" . $error_message . "</p>";
            }
             ?>
		<form action="login.php" method="post">
			<label for="email">Email:</label>
			<input type="email" id="email" name="email"><br>

			<label for="password">Password:</label>
			<input type="password" id="password" name="password"><br>

			<input type="submit" name="login" value="Login">
		</form>

		<div class="register-link">
			<a href="signup.html">Create your account</a>
		</div>

		<div class="restaurant-link">
			<a href="newrestaurant.html">Restaurant owner register here</a>
		</div>
	</div>

</body>
</html>
