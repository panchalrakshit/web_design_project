<?php
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Get the form data
  $name = $_POST['name'];
  $price = $_POST['price'];
  $description = $_POST['description'];

  // Upload the image file
  $target_dir = "ITEM_IMG/";
  $target_file = $target_dir . basename($_FILES["m_image"]["name"]);
  move_uploaded_file($_FILES["m_image"]["tmp_name"], $target_file);

  // Connect to the database
  $dbhost = 'localhost';
  $dbuser = 'root';
  $dbpass = '';
  $dbname = 'webdesign';
  $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

  // Check for errors
  if (!$conn) {
    die('Could not connect: ' . mysqli_connect_error());
  }

  // Insert the menu item into the database
  $sql = "INSERT INTO menu (name, m_image, price, description) VALUES ('$name', '$target_file', '$price', '$description')";
  if (mysqli_query($conn, $sql)) {
    echo "Menu item added successfully.";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }

  // Close the database connection
  mysqli_close($conn);
}
?>

<form method="post" enctype="multipart/form-data">
  <label for="name">Name:</label>
  <input type="text" name="name" id="name">

  <label for="m_image">Image:</label>
  <input type="file" name="m_image" id="m_image">

  <label for="price">Price:</label>
  <input type="text" name="price" id="price">

  <label for="description">Description:</label>
  <textarea name="description" id="description"></textarea>

  <input type="submit" value="Add">
</form>
