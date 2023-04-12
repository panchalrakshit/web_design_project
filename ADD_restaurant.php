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

$restaurant_northindian = isset($_POST['cuisine']) && in_array('NORTHINDIAN', $_POST['cuisine']) ? 1 : 0;
$restaurant_southindian = isset($_POST['cuisine']) && in_array('SOUTHINDIAN', $_POST['cuisine']) ? 1 : 0;
$restaurant_chinese = isset($_POST['cuisine']) && in_array('CHINESE', $_POST['cuisine']) ? 1 : 0;
$restaurant_italian = isset($_POST['cuisine']) && in_array('ITALIAN', $_POST['cuisine']) ? 1 : 0;
$restaurant_drinks = isset($_POST['cuisine']) && in_array('DRINKS', $_POST['cuisine']) ? 1 : 0;
$restaurant_address = $_POST['restaurant_address'];
$restaurant_phone = $_POST['restaurant_phone'];

// Insert restaurant data into "restaurant" table
$stmt = $conn->prepare("INSERT INTO restaurant (restaurant_name, r_image, north_indian, south_indian, italian, chinese, drink, address, phone_no) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
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
header("Location: main.html");
exit();

?>