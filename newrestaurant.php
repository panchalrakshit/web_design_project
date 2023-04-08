<?php

// Connect to MySQL server
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "webdesign";
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Get restaurant data from form submission
$restaurant_name = $_POST['restaurant_name'];
$restaurant_image=$_POST['r_image'];
$restaurant_type=$_post['restaurant_type'];
$restaurant_rating=$_post['restaurant_rating'];
$restaurant_address = $_POST['restaurant_address'];
$restaurant_phone = $_POST['restaurant_phone'];

// Insert restaurant data into "restaurant" table
$sql = "INSERT INTO restaurant (restaurant_name, r_image, type, address, phone_no, rating) VALUES ('$restaurant_name', '$restaurant_image', '$restaurant_type','$restaurant_address','$restaurant_phone','$restaurant_rating')";
if ($conn->query($sql) === TRUE) {
  echo "New restaurant added successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

// Create a new menu table for the restaurant
$menu_table_name = "menu_" . str_replace(' ', '_', strtolower($restaurant_name));
$sql = "CREATE TABLE $menu_table_name (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  item_name VARCHAR(30) NOT NULL,
  item_description VARCHAR(50),
  item_price FLOAT(8,2) NOT NULL
)";

if ($conn->query($sql) === TRUE) {
  echo "New menu table created successfully";
} else {
  echo "Error creating menu table: " . $conn->error;
}

// Close MySQL connection
$conn->close();

?>
