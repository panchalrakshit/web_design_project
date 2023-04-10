<?php

// Connect to MySQL server
$conn =mysqli_connect("localhost", "root", "", "webdesign");

// Get menu item data from form submission
$item_name = $_POST['item_name'];
$item_price = $_POST['item_price'];
$item_description = $_POST['item_description'];
$restaurant_name = $_POST['restaurant_name'];
$menu_table_name = "menu_" . str_replace(" ", "", strtolower($restaurant_name));

// Insert menu item data into "menu_restaurantname" table
$stmt = $conn->prepare("INSERT INTO $menu_table_name (item_name, item_price, item_description) VALUES (?, ?, ?)");
$stmt->bind_param("sds", $item_name, $item_price, $item_description);

if ($stmt->execute()) {
  echo "New menu item added successfully";
} else {
  echo "Error: " . $stmt->error;
}

// Close MySQL connection
$conn->close();

?>
