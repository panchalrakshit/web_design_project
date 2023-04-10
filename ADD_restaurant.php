<?php

// Connect to MySQL server
$conn =mysqli_connect("localhost", "root", "", "webdesign");


// Get restaurant data from form submission
$restaurant_name = $_POST['restaurant_name'];
$target_dir = "restaurant_img/"; // Change this to the directory you want to upload the file to
$target_file = $target_dir . basename($_FILES["restaurant_image"]["name"]);
if (move_uploaded_file($_FILES["restaurant_image"]["tmp_name"], $target_file)) {
    $restaurant_image = $target_file;
} else {
    $restaurant_image = ""; // Set the image path to an empty string if the upload fails
}

$restaurant_northindian = isset($_POST['restaurant_northindian']) ? 1 : 0;
$restaurant_southindian= isset($_POST['restaurant_southindian']) ? 1 : 0;
$restaurant_chinese = isset($_POST['restaurant_chinese']) ? 1 : 0;
$restaurant_italian = isset($_POST['restaurant_italian']) ? 1 : 0;
$restaurant_drinks= isset($_POST['restaurant_drinks']) ? 1 : 0;
$restaurant_address = $_POST['restaurant_address'];
$restaurant_phone = $_POST['restaurant_phone'];

// Insert restaurant data into "restaurant" table
$stmt = $conn->prepare("INSERT INTO restaurant (restaurant_name, r_image, NORTH_INDIAN, SOUTH_INDIAN, ITALIAN, CHINESE, DRINK, address, phone_no) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssiiiiiss", $restaurant_name, $restaurant_image, $restaurant_northindian, $restaurant_southindian, $restaurant_italian, $restaurant_chinese, $restaurant_drinks, $restaurant_address, $restaurant_phone);

if ($stmt->execute()) {
  echo "New restaurant added successfully";
} 
else 
{
  echo "Error: " . $stmt->error;
}


// Close MySQL connection
$conn->close();

?>
