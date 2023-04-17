<?php
// Connect to the database
$conn = mysqli_connect('localhost', 'root', '', 'webdesign');

// Check if the login form has been submitted
if (isset($_POST['login'])) {
    // Retrieve the email and password from the form
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Query the database to check if the email and password match
    $query = "SELECT * FROM userdata WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $query);

    // If there is a match, redirect the user to the main page
    if (mysqli_num_rows($result) == 1) {
        header('Location: main.php');
        exit;
    } else {
        // If there is no match, show an error message
        echo '<script>alert("Wrong credentials");</script>';
    }
}
?>
