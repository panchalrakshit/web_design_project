<?php

// Connect to MySQL server
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "webdesign";
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Get restaurant data from form submission
$restaurant_name = $_POST['restaurant_name'];
$target_dir = "restaurant_img"; // Change this to the directory you want to upload the file to
$target_file = $target_dir . basename($_FILES["restaurant_image"]["name"]);
if (move_uploaded_file($_FILES["restaurant_image"]["tmp_name"], $target_file)) {
    $restaurant_image = $target_file;
} else {
    $restaurant_image = ""; // Set the image path to an empty string if the upload fails
}

$restaurant_NORTHINDIAN = isset($_POST['RESTAURANT_NORTHINDIAN']) ? 1 : 0;
$restaurant_SOUTHINDIAN= isset($_POST['RESTAURANT_SOUTHINDIAN']) ? 1 : 0;
$restaurant_CHINESE = isset($_POST['RESTAURANT_CHINESE']) ? 1 : 0;
$restaurant_ITALIAN = isset($_POST['RESTAURANT_ITALIAN']) ? 1 : 0;
$restaurant_DRINKS= isset($_POST['restaurant_drnks']) ? 1 : 0;
$restaurant_address = $_POST['restaurant_address'];
$restaurant_phone = $_POST['restaurant_phone'];

// Insert restaurant data into "restaurant" table
$stmt = $conn->prepare("INSERT INTO restaurant (restaurant_name, r_image, NORTH_INDIAN, SOUTH_INDIAN, ITALIAN, CHINESE, DRINK , address, phone_no) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssiiiiiss", $restaurant_name, $restaurant_image, $restaurant_northindian, $restaurant_southindian, $restaurant_italian, $restaurant_chinese, $restaurant_drinks, $restaurant_address, $restaurant_phone);
$stmt->execute();
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
