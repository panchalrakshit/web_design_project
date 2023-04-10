<?php

// Connect to MySQL server
$conn = mysqli_connect("localhost", "root", "", "webdesign");

// Get menu data from form submission
$restaurant_id = $_POST['restaurant_id'];
$item_name = $_POST['item_name'];
$target_dir = "item_img/"; // Change this to the directory you want to upload the file to
$target_file = $target_dir . basename($_FILES["item_image"]["name"]);
if (move_uploaded_file($_FILES["item_image"]["tmp_name"], $target_file)) {
    $item_image = $target_file;
} else {
    $item_image = ""; // Set the image path to an empty string if the upload fails
}
$item_price = $_POST['item_price'];
$item_description = $_POST['item_description'];
$cuisine = $_POST['cuisine'];

// Insert menu data into "menu" table
$stmt = $conn->prepare("INSERT INTO menu (restaurant_id, item_name, item_image, item_price, item_description, cuisine) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("isssss", $restaurant_id, $item_name, $item_image, $item_price, $item_description, $cuisine);

if ($stmt->execute()) {
    echo "New menu item added successfully";
} else {
    echo "Error: " . $stmt->error;
}

// Close MySQL connection
$conn->close();

?>
